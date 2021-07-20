<?php

    /*
		==========================================
			Home ImageS CUSTOM POST TYPE
		==========================================

    */   
    function one_front_custom_post_type(){

        $labels = array(
            'name' => 'Galeria Home',
            'singular_name' => 'Home Image',
            'add_new' => 'Add Home Image',
            'all_items' => 'All Home Images',
            'add_new_item' => 'Add Home Image',
            'edit_item' => 'Edit Home Image',
            'new_item' => 'New Home Image',
            'view_item' => 'View Home Image',
            'search_item' => 'Search Home Image',
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
                //'editor',
                //'excerpt',
                //'thumbnail',
                'revisions',
            ),
            //'taxonomies' => array('category', 'post_tag'),
            'menu_icon' => 'dashicons-cover-image',
            'menu_positions' => 6,
            'exclude_from_search' => false

        );

        register_post_type('frontpage', $args);

    }

    add_action('init', 'one_front_custom_post_type');

    
      /*CONTACT META BOXES si quiero recolectar más campos del form solo tengo que añadirlos aquí */

          
add_filter( 'rwmb_meta_boxes', 'front_page_register_meta_boxes' );

function front_page_register_meta_boxes( $meta_boxes ) {
    


    // Add more field groups if you want
    $meta_boxes[] = [
        
        'title' => 'Galeria Home Page',
        'post_types' => 'frontpage',

        'fields' => [
            [
                'id'               => 'front_gallery',
                'name'             => 'Suba las imagenes que le gustaría que se muestren en el Home page',
                'type'             => 'image_upload',

                // Delete file from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same file for multiple posts
                'force_delete'     => false,

                // Maximum file uploads.
                'max_file_uploads' => 10,

                // Do not show how many files uploaded/remaining.
                'max_status'       => 'false',

                // Image size that displays in the edit page.
                'image_size'       => 'thumbnail',
            ],
        ]
    ];

    return $meta_boxes;
}