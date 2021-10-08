<?php

    /*
		==========================================
			CUSTOM PROPERTIES POST TYPE
		==========================================

    */
    function tierra_re_developments_cpt(){

        $labels = array(
            'name' => 'Developments',
            'singular_name' => 'Development',
            'add_new' => 'Add Development',
            'all_items' => 'All Developments',
            'add_new_items' => 'Add Development',
            'edit_item' => 'Edit Development',
            'new_item' => 'New Development',
            'view_item' => 'View Development',
            'search_item' => 'Search Development',
            'not_found' => 'No items found',
            'parent_item_colon' => 'Parent item'

        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'has_archive' => true,
            'publicly_queryable' =>  true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'supports' => array(
                'title',
                'editor',
                //'excerpt', 
                //'thumbnail',
                'revisions',
                //'page-attributes',
            ),
            //'taxonomies' => array('category', 'post_tag'),
            'menu_icon' => 'dashicons-building',
            'menu_positions' => 17,
            'exclude_from_search' => false,
            'show_in_nav_menus' => true,
        );

        register_post_type('developments', $args);

    }

    add_action('init', 'tierra_re_developments_cpt');


    function tierra_development_inventory_cpt(){

        $labels = array(
            'name' => 'Inventory',
            'singular_name' => 'Inventory',
            'add_new' => 'Add unit',
            'all_items' => 'All units',
            'add_new_items' => 'Add unit',
            'edit_item' => 'Edit unit',
            'new_item' => 'New unit',
            'view_item' => 'View unit',
            'search_item' => 'Search unit',
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
                //'page-attributes',
            ),
            //'taxonomies' => array('category', 'post_tag'),
            'menu_icon' => 'dashicons-admin-multisite',
            'menu_positions' => 6,
            'exclude_from_search' => false,
            'show_in_nav_menus' => false,

        );

        register_post_type('inventory', $args);

    }

    add_action('init', 'tierra_development_inventory_cpt');


    
add_filter( 'rwmb_meta_boxes', 'developments_register_meta_boxes' );

function developments_register_meta_boxes( $meta_boxes ) {
    
     $meta_boxes[] = [
        'title'      => 'Details',
        'post_types' => 'developments',

        'fields' => [
            [
                'name'  => 'Precios desde',
                'desc'  => 'Solo números, sin signos ni puntos',
                'id'    => 'starting_at',
                'type'  => 'text',
            ],
            [
                'name'            => 'Moneda',
                'id'              => 'currency',
                'type'            => 'select',
                // Array of 'value' => 'Label' pairs
                'options'         => array(
                    'USD'       => 'USD',
                    'MXN'       => 'MXN',
                ),
                // Allow to select multiple value?
                'multiple'        => false,
                // Placeholder text
                'placeholder'     => 'Seleccione la moneda',
                // Display "Select All / None" button?
                'select_all_none' => false,
            ],
            [
                    'name'       => 'Ubicación',
                    'id'         => 'location',
                    'type'       => 'taxonomy',

                    // Taxonomy slug.
                    'taxonomy'   => 'regiones',

                    // How to show taxonomy.
                    'field_type' => 'select_tree',
            ],
            [
                'name'  => 'Recámaras desde ',
                'desc'  => 'Ejemplo: 3,4,5 o 3-6',
                'id'    => 'starting_at_bedrooms',
                'type'  => 'text',
            ],
            
            // More fields.
        ],
    ];

/*     $meta_boxes[] = [
        
        'title' => 'Logo del Desarrollo',
        'post_types' => 'developments',

        'fields' => [
            [
                'id'               => 'logo-dev',
                'name'             => 'Suba el logo del Desarrollo que sera mostrado en la página',
                'type'             => 'image_upload',

                // Delete file from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same file for multiple posts
                'force_delete'     => false,

                // Maximum file uploads.
                'max_file_uploads' => 1,

                // Do not show how many files uploaded/remaining.
                'max_status'       => 'false',

                // Image size that displays in the edit page.
                'image_size'       => 'thumbnail',
            ],
        ]
    ]; */
/* 
    $meta_boxes[] = [
        
        'title' => 'Galeria de Amenidades',
        'post_types' => 'developments',

        'fields' => [
            [
                'id'               => 'amenities_gallery',
                'name'             => 'Suba imagenes solamente de las amenidades',
                'type'             => 'image_upload',

                // Delete file from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same file for multiple posts
                'force_delete'     => false,

                // Maximum file uploads.
                'max_file_uploads' => 30,

                // Do not show how many files uploaded/remaining.
                'max_status'       => 'false',

                // Image size that displays in the edit page.
                'image_size'       => 'thumbnail',
            ],
        ]
    ]; */

   

    $meta_boxes[] = [
        
        'title' => 'Galería de fotos generales',
        'post_types' => 'developments',

        'fields' => [
            [
                'id'               => 'more_photos',
                'name'             => 'Suba fotos generales del desarrollo',
                'type'             => 'image_advanced',
                'desc'             => 'Las dos primeras imagenes no deben tener texto y deben ser de la fachada, de preferencia',

                // Delete file from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same file for multiple posts
                'force_delete'     => false,

                // Maximum file uploads.
                'max_file_uploads' => 30,

                // Do not show how many files uploaded/remaining.
                'max_status'       => 'false',

                // Image size that displays in the edit page.
                'image_size'       => 'thumbnail',
            ],
        ]
    ];

    $meta_boxes[] = [
        
        'title' => 'Location',
        'post_types' => 'developments',

        'fields' => [
     
            // Map field.
            [
                'id'            => 'development_map',
                'name'          => 'Location',
                'type'          => 'map',

                // Default location: 'latitude,longitude[,zoom]' (zoom is optional)
                'std'           => '20.6985662,-105.3090504,14',

                // Address field ID
                'address_field' => 'address',

                // Google API key
                'api_key'       => 'AIzaSyDEIE8JW9xGP_o3sCjG-0gNean42Q8UhC0',
            ]
        ],
    ];

    return $meta_boxes;
}


