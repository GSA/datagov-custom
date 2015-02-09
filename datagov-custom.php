<?php
/*
Plugin Name: Datagov Custom
Description: This plugin holds custom types/taxnomies definitions, actions, filters etc.
Version: 1.0
*/

// Define current version constant
# define( 'DCPT_VERSION', '0.8.1' );

$purge_status = "";

//Custom Post Types

add_action('init', 'menu_cleanup_no_groups');

function menu_cleanup_no_groups()
{
    if (current_user_can( 'manage_options' )) {
        if (isset($_GET['menu_cleanup_no_groups'])) {
            /**
             * @var wpdb $wpdb
             */
            global $wpdb;
            $query = "UPDATE " . $wpdb->postmeta . "
            SET meta_value=replace(meta_value, '_groups_limit=0', '') WHERE meta_key='_menu_item_url'
    ";
            $wpdb->query($query);
        }
    }
}

#Challenges
add_action('admin_menu', 'add_export_link');
add_action('init', 'cptui_register_my_cpt_challenge');
/**
 *
 */
function cptui_register_my_cpt_challenge()
{
    register_post_type(
        'challenge',
        array(
            'label'           => 'Challenges',
            'description'     => '',
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => true,
            'capability_type' => 'post',
            'map_meta_cap'    => true,
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'challenge', 'with_front' => true),
            'query_var'       => true,
            'supports'        => array('title', 'editor', 'comments', 'author'),
            'taxonomies'      => array('category'),
            'labels'          => array(
                'name'               => 'Challenges',
                'singular_name'      => 'Challenge',
                'menu_name'          => 'Challenges',
                'add_new'            => 'Add Challenge',
                'add_new_item'       => 'Add New Challenge',
                'edit'               => 'Edit',
                'edit_item'          => 'Edit Challenge',
                'new_item'           => 'New Challenge',
                'view'               => 'View Challenge',
                'view_item'          => 'View Challenge',
                'search_items'       => 'Search Challenges',
                'not_found'          => 'No Challenges Found',
                'not_found_in_trash' => 'No Challenges Found in Trash',
                'parent'             => 'Parent Challenge',
            )
        )
    );
}

#Applications
add_action('init', 'cptui_register_my_cpt_applications');
/**
 *
 */
function cptui_register_my_cpt_applications()
{
    register_post_type(
        'applications',
        array(
            'label'           => 'Applications',
            'description'     => 'Add a developer application related to Data.gov or specific community.',
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => true,
            'capability_type' => 'post',
            'map_meta_cap'    => true,
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'applications', 'with_front' => true),
            'query_var'       => true,
            'supports'        => array('title', 'editor', 'comments', 'revisions', 'author'),
            'taxonomies'      => array('category', 'application categories', 'application types'),
            'labels'          => array(
                'name'               => 'Applications',
                'singular_name'      => 'Application',
                'menu_name'          => 'Applications',
                'add_new'            => 'Add Application',
                'add_new_item'       => 'Add New Application',
                'edit'               => 'Edit',
                'edit_item'          => 'Edit Application',
                'new_item'           => 'New Application',
                'view'               => 'View Application',
                'view_item'          => 'View Application',
                'search_items'       => 'Search Applications',
                'not_found'          => 'No Applications Found',
                'not_found_in_trash' => 'No Applications Found in Trash',
                'parent'             => 'Parent Application',
            )
        )
    );
}

#Events
add_action('init', 'cptui_register_my_cpt_events');
/**
 *
 */
function cptui_register_my_cpt_events()
{
    register_post_type(
        'events',
        array(
            'label'           => 'Events',
            'description'     => '',
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => true,
            'capability_type' => 'post',
            'map_meta_cap'    => true,
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'events', 'with_front' => true),
            'query_var'       => true,
            'supports'        => array(
                'title',
                'editor',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'thumbnail',
                'author',
                'page-attributes',
                'post-formats'
            ),
            'taxonomies'      => array('category'),
            'labels'          => array(
                'name'               => 'Events',
                'singular_name'      => 'Event',
                'menu_name'          => 'Events',
                'add_new'            => 'Add Event',
                'add_new_item'       => 'Add New Event',
                'edit'               => 'Edit',
                'edit_item'          => 'Edit Event',
                'new_item'           => 'New Event',
                'view'               => 'View Event',
                'view_item'          => 'View Event',
                'search_items'       => 'Search Events',
                'not_found'          => 'No Events Found',
                'not_found_in_trash' => 'No Events Found in Trash',
                'parent'             => 'Parent Event',
            )
        )
    );
}

#ArcGis Maps
add_action('init', 'cptui_register_my_cpt_arcgis_maps');
/**
 *
 */
function cptui_register_my_cpt_arcgis_maps()
{
    register_post_type(
        'arcgis_maps',
        array(
            'label'           => 'ArcGiS Maps',
            'description'     => '',
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => true,
            'capability_type' => 'post',
            'map_meta_cap'    => true,
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'arcgis_maps', 'with_front' => true),
            'query_var'       => true,
            'supports'        => array(
                'title',
                'editor',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'thumbnail',
                'author',
                'page-attributes',
                'post-formats'
            ),
            'taxonomies'      => array('category'),
            'labels'          => array(
                'name'               => 'ArcGiS Maps',
                'singular_name'      => 'ArcGiS Map',
                'menu_name'          => 'ArcGiS Maps',
                'add_new'            => 'Add ArcGiS Map',
                'add_new_item'       => 'Add New ArcGiS Map',
                'edit'               => 'Edit',
                'edit_item'          => 'Edit ArcGiS Map',
                'new_item'           => 'New ArcGiS Map',
                'view'               => 'View ArcGiS Map',
                'view_item'          => 'View ArcGiS Map',
                'search_items'       => 'Search ArcGiS Maps',
                'not_found'          => 'No ArcGiS Maps Found',
                'not_found_in_trash' => 'No ArcGiS Maps Found in Trash',
                'parent'             => 'Parent ArcGiS Map',
            )
        )
    );
}

