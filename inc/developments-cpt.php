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
                'thumbnail',
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
                'thumbnail',
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
            
            // More fields.
        ],
    ];

    $meta_boxes[] = [
        
        'title' => 'Residencias Destacadas',
        'post_types' => 'developments',

        'fields' => [
            [
                'id'               => 'residences_gallery',
                'name'             => 'Image upload',
                'type'             => 'image_upload',
                'desc'             => 'Seleccione 4 fotos',

                // Delete file from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same file for multiple posts
                'force_delete'     => false,

                // Maximum file uploads.
                'max_file_uploads' => 4,

                // Do not show how many files uploaded/remaining.
                'max_status'       => 'false',

                // Image size that displays in the edit page.
                'image_size'       => 'thumbnail',
            ],
        ]
    ];

    $meta_boxes[] = [
        
        'title' => 'Galeria de Amenidades',
        'post_types' => 'developments',

        'fields' => [
            [
                'id'               => 'amenities_gallery',
                'name'             => 'Image upload',
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
    ];

    $meta_boxes[] = [
        
        'title' => 'Foto destacada 2',
        'post_types' => 'developments',

        'fields' => [
            [
                'id'               => 'featured_img_2',
                'name'             => 'Image upload',
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
    ];

    $meta_boxes[] = [
        
        'title' => 'Mas fotos',
        'post_types' => 'developments',

        'fields' => [
            [
                'id'               => 'more_photos',
                'name'             => 'Image upload',
                'type'             => 'image_upload',

                // Delete file from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same file for multiple posts
                'force_delete'     => false,

                // Maximum file uploads.
                'max_file_uploads' => 5,

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
            // [
            //     'id'   => 'address',
            //     'name' => 'Address',
            //     'type' => 'text',
            // ],
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
                'api_key'       => 'AIzaSyDlDmMESUjBK1gwNJm5x4hyoS90qacpJmY',
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
                'name'  => 'Precios',
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
                'placeholder'     => 'Seccione la moneda',
                // Display "Select All / None" button?
                'select_all_none' => false,
            ],
            [
                'name'  => 'Recámaras',
                'desc'  => 'Solo numeros',
                'id'    => 'bedrooms',
                'type'  => 'number',
            ],
            [
                'name'  => 'Baños',
                'desc'  => 'Solo números',
                'id'    => 'bathrooms',
                'type'  => 'number',
            ],
            [
                'name'  => 'Medios Baños',
                'desc'  => 'Solo números',
                'id'    => 'half_baths',
                'type'  => 'number',
            ],
            [
                'name'  => 'Construcción',
                'desc'  => 'Solo números (m2)',
                'id'    => 'construction',
                'type'  => 'text',
            ],

           
            
            // More fields.
        ],
    ];

    return $meta_boxes;
}


