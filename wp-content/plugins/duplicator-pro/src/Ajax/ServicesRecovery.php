<?php

/**
 * @package   Duplicator
 * @copyright (c) 2022, Snap Creek LLC
 */

namespace Duplicator\Ajax;

use DUP_PRO_Archive;
use DUP_PRO_Log;
use DUP_PRO_Package;
use DUP_PRO_Package_File_Type;
use Duplicator\Ajax\AbstractAjaxService;
use Duplicator\Ajax\AjaxWrapper;
use Duplicator\Controllers\RecoveryController;
use Duplicator\Controllers\SettingsPageController;
use Duplicator\Core\Controllers\ControllersManager;
use Duplicator\Controllers\ToolsPageController;
use Duplicator\Core\CapMng;
use Duplicator\Core\Views\TplMng;
use Duplicator\Libs\Snap\SnapJson;
use Duplicator\Libs\Snap\SnapUtil;
use Duplicator\Package\Recovery\BackupPackage;
use Duplicator\Package\Recovery\RecoveryPackage;
use Exception;

class ServicesRecovery extends AbstractAjaxService
{
    /**
     * Init ajax calls
     *
     * @return void
     */
    public function init()
    {
        $this->addAjaxCall('wp_ajax_duplicator_pro_get_recovery_widget', 'getWidget');
        $this->addAjaxCall('wp_ajax_duplicator_pro_set_recovery', 'setRecovery');
        $this->addAjaxCall('wp_ajax_duplicator_pro_reset_recovery', 'resetRecovery');
        $this->addAjaxCall('wp_ajax_duplicator_pro_backup_redirect', 'restoreBackupRedirect');
        $this->addAjaxCall('wp_ajax_duplicator_pro_disaster_launcher_download', 'launcherDownload');
        $this->addAjaxCall('wp_ajax_duplicator_pro_get_recovery_box_content', 'recoveryBoxContent');
        $this->addAjaxCall('wp_ajax_duplicator_pro_restore_backup_prepare', 'restoreBackupPrepare');
    }

    /**
     * Get recovery widget detail elements
     *
     * @param string $fromPageTab from page/tab unique id
     *
     * @return bool[]
     */
    protected static function getRecoveryDetailsOptions($fromPageTab)
    {
        if ($fromPageTab == ControllersManager::getPageUniqueId(ControllersManager::TOOLS_SUBMENU_SLUG, ToolsPageController::L2_SLUG_RECOVERY)) {
            $detailsOptions = array(
                'selector'   => true,
                'copyLink'   => true,
                'copyButton' => true,
                'launch'     => true,
                'download'   => true,
                'info'       => true,
            );
        } elseif ($fromPageTab == ControllersManager::getPageUniqueId(ControllersManager::IMPORT_SUBMENU_SLUG)) {
            $detailsOptions = array(
                'selector'   => true,
                'launch'     => false,
                'download'   => true,
                'copyLink'   => true,
                'copyButton' => true,
                'info'       => true,
            );
        } else {
            $detailsOptions = array();
        }

        return $detailsOptions;
    }