#Regional Planning
add_action('init', 'cptui_register_my_cpt_regional_planning');
/**
 *
 */
function cptui_register_my_cpt_regional_planning()
{
    register_post_type(
        'regional_planning',
        array(
            'label'           => 'Regional Planning',
            'description'     => '',
            'public'          => true,
            'show_ui'         => true,
            'show_in_menu'    => true,
            'capability_type' => 'post',
            'map_meta_cap'    => true,
            'hierarchical'    => false,
            'rewrite'         => array('slug' => 'regional_planning', 'with_front' => true),
            'query_var'       => true,
            'supports'        => array(
                'title',
                'editor',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'thumbnail',
                'author',
                'page-attributes',
                'post-formats'
            ),
            'taxonomies'      => array('category'),
            'labels'          => array(
                'name'               => 'Regional Planning',
                'singular_name'      => 'Regional Planning',
                'menu_name'          => 'Regional Planning',
                'add_new'            => 'Add Regional Planning',
                'add_new_item'       => 'Add New Regional Planning',
                'edit'               => 'Edit',
                'edit_item'          => 'Edit Regional Planning',
                'new_item'           => 'New Regional Planning',
                'view'               => 'View Regional Planning',
                'view_item'          => 'View Regional Planning',
                'search_items'       => 'Search Regional Planning',
                'not_found'          => 'No Regional Planning Found',
                'not_found_in_trash' => 'No Regional Planning Found in Trash',
                'parent'             => 'Parent Regional Planning',
            )
        )
    );
}

//Custom Taxonomies

#Application Categories
add_action('init', 'cptui_register_my_taxes_application_categories');
/**
 *
 */
function cptui_register_my_taxes_application_categories()
{
    register_taxonomy(
        'application_categories',
        array(
            0 => 'applications',
        ),
        array(
            'hierarchical'      => true,
            'label'             => 'Application Categories',
            'show_ui'           => true,
            'query_var'         => true,
            'show_admin_column' => false,
            'labels'            => array(
                'search_items'               => 'Application Category',
                'popular_items'              => '',
                'all_items'                  => 'All Application Category',
                'parent_item'                => 'Parent Application Category',
                'parent_item_colon'          => 'Parent Application Category:',
                'edit_item'                  => 'Edit Application Category',
                'update_item'                => 'Update Application Category',
                'add_new_item'               => 'Add New Application Category',
                'new_item_name'              => 'New Application Category',
                'separate_items_with_commas' => '',
                'add_or_remove_items'        => '',
                'choose_from_most_used'      => '',
            )
        )
    );
}

#Announcements and News
add_action('init', 'cptui_register_my_taxes_announcements_and_news');
/**
 *
 */
function cptui_register_my_taxes_announcements_and_news()
{
    register_taxonomy(
        'announcements_and_news',
        array(
            0 => 'post',
        ),
        array(
            'hierarchical'      => true,
            'label'             => 'Announcements and News',
            'show_ui'           => true,
            'query_var'         => true,
            'show_admin_column' => false,
            'labels'            => array(
                'search_items'               => 'Announcements and News',
                'popular_items'              => '',
                'all_items'                  => 'All Announcements and News',
                'parent_item'                => 'Parent Announcements and News',
                'parent_item_colon'          => 'Parent Announcements and News:',
                'edit_item'                  => 'Edit Announcements and News',
                'update_item'                => 'Update Announcements and News',
                'add_new_item'               => 'Add New Announcements and News',
                'new_item_name'              => 'New Announcements and News',
                'separate_items_with_commas' => '',
                'add_or_remove_items'        => '',
                'choose_from_most_used'      => '',
            )
        )
    );
}

#Application Types
add_action('init', 'cptui_register_my_taxes_application_types');
/**
 *
 */
function cptui_register_my_taxes_application_types()
{
    $role = get_role('editor');
    $role->remove_cap('manage_categories');
    if (current_user_can('level_10')) {
        $labelarray = array(
            'search_items'               => 'Application Type',
            'popular_items'              => '',
            'all_items'                  => 'All Application Type',
            'parent_item'                => 'Parent Application Type',
            'parent_item_colon'          => 'Parent Application Type:',
            'edit_item'                  => 'Edit Application Type',
            'update_item'                => 'Update Application Type',
            'add_new_item'               => 'Add New Application Type',
            'new_item_name'              => 'New Application Type',
            'separate_items_with_commas' => '',
            'add_or_remove_items'        => '',
            'choose_from_most_used'      => '',
        );
    } else {
        $labelarray = array(
            'search_items'      => 'Application Type',
            'popular_items'     => '',
            'all_items'         => 'All Application Type',
            'parent_item'       => 'Parent Application Type',
            'parent_item_colon' => 'Parent Application Type:'
        );
    }
    register_taxonomy(
        'application_types',
        array(
            0 => 'applications',
        ),
        array(
            'hierarchical'      => true,
            'label'             => 'Application Types',
            'show_ui'           => true,
            'query_var'         => true,
            'show_admin_column' => false,
            'labels'            => $labelarray
        )
    );
}

