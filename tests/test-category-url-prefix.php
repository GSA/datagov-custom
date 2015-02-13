<?php

class CategoryUrlPrefixTest extends WP_UnitTestCase {
    
    private $child_term;
    private $parent_term;

    public function setUp() {

        parent::setUp();

        // Climate
        $parent_term        = wp_insert_term('Climate', 'category', array('slug' => 'climate'));
        $this->parent_term  = get_term($parent_term['term_id'], 'category');

        // Coastal Flooding
        $args             = array('slug' => 'coastalflooding', 'parent' => $parent_term['term_id']);
        $child_term       = wp_insert_term('Coastal Flooding', 'category', $args);
        $child_term       = get_term($child_term['term_id'], 'category');
        $this->child_term = $child_term;

    }

    public function test_is_new_page() {

        $referer = 'http://www.data.gov/wp/wp-admin/post-new.php?post_type=page';
        $this->assertTrue(datagov_custom_is_new_page($referer));
   
        $referer = 'http://dev-datagov.reisys.com/wp/wp-admin/post-new.php';
        $this->assertFalse(datagov_custom_is_new_page($referer));
        
        $referer = 'http://www.data.gov/wp/wp-admin/post.php?post=40739&action=edit';
        $this->assertFalse(datagov_custom_is_new_page($referer));

    }

    public function test_datagov_custom_term_hirarchy() {

        $term_hirarchy = array(
            0 => 'coastalflooding', 
            1 => 'climate'
        );

        $this->assertEquals($term_hirarchy, datagov_custom_term_hirarchy($this->child_term));

    }

    public function test_add_page_with_category_terms() {

        $page_args = array(
 	    'post_content'   => 'Test post tagged with category and subcategory',
	    'post_name'      => 'test',
	    'post_title'     => 'Testpost',
	    'post_status'    => 'publish',
	    'post_type'      => 'page',
            'post_author'    => 1,
            'post_category'  => array($this->child_term->term_id, $this->parent_term->term_id)
        );  

        // need to fake $_POST request
        $_POST['_wp_http_referer'] = '/wp/wp-admin/post-new.php?post_type=page';
        $_POST['post_category']    = array(
            0 => $this->parent_term->term_id, 
            1 => $this->child_term->term_id
        );

        $post_id = $this->factory->post->create($page_args);
        $this->assertTrue(!is_wp_error($post_id));

        // for some reason it doesn't generate a proper slug i.e. test_page
        // instead it generates something like ?page_id=9
        $custom_permalink = 'climate/coastalflooding/?page_id=' . $post_id; 

        if (!is_wp_error($post_id)) {
            $custom_permalink_meta = get_post_meta($post_id, 'custom_permalink', true);
            $this->assertEquals($custom_permalink_meta, $custom_permalink);
        }

    }

    public function test_add_page_with_no_category_terms() {

        $page_args = array(
 	    'post_content'   => 'Test post tagged with category and subcategory',
	    'post_name'      => 'test-no-cat',
	    'post_title'     => 'Testnocat',
	    'post_status'    => 'publish',
	    'post_type'      => 'page',
            'post_author'    => 1,
        );  

        // need to fake $_POST request
        $_POST['_wp_http_referer'] = '/wp/wp-admin/post-new.php?post_type=page';
        $_POST['post_category']    = array();

        $post_id = $this->factory->post->create($page_args);
        $this->assertTrue(!is_wp_error($post_id));

        if (!is_wp_error($post_id)) {
            $custom_permalink_meta = get_post_meta($post_id, 'custom_permalink', true);
            $this->assertTrue(empty($custom_permalink_meta));
        }

    }

}

