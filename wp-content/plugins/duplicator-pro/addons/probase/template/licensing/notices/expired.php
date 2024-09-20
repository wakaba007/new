<?php

/**
 * @package Duplicator
 */

defined("ABSPATH") or die("");

/**
 * Variables
 *
 * @var Duplicator\Core\Controllers\ControllersManager $ctrlMng
 * @var Duplicator\Core\Views\TplMng $tplMng
 * @var array<string, mixed> $tplData
 */

$renewal_url = $tplData['renewal_url'];
?>
<span class='dashicons dashicons-warning'></span>
<div class="dup-sub-content">
    <h3>
        <?php esc_html_e('Warning! Your Duplicator Pro license has expired...', 'duplicator-pro');?>
    </h3>
    <?php esc_html_e('You\'re currently missing:', 'duplicator-pro'); ?>
    <ul class="dup-pro-simple-style-disc" >
        <li><?php esc_html_e('Access to Advanced Features', 'duplicator-pro'); ?></li>
        <li><?php $tplMng->render('licensing/notices/drm_schedules_msg'); ?></li>
        <li><?php esc_html_e('Storages Management', 'duplicator-pro'); ?></li>
        <li><?php esc_html_e('Templates Management', 'duplicator-pro'); ?></li>
        <li><?php esc_html_e('New Features', 'duplicator-pro'); ?></li>
        <li><?php esc_html_e('Important Updates for Security Patches', 'duplicator-pro'); ?></li>
        <li><?php esc_html_e('Bug Fixes', 'duplicator-pro'); ?></li>
        <li><?php esc_html_e('Support Requests', 'duplicator-pro'); ?></li>
    </ul>
    <a class="button" target="_blank" href="<?php echo esc_url($renewal_url); ?>">
        <?php esc_html_e('Renew Now!', 'duplicator-pro'); ?>
    </a>
</div>