#Migrate legacy Tags
add_action('init', 'cptui_register_my_taxes_legacy_datacomm_tags');
/**
 *
 */
function cptui_register_my_taxes_legacy_datacomm_tags()
{
    register_taxonomy(
        'legacy_datacomm_tags',
        array(
            0 => 'post',
        ),
        array(
            'hierarchical'      => true,
            'label'             => 'Migrate legacy Tags',
            'show_ui'           => true,
            'query_var'         => true,
            'show_admin_column' => false,
            'labels'            => array(
                'search_items'               => 'Migrate legacy Tag',
                'popular_items'              => '',
                'all_items'                  => 'All Migrate legacy Tag',
                'parent_item'                => 'Parent Migrate legacy Tag',
                'parent_item_colon'          => 'Parent Migrate legacy Tag:',
                'edit_item'                  => 'Edit Migrate legacy Tag',
                'update_item'                => 'Update Migrate legacy Tag',
                'add_new_item'               => 'Add New Migrate legacy Tag',
                'new_item_name'              => 'New Migrate legacy Tag',
                'separate_items_with_commas' => '',
                'add_or_remove_items'        => '',
                'choose_from_most_used'      => '',
            )
        )
    );
}

/**
 *
 */
function add_export_link()
{
    add_links_page(
        'Download Links',
        'Download Links',
        'read',
        '../wp-content/plugins/datagov-custom/wp_download_links.php',
        'pccf_render_form'
    );
}

/* Adds Subscribe2 support for custom post types */
/**
 * @param $types
 *
 * @return array
 */
function my_post_types($types)
{
    $types = array(
        'applications',
        'arcgis_maps',
        'attachment',
        'challenge',
        'events',
        'metric_organization',
        'page',
        'qa_faqs',
        'regional_planning'
    );

    return $types;
}

add_filter('s2_post_types', 'my_post_types');

/**
 * Set "Edge-Control: no-store" header for post pages so that AKAMAI doesn't cache them
 */
