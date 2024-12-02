<?php

if (!defined('ABSPATH')) exit;

/**
 * License manager module
 */
function ishf_updater_utility() {
    $prefix = 'ISHF_';
    $settings = [
        'prefix' => $prefix,
        'get_base' => ISHF_PLUGIN_BASENAME,
        'get_slug' => ISHF_PLUGIN_DIR,
        'get_version' => ISHF_BUILD,
        'get_api' => 'https://download.geekcodelab.com/',
        'license_update_class' => $prefix . 'Update_Checker'
    ];

    return $settings;
}

function ishf_updater_activate() {

    // Refresh transients
    delete_site_transient('update_plugins');
    delete_transient('ishf_plugin_updates');
    delete_transient('ishf_plugin_auto_updates');
}

require_once(ISHF_PLUGIN_DIR_PATH . 'updater/class-update-checker.php');
