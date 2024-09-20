<?php

/**
 *
 * @package   Duplicator
 * @copyright (c) 2022, Snap Creek LLC
 */

namespace Duplicator\Addons\GDriveAddon\Models;

use Duplicator\Models\Storages\AbstractStorageAdapter;
use Duplicator\Utils\OAuth\TokenEntity;
use Exception;
use VendorDuplicator\Psr\Http\Message\RequestInterface;
use VendorDuplicator\Google\Client;
use VendorDuplicator\Google\Http\MediaFileUpload;
use VendorDuplicator\Google\Service\Drive;
use VendorDuplicator\GuzzleHttp\Psr7\Request;
use VendorDuplicator\GuzzleHttp\Psr7\Response;

/**
 * @method GDriveStoragePathInfo getPathInfo(string $path)
 */
class GDriveAdapter extends AbstractStorageAdapter
{
    const FOLDER_MIME_TYPE = 'application/vnd.google-apps.folder';

    /**
     * @var Drive The Google Drive service
     */
    protected $drive = null;

    /**
     * @var string The root storage path
     */
    protected $storagePath = '';

    /**
     * @var string The root storage path id
     */
    protected $storagePathId = '';

    /**
     * @var TokenEntity The OAuth token entity
     */
    protected $token = null;

    /**
     * @var int
     */
    protected $startTime = 0;

    /**
     * @param TokenEntity $token         The OAuth token entity.
     * @param string      $storagePath   The root storage path.
     * @param string      $storagePathId The root storage path id.
     */
    public function __construct(TokenEntity $token, $storagePath, $storagePathId = '')
    {
        $client = new Client();

        if ($token->isAboutToExpire()) {
            $token->refresh(true);
        }

        $client->setAccessToken([
            'created'       => $token->getCreated(),
            'access_token'  => $token->getAccessToken(),
            'refresh_token' => $token->getRefreshToken(),
            'expires_in'    => $token->getExpiresIn(),
            'scope'         => $token->getScope(),
        ]);

        $this->token         = $token;
        $this->drive         = new Drive($client);
        $this->storagePath   = $storagePath;
        $this->storagePathId = $storagePathId;
    }

    /**
     * Get the Google Drive service.
     *
     * @return Drive
     */
    public function getService()
    {
        return $this->drive;
    }

    /**
     * Initialize the storage on creation.
     *
     * @param string $errorMsg The error message if storage is invalid.
     *
     * @return bool true on success or false on failure.
     */
    public function initialize(&$errorMsg = '')
    {
        if (! $this->token->isValid()) {
            $errorMsg = __('Invalid token supplied for google drive', 'duplicator-pro');
            return false;
        }
        if (! $this->exists('/') && ! $this->createDir('/')) {
            $errorMsg = __('Unable to create root directory on google drive', 'duplicator-pro');
            return false;
        }
        return true;
    }

    /**
     * Destroy the storage on deletion.
     *
     * @return bool true on success or false on failure.
     */
    public function destroy()
    {
        $this->storagePathId = '';
        return $this->delete('/', true);
    }

    /**
     * Check if storage is valid and ready to use.
     *
     * @param string $errorMsg The error message if storage is invalid.
     *
     * @return bool
     */
    public function isValid(&$errorMsg = '')
    {
        if (! $this->token->isValid()) {
            $errorMsg = 'Invalid token supplied for google drive';
            return false;
        }

        $root = $this->getPathInfo('/');
        if (! $root || !$root->exists) {
            $errorMsg = 'Root directory does not exist on google drive, false for isValid';
            return false;
        }

        return true;
    }