function add_edge_control_header()
{
    // get post id this way since none of the conditional tags are avaliable at this stage in the boostrap process
    $url         = explode('?', 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    $post_id     = url_to_postid($url[0]);
    $post_type   = get_post_type($post_id);
    $post_format = get_post_format($post_id);

    if ($post_type == 'post' && !$post_format) { // post type is 'post' and post format is not set ==> blog post
        header('Edge-Control: no-store');
    }
}

add_action('send_headers', 'add_edge_control_header');

/**
 * @param $items
 * @param $args
 *
 * @return string
 */
function add_login_logout_link($items, $args)
{
    $loginoutlink = wp_loginout('index.php', false);
    $items .= '<li id="login">' . $loginoutlink . '</li>';

    return $items;
}

/**
 * Include misc js
 */
function datagov_custom_js()
{
    // load js only on admin pages
    if (is_admin()) {
        wp_register_script('datagov_custom_misc_js', plugins_url('/datagov-custom-misc.js', __FILE__), array('jquery'));
        wp_enqueue_script('datagov_custom_misc_js');
    }
}

add_action('admin_init', 'datagov_custom_js');

/**
 * @param $text
 *
 * @return mixed|void
 */
function datagov_custom_keep_my_links($text)
{
    $raw_excerpt = $text;
    if ('' == $text) {
        $text           = get_the_content('');
        $text           = strip_shortcodes($text);
        $text           = apply_filters('the_content', $text);
        $text           = str_replace(']]>', ']]>', $text);
        $text           = strip_tags($text, '<a>');
        $excerpt_length = apply_filters('excerpt_length', 55);
        $excerpt_more   = apply_filters('excerpt_more', ' ' . '[...]');
        $words          = preg_split(
            '/(<a.*?a>)|\n|\r|\t|\s/',
            $text,
            $excerpt_length + 1,
            PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE
        );
        if (count($words) > $excerpt_length) {
            array_pop($words);
            $text = implode(' ', $words);
            $text = $text . $excerpt_more;
        } else {
            $text = implode(' ', $words);
        }
    }

    return apply_filters('new_wp_trim_excerpt', $text, $raw_excerpt);
}

include_once(dirname(dirname(__FILE__)) . '/suggested-datasets/suggested-datasets.php');

add_filter('404_template', 'un_categorized_post_redirect');
/**
 * DG-1834
 * On POST created if not category is selected the header goes into a redirect loop.
 *
 * @param $template
 *
 * @return mixed
 */
function un_categorized_post_redirect($template)
{
    if (!is_404()) {
        return $template;
    }

    /**
     * @var wpdb $wpdb
     */
    global $wp_rewrite, $wp_query;

    if ('/%category%/%postname%/' !== $wp_rewrite->permalink_structure) {
        return $template;
    }

    if (!$post = get_page_by_path($wp_query->query['category_name'], OBJECT, 'post')) {
        return $template;
    }

    $categs = wp_get_post_categories($post->ID);

    if (sizeof($categs)) {
        return $template;
    }

    $uncategorized_taxonomy = get_category_by_slug('uncategorized');
    wp_set_post_categories($post->ID, array($uncategorized_taxonomy->term_id));

    wp_redirect(get_permalink($post->ID));
    exit();
}

/**
 * remove featured content box
 */
function remove_featured_custom_taxonomy()
{
    remove_meta_box('featureddiv', 'post', 'side');
}

add_action('admin_menu', 'remove_featured_custom_taxonomy');

/**
 * add featured content box with a new callback
 */
function add_featured_custom_taxonomy()
{
    add_meta_box(
        'featureddiv',
        'Featured Content',
        'custom_post_categories_meta_box',
        'post',
        'side',
        'low',
        array('taxonomy' => 'featured')
    );
}

add_action('admin_menu', 'add_featured_custom_taxonomy');

/**
 * Custom callback that generates category terms for featured taxonomy.
 * It excludes the "Topic Introduction" term from the list.
 */
function custom_post_categories_meta_box($post, $box)
{
    $defaults = array('taxonomy' => 'category');
    if (!isset($box['args']) || !is_array($box['args'])) {
        $args = array();
    } else {
        $args = $box['args'];
    }
    extract(wp_parse_args($args, $defaults), EXTR_SKIP);
    $tax = get_taxonomy($taxonomy);

    ?>
    <div id="taxonomy-<?php echo $taxonomy; ?>" class="categorydiv">
        <ul id="<?php echo $taxonomy; ?>-tabs" class="category-tabs">
            <li class="tabs"><a href="#<?php echo $taxonomy; ?>-all"><?php echo $tax->labels->all_items; ?></a></li>
            <li class="hide-if-no-js"><a href="#<?php echo $taxonomy; ?>-pop"><?php _e('Most Used'); ?></a></li>
        </ul>

        <div id="<?php echo $taxonomy; ?>-pop" class="tabs-panel" style="display: none;">
            <ul id="<?php echo $taxonomy; ?>checklist-pop" class="categorychecklist form-no-clear">
                <?php $popular_ids = custom_wp_popular_terms_checklist($taxonomy); ?>
            </ul>
        </div>

        <div id="<?php echo $taxonomy; ?>-all" class="tabs-panel">
            <?php
            $name = ($taxonomy == 'category') ? 'post_category' : 'tax_input[' . $taxonomy . ']';
            echo "<input type='hidden' name='{$name}[]' value='0' />"; // Allows for an empty term set to be sent. 0 is an invalid Term ID and will be ignored by empty() checks.
            ?>
            <ul id="<?php echo $taxonomy; ?>checklist" data-wp-lists="list:<?php echo $taxonomy ?>"
                class="categorychecklist form-no-clear">
                <?php custom_wp_terms_checklist(
                    $post->ID,
                    array(
                        'taxonomy'     => $taxonomy,
                        'popular_cats' => $popular_ids
                    )
                ) ?>
            </ul>
        </div>
        <?php if (current_user_can($tax->cap->edit_terms)) : ?>
            <div id="<?php echo $taxonomy; ?>-adder" class="wp-hidden-children">
                <h4>
                    <a id="<?php echo $taxonomy; ?>-add-toggle" href="#<?php echo $taxonomy; ?>-add"
                       class="hide-if-no-js">
                        <?php
                        /* translators: %s: add new taxonomy label */
                        printf(__('+ %s'), $tax->labels->add_new_item);
                        ?>
                    </a>
                </h4>

                <p id="<?php echo $taxonomy; ?>-add" class="category-add wp-hidden-child">
                    <label class="screen-reader-text"
                           for="new<?php echo $taxonomy; ?>"><?php echo $tax->labels->add_new_item; ?></label>
                    <input type="text" name="new<?php echo $taxonomy; ?>" id="new<?php echo $taxonomy; ?>"
                           class="form-required form-input-tip"
                           value="<?php echo esc_attr($tax->labels->new_item_name); ?>" aria-required="true"/>
                    <label class="screen-reader-text" for="new<?php echo $taxonomy; ?>_parent">
                        <?php echo $tax->labels->parent_item_colon; ?>
                    </label>
                    <?php
                    $args = array(
                        'taxonomy'         => $taxonomy,
                        'hide_empty'       => 0,
                        'name'             => 'new' . $taxonomy . '_parent',
                        'orderby'          => 'name',
                        'hierarchical'     => 1,
                        'show_option_none' => '&mdash; ' . $tax->labels->parent_item . ' &mdash;',
                        'exclude'          => array(get_term_by('name', 'Topic Introduction', $taxonomy)->term_id),
                    );
                    wp_dropdown_categories($args);
                    ?>
                    <input type="button" id="<?php echo $taxonomy; ?>-add-submit"
                           data-wp-lists="add:<?php echo $taxonomy ?>checklist:<?php echo $taxonomy ?>-add"
                           class="button category-add-submit"
                           value="<?php echo esc_attr($tax->labels->add_new_item); ?>"/>
                    <?php wp_nonce_field('add-' . $taxonomy, '_ajax_nonce-add-' . $taxonomy, false); ?>
                    <span id="<?php echo $taxonomy; ?>-ajax-response"></span>
                </p>
            </div>
        <?php endif; ?>
    </div>
<?php
}

/**
 * Custom wp_terms_checklist function that excludes
 * the 'Topic introduction' term from the checklist.
 */
function custom_wp_terms_checklist($post_id = 0, $args = array())
{
    $defaults = array(
        'descendants_and_self' => 0,
        'selected_cats'        => false,
        'popular_cats'         => false,
        'walker'               => null,
        'taxonomy'             => 'category',
        'checked_ontop'        => true
    );
    $args     = apply_filters('wp_terms_checklist_args', $args, $post_id);

    extract(wp_parse_args($args, $defaults), EXTR_SKIP);

    if (empty($walker) || !is_a($walker, 'Walker')) {
        $walker = new Walker_Category_Checklist;
    }

    $descendants_and_self = (int)$descendants_and_self;

    $args = array('taxonomy' => $taxonomy);

    $tax              = get_taxonomy($taxonomy);
    $args['disabled'] = !current_user_can($tax->cap->assign_terms);

    if (is_array($selected_cats)) {
        $args['selected_cats'] = $selected_cats;
    } elseif ($post_id) {
        $args['selected_cats'] = wp_get_object_terms($post_id, $taxonomy, array_merge($args, array('fields' => 'ids')));
    } else {
        $args['selected_cats'] = array();
    }

    if (is_array($popular_cats)) {
        $args['popular_cats'] = $popular_cats;
    } else {
        $args['popular_cats'] = get_terms(
            $taxonomy,
            array(
                'fields'       => 'ids',
                'orderby'      => 'count',
                'order'        => 'DESC',
                'number'       => 10,
                'hierarchical' => false
            )
        );
    }

    if ($descendants_and_self) {
        $categories = (array)get_terms(
            $taxonomy,
            array(
                'child_of'     => $descendants_and_self,
                'hierarchical' => 0,
                'hide_empty'   => 0
            )
        );
        $self       = get_term($descendants_and_self, $taxonomy);
        array_unshift($categories, $self);
    } else {
        $categories = (array)get_terms($taxonomy, array('get' => 'all'));
    }
    // exclude 'Topic Introduction' term from the list
    foreach ($categories as $key => $term) {
        if ($term->name == "Topic Introduction") {
            unset($categories[$key]);
        }
    }
    if ($checked_ontop) {
        // Post process $categories rather than adding an exclude to the get_terms() query to keep the query the same across all posts (for any query cache)
        $checked_categories = array();
        $keys               = array_keys($categories);

        foreach ($keys as $k) {
            if (in_array($categories[$k]->term_id, $args['selected_cats'])) {
                $checked_categories[] = $categories[$k];
                unset($categories[$k]);
            }
        }

        // Put checked cats on top
        echo call_user_func_array(array(&$walker, 'walk'), array($checked_categories, 0, $args));
    }
    // Then the rest of them
    echo call_user_func_array(array(&$walker, 'walk'), array($categories, 0, $args));
}

/**
 * Retrieve a list of the most popular terms from the specified taxonomy.
 * This is a customized wp_popular_terms_checklist to exclude
 * the 'Topic introduction' term from the checklist.
 * If the $echo argument is true then the elements for a list of checkbox
 * <input> elements labelled with the names of the selected terms is output.
 * If the $post_ID global isn't empty then the terms associated with that
 * post will be marked as checked.
 * @since 2.5.0
 *
 * @param string $taxonomy Taxonomy to retrieve terms from.
 * @param int    $default  Unused.
 * @param int    $number   Number of terms to retrieve. Defaults to 10.
 * @param bool   $echo     Optionally output the list as well. Defaults to true.
 *
 * @return array List of popular term IDs.
 */
function custom_wp_popular_terms_checklist($taxonomy, $default = 0, $number = 10, $echo = true)
{
    $post = get_post();

    if ($post && $post->ID) {
        $checked_terms = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'ids'));
    } else {
        $checked_terms = array();
    }

    $terms = get_terms(
        $taxonomy,
        array(
            'orderby'      => 'count',
            'order'        => 'DESC',
            'number'       => $number,
            'hierarchical' => false,
            'exclude'      => array(get_term_by('name', 'Topic Introduction', $taxonomy)->term_id),
        )
    );

    $tax         = get_taxonomy($taxonomy);
    $popular_ids = array();
    foreach ((array)$terms as $term) {

        $popular_ids[] = $term->term_id;
        if (!$echo) // hack for AJAX use
        {
            continue;
        }
        $id      = "popular-$taxonomy-$term->term_id";
        $checked = in_array($term->term_id, $checked_terms) ? 'checked="checked"' : '';
        ?>

        <li id="<?php echo $id; ?>" class="popular-category">
            <label class="selectit">
                <input id="in-<?php echo $id; ?>" type="checkbox" <?php echo $checked; ?>
                       value="<?php echo (int)$term->term_id; ?>" <?php disabled(
                    !current_user_can($tax->cap->assign_terms)
                ); ?> />
                <?php echo esc_html(apply_filters('the_category', $term->name)); ?>
            </label>
        </li>

    <?php
    }

    return $popular_ids;
}