    /**
     * Set recovery callback
     *
     * @return array<string, mixed>
     */
    public static function setRecoveryCallback()
    {
        $recPackageId = SnapUtil::sanitizeIntInput(SnapUtil::INPUT_REQUEST, 'recovery_package', -1);
        DUP_PRO_Log::trace("SET RECOVERY PACKAGE ID {$recPackageId}");
        if ($recPackageId !== RecoveryPackage::getRecoverPackageId()) {
            DUP_PRO_Log::trace("RESET OLD RECORY PACKAGE ID " . RecoveryPackage::getRecoverPackageId());
            RecoveryPackage::removeRecoveryFolder();

            $errorMessage = '';
            if (!RecoveryPackage::setRecoveablePackage($recPackageId, $errorMessage)) {
                $urlImport = ControllersManager::getMenuLink(ControllersManager::SETTINGS_SUBMENU_SLUG, SettingsPageController::L2_SLUG_IMPORT);

                $msg  = sprintf(__("Error: <b>%s</b>", 'duplicator-pro'), $errorMessage) . '<br><br>';
                $msg .= __("The old Recovery Point was removed but this package can’t be set as the Recovery Point.", 'duplicator-pro') . '<br>';
                $msg .= __("Possible solutions:", 'duplicator-pro') . '<br>';
                $msg .= sprintf(
                    _x(
                        '- In some hosting the execution of PHP scripts are blocked in the wp-content folder, %1$s[try set a custom recovery path]%2$s',
                        '%1$s and %2$s represents the opening and closing HTML tags for an anchor or link',
                        'duplicator-pro'
                    ),
                    '<a href="' . esc_url($urlImport) . '" target="_blank">',
                    '</a>'
                ) . '<br>';
                $msg .= __(
                    "- you may still be able to to download the package manually and perform an import or a classic backup installation.
                    If you wish to install the package on the site where it was create the restore backup mode should be activated.",
                    'duplicator-pro'
                );
                throw new Exception($msg);
            }
            DUP_PRO_Log::trace("RECOVER PACKAGE SET");
        }

        $recoverPackage = RecoveryPackage::getRecoverPackage();
        DUP_PRO_Log::trace("RECOVER PACKAGE READED");
        if (!$recoverPackage instanceof RecoveryPackage) {
            throw new Exception(esc_html__('Can\'t get recover package', 'duplicator-pro'));
        }
        $fromPageTab    = SnapUtil::sanitizeDefaultInput(INPUT_POST, 'fromPageTab', false);
        $detailsOptions = self::getRecoveryDetailsOptions($fromPageTab);
        DUP_PRO_Log::trace("RECOVER PACKAGE DETAILS OPTIONS READED");

        $subtitle = __('Copy the Link and keep it in case of need or download Disaster Recovery Launcher.', 'duplicator-pro');

        $result = array(
            'id'             => $recoverPackage->getPackageId(),
            'name'           => $recoverPackage->getPackageName(),
            'recoveryLink'   => $recoverPackage->getInstallLink(),
            'adminMessage'   => RecoveryController::renderRecoveryWidged(array(
                'selector'   => false,
                'subtitle'   => $subtitle,
                'copyLink'   => false,
                'copyButton' => true,
                'launch'     => false,
                'download'   => true,
                'info'       => true,
            ), false),
            'packageDetails' => RecoveryController::renderRecoveryWidged($detailsOptions, false),
        );
        return $result;
    }

    /**
     * Set recovery action
     *
     * @return void
     */
    public function setRecovery()
    {
        AjaxWrapper::json(
            array(
                __CLASS__,
                'setRecoveryCallback',
            ),
            'duplicator_pro_set_recovery',
            SnapUtil::sanitizeTextInput(INPUT_POST, 'nonce', ''),
            CapMng::CAP_BACKUP_RESTORE
        );
    }

    /**
     * Get widget callback
     *
     * @return string[]
     */
    public static function getWidgetCallback()
    {
        $fromPageTab    = SnapUtil::sanitizeDefaultInput(INPUT_POST, 'fromPageTab', false);
        $detailsOptions = self::getRecoveryDetailsOptions($fromPageTab);

        return array(
            'widget' => RecoveryController::renderRecoveryWidged($detailsOptions, false),
        );
    }

    /**
     * Get widget action
     *
     * @return void
     */
    public function getWidget()
    {
        AjaxWrapper::json(
            array(
                __CLASS__,
                'getWidgetCallback',
            ),
            'duplicator_pro_get_recovery_widget',
            SnapUtil::sanitizeTextInput(INPUT_POST, 'nonce', ''),
            CapMng::CAP_BACKUP_RESTORE
        );
    }

    /**
     * Reset recovery callback
     *
     * @return string[]
     */
    public static function resetRecoveryCallback()
    {
        if (RecoveryController::actionResetRecoveryPoint() === false) {
            throw new Exception(RecoveryController::getErrorMessage());
        }

        $fromPageTab    = SnapUtil::sanitizeDefaultInput(INPUT_POST, 'fromPageTab', false);
        $detailsOptions = self::getRecoveryDetailsOptions($fromPageTab);

        $result = array(
            'adminMessage'   => RecoveryController::renderRecoveryWidged(array(), false),
            'packageDetails' => RecoveryController::renderRecoveryWidged($detailsOptions, false),
        );

        return $result;
    }

    /**
     * Reset recovery action
     *
     * @return void
     */
    public function resetRecovery()
    {
        AjaxWrapper::json(
            array(
                __CLASS__,
                'resetRecoveryCallback',
            ),
            'duplicator_pro_reset_recovery',
            SnapUtil::sanitizeTextInput(INPUT_POST, 'nonce', ''),
            CapMng::CAP_BACKUP_RESTORE
        );
    }

