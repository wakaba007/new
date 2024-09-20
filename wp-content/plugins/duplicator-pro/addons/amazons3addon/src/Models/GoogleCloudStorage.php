<?php

/**
 *
 * @package   Duplicator
 * @copyright (c) 2022, Snap Creek LLC
 */

namespace Duplicator\Addons\AmazonS3Addon\Models;

class GoogleCloudStorage extends AmazonS3CompatibleStorage
{
    /**
     * Return the storage type
     *
     * @return int
     */
    public static function getSType()
    {
        return 16;
    }

    /**
     * Returns the storage type name.
     *
     * @return string
     */
    public static function getStypeName()
    {
        return __('Google Cloud Storage', 'duplicator-pro');
    }

    /**
     * Get storage location string
     *
     * @return string
     */
    public function getLocationString()
    {
        return 'https://console.cloud.google.com/storage/browser/' . $this->config['bucket'] . $this->config['storage_folder'];
    }

    /**
     * Returns the storage type icon url.
     *
     * @return string The icon url
     */
    protected static function getIconUrl()
    {
        return DUPLICATOR_PRO_IMG_URL . '/google-cloud.svg';
    }

    /**
     * Get ACL description
     *
     * @return string
     */
    protected function getACLDescription()
    {
        return __(
            "Make sure to change the 'Access Control' to 'Fine Grained' for this setting to work.",
            'duplicator-pro'
        );
    }

    /**
     * Get documentation links
     *
     * @return array<int,array<string,string>>
     */
    protected static function getDocumentationLinks()
    {
        return [
            [
                'label' => __('Interoperability with S3 API', 'duplicator-pro'),
                'url'   => 'https://cloud.google.com/storage/docs/interoperability',
            ],
        ];
    }
}
