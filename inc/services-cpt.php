<?php

    /*
		==========================================
			SERVICES CUSTOM POST TYPE
		==========================================

    */   
    function one_services_custom_post_type(){

        $labels = array(
            'name' => 'Services page',
            'singular_name' => 'Services page',
            'add_new' => 'Add Services info',
            'all_items' => 'Services',
            'add_new_item' => 'Add Services info',
            'edit_item' => 'Edit Services page',
            'new_item' => 'New Services page',
            'view_item' => 'View Services page',
            'search_item' => 'Search',
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
                //'thumbnail',
                'revisions',
            ),
            //'taxonomies' => array('category', 'post_tag'),
            'menu_icon' => 'dashicons-admin-tools',
            'menu_positions' => 6,
            'exclude_from_search' => false

        );

        register_post_type('services', $args);

    }

    add_action('init', 'one_services_custom_post_type');

    
      /*CONTACT META BOXES si quiero recolectar más campos del form solo tengo que añadirlos aquí */

          
add_filter( 'rwmb_meta_boxes', 'services_register_meta_boxes' );

function services_register_meta_boxes( $meta_boxes ) {
    


    // Add more field groups if you want
    $meta_boxes[] = [
        
        'title' => 'Galería',
        'post_types' => 'services',

        'fields' => [
            [
                'id'               => 'services_gallery',
                'name'             => 'Suba las imagenes que le gustaría que se muestren en la página de servicios',
                'type'             => 'image_upload',

                // Delete file from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same file for multiple posts
                'force_delete'     => false,

                // Maximum file uploads.
                'max_file_uploads' => 15,

                // Do not show how many files uploaded/remaining.
                'max_status'       => 'false',

                // Image size that displays in the edit page.
                'image_size'       => 'thumbnail',
            ],
        ]
    ];

    $meta_boxes[] = [
    
        'title' => 'Servicios',
        'post_types' => 'services',

        'fields' => [
            [
                'name'              => 'Servicios',
                'label_description' => 'Ingresar un solo servicio por campo',
                'id'                => 'servicios_field',
                'desc'              => 'Ingresar un solo servicio por campo',
                'type'              => 'text',
                'clone'             => true,
                'placeholder'       => 'Escriba un servicio',
                'size'              => 40,
                'required'          =>true,
            ], 
        ]
    ];

    return $meta_boxes;
}