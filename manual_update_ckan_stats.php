<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
require_once ('../../../wp/wp-load.php');
require_once ('../../../wp/wp-blog-header.php');

if (current_user_can( 'manage_options' ) || 'development' == WP_ENV) {
    error_reporting(E_ALL);
    ini_set('display_errors', true);

    ignore_user_abort(true);

    require_once(__DIR__ . '/inc/ckan-harvest-stats.class.php');

    $ckan = new CKAN_Harvest_Stats;
    $ckan->initDB();
    $ckan->truncateDB();
    $ckan->updateDB();

    echo 'done';
} else {
    echo 'Permission denied';
}