    /**
     * Create the directory specified by pathname, recursively if necessary.
     *
     * @param string $path The directory path.
     *
     * @return bool true on success or false on failure.
     */
    protected function realCreateDir($path)
    {
        $path = trim($path, '/');

        if (empty($this->storagePathId)) {
            // if we don't have the storage path id set, we fetch it
            $storageFolder = $this->getPathInfo('/');
            if ($storageFolder->exists) {
                $this->storagePathId = $storageFolder->id;
            } else {
                $path = $this->storagePath . '/' . $path;
            }
        }

        $parts  = array_filter(explode('/', $path));
        $parent = $this->storagePathId;

        // At this point, if we don't have a parent, we need to create from the root path.

        // We assume that a partial path may exist
        // So we try to search for the path and create it if it doesn't exist
        // But once we create one directory, we assume that the rest of the path doesn't exist
        // This saves us a lot of calls to the Google Drive API
        $pathMayExist = !empty($parent);

        foreach ($parts as $part) {
            $query = "name = '{$part}' and trashed = false and mimeType = '" . self::FOLDER_MIME_TYPE . "'";
            if ($parent) {
                $query .= " and '{$parent}' in parents";
            }

            if ($pathMayExist) {
                // At first, we try to find the directory
                $response = $this->drive->files->listFiles([
                    'q'      => $query,
                    'fields' => 'files(id)',
                ]);
                if ($response->count() > 0) {
                    $file   = $response->getFiles()[0];
                    $parent = $file->getId();
                    continue;
                }
            }

            $pathMayExist = false;
            // If we didn't find the directory, we create it
            $file = new Drive\DriveFile([
                'name'     => $part,
                'mimeType' => self::FOLDER_MIME_TYPE,
            ]);

            if (! empty($parent)) {
                $file->setParents([$parent]);
            }

            try {
                $file = $this->drive->files->create($file, ['fields' => 'id']);
            } catch (\Exception $e) {
                \DUP_PRO_Log::traceObject('[GDriveAdapter] Unable to create directory: ' . $e->getMessage(), $e);
                return false;
            }
            $parent = $file->getId();
        }

        return true;
    }

    /**
     * Create file with content.
     *
     * @param string $path    The path to file.
     * @param string $content The content of file.
     *
     * @return false|int The number of bytes that were written to the file, or false on failure.
     */
    protected function realCreateFile($path, $content)
    {
        $response = $this->createNewFile($path, [
            'data'       => $content,
            'uploadType' => 'multipart',
            'fields'     => 'id,size',
        ]);

        if (!$response) {
            return false;
        }

        return (int) $response->getSize();
    }