add_action('admin_menu', 'environment_conf_settings');
/**
 *
 */
function environment_conf_settings()
{
    add_menu_page(
        'CKAN Environmemnt Settings',
        'CKAN Environmemnt Settings',
        'administrator',
        'env_config',
        'ckan_environment_conf'
    );
}

/**
 *
 */
function ckan_environment_conf()
{
    $protocol            = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $ckan_default_server = (get_option('ckan_default_server') != '') ? get_option(
        'ckan_default_server'
    ) : 'catalog.data.gov/dataset';
    $ckan_default_server = strstr(
        $ckan_default_server,
        '://'
    ) ? $ckan_default_server : ($protocol . $ckan_default_server);
    ?>
    <form action="options.php" method="post" name="options">
        <h2>Catalog Environment Configuration</h2> <?php wp_nonce_field('update-options'); ?>
        <div>
            <div class="form-item form-type-textfield form-item-server-info">
                <label for="edit-server-info">CkAN Server <span title="This field is required."
                                                                class="form-required">*</span></label>
                <input type="text" class="form-text required" maxlength="128" size="60"
                       value="<?php echo $ckan_default_server ?>" name="ckan_default_server" id="ckan_default_server">

                <div class="description">Please enter the server info. Example: catalog.data.gov (Avoid the
                    http/https)
                </div>
            </div>
        </div>
        <input type="hidden" name="action" value="update"/>
        <input type="hidden" name="page_options" value="ckan_default_server"/>
        <input type="submit" name="Submit" value="Update"/>
    </form>
<?php
}

