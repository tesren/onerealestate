<?php

    /*
		==========================================
			CUSTOM PROPERTIES POST TYPE
		==========================================

    */
    
    function tierra_sales_team_cpt(){

        $labels = array(
            'name' => 'Realtors',
            'singular_name' => 'Realtor',
            'add_new' => 'Add Realtor',
            'all_items' => 'All Realtors',
            'add_new_items' => 'Add Realtor',
            'edit_item' => 'Edit Realtor',
            'new_item' => 'New Realtor',
            'view_item' => 'View Realtor',
            'search_item' => 'Search Realtor',
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
            'hierarchical' => true,
            'supports' => array(
                'title',
                //'editor',
                //'excerpt', 
                //'thumbnail',
                'revisions',
            ),
            //'taxonomies' => array('category', 'post_tag'),
            'menu_icon' => 'dashicons-businessman',
            'menu_positions' => 5,
            'exclude_from_search' => false,
            'show_in_nav_menus' => false,

        );

        register_post_type('realtors', $args);

    }

    add_action('init', 'tierra_sales_team_cpt');
    
    add_filter( 'rwmb_meta_boxes', 'tierra_realtors_register_meta_boxes' );

function tierra_realtors_register_meta_boxes( $meta_boxes ) {
    
     $meta_boxes[] = [
        'title'      => 'Personal information',
        'post_types' => 'realtors',

        'fields' => [
            [
                'name'  => 'Email',
                'desc'  => 'Correo electrónico',
                'id'    => 'realtor_email',
                'type'  => 'text',
            ],

            [
                'name'  => 'Phone',
                'desc'  => 'Teléfono',
                'id'    => 'realtor_phone_number',
                'type'  => 'text',
            ],
            [
                'name'  => 'Puesto',
                'desc'  => 'Posición de trabajo',
                'id'    => 'realtor_position',
                'type'  => 'text',
            ],
            [
                'id'               => 'profile_picture',
                'name'             => 'Foto de perfil',
                'type'             => 'image_upload',

                // Delete file from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same file for multiple posts
                'force_delete'     => false,

                // Maximum file uploads.
                'max_file_uploads' => 1,

                // Do not show how many files uploaded/remaining.
                'max_status'       => 'false',

                // Image size that displays in the edit page.
                'image_size'       => 'full',
            ],
            
            
            // More fields.
        ],
    ];



    return $meta_boxes;
}