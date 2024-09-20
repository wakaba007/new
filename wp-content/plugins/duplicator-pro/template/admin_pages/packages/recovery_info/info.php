<?php

/**
 * Duplicator package row in table packages list
 *
 * @package   Duplicator
 * @copyright (c) 2022, Snap Creek LLC
 */

use Duplicator\Controllers\RecoveryController;
use Duplicator\Package\Recovery\RecoveryPackage;

defined("ABSPATH") or die("");

/**
 * Variables
 *
 * @var \Duplicator\Core\Controllers\ControllersManager $ctrlMng
 * @var \Duplicator\Core\Views\TplMng  $tplMng
 * @var array<string, mixed> $tplData
 */
?>
<div class="dup-pro-toolbar-recovery-info margin-bottom-1">
    <?php
    if (RecoveryPackage::getRecoverPackageId() === false) {
        $tplMng->render('admin_pages/packages/recovery_info/no_recovery_set');
    } else {
        RecoveryController::renderRecoveryWidged(
            array(
                'selector'   => false,
                'subtitle'   => '',
                'copyLink'   => true,
                'copyButton' => true,
                'launch'     => true,
                'download'   => true,
                'info'       => true,
            )
        );
    }
    ?>
</div>