    /**
     * Prepare restore backup and redirect to the installer URL
     *
     * @return array<string,scalar>
     */
    public static function restoreBackupRedirectCallback()
    {
        $result = array(
            'success'      => false,
            'message'      => '',
            'redirect_url' => '',
        );

        try {
            $packageId = SnapUtil::sanitizeIntInput(SnapUtil::INPUT_REQUEST, 'packageId', 0);

            if (($package = DUP_PRO_Package::get_by_id($packageId)) === false) {
                throw new Exception(__('Backup is invalid', 'duplicator-pro'));
            }

            if (!$package->haveLocalStorage()) {
                throw new Exception(__('Backup isn\'t local', 'duplicator-pro'));
            }

            $arachivePath = $package->getLocalPackageFilePath(DUP_PRO_Package_File_Type::Archive);
            if (!file_exists($arachivePath)) {
                throw new Exception(__('Backup archive file doesn\'t exist', 'duplicator-pro'));
            }

            $restore = new BackupPackage($arachivePath, $package);

            $result['redirect_url'] = $restore->prepareToInstall();
            $result['success']      = true;
        } catch (Exception $ex) {
            $result['success'] = false;
            $result['message'] = $ex->getMessage();
            DUP_PRO_Log::traceError($ex->getMessage());
        }

        return $result;
    }

    /**
     * Reset recovery action
     *
     * @return void
     */
    public function restoreBackupRedirect()
    {
        AjaxWrapper::json(
            array(
                __CLASS__,
                'restoreBackupRedirectCallback',
            ),
            'duplicator_pro_backup_redirect',
            SnapUtil::sanitizeTextInput(SnapUtil::INPUT_REQUEST, 'nonce', ''),
            CapMng::CAP_BACKUP_RESTORE
        );
    }


    /**
     * Launcher download callback
     *
     * @return array<string,scalar>
     */
    public static function launcherDownloadCallback()
    {
        $result = array(
            'success'     => false,
            'message'     => '',
            'fileContent' => '',
            'fileName'    => '',
        );

        try {
            if (($recoverPackage = RecoveryPackage::getRecoverPackage()) == false) {
                throw new Exception(__('Can\'t get recover package', 'duplicator-pro'));
            }

            $result['fileContent'] = TplMng::getInstance()->render(
                'parts/recovery/launcher_content',
                array('recoverPackage' => $recoverPackage),
                false
            );

            $result['fileName'] = $recoverPackage->getLauncherFileName();
            $result['success']  = true;
        } catch (Exception $ex) {
            $result['success'] = false;
            $result['message'] = $ex->getMessage();
            DUP_PRO_Log::traceError($ex->getMessage());
        }

        return $result;
    }

    /**
     * Reset recovery action
     *
     * @return void
     */
    public function launcherDownload()
    {
        AjaxWrapper::json(
            array(
                __CLASS__,
                'launcherDownloadCallback',
            ),
            'duplicator_pro_disaster_launcher_download',
            SnapUtil::sanitizeTextInput(SnapUtil::INPUT_REQUEST, 'nonce', ''),
            CapMng::CAP_BACKUP_RESTORE
        );
    }


    /**
     * Prepare restore backup and redirect to the installer URL
     *
     * @return array<string,scalar>
     */
    public static function recoveryBoxContentCallback()
    {
        $result = array(
            'success'      => false,
            'message'      => '',
            'content'      => '',
            'isRecoveable' => false,
        );

        try {
            $packageId = SnapUtil::sanitizeIntInput(SnapUtil::INPUT_REQUEST, 'packageId', 0);

            if (($package = DUP_PRO_Package::get_by_id($packageId)) === false) {
                throw new Exception(__('Backup is invalid', 'duplicator-pro'));
            }

            $result['content']      = TplMng::getInstance()->render(
                'admin_pages/packages/recovery_info/row_recovery_box',
                ['package' => $package],
                false
            );
            $result['isRecoveable'] = RecoveryPackage::isPackageIdRecoveable($package->ID);
            $result['success']      = true;
        } catch (Exception $ex) {
            $result['success'] = false;
            $result['message'] = $ex->getMessage();
            DUP_PRO_Log::traceError($ex->getMessage());
        }

        return $result;
    }

    /**
     * Reset recovery action
     *
     * @return void
     */
    public function recoveryBoxContent()
    {
        AjaxWrapper::json(
            array(
                __CLASS__,
                'recoveryBoxContentCallback',
            ),
            'duplicator_pro_get_recovery_box_content',
            SnapUtil::sanitizeTextInput(SnapUtil::INPUT_REQUEST, 'nonce', ''),
            CapMng::CAP_BACKUP_RESTORE
        );
    }