add_action('admin_init', 'filter_rss_voting', 100);
/**
 * DG-1901
 * Individual Rss feeds Posts have an option of voting, which is to be removed or hidden.
 */
function filter_rss_voting()
{
    /**
     * @var wpdb $wpdb
     */
    global $wpdb;
    $query = "UPDATE " . $wpdb->posts . "
        SET `post_content` = REPLACE(`post_content`, '<div><div>Rate this Blog Post', '<div style=\"display:none\"><div>Rate this Blog Post')
        WHERE
            `post_type` = 'post'
            AND ID IN (SELECT post_id FROM " . $wpdb->postmeta . " WHERE meta_key = 'rssmi_source_link')
            LIMIT 50
    ";
    $wpdb->query($query);
}

/**
 * Avoid CURL ssl certificate errors while wp-cron.php calls
 */
add_filter('https_local_ssl_verify', '__return_false');
add_filter('https_ssl_verify', '__return_false');

/**
 * DG-1955
 * Daily update CKAN dataset total count, to display it over search box on main page
 * @author Alex Perfilov
 */
//if (!wp_next_scheduled('ckan_count_cron_daily')) {
//    wp_schedule_event(time(), 'daily', 'ckan_count_cron_daily');
//}

add_action('ckan_count_cron_daily', 'ckan_count_cron');

/**
 * @return bool
 */
function ckan_count_cron()
{
    try {
        $json = file_get_contents('http://catalog.data.gov/api/action/package_search?q=dataset_type:dataset&rows=0');
        if (false === $json) {
            throw new Exception('could not access page');
        }
//        decode result as array
        $json_result = json_decode($json, true);
        if (true != $json_result['success']) {
            throw new Exception('json returned [success]=false');
        }
        $dataset_count = (int)$json_result['result']['count'];

        if ($dataset_count && $dataset_count > 10000) {
            update_option('ckan_total_count', $dataset_count);
        }
    } catch (Exception $ex) {
        return false;
    }

    return true;
}

/**
 * Avoid
 * http://wptavern.com/how-to-prevent-wordpress-from-participating-in-pingback-denial-of-service-attacks
 */
function stoppingbacks($methods)
{
    unset($methods['pingback.ping']);

    return $methods;
}

add_filter('xmlrpc_methods', 'stoppingbacks');

/**
 * Defer parsing of JavaScript
 * Performance optimization
 */
// http://stackoverflow.com/questions/18944027
// Adapted from https://gist.github.com/toscho/1584783
add_filter(
    'clean_url',
    /**
     * @param $url
     *
     * @return string
     */
    /**
     * @param $url
     *
     * @return string
     */
    /**
     * @param $url
     *
     * @return string
     */
    function ($url) {
        if (false === strpos($url, '.js')
            OR false !== strpos($url, '/jquery.min.js')
            OR false !== strpos($url, 'advanced-custom-fields')
        ) { // not our file
            return $url;
        }

        // Must be a ', not "!
        return "$url' defer='defer";
    },
    11,
    1
);

/**
 * DG-1652
 * Get latest statistics of harvesting processes from CKAN engine
 * http://catalog.data.gov//api/3/action/package_search?q=type:harvest
 */
if (!wp_next_scheduled('ckan_harvest_statistics_daily')) {
    wp_schedule_event(strtotime('5am'), 'daily', 'ckan_harvest_statistics_daily');
}

add_action('ckan_harvest_statistics_daily', 'get_ckan_harvest_statistics');

include_once('ckan-harvest-stats.class.php');

/**
 * Get latest harvest statistics from catalog.data.gov
 * Daily
 */
function get_ckan_harvest_statistics()
{
    $ckan = new CKAN_Harvest_Stats;
    $ckan->initDB();
    $ckan->truncateDB();
    $ckan->updateDB();
}

/**
 * DG-1931
 * github #339
 * Sub Topics - default url doesn't prefix parent topic name
 */

add_action('save_post', 'datagov_custom_add_category', 20);

/**
 * This hook function that adds custom_permalink metadata to pages 
 * in the following format: (%category%/%post_name%). This only works
 * for pages for which you don't explicitly set a permalink value.
 * In short, it auto populates the permalink field if left empty.
 * 
 * @param int post_id
 *   The id of the page
 * 
 */

