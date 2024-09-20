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

?>
<br>
<b><?php esc_html_e('Please Retry:', 'duplicator-pro'); ?></b><br>
<?php esc_html_e('Unable to perform a full scan and read JSON file, please try the following actions.', 'duplicator-pro'); ?><br>
<?php esc_html_e('1. Go back and create a root path directory filter to validate the site is scan-able.', 'duplicator-pro'); ?><br>
<?php esc_html_e('2. Continue to add/remove filters to isolate which path is causing issues.', 'duplicator-pro'); ?><br>
<?php esc_html_e('3. This message will go away once the correct filters are applied.', 'duplicator-pro'); ?><br>
<br>
<b><?php esc_html_e('Common Issues:', 'duplicator-pro'); ?></b><br>
<?php
esc_html_e(
    '- On some budget hosts scanning over 30k files can lead to timeout/gateway issues. 
    Consider scanning only your main WordPress site and avoid trying to backup other external directories.',
    'duplicator-pro'
);
?><br>
<?php
esc_html_e(
    '- Symbolic link recursion can cause timeouts.  Ask your server admin if any are present in the scan path. 
    If they are add the full path as a filter and try running the scan again.',
    'duplicator-pro'
); ?><br>
<br>
<b><?php esc_html_e('Details:', 'duplicator-pro'); ?></b><br>
<?php esc_html_e('JSON Service:', 'duplicator-pro'); ?> /wp-admin/admin-ajax.php?action=duplicator_pro_package_scan<br>
<?php esc_html_e('Scan Path:', 'duplicator-pro'); ?> [<?php echo duplicator_pro_get_home_path(); ?>]<br><br>

<b><?php esc_html_e('More Information:', 'duplicator-pro'); ?></b><br>
<?php
printf(
    __(
        'Please see the online FAQ titled %1$s"How to resolve scanner warnings/errors and timeout issues?"%2$s',
        'duplicator-pro'
    ),
    '<a href="' . DUPLICATOR_PRO_DUPLICATOR_DOCS_URL . 'how-to-resolve-scanner-warnings-errors-and-timeout-issues" target="_blank">',
    '</a>'
);