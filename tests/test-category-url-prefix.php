<?php

class CategoryUrlPrefixTest extends WP_UnitTestCase {

    function test_is_new_page() {

        $referer = 'http://www.data.gov/wp/wp-admin/post-new.php?post_type=page';
        $this->assertTrue(datagov_custom_is_new_page($referer));
   
        $referer = 'http://dev-datagov.reisys.com/wp/wp-admin/post-new.php';
        $this->assertFalse(datagov_custom_is_new_page($referer));
        
        $referer = 'http://www.data.gov/wp/wp-admin/post.php?post=40739&action=edit';
        $this->assertFalse(datagov_custom_is_new_page($referer));
    }

    function test_custom_term_hirarchy() {

        // Climate
        $parent_term = wp_insert_term('Climate', 'category', array('slug' => 'climate'));

        // Coastal Flooding
        $args          = array('slug' => 'coastalflooding', 'parent' => $parent_term['term_id']);
        $child_term   = wp_insert_term('Coastal Flooding', 'category', $args);
        $child_term    = get_term($child_term['term_id'], 'category');
        $term_hirarchy = array(0 => 'coastalflooding', 1 => 'climate');
    
        $this->assertEquals($term_hirarchy, datagov_custom_term_hirarchy($child_term));

    }

}