add_filter( 'rwmb_meta_boxes', 'development_inventory_register_meta_boxes' );

function development_inventory_register_meta_boxes( $meta_boxes ) {
    
     $meta_boxes[] = [
        'title'      => 'Details',
        'post_types' => 'inventory',

        'fields' => [
            [
                'name'  => 'Precios desde',
                'desc'  => 'Solo números, sin signos ni puntos',
                'id'    => 'starting_at',
                'type'  => 'text',
                'required'=> true,
            ],
            [
                'name'            => 'Moneda',
                'id'              => 'currency',
                'type'            => 'select',
                // Array of 'value' => 'Label' pairs
                'options'         => array(
                    'USD'       => 'USD',
                    'MXN'       => 'MXN',
                ),
                // Allow to select multiple value?
                'multiple'        => false,
                // Placeholder text
                'placeholder'     => 'Seccione la moneda',
                // Display "Select All / None" button?
                'select_all_none' => false,
            ],
            [
                'name'  => 'Recámaras',
                'desc'  => 'Solo numeros',
                'id'    => 'bedrooms',
                'type'  => 'number',
                'required'=> true,
            ],
            [
                'name'  => 'Baños',
                'desc'  => 'Solo números',
                'id'    => 'bathrooms',
                'type'  => 'number',
                'required'=> true,
            ],
            [
                'name'  => 'Modelo',
                'desc'  => 'Especifique el tipo de Modelo de la unidad',
                'id'    => 'model_type',
                'type'  => 'text',
            ],
            [
                'name'  => 'Construcción',
                'desc'  => 'Solo números (m2)',
                'id'    => 'construction',
                'type'  => 'text',
                'required'=> true,
            ],
            [
                'name'            => 'Estado unidad(es)',
                'id'              => 'status',
                'type'            => 'select',
                // Array of 'value' => 'Label' pairs
                'options'         => array(
                    'Disponible'    => 'Disponible',
                    'Apartado'      => 'Apartado',
                    'Vendido'       => 'Vendido',
                ),
                // Allow to select multiple value?
                'multiple'        => false,
                // Placeholder text
                'placeholder'     => 'Elija uno',
                // Display "Select All / None" button?
                'select_all_none' => false,
                'required'=> true,
            ],
            [
                'id'               => 'inventory_gallery',
                'name'             => 'Imagenes de la unidad',
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

           
            
            // More fields.
        ],
    ];

    return $meta_boxes;
}


