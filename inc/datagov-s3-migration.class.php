<?php

if (!class_exists('Datagov_S3_Migrator')) {
    /**
     * Class Datagov_S3_Migrator
     */
    class Datagov_S3_Migrator
    {

        /**
         * Migration
         */
        public function migration()
        {
            $s3_config = get_option('tantan_wordpress_s3');
            if (!$s3_config) {
                die('s3 plugin is not configured');
            }

            $s3_config = unserialize($s3_config);
            $bucket = $s3_config['bucket'];
            $prefix = $s3_config['object-prefix'];
            $region = $s3_config['region'];
            echo 'Bucket: '.$bucket."<br />\n";
            echo 'Region: '.$region."<br />\n";
            echo 'Prefix: '.$prefix."<br /><hr />\n";


            $attrs = array(
                'post_type' => 'attachment',
                'numberposts' => 99999
            );
            $images = get_posts($attrs);

            foreach($images as $img) {
                $file = get_post_meta($img->ID, '_wp_attached_file', true);
                $s3_info = get_post_meta($img->ID, 'amazonS3_info', true);
                $update_required = false;
//                if (!$s3_info || FALSE === unserialize($s3_info)) {
//                    $update_required = true;
//                }

                if (true || $update_required) {
                    $s3_info = array(
                        'bucket' => $bucket,
                        'key' => $prefix.$file,
                        'region' => $region
                    );
                    $url = 'https://s3.amazonaws.com/'.$bucket.'/'.$s3_info['key'];
                    echo $url;
                    $headers = @get_headers($url);
                    if(strpos($headers[0],'200')===false) {
                        echo 'FILE NOT FOUND';
                    } else {
                        echo 'OK';
                        $s3_info = serialize($s3_info);
                        if ( ! add_post_meta( $img->ID, 'amazonS3_info', $s3_info, true ) ) {
                            update_post_meta ( $img->ID, 'amazonS3_info', $s3_info );
                        }
                    };
                    echo "<br />\n";

                }
            }

            var_dump(sizeof($images));
        }
    }
}
