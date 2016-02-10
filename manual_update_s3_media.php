<?php

/**
 * The files are supposed to be migrated to Amazon S3 already by this moment.
 * This script only updates database metadata for previously uploaded media files.
 * Newly uploaded files are being moved to S3 automatically by this plugin:
 * https://wordpress.org/plugins/amazon-s3-and-cloudfront/
 */

error_reporting(E_ALL);
ini_set('display_errors', true);
require_once('../../../wp/wp-load.php');
require_once('../../../wp/wp-blog-header.php');

if (current_user_can('manage_options')) {
    error_reporting(E_ALL);
    ini_set('display_errors', true);

//    if (!class_exists('Amazon_S3_And_CloudFront')) {
//        die('Amazon_S3_And_CloudFront plugin not found');
//    }

    require_once(__DIR__ . '/inc/datagov-s3-migration.class.php');

    $migrator = new Datagov_S3_Migrator;
    $migrator->migration();

    echo 'done';
} else {
    echo 'Permission denied';
}