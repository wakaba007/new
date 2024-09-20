<?php

/**
 * Duplicator package row in table packages list
 *
 * @package   Duplicator
 * @copyright (c) 2022, Snap Creek LLC
 */

use Duplicator\Package\Create\BuildComponents;

defined("ABSPATH") or die("");

/**
 * Variables
 *
 * @var \Duplicator\Core\Controllers\ControllersManager $ctrlMng
 * @var \Duplicator\Core\Views\TplMng  $tplMng
 * @var array<string, mixed> $tplData
 */
?>
<p>
    <?php esc_html_e('Package components allow you to include/exclude differents part of your WordPress installation in the package.', 'duplicator-pro'); ?>
</p>
<ul>
    <li>
        <b><?php echo esc_html(BuildComponents::getLabel(BuildComponents::COMP_DB)); ?></b>: 
        <?php esc_html_e('Include the database in the package.', 'duplicator-pro'); ?>
    </li>
    <li>
        <b><?php echo esc_html(BuildComponents::getLabel(BuildComponents::COMP_CORE)); ?></b>: 
        <?php esc_html_e('Includes WordPress core files in the package (e.g. wp-include, wp-admin wp-login.php and other.', 'duplicator-pro'); ?>
    </li>
    <li>
        <b><?php echo esc_html(BuildComponents::getLabel(BuildComponents::COMP_PLUGINS)); ?></b>: 
        <?php
            printf(
                esc_html_x(
                    'Include the plugins in the package. With the %1$sactive only%2$s option enabled, only active plugins will be included in the package.',
                    '%1$s and %2$s represent opening and closing bold (<b> and </b>) tags',
                    'duplicator-pro'
                ),
                '<b>',
                '</b>'
            );
            ?>
    </li>
    <li>
        <b><?php echo esc_html(BuildComponents::getLabel(BuildComponents::COMP_THEMES)); ?></b>: 
        <?php
            printf(
                esc_html_x(
                    'Include the themes in the package. With the %1$sactive only%2$s option enabled, only active themes will be included in the package.',
                    '%1$s and %2$s represent opening and closing bold (<b> and </b>) tags',
                    'duplicator-pro'
                ),
                '<b>',
                '</b>'
            );
            ?>
    </li>
    <li>
        <b><?php echo esc_html(BuildComponents::getLabel(BuildComponents::COMP_UPLOADS)); ?></b>: 
        <?php esc_html_e('Include the \'uploads\' folder.', 'duplicator-pro'); ?>
    </li>
    <li>
        <b><?php echo esc_html(BuildComponents::getLabel(BuildComponents::COMP_OTHER)); ?></b>: 
        <?php esc_html_e('Include non-WordPress files and folders in the root directory.', 'duplicator-pro'); ?>
    </li>
</ul>