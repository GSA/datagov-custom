<?php


error_reporting(E_ALL);
ini_set('display_errors', true);
require_once('../../../wp/wp-load.php');
require_once('../../../wp/wp-blog-header.php');

if (current_user_can('manage_options')) {
    error_reporting(E_ALL);
    ini_set('display_errors', true);

    ignore_user_abort(true);
    set_time_limit(60 * 60);

    global $wpdb;
    require_wp_db();

    $s3_config = get_option('tantan_wordpress_s3');

    $s3_bucket = trim($s3_config['bucket'], '/');
    $s3_prefix = trim($s3_config['object-prefix'], '/');

    $s3_path = 'https://s3.amazonaws.com/' . $s3_bucket . '/' . $s3_prefix . '/';

    $replace = array(
        'http://www.data.gov/app/uploads/' => $s3_path,
        'https://www.data.gov/app/uploads/' => $s3_path,
        '"/app/uploads/' => '"'.$s3_path,
        '"app/uploads/' => '"'.$s3_path,
        'https://uat-datagov.reisys.com/app/uploads/' => $s3_path,
        'http://qa-datagov.reisys.com/app/uploads/' => $s3_path,
        '"aapp/uploads/' => '"'.$s3_path,
        'http://www.data.gov/app/uploads/media/' => $s3_path,
        'https://www.data.gov/app/uploads/media/' => $s3_path,
        'https://www.data.gov/media/' => $s3_path,
        'http://www.data.gov/media/' => $s3_path,
        '"/media/' => '"'.$s3_path,
    );


    foreach ($replace as $from => $to) {
        $changed = $wpdb->query(
            "UPDATE wp_posts SET post_content = REPLACE(post_content, '{$from}', '{$to}') WHERE post_content LIKE '%{$from}%'"
        );

        echo $changed." replacements for '{$from}' to '{$to}'\n<br />\n";
    }

    echo 'done';
} else {
    echo 'Permission denied';
}