    /**
     * Delete relative path from storage root.
     *
     * @param string $path      The path to delete. (Accepts directories and files)
     * @param bool   $recursive Allows the deletion of nested directories specified in the pathname. Default to false.
     *
     * @return bool true on success or false on failure.
     */
    protected function realDelete($path, $recursive = false)
    {
        $info = $this->getPathInfo($path);

        if (! $info->exists) {
            return true; // if the path doesn't exist, we can consider it deleted
        }

        if ($info->isDir && ! $recursive && ! $this->isDirEmpty($path)) {
            return false; // if it's a directory and, we are not deleting recursively, we can't delete it
        }

        try {
            $this->drive->files->delete($info->id);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * Get file content.
     *
     * @param string $path The path to file.
     *
     * @return string|false The content of file or false on failure.
     */
    public function getFileContent($path)
    {
        $info = $this->getPathInfo($path);

        if (! $info->exists) {
            return false;
        }

        try {
            /** @var Response $response */
            $response = $this->drive->files->get($info->id, [
                'alt'              => 'media',
                'acknowledgeAbuse' => true,
            ]);

            return $response->getBody()->getContents();
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Move and/or rename a file or directory.
     *
     * @param string $oldPath Relative storage path
     * @param string $newPath Relative storage path
     *
     * @return bool true on success or false on failure.
     */
    protected function realMove($oldPath, $newPath)
    {
        $fileInfo   = $this->getPathInfo($oldPath);
        $oldDirInfo = $this->getPathInfo(dirname($oldPath));
        $newDirInfo = $this->getPathInfo(dirname($newPath));
        $file       = $fileInfo->file;

        try {
            $this->drive->files->update($fileInfo->id, $file, [
                'addParents'    => $newDirInfo->id,
                'removeParents' => $oldDirInfo->id,
            ]);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * Get path info and cache it, is path not exists return path info with exists property set to false.
     *
     * @param string $path Relative storage path, if empty, return root path info.
     *
     * @return GDriveStoragePathInfo|false The path info or false on error.
     */
    protected function getRealPathInfo($path)
    {
        try {
            $info = $this->nestedPathInfo($path);
        } catch (\Exception $e) {
            $info = false;
        }

        return $this->buildPathInfo($info);
    }

    /**
     * Get the list of files and directories inside the specified path.
     *
     * @param string $path    Relative storage path, if empty, scan root path.
     * @param bool   $files   If true, add files to the list. Default to true.
     * @param bool   $folders If true, add folders to the list. Default to true.
     *
     * @return string[] The list of files and directories, empty array if path is invalid.
     */
    public function scanDir($path, $files = true, $folders = true)
    {
        $info = $this->getPathInfo($path);

        if (! $info->exists) {
            return [];
        }

        $query = "'{$info->id}' in parents and trashed = false";

        if (! $files) {
            $query .= " and mimeType = '" . self::FOLDER_MIME_TYPE . "'";
        }
        if (! $folders) {
            $query .= " and mimeType != '" . self::FOLDER_MIME_TYPE . "'";
        }

        $nextPageToken = null;
        $result        = [];
        do {
            $response = $this->drive->files->listFiles([
                'q'         => $query,
                'pageToken' => $nextPageToken,
            ]);

            $result = array_merge($result, array_map(function ($file) {
                $info = $this->buildPathInfo($file);
                return $info->path;
            }, $response->getFiles()));
        } while ($nextPageToken = $response->getNextPageToken());

        return $result;
    }

    /**
     * Check if directory is empty.
     *
     * @param string   $path    The folder path
     * @param string[] $filters Filters to exclude files and folders from the check, if start and end with /, use regex.
     *
     * @return bool True is ok, false otherwise
     */
    public function isDirEmpty($path, $filters = [])
    {
        $regexFilters = $normalFilters = [];

        foreach ($filters as $filter) {
            if ($filter[0] === '/' && substr($filter, -1) === '/') {
                $regexFilters[] = $filter; // It's a regex filter as it starts and ends with a slash
            } else {
                $normalFilters[] = $filter;
            }
        }

        $contents = $this->scanDir($path);
        foreach ($contents as $item) {
            if (in_array($item, $normalFilters)) {
                continue;
            }

            foreach ($regexFilters as $regexFilter) {
                if (preg_match($regexFilter, $item) === 1) {
                    continue 2;
                }
            }

            return false;
        }

        return true;
    }

    /**
     * Copy local file to storage, partial copy is supported.
     * If destination file exists, it will be overwritten.
     * If offset is less than the destination file size, the file will be truncated.
     *
     * @param string              $sourceFile  The source file full path
     * @param string              $storageFile Storage destination path
     * @param int<0,max>          $offset      The offset where the data starts.
     * @param int                 $length      The maximum number of bytes read. Default to -1 (read all the remaining buffer).
     * @param int                 $timeout     The timeout for the copy operation in microseconds. Default to 0 (no timeout).
     * @param array<string,mixed> $extraData   Extra data to pass to copy function and updated during copy.
     *                                         Used for storages that need to maintain persistent data during copy intra-session.
     *
     * @return false|int The number of bytes that were written to the file, or false on failure.
     */
    protected function realCopyToStorage($sourceFile, $storageFile, $offset = 0, $length = -1, $timeout = 0, &$extraData = [])
    {
        $this->startTrackingTime();

        $minimumChunkSize = $chunkSize = 256 * KB_IN_BYTES;

        if ($length > 0) {
            $chunkSize = $length;
        }

        if ($chunkSize < $minimumChunkSize || $chunkSize % $minimumChunkSize !== 0) {
            \DUP_PRO_Log::info(sprintf('[GDriveAdapter] Invalid chunk size %d, must be a multiple of %d', $chunkSize, $minimumChunkSize));
            return false;
        }

        $source = fopen($sourceFile, 'rb');
        if (! $source) {
            \DUP_PRO_Log::info(sprintf('[GDriveAdapter] Unable to open source file %s', $sourceFile));
            return false;
        }

        fseek($source, $offset);

        $storageFile = '/' . trim($storageFile, '/');
        $targetPath  = dirname($storageFile);

        if ($targetPath === '/' && ! empty($this->storagePathId)) {
            $target = new Drive\DriveFile();
            $target->setId($this->storagePathId);
        } else {
            $target = $this->getPathInfo($targetPath);
            if (! $target->exists) {
                $this->createDir($targetPath);
                $target = $this->getPathInfo($targetPath);
            }
        }

        if (! $target) {
            \DUP_PRO_Log::info(sprintf('[GDriveAdapter] Unable to get target path info for %s', $targetPath));
            return false;
        }

        $client = $this->drive->getClient();
        $client->setDefer(true);
        $originalHttpClient = $client->getHttpClient();

        $file = new Drive\DriveFile([
            'name'    => basename($storageFile),
            'parents' => [$target->id],
        ]);

        // The file create call returns the request object as we have set client defer to true
        /** @var Request $request */
        $request = $this->drive->files->create($file);

        $media = new MediaFileUpload(
            $client,
            $request,
            'application/octet-stream',
            '',
            true,
            $chunkSize
        );

        $firstChunk = true;

        $media->setFileSize($filesize = filesize($sourceFile));

        if (! empty($extraData['resume_uri'])) {
            $resumeUri = $extraData['resume_uri'];
            try {
                $this->forceSet($media, 'progress', $offset);
                $this->forceSet($media, 'resumeUri', $resumeUri);
            } catch (\Exception $e) {
                $client->setHttpClient($originalHttpClient);
                \DUP_PRO_Log::trace('[GDriveAdapter] Unable to set resume uri: ' . $e->getMessage());
                return false;
            }
            $firstChunk = false;
            \DUP_PRO_Log::info(sprintf('[GDriveAdapter] Resuming upload for %s from offset %s timeout %d', $sourceFile, $offset, $timeout));
        }

        do {
            if ($timeout > 0) {
                // Set the timeout for the client (in seconds)
                $client->setHttpClient(new \VendorDuplicator\GuzzleHttp\Client([
                    'base_uri'    => $originalHttpClient->getConfig('base_uri'),
                    'http_errors' => false,
                    'timeout'     => $timeout / SECONDS_IN_MICROSECONDS, // convert microseconds to seconds
                ]));
            }
            $chunk = fread($source, $chunkSize);
            if (! $chunk) {
                \DUP_PRO_Log::info(sprintf('[GDriveAdapter] Unable to read chunk from %s', $sourceFile));
                $status = true; // we can't set it to false, because drive sdk returns false when chunk upload is successful.
                break;
            }
            $status = $media->nextChunk($chunk);
            if ($firstChunk) {
                \DUP_PRO_Log::trace(sprintf('[GDriveAdapter] Created resume uri for %s and it\'s %s', $sourceFile, $media->getResumeUri()));
                $extraData['resume_uri'] = $media->getResumeUri(); // we need to cache the resume uri for the next chunk
                $firstChunk              = false;
            }
            $message = '[GDriveAdapter] Uploaded %d/%d bytes, requested [%d, %d] of %s';
            \DUP_PRO_Log::trace(sprintf($message, $media->getProgress(), $filesize, $offset, $length, $sourceFile));
            if ($length > 0) {
                // if we have a length, we need to stop when we reach it
                break;
            }
        } while (!feof($source) && ! $status && ! $this->hasReachedTimeout($timeout));

        if (feof($source)) {
            // if we reached the end of the file, we can delete the cached resume uri
            unset($extraData['resume_uri']);
            \DUP_PRO_Log::info(sprintf('[GDriveAdapter] File %s copied successfully to %s', $sourceFile, $storageFile));
        }

        $client->setDefer(false);
        $client->setHttpClient($originalHttpClient);

        // If we have false as status, it means the upload is not finished yet
        // On the final chunk upload, we get the file info
        if ($status === false || ($status instanceof Drive\DriveFile)) {
            return $length > 0 ? $length : $filesize;
        }

        return false;
    }

    /**
     * Generate info on create dir, this method is exendable by child classes if StoragePathInfo is extended.
     *
     * @param string $path Dir path
     *
     * @return GDriveStoragePathInfo
     */
    protected function generateCreateDirInfo($path)
    {
        return $this->getRealPathInfo($path);
    }

    /**
     * Start tracking the time for the current operation
     *
     * @return void
     */
    protected function startTrackingTime()
    {
        $this->startTime = (int) (microtime(true) * 1000000);
    }

    /**
     * Get the elapsed time since the start of the current operation
     *
     * @return int
     */
    protected function getElapsedTime()
    {
        return (int) (microtime(true) * 1000000) - $this->startTime;
    }

    /**
     * Check if the operation has reached the timeout
     *
     * @param int $timeout The timeout in microseconds
     *
     * @return bool
     */
    protected function hasReachedTimeout($timeout)
    {
        return $timeout > 0 && $this->getElapsedTime() >= ($timeout - 1000000);
    }

    /**
     * Generate info on delete item, this methos is exendable by child classes if StoragePathInfo is extended.
     *
     * @param string $path Item path
     *
     * @return GDriveStoragePathInfo
     */
    protected function generateDeleteInfo($path)
    {
        $info           = new GDriveStoragePathInfo();
        $info->path     = $path;
        $info->exists   = false;
        $info->isDir    = false;
        $info->size     = 0;
        $info->created  = 0;
        $info->modified = 0;
        return $info;
    }

    /**
     * Create a new file in the specified path.
     *
     * @param string                $path    The path to create the file in
     * @param array<string, string> $options The options to create the file with
     *
     * @return false|Drive\DriveFile
     */
    protected function createNewFile($path, $options = [])
    {
        $path = '/' . trim($path, '/');

        $parent = $this->getPathInfo(dirname($path));

        if (! $parent->exists) {
            if ($this->createDir(dirname($path))) {
                $parent = $this->getPathInfo(dirname($path));
            } else {
                return false;
            }
        }

        $file = new Drive\DriveFile([
            'name'    => basename($path),
            'parents' => [$parent->id],
        ]);

        try {
            return $this->drive->files->create($file, $options);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Traverse the path folder by folder and fetch the file info.
     *
     * @param string  $path   The path get information for
     * @param ?string $parent The parent folder id
     *
     * @return false|Drive\DriveFile
     */
    protected function nestedPathInfo($path, $parent = null)
    {
        $path      = trim($path, '/');
        $traversed = [$this->storagePath]; // keep track of the traversed path

        if (! $parent) {
            $parent = $this->storagePathId;
        }
        if (! $parent) {
            // if we don't have a parent, we need to traverse from the root folder
            $path      = $this->storagePath . '/' . $path;
            $traversed = [];
            $info      = false;
        } else {
            $info = $this->drive->files->get($parent, ['fields' => 'id,name,mimeType,size,createdTime,modifiedTime,md5Checksum,webViewLink']);
        }

        $parts = array_filter(explode('/', $path));

        foreach ($parts as $index => $part) {
            $query = "name = '{$part}' and trashed = false";
            if ($parent) {
                $query .= " and '{$parent}' in parents";
            }
            if ($index < count($parts) - 1) {
                // if we are not in the last iteration, it's most definitely a folder
                $query .= " and mimeType = '" . self::FOLDER_MIME_TYPE . "'";
            }

            $result      = $this->drive->files->listFiles([
                'q'      => $query,
                'fields' => 'files(id,name,mimeType,size,createdTime,modifiedTime,md5Checksum,webViewLink)',
            ]);
            $traversed[] = $part;

            if ($result->count() === 0) {
                // if we didn't find anything, we can stop here
                return false;
            }
            foreach ($result->getFiles() as $file) {
                if ($file->getName() !== $part) {
                    continue; // we are looking for a file/folder with the same name
                }
                if (empty($this->storagePathId) && $index === 0) {
                    // we have an opportunity to set the storage path id
                    $this->storagePathId = $file->getId();
                }
                if ($index < (count($parts) - 1) && $file->getMimeType() !== self::FOLDER_MIME_TYPE) {
                    // if we are not in the last iteration, we are most definitely looking for a folder, so we skip if it's not
                    continue;
                }
                // At this point we have found the file or folder we were looking for
                $props         = $file->getProperties();
                $props['path'] = implode('/', $traversed);
                $file->setProperties($props); // add the path to the file properties
                $parent = $file->getId();
                $info   = $file;

                // we need to keep looking for the next part
                continue 2;
            }
            // if we got here, we didn't find the file or folder we were looking for
            $info = false;
            break;
        }

        return $info;
    }

    /**
     * Build the path info object from Google Drive's file info.
     *
     * @param Drive\DriveFile|false $file The file info
     *
     * @return GDriveStoragePathInfo
     */
    protected function buildPathInfo($file)
    {
        $info = new GDriveStoragePathInfo();

        if (! $file) {
            $info->exists = false;
            return $info;
        }

        $props = $file->getProperties();

        $info->exists      = true;
        $info->id          = $file->getId();
        $info->name        = $file->getName();
        $info->mimeType    = $file->getMimeType();
        $info->isDir       = $info->mimeType === self::FOLDER_MIME_TYPE;
        $info->size        = (int) $file->getSize();
        $info->webUrl      = $file->getWebViewLink();
        $info->created     = $file->getCreatedTime() ? strtotime($file->getCreatedTime()) : time();
        $info->modified    = $file->getModifiedTime() ? strtotime($file->getModifiedTime()) : time();
        $info->md5Checksum = $file->getMd5Checksum();

        if (isset($props['path'])) {
            // if we have the path in the properties, that's a path from the storage folder
            // so we remove the storage folder and the slash after that from the path
            $info->path = substr($props['path'], strlen($this->storagePath) + 1);
        } else {
            // if we don't have the path in the properties, we "assume" it's under the storage folder
            $info->path = $file->getName();
        }

        $info->file = $file;

        return $info;
    }

    /**
     * Forcefully set a property on an object
     *
     * @param object $object   The object to set the property on
     * @param string $property The property to set
     * @param mixed  $value    The value to set
     *
     * @return void
     */
    protected function forceSet($object, $property, $value)
    {
        if (!is_object($object)) {
            throw new Exception('Object must be an object');
        }
        if (!property_exists($object, $property)) {
            throw new Exception('Property ' . $property . ' does not exist on object ' . get_class($object));
        }
        $reflection = new \ReflectionProperty($object, $property);
        $reflection->setAccessible(true);
        $reflection->setValue($object, $value);
    }

    /**
     * Copy storage file to local file, partial copy is supported.
     * If destination file exists, it will be overwritten.
     * If offset is less than the destination file size, the file will be truncated.
     *
     * @param string              $storageFile The storage file path
     * @param string              $destFile    The destination local file full path
     * @param int<0,max>          $offset      The offset where the data starts.
     * @param int                 $length      The maximum number of bytes read. Default to -1 (read all the remaining buffer).
     * @param int                 $timeout     The timeout for the copy operation in microseconds. Default to 0 (no timeout).
     * @param array<string,mixed> $extraData   Extra data to pass to copy function and updated during copy.
     *                                         Used for storages that need to maintain persistent data during copy intra-session.
     *
     * @return false|int The number of bytes that were written to the file, or false on failure.
     */
    public function copyFromStorage($storageFile, $destFile, $offset = 0, $length = -1, $timeout = 0, &$extraData = [])
    {
        $client             = $this->drive->getClient();
        $originalHttpClient = $client->getHttpClient();
        if ($timeout > 0) {
            $baseUri = $originalHttpClient->getConfig('base_uri');
            $client->setHttpClient(new \VendorDuplicator\GuzzleHttp\Client([
                'base_uri'    => $baseUri,
                'http_errors' => \false,
                'timeout'     => $timeout / 1000000, // convert microseconds to seconds
            ]));
        }

        if ($offset == 0 && $length < 0) {
            // If we are copying the entire file, we can use the export link
            $contents = $this->getFileContent($storageFile);
            if ($contents === false) {
                $client->setHttpClient($originalHttpClient);
                return false;
            }
            // This may return 0 if the file is empty, so we specifically check for false
            return file_put_contents($destFile, $contents);
        }

        if (! isset($extraData['fileId'])) {
            // this is the first chunk, we need to get the file id & make sure the destination is writable & empty.
            if (file_put_contents($destFile, '') === false) {
                \DUP_PRO_Log::trace('[GDriveAdapter] Unable to write to destination file: ' . $destFile);
                $client->setHttpClient($originalHttpClient);
                return false;
            }
            if (! $this->exists($storageFile)) {
                $client->setHttpClient($originalHttpClient);
                return false;
            }
            $extraData['fileId'] = $this->getPathInfo($storageFile)->id;
        }
        $fileId = $extraData['fileId'];

        try {
            $client->setDefer(true);
            /** @var RequestInterface $request */
            $request = $this->drive->files->get($fileId, [
                'alt'              => 'media',
                'acknowledgeAbuse' => true,
            ]);
            $client->setDefer(false);

            $request = $request->withHeader('Range', 'bytes=' . $offset . '-' . ($length > 0 ? ($offset + $length - 1) : ''));

            $response = $client->execute($request, null);
            $contents = $response->getBody()->getContents();

            $client->setHttpClient($originalHttpClient);
            if (file_put_contents($destFile, $contents, FILE_APPEND) !== false) {
                return $length;
            }
            return false;
        } catch (\Exception $e) {
            $client->setHttpClient($originalHttpClient);
            \DUP_PRO_Log::trace('[GDriveAdapter] Unable to get file content: ' . $e->getMessage());
            return false;
        }
    }
}