function datagov_custom_add_category($post_id) {

    // If our form has not been submitted, we dont want to do anything
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // ignore wp_insert_post action that is called when the page
    // is in revision mode
    if(wp_is_post_revision($post_id)) {
        return;
    }
     
    // ignore wp_insert_post action that is called after 
    // user clicks Add New Page
    if (empty($_POST)) {
        return;
    }

    $custom_permalink = get_post_meta($post_id, 'custom_permalink', true);
    $permalink        = get_permalink($post_id);
    $is_new_page      = datagov_custom_is_new_page($_POST['_wp_http_referer']);

    if (empty($_POST['custom_permalink']) && empty($custom_permalink) && $is_new_page) {
        $post_terms = $_POST['post_category'];
         
        if (!empty($post_terms)) { 

	    // add category(s) slug only to new pages
            $post_term_id = end($post_terms);
	    $term_exists  = term_exists((int) $post_term_id, "category");
	    $is_term      = ($term_exists !==0) && ($term_exists !== NULL);

	    if ($is_term) {
                $post_term     = get_term((int) $post_term_id, "category");
                $term_hirarchy = datagov_custom_term_hirarchy($post_term);

	    }
        }

        $term_hirarchy    = implode("/", array_reverse($term_hirarchy));
        $custom_permalink = str_replace(home_url(), $term_hirarchy, $permalink);

        add_post_meta($post_id, 'custom_permalink', $custom_permalink);
    }
}


/**
 * This function checks if a new pages is being added
 * based on referer
 * 
 * @param string referer
 *
 * @return bool 
 *   true if its a new page otherwise false
 */

function datagov_custom_is_new_page($referer) {
    if (strpos($referer, 'post-new.php?post_type=page') === false) {
        return false;
    } else {
        return true;
    }
}

/**
 * This function figures out the custom_permalink taxonomy chunk.
 * In short, it will generate an array of parent slug (including the child slug) 
 * given a child term id
 * 
 * @param object $child_term
 *
 * @return array $term_hirarchy
 */

function datagov_custom_term_hirarchy($child_term) {
    $parent_term = $child_term;

    while ($parent_term->term_id != 0) {
        $term_hirarchy[] = $parent_term->slug;
        $parent_term     = get_term((int) $parent_term->parent, 'category');
    }

    return $term_hirarchy;
}

add_action('admin_menu', 'iworld_map_configurations');
function iworld_map_configurations()
{
    add_menu_page(
        "iWorld List View/CSV Configuration",
        "iWorld List View Configuration",
        "administrator",
        "iworld_file_path",
        "iword_file_path_config"
    );
}

function iword_file_path_config()
{
    $international_open_data = (get_option('international_open_data') != '') ? get_option(
        'international_open_data'
    ) : '';
    $us_states_open_data     = (get_option('us_states_open_data') != '') ? get_option('us_states_open_data') : '';
    $us_counties_open_data   = (get_option('us_counties_open_data') != '') ? get_option('us_counties_open_data') : '';
    ?>
    <form action="options.php" method="post" name="options">
        <h2>iWorld List View File Settings</h2> <?php wp_nonce_field('update-options'); ?>
        <div>
            <div class="form-item form-type-textfield form-item-server-info">
                <label for="international-list">International Open Data </label>
                <input type="text" class="form-text required" maxlength="128" size="60"
                       value="<?php echo $international_open_data; ?>" name="international_open_data"
                       id="international_open_data">

                <div class="description">Please enter the path info. Example:
                    http://www.data.gov/media/2013/11/international.csv
                </div>
            </div>
            <div class="form-item form-type-textfield form-item-server-info">
                <label for="us-states-list">US States Open Data</label>
                <input type="text" class="form-text required" maxlength="128" size="60"
                       value="<?php echo $us_states_open_data; ?>" name="us_states_open_data" id="us_states_open_data">

                <div class="description">Please enter the path info. Example:
                    http://www.data.gov/media/2013/11/states.csv
                </div>
            </div>
            <div class="form-item form-type-textfield form-item-server-info">
                <label for="us-states-list">US Cities and Counties Open Data</label>
                <input type="text" class="form-text required" maxlength="128" size="60"
                       value="<?php echo $us_counties_open_data; ?>" name="us_counties_open_data"
                       id="us_counties_open_data">

                <div class="description">Please enter the path info. Example:
                    http://www.data.gov/media/2013/11/counties.csv
                </div>
            </div>
        </div>
        <input type="hidden" name="action" value="update"/>
        <input type="hidden" name="page_options"
               value="international_open_data,us_states_open_data,us_counties_open_data"/>
        <input type="submit" name="Submit" value="Update"/>
    </form>
<?php
}

add_action('init', 'register_all_nav_menus');
function register_all_nav_menus()
{
    $menus      = get_terms('nav_menu', array('hide_empty' => true));
    $menu_names = array();
    foreach ($menus as $menu) {
        $menu_names[] = $menu->name;
    }
    $menu_names = array_values(
        array_diff($menu_names, array("Primary Navigation", "Social Links", "Topics Navigation", "Footer"))
    );

    foreach ($menu_names as $menu_name => $value) {
        register_nav_menus(array(strtolower($value) . "_navigation" => __($value, 'roots')));
    }
}

