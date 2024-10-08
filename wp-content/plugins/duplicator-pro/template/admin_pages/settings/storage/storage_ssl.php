<?php

/**
 * @package Duplicator
 */

defined("ABSPATH") or die("");

use Duplicator\Controllers\SettingsPageController;

/**
 * Variables
 *
 * @var Duplicator\Core\Controllers\ControllersManager $ctrlMng
 * @var Duplicator\Core\Views\TplMng $tplMng
 * @var array<string, mixed> $tplData
 */

$global = DUP_PRO_Global_Entity::getInstance();
?>
<form 
    id="dup-settings-form" 
    action="<?php echo $ctrlMng->getCurrentLink(); ?>" 
    method="post" 
    data-parsley-validate
>
    <?php $tplData['actions'][SettingsPageController::ACTION_SAVE_STORAGE_SSL]->getActionNonceFileds(); ?>
 
    <p class="description" style="color:maroon">
        <?php esc_html_e("Do not modify SSL settings unless you know the expected result or have talked to support.", 'duplicator-pro'); ?>
    </p>
    <table class="form-table">
        <tr valign="top">
            <th scope="row"><label><?php esc_html_e("Use server's SSL certificates", 'duplicator-pro'); ?></label></th>
            <td>
                <input 
                    type="checkbox" 
                    name="ssl_useservercerts" 
                    id="ssl_useservercerts" 
                    value="1"
                    <?php checked($global->ssl_useservercerts); ?> 
                >
                <p class="description">
                    <?php
                    esc_html_e(
                        "To use server's SSL certificates please enble it. 
                        By default Duplicator Pro uses By default uses its own store of SSL certificates to verify the identity of remote storage sites.",
                        'duplicator-pro'
                    );
                    ?>
                </p>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label><?php esc_html_e("Disable verification of SSL certificates", 'duplicator-pro'); ?></label></th>
            <td>
                <input 
                    type="checkbox" 
                    name="ssl_disableverify" 
                    id="ssl_disableverify" 
                    value="1"
                    <?php checked($global->ssl_disableverify); ?> 
                >
                <p class="description">
                    <?php
                    esc_html_e("To disable verification of a host and the peer's SSL certificate.", 'duplicator-pro');
                    ?>
                </p>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label><?php esc_html_e("Use IPv4 only", 'duplicator-pro'); ?></label></th>
            <td>
                <input
                    type="checkbox" 
                    name="ipv4_only" 
                    id="ipv4_only" 
                    value="1"
                    <?php checked($global->ipv4_only); ?> 
                >
                <p class="description">
                    <?php
                    esc_html_e(
                        "To use IPv4 only, which can help if your host has a broken IPv6 setup (currently only supported by Google Drive)",
                        'duplicator-pro'
                    );
                    ?>
                </p>
            </td>
        </tr>
    </table>
    <p class="submit dpro-save-submit">
        <input 
            type="submit" 
            name="submit" 
            id="submit" 
            class="button-primary" 
            value="<?php esc_attr_e('Save Storage Settings', 'duplicator-pro') ?>" 
            style="display: inline-block;" 
        >
    </p>
</form>