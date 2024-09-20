<?php

/**
 *
 * @package   Duplicator
 * @copyright (c) 2022, Snap Creek LLC
 */

namespace Duplicator\Addons\AmazonS3Addon\Models;

use Exception;
use Duplicator\Libs\Snap\SnapIO;
use VendorDuplicator\Aws\S3\S3Client;
use VendorDuplicator\GuzzleHttp\Client;
use Duplicator\Models\Storages\StoragePathInfo;
use Duplicator\Models\Storages\AbstractStorageAdapter;
use VendorDuplicator\Aws\Handler\GuzzleV6\GuzzleHandler;

/**
 * Description of cls-ftp-chunker
 */
class S3StorageAdapter extends AbstractStorageAdapter
{
    /** @var int */
    const DEFAULT_CHUNK_SIZE = 5 * MB_IN_BYTES;
    /** @var string */
    private $accessKey = '';
    /** @var string */
    private $secretKey = '';
    /** @var string */
    private $region = '';
    /** @var string */
    private $bucket = '';
    /** @var string */
    private $root = '';
    /** @var string */
    private $endpoint = '';
    /** @var string */
    private $storageClass = '';
    /** @var bool */
    private $ipv4 = false;
    /** @var bool */
    private $ssl = true;
    /** @var bool */
    private $sslServerCert = false;
    /** @var bool */
    private $aclFullControl = false;
    /** @var S3Client */
    private $client = null;
    /** @var resource */
    private $sourceFileHandle = null;
    /** @var string */
    private $lastSourceFilePath = '';
    /** @var resource */
    private $destFileHandle = null;
    /** @var string */
    private $lastDestFilePath = '';


    /**
     * Class constructor
     *
     * @param string $accessKey      The access accessKey
     * @param string $secretKey      The secret secretKey
     * @param string $region         The region
     * @param string $bucket         The bucket name
     * @param string $root           The root path
     * @param string $endpoint       The endpoint
     * @param string $storageClass   The storage class
     * @param bool   $ipv4           If true, force IPv4
     * @param bool   $ssl            If true, use SSL
     * @param bool   $sslServerCert  If true, use server cert
     * @param bool   $aclFullControl If true, set ACL to bucket-owner-full-control
     *
     * @return void
     */
    public function __construct(
        $accessKey,
        $secretKey,
        $region,
        $bucket,
        $root = '',
        $endpoint = '',
        $storageClass = 'STANDARD',
        $ipv4 = false,
        $ssl = true,
        $sslServerCert = false,
        $aclFullControl = false
    ) {
        $this->accessKey      = $accessKey;
        $this->secretKey      = $secretKey;
        $this->region         = $region;
        $this->bucket         = $bucket;
        $this->root           = SnapIO::trailingslashit($root);
        $this->endpoint       = $endpoint;
        $this->storageClass   = $storageClass;
        $this->ipv4           = $ipv4;
        $this->ssl            = $ssl;
        $this->sslServerCert  = $sslServerCert;
        $this->aclFullControl = $aclFullControl;

        $this->initClient();
    }

    /**
     * Destructor
     *
     * @return void
     */
    public function __destruct()
    {
        if (is_resource($this->destFileHandle)) {
            fclose($this->destFileHandle);
        }
    }