add_action('create_category', 'new_function_create_highlight_page');
function new_function_create_highlight_page($categ_id){
    $catname = get_cat_name( $categ_id );
    $post = array(
        'post_category'  => array($categ_id),
        'post_title'     => $catname.' Hightlights',
        'post_status'    => 'publish',
        'post_type'      => 'page',
        'page_template'   => 'template-categories-highlights.php'
    );
    $new_post_id = wp_insert_post($post);
    $edit_post= array(
        'ID'           => $new_post_id,
        'post_name' => 'Highlights '
    );
    wp_update_post($edit_post);

}

/**
 * Disable update notifications on production
 */
if ( defined('ENVIRONMENT') && ('production' == ENVIRONMENT) ) {
    add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
    add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
    add_filter( 'wp_get_update_data', create_function( '$a', "return null;" ) );
}

/**
 * Temporary fix for w3-total-cache Akamai purge
 * todo: write php-akamai library that would handle all features of akamai ccu API
 * including all possible httpStatus codes
 */

function datagov_custom_purge_akamai_cache($post_id) {

    // don't do anything if this is a revision
    if (wp_is_post_revision($post_id)) {
        return;
    }

    $post_permalink      = get_permalink($post_id);
    #$post_permalink      = str_replace('datagov', 'staging.data.gov', $post_permalink); 
    $objects             = array($post_permalink);
    $username            = get_option('akamai_username');
    $password            = get_option('akamai_password');
    $akamai_endpoint     = 'https://api.ccu.akamai.com/ccu/v2/queues/default';
    $content_type_header = "Content-Type:application/json"; 

    $request_body = array(
        "type"    => 'arl',
	"action"  => 'invalidate',
	"domain"  => 'production',
	"objects" => $objects,
    );  
   
    $request_body = json_encode($request_body);

    // send a curl post to akamai end point + fetch response
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $akamai_endpoint);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array($content_type_header));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request_body);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password"); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response);

    $purge_status  = "Please purge the akamai URL of this post manually, "; 
    $purge_status .= "or wait for the daily Akamai cache purge. ";

    if (isset($response->httpStatus)) {
        if ($response->httpStatus == '201') {
	    $estimatedSeconds = $response->estimatedSeconds;
            $purge_status     = "Edits that have been made to this post will be reflected on the ";
	    $purge_status    .= "public facing website in approximately $estimatedSeconds seconds. "; 
        }
    }

    $_SESSION['purge_status'] = $purge_status;
}

/**
 * Append akamai purge status to post/page messages
 */
function akamai_purge_message($messages) {
    $purge_status        = $_SESSION['purge_status'];
    $messages['page'][1] = str_replace('Page updated.', 'Page updated. ' . $purge_status, $messages['page'][1]);
    $messages['post'][1] = str_replace('Post updated.', 'Post updated. ' . $purge_status, $messages['post'][1]);

    unset($_SESSION['purge_status']);

    return $messages;
}

// add akamai cdn purge options
add_option('akamai_username', '', '', 'yes');
add_option('akamai_password', '', '', 'yes');
add_option('akamai_enable_purge', 0, '', 'yes');

// Purge cached posts on every post/page edit + modify post_update $messages variables
if (get_option('akamai_enable_purge') == 1) {
    add_action('save_post', 'datagov_custom_purge_akamai_cache', 100);
    add_filter('post_updated_messages', 'akamai_purge_message', 100);
}


add_filter('request', 'feed_request');
function feed_request($qv){
    $post_type = $_GET['post_type'];
    $rss_post_types = array('post', 'page');
    if(isset($qv['feed']) && isset($qv['post_type'])){
        if(empty($post_type))
            $qv['post_type'] = $rss_post_types;
        else
            $qv['post_type'] = array($post_type);
    }
    return $qv;
}

add_action( 'pre_get_posts', 'exclude_status_from_feeds' );
function exclude_status_from_feeds( &$wp_query ) {
    if ( $wp_query->is_feed() ) {
        $format = $_GET['format'];
        $wp_query->set('orderby', 'modified');
        $post_format_array = array('');
        if(!empty($format)){
            if($format=="standard"){
                $post_formats_to_exclude = array('post-format-status','post-format-link','post-format-image','post-format-gallery');
                $extra_tax_query = array( 'taxonomy' => 'post_format','field' => 'slug', 'terms' => $post_formats_to_exclude,'operator' => 'NOT IN' );
            }
            else {
                $post_formats_to_include = array('post-format-'.$format);
                $extra_tax_query = array( 'taxonomy' => 'post_format','field' => 'slug', 'terms' => $post_formats_to_include );
            }
        } else {
            $post_formats_to_exclude = array('post-format-status');
            $extra_tax_query = array( 'taxonomy' => 'post_format','field' => 'slug', 'terms' => $post_formats_to_exclude,'operator' => 'NOT IN' );
        }

        $tax_query = $wp_query->get( 'tax_query' );
        if ( is_array( $tax_query ) ) {
            $tax_query = $tax_query + $extra_tax_query;
        } else {
            $tax_query = array( $extra_tax_query );
        }
        $wp_query->set( 'tax_query', $tax_query );
    }
}


remove_all_actions( 'do_feed_atom' );
add_action( 'do_feed_atom', 'load_custom_atom_feed');
function load_custom_atom_feed() {
    $template = get_template_directory() . '/template-feed-atom.php';
    load_template( $template );
}

remove_all_actions( 'do_feed_rss2' );
add_action( 'do_feed_rss2', 'load_custom_rss2_feed');
function load_custom_rss2_feed() {
    $template = get_template_directory() . '/template-feed-rss2.php';
    load_template( $template );
}

