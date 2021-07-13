<?php

    /*
		==========================================
			LISTINGS CUSTOM POST TYPE
		==========================================

    */   
    function onere_testimonials_custom_post_type(){

        $labels = array(
            'name' => 'Testimonials',
            'singular_name' => 'Testimonial',
            'add_new' => 'Add Testimonial',
            'all_items' => 'All Testimonials',
            'add_new_item' => 'Add Testimonial',
            'edit_item' => 'Edit Testimonial',
            'new_item' => 'New Testimonial',
            'view_item' => 'View Testimonial',
            'search_item' => 'Search Testimonial',
            'not_found' => 'No items found',
            'parent_item_colon' => 'Parent item'

        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' =>  true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'supports' => array(
                'title',
                'editor',
                //'excerpt',
                'thumbnail',
                'revisions',
            ),
            'menu_icon' => 'dashicons-id-alt',
            'menu_positions' => 7,
            'exclude_from_search' => false

        );

        register_post_type('testimonials', $args);

    }

    add_action('init', 'onere_testimonials_custom_post_type');

          
add_filter( 'rwmb_meta_boxes', 'onere_testimonials_register_meta_boxes' );

function onere_testimonials_register_meta_boxes( $meta_boxes ) {
    

    // More fields..

    return $meta_boxes;
}