    /**
     * Initialize the client on creation.
     *
     * @param string $errorMsg The error message if client is invalid.
     *
     * @return void
     */
    public function initClient(&$errorMsg = '')
    {
        if ($this->isConnectionInfoValid($errorMsg) === false) {
            return;
        }

        $ssl = true;
        if ($this->ssl && !$this->sslServerCert) {
            $ssl = DUPLICATOR_PRO_CERT_PATH;
        }

        $args = [
            'use_aws_shared_config_files'      => false,
            'suppress_php_deprecation_warning' => true,
            'version'                          => '2006-03-01',
            'region'                           => $this->region,
            'signature_version'                => 'v4',
            'credentials'                      => [
                'key'    => $this->accessKey,
                'secret' => $this->secretKey,
            ],
            'http'                             => ['verify' => $ssl],
        ];

        if (strlen($this->endpoint) > 0) {
            if (strpos($this->endpoint, 'http') !== 0) {
                $this->endpoint = 'https://' . $this->endpoint;
            }
            $args['endpoint'] = $this->endpoint;
        }

        if ($this->ipv4) {
            $args['http_handler'] = new GuzzleHandler(
                new Client([
                    'curl' => [CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4],
                ])
            );
        }

        $this->client = new S3Client($args);

        //This is needed to make sure the isValid tests run correctly
        $this->createDir('/');
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
        if (!$this->isConnectionInfoValid()) {
            $errorMsg = 'Invalid connection info';
            return false;
        }

        if (!$this->isDir('/') && !$this->createDir('/')) {
            $errorMsg = 'Unable to create root directory';
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
        return $this->isConnectionInfoValid($errorMsg) !== false && $this->isDir('/') !== false;
    }

    /**
     * Return true if the connection info is valid.
     *
     * @param string $errorMsg The error message if connection info is invalid.
     *
     * @return bool
     */
    private function isConnectionInfoValid(&$errorMsg = '')
    {
        if (strlen($this->accessKey) === 0) {
            $errorMsg = __('Access key is empty', 'duplicator-pro');
            return false;
        }

        if (strlen($this->secretKey) === 0) {
            $errorMsg = __('Secret key is empty', 'duplicator-pro');
            return false;
        }

        if (strlen($this->region) === 0) {
            $errorMsg = __('Region is empty', 'duplicator-pro');
            return false;
        }

        if (strlen($this->bucket) === 0) {
            $errorMsg = __('Bucket is empty', 'duplicator-pro');
            return false;
        }

        if (strlen($this->root) === 0) {
            $errorMsg = __('Root path is empty', 'duplicator-pro');
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
        if ($this->isFile($path)) {
            return false;
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
        try {
            if ($this->isFile($path)) {
                $this->delete($path);
            }

            $args = [
                'Bucket'       => $this->bucket,
                'Key'          => $this->getFullPath($path),
                'Body'         => $content,
                'StorageClass' => $this->storageClass,
            ];

            if ($this->aclFullControl) {
                $args['ACL'] = 'bucket-owner-full-control';
            }

            $this->getClient()->putObject($args)->toArray();

            return strlen($content);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Delete reletative path from storage root.
     *
     * @param string $path      The path to delete. (Accepts directories and files)
     * @param bool   $recursive Allows the deletion of nested directories specified in the pathname. Default to false.
     *
     * @return bool true on success or false on failure.
     */
    protected function realDelete($path, $recursive = false)
    {
        if ($this->isFile($path)) {
            return $this->deleteFile($path);
        }

        if ($this->isDirEmpty($path)) {
            return true;
        } elseif (!$recursive) {
            return false;
        }

        $children = $this->getAllChildFiles($path);
        foreach (array_chunk($children, 1000) as $chunk) {
            try {
                $this->getClient()->deleteObjects(
                    [
                        'Bucket' => $this->bucket,
                        'Delete' => [
                            'Objects' => array_map(
                                function ($item) {
                                    return ['Key' => $item];
                                },
                                $chunk
                            ),
                        ],
                    ]
                );
            } catch (Exception $e) {
                return false;
            }
        }

        return true;
    }

    /**
     * Deletes file at path.
     *
     * @param string $path The path to the file to delete.
     *
     * @return bool true on success or false on failure.
     */
    private function deleteFile($path)
    {
        if (($path = $this->getFullPath($path)) === false) {
            return false;
        }

        try {
            $this->getClient()->deleteObject(
                [
                    'Bucket' => $this->bucket,
                    'Key'    => $path,
                ]
            );

            return true;
        } catch (Exception $e) {
            return false;
        }
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
        try {
            $result = $this->getClient()->getObject(
                [
                    'Bucket' => $this->bucket,
                    'Key'    => $this->getFullPath($path),
                ]
            );

            return $result->get('Body');
        } catch (Exception $e) {
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
        try {
            $this->getClient()->copyObject(
                [
                    'Bucket'     => $this->bucket,
                    'Key'        => $this->getFullPath($newPath),
                    'CopySource' => $this->bucket . '/' . $this->getFullPath($oldPath),
                ]
            );

            return $this->delete($oldPath);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Get path info.
     *
     * @param string $path Relative storage path, if empty, return root path info.
     *
     * @return StoragePathInfo|false The path info or false if path is invalid.
     */
    protected function getRealPathInfo($path)
    {
        $info       = new StoragePathInfo();
        $info->path = $path;

        if (($fileInfo = $this->getFileInfo($path)) !== false) {
            $info->exists   = true;
            $info->isDir    = false;
            $info->size     = $fileInfo['ContentLength'];
            $info->modified = $fileInfo['LastModified']->getTimestamp();
            $info->created  = $info->modified;
        }

        if ($this->remoteDirExists($path)) {
            $info->exists = true;
            $info->isDir  = true;
        }

        return $info;
    }

    /**
     * Get path info.
     *
     * @param string $path Relative storage path, if empty, return root path info.
     *
     * @return array<string, mixed>|false The path info or false if path is invalid.
     */
    private function getFileInfo($path)
    {
        try {
            $result = $this->getClient()->headObject(
                [
                    'Bucket' => $this->bucket,
                    'Key'    => $this->getFullPath($path),
                ]
            );

            return $result->toArray();
        } catch (Exception $e) {
            return false;
        }
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
        $path     = SnapIO::untrailingslashit(ltrim($path, '/\\'));
        $dirPath  = SnapIO::trailingslashit($this->getFullPath($path, true));
        $contents = $this->getDirContents($path);

        //add cached dirs to contents
        if ($folders) {
            $contents = array_unique(
                array_merge(
                    $contents,
                    array_map(
                        function ($item) {
                            return SnapIO::trailingslashit($this->getFullPath($item));
                        },
                        $this->getCachedChilds($path, true, false, false)
                    )
                )
            );
        }

        $result = [];
        foreach ($contents as $key => $item) {
            $basename = basename($item);
            if ($files && substr($item, -1) !== '/') {
                $result[] = $basename;
            }

            if ($folders && substr($item, -1) === '/') {
                $result[] = $basename;
            }
        }

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
        $contents      = $this->scanDir($path);
        $regexFilters  = [];
        $normalFilters = [];
        foreach ($filters as $filter) {
            if (preg_match('/^\/.*\/$/', $filter) === 1) {
                $regexFilters[] = $filter;
            } else {
                $normalFilters[] = $filter;
            }
        }

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
     * Returns true if the specified path is empty.
     *
     * @param string $path The path to check.
     *
     * @return bool
     */
    private function remoteDirExists($path)
    {
        try {
            $result = $this->getClient()->listObjects(
                [
                    'Bucket'    => $this->bucket,
                    'Prefix'    => SnapIO::trailingslashit($this->getFullPath($path, true)),
                    'Delimiter' => '/',
                    'MaxKeys'   => 1,
                ]
            )->toArray();
        } catch (Exception $e) {
            return false;
        }

        return (isset($result['Contents']) && count($result['Contents']) > 0) ||
            (isset($result['CommonPrefixes']) && count($result['CommonPrefixes']) > 0);
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
        $startTime = microtime(true);

        if (!is_file($sourceFile)) {
            return false;
        }

        if (($fullPath = $this->getFullPath($storageFile)) == false) {
            return false;
        }

        if ($offset === 0) {
            if ($this->isFile($storageFile) && $this->delete($storageFile) === false) {
                return false;
            }

            if ($timeout === 0 && $length < 0 || filesize($sourceFile) <= $length) {
                if (($content = file_get_contents($sourceFile)) === false) {
                    return false;
                }

                return $this->createFile($storageFile, $content);
            }

            if (($extraData['UploadId'] = $this->getUplaodId($storageFile)) === false) {
                return false;
            }
        } elseif (!isset($extraData['UploadId']) || $extraData['UploadId'] === false) {
            //the upload ID must exist if it's not the first chunk
            return false;
        }

        $partNumber = isset($extraData['Parts']) ? count($extraData['Parts']) + 1 : 1;
        if (($sourceFileHandle = $this->getSourceFileHandle($sourceFile)) === false) {
            return false;
        }

        $bytesWritten = 0;
        $length       = $length > 0 ? $length : self::DEFAULT_CHUNK_SIZE;
        do {
            if (
                @fseek($sourceFileHandle, $offset) === -1 ||
                ($content = @fread($sourceFileHandle, $length)) === false
            ) {
                return false;
            }

            try {
                $result = $this->getClient()->uploadPart(
                    [
                        'Bucket'     => $this->bucket,
                        'Key'        => $fullPath,
                        'UploadId'   => $extraData['UploadId'],
                        'PartNumber' => $partNumber,
                        'Body'       => $content,
                    ]
                )->toArray();
            } catch (Exception $e) {
                return false;
            }

            if (!isset($result['ETag'])) {
                return false;
            }

            $extraData['Parts'][] = [
                'ETag'       => $result['ETag'],
                'PartNumber' => $partNumber,
            ];

            if ($timeout === 0) {
                $bytesWritten = $length;
                break;
            }

            $bytesWritten += strlen($content);
            $offset       += $length;
            $partNumber++;
        } while ($timeout !== 0 && self::getElapsedTime($startTime) < $timeout && !feof($sourceFileHandle));

        //finished upload
        if (feof($sourceFileHandle)) {
            try {
                $this->getClient()->completeMultipartUpload(
                    [
                        'Bucket'          => $this->bucket,
                        'Key'             => $fullPath,
                        'UploadId'        => $extraData['UploadId'],
                        'MultipartUpload' => [
                            'Parts' => $extraData['Parts'],
                        ],
                    ]
                );
            } catch (Exception $e) {
                return false;
            }
        }

        return $bytesWritten;
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
        $startTime = microtime(true);

        if (($fullPath = $this->getFullPath($storageFile)) === false) {
            return false;
        }

        if (wp_mkdir_p(dirname($destFile)) == false) {
            return false;
        }

        if (@is_file($destFile) && $offset === 0 && !@unlink($destFile)) {
            return false;
        }

        if (!$this->isFile($storageFile)) {
            return false;
        }

        if ($timeout === 0 && $offset === 0 && $length < 0) {
            if (($content = $this->getFileContent($storageFile)) === false) {
                return false;
            }

            return @file_put_contents($destFile, $content);
        }


        if (($handle = $this->getDestFileHandle($destFile)) === false) {
            return false;
        }

        $fileInfo     = $this->getPathInfo($storageFile);
        $bytesWritten = 0;
        $length       = $length > 0 ? $length : self::DEFAULT_CHUNK_SIZE;
        do {
            try {
                $result = $this->getClient()->getObject(
                    [
                        'Bucket' => $this->bucket,
                        'Key'    => $fullPath,
                        'Range'  => 'bytes=' . $offset . '-' . ($length > 0 ? ($offset + $length - 1) : ''),
                    ]
                );
            } catch (Exception $e) {
                return false;
            }

            if (($content = $result->get('Body')) === false) {
                return false;
            }

            if (
                @ftruncate($handle, $offset) === false ||
                @fseek($handle, $offset) === -1 ||
                @fwrite($handle, $content) === false
            ) {
                return false;
            }

            if ($timeout === 0) {
                return $length;
            }

            $bytesWritten += strlen($content);
            $offset       += $length;
        } while ($timeout !== 0 && self::getElapsedTime($startTime) < $timeout && $offset < $fileInfo->size);

        return $bytesWritten;
    }

    /**
     * Get the keys of all files and folders in the specified path.
     *
     * @param string $path The path to scan.
     *
     * @return string[] The keys of all files and folders in the specified path.
     */
    private function getDirContents($path)
    {
        $keys     = [];
        $fullPath = SnapIO::trailingslashit($this->getFullPath($path, true));
        do {
            try {
                $result = $this->getClient()->listObjects(
                    [
                        'Bucket'    => $this->bucket,
                        'Prefix'    => $fullPath,
                        'Delimiter' => '/',
                    ]
                )->toArray();
            } catch (Exception $e) {
                return [];
            }

            if (isset($result['Contents'])) {
                $keys = array_merge(
                    $keys,
                    array_map(
                        function ($item) {
                            return $item['Key'];
                        },
                        $result['Contents']
                    )
                );
            }

            if (isset($result['CommonPrefixes'])) {
                $keys = array_merge(
                    $keys,
                    array_map(
                        function ($item) {
                            return $item['Prefix'];
                        },
                        $result['CommonPrefixes']
                    )
                );
            }
        } while ($result['IsTruncated']);

        return $keys;
    }

    /**
     * Returns the keys of child files of all levels of the specified path.
     *
     * @param string $path The path to scan.
     *
     * @return string[] The keys of child files of all levels of the specified path.
     */
    private function getAllChildFiles($path)
    {
        $keys     = [];
        $fullPath = SnapIO::trailingslashit($this->getFullPath($path, true));
        do {
            try {
                $result = $this->getClient()->listObjects(
                    [
                        'Bucket' => $this->bucket,
                        'Prefix' => $fullPath,
                    ]
                )->toArray();
            } catch (Exception $e) {
                return [];
            }

            if (!isset($result['Contents'])) {
                break;
            }

            $keys = array_merge(
                $keys,
                array_map(
                    function ($item) {
                        return $item['Key'];
                    },
                    $result['Contents']
                )
            );
        } while ($result['IsTruncated']);

        return $keys;
    }

    /**
     * Get the client.
     *
     * @return S3Client
     */
    private function getClient()
    {
        return $this->client;
    }

    /**
     * Gets the upload ID for a multipart upload. From cache if exists.
     *
     * @param string $storageFile Storage destination path
     *
     * @return string|false The upload ID or false on failure.
     */
    private function getUplaodId($storageFile)
    {
        try {
            $result = $this->getClient()->createMultipartUpload(
                [
                    'Bucket'       => $this->bucket,
                    'Key'          => $this->getFullPath($storageFile),
                    'StorageClass' => $this->storageClass,
                ]
            )->toArray();
        } catch (Exception $e) {
            return false;
        }

        if (!isset($result['UploadId'])) {
            return false;
        }

        return $result['UploadId'];
    }

    /**
     * Abort all multipart uploads older than age.
     *
     * @param int $age The age in days. Default to 2.
     *
     * @return bool true on success or false on failure.
     */
    public function abortMultipartUploads($age = 2)
    {
        try {
            $result = $this->getClient()->listMultipartUploads(
                [
                    'Bucket'    => $this->bucket,
                    'Prefix'    => $this->root,
                    'Delimiter' => '/',
                ]
            )->toArray();

            if (!isset($result['Uploads'])) {
                return true;
            }

            foreach ($result['Uploads'] as $upload) {
                if (($upload['Initiated']->getTimestamp() + $age * 24 * 3600) > time()) {
                    continue;
                }

                $this->getClient()->abortMultipartUpload(
                    [
                        'Bucket'   => $this->bucket,
                        'Key'      => $upload['Key'],
                        'UploadId' => $upload['UploadId'],
                    ]
                );
            }

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Return the full path of storage from relative path.
     *
     * @param string $path        The relative storage path
     * @param bool   $acceptEmpty If true, return root path if path is empty. Default to false.
     *
     * @return string|false The full path or false if path is invalid.
     */
    protected function getFullPath($path, $acceptEmpty = false)
    {
        $path = SnapIO::untrailingslashit(ltrim((string) $path, '/\\'));
        if (strlen($path) === 0) {
            return $acceptEmpty ? SnapIO::untrailingslashit($this->root) : false;
        }
        return $this->root . $path;
    }

    /**
     * Returns the dest file handle
     *
     * @param string $destFilePath The source file path
     *
     * @return resource|false returns the dest file handle or false on failure.
     */
    private function getDestFileHandle($destFilePath)
    {
        if ($this->lastDestFilePath === $destFilePath) {
            return $this->destFileHandle;
        }

        if (is_resource($this->destFileHandle)) {
            fclose($this->destFileHandle);
        }

        if (($this->destFileHandle = @fopen($destFilePath, 'cb')) === false) {
            return false;
        }

        $this->lastDestFilePath = $destFilePath;
        return $this->destFileHandle;
    }

    /**
     * Returns the source file handle
     *
     * @param string $sourceFilePath The source file path
     *
     * @return resource
     */
    private function getSourceFileHandle($sourceFilePath)
    {
        if ($this->lastSourceFilePath === $sourceFilePath) {
            return $this->sourceFileHandle;
        }

        if (is_resource($this->sourceFileHandle)) {
            fclose($this->sourceFileHandle);
        }

        if (($this->sourceFileHandle = SnapIO::fopen($sourceFilePath, 'r')) === false) {
            throw new Exception('Can\'t open ' . $sourceFilePath . ' file');
        }

        $this->lastSourceFilePath = $sourceFilePath;
        return $this->sourceFileHandle;
    }

    /**
     * Get the elapsed time in microseconds
     *
     * @param float $startTime The start time
     *
     * @return float The elapsed time in microseconds
     */
    private static function getElapsedTime($startTime)
    {
        return (microtime(true) - $startTime) * SECONDS_IN_MICROSECONDS;
    }
}
