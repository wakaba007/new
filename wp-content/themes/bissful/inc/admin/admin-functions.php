<?php
function pivoo_plugin_is_active($plugin)
{
    static $active_plugins = null;

    if (null === $active_plugins) {
        $active_plugins = (array)get_option('active_plugins', []);
    }

    return in_array($plugin, $active_plugins); // || is_plugin_active_for_network($plugin);
}