    /**
     * Restore backup prepare callback
     *
     * @return string
     */
    public function restoreBackupPrepareCallback()
    {
        $packageId = filter_input(INPUT_POST, 'packageId', FILTER_VALIDATE_INT);
        if (!$packageId) {
            throw new Exception('Invalid package ID in request.');
        }
        $result = array();

        if (($package = DUP_PRO_Package::get_by_id($packageId)) === false) {
            throw new Exception(esc_html__('Invalid package ID', 'duplicator-pro'));
        }
        $updDirs = wp_upload_dir();

        $result = DUPLICATOR_PRO_SSDIR_URL . '/' . $package->Installer->getInstallerName() . '?dup_folder=dupinst_' . $package->Hash;

        $installerParams = array(
            'inst_mode'              => array('value' => 2 ), // mode restore backup
            'url_old'                => array('formStatus' => "st_skip"),
            'url_new'                => array(
                'value'      => DUP_PRO_Archive::getOriginalUrls('home'),
                'formStatus' => "st_infoonly",
            ),
            'path_old'               => array('formStatus' => "st_skip"),
            'path_new'               => array(
                'value'      => duplicator_pro_get_home_path(),
                'formStatus' => "st_infoonly",
            ),
            'dbaction'               => array(
                'value'      => 'empty',
                'formStatus' => "st_infoonly",
            ),
            'dbhost'                 => array(
                'value'      => DB_HOST,
                'formStatus' => "st_infoonly",
            ),
            'dbname'                 => array(
                'value'      => DB_NAME,
                'formStatus' => "st_infoonly",
            ),
            'dbuser'                 => array(
                'value'      => DB_USER,
                'formStatus' => "st_infoonly",
            ),
            'dbpass'                 => array(
                'value'      => DB_PASSWORD,
                'formStatus' => "st_infoonly",
            ),
            'dbtest_ok'              => array('value' => true),
            'siteurl_old'            => array('formStatus' => "st_skip"),
            'siteurl'                => array(
                'value'      => 'site_url',
                'formStatus' => "st_skip",
            ),
            'path_cont_old'          => array('formStatus' => "st_skip"),
            'path_cont_new'          => array(
                'value'      => WP_CONTENT_DIR,
                'formStatus' => "st_skip",
            ),
            'path_upl_old'           => array('formStatus' => "st_skip"),
            'path_upl_new'           => array(
                'value'      => $updDirs['basedir'],
                'formStatus' => "st_skip",
            ),
            'url_cont_old'           => array('formStatus' => "st_skip"),
            'url_cont_new'           => array(
                'value'      => content_url(),
                'formStatus' => "st_skip",
            ),
            'url_upl_old'            => array('formStatus' => "st_skip"),
            'url_upl_new'            => array(
                'value'      => $updDirs['baseurl'],
                'formStatus' => "st_skip",
            ),
            'exe_safe_mode'          => array('formStatus' => "st_skip"),
            'remove-redundant'       => array('formStatus' => "st_skip"),
            'blogname'               => array('formStatus' => "st_infoonly"),
            'replace_mode'           => array('formStatus' => "st_skip"),
            'empty_schedule_storage' => array(
                'value'      => false,
                'formStatus' => "st_skip",
            ),
            'wp_config'              => array(
                'value'      => 'original',
                'formStatus' => "st_infoonly",
            ),
            'ht_config'              => array(
                'value'      => 'original',
                'formStatus' => "st_infoonly",
            ),
            'other_config'           => array(
                'value'      => 'original',
                'formStatus' => "st_infoonly",
            ),
            'zip_filetime'           => array(
                'value'      => 'original',
                'formStatus' => "st_infoonly",
            ),
            'mode_chunking'          => array(
                'value'      => 3,
                'formStatus' => "st_infoonly",
            ),
        );
        $localParamsFile = DUPLICATOR_PRO_SSDIR_PATH . '/' . DUPLICATOR_PRO_LOCAL_OVERWRITE_PARAMS . '_' . $package->get_package_hash() . '.json';
        file_put_contents($localParamsFile, SnapJson::jsonEncodePPrint($installerParams));

        return $result;
    }

    /**
     * Hook ajax restore backup prepare
     *
     * @return void
     */
    public function restoreBackupPrepare()
    {
        AjaxWrapper::json(
            array(
                __CLASS__,
                'restoreBackupPrepareCallback',
            ),
            'duplicator_pro_restore_backup_prepare',
            $_POST['nonce'],
            CapMng::CAP_BACKUP_RESTORE
        );
    }
}
