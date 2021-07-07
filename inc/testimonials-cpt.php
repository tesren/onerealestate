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
            'menu_icon' => 'dashicons-list-view',
            'menu_positions' => 7,
            'exclude_from_search' => false

        );

        register_post_type('testimonials', $args);

    }

    add_action('init', 'onere_testimonials_custom_post_type');

          
add_filter( 'rwmb_meta_boxes', 'onere_testimonials_register_meta_boxes' );

function onere_testimonials_register_meta_boxes( $meta_boxes ) {
    
    $meta_boxes[] = [
        'title'      => 'Details',
        'post_types' => 'testimonials',

        'fields' => [
            [
                'name'  => 'Precio',
                'desc'  => 'Solo numeros, sin signos ni puntos',
                'id'    => 'price',
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
                    'name'       => 'Tipo propiedad',
                    'id'         => 'taxonomy',
                    'type'       => 'taxonomy',

                    // Taxonomy slug.
                    'taxonomy'   => 'property_type',

                    // How to show taxonomy.
                    'field_type' => 'radio_list',
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
                'name'            => 'Muebles',
                'id'              => 'furniture',
                'type'            => 'select',
                // Array of 'value' => 'Label' pairs
                'options'         => array(
                    'Amueblado'       => 'Amueblado',
                    'Sin amueblar'       => 'Sin amueblar',
                    'Semi-amueblado' => 'Semi-amueblado'
                ),
                // Allow to select multiple value?
                'multiple'        => false,
                // Placeholder text
                'placeholder'     => 'Eliga una opción',
                // Display "Select All / None" button?
                'select_all_none' => false,
            ],
            [
                'name'  => 'Construcción',
                'desc'  => 'Solo números (m2)',
                'id'    => 'construction',
                'type'  => 'text',
            ],
            [
                'name'  => 'Lote',
                'desc'  => 'Solo números (m2)',
                'id'    => 'lot_area',
                'type'  => 'text',
            ],
            [
                'name'  => 'Estacionamiento',
                'desc'  => 'Especificar tipo de estacionamiento',
                'id'    => 'parking_stalls',
                'type'  => 'text',
            ],
            
            // More fields.
        ],
    ];

    // Add more field groups if you want
    $meta_boxes[] = [
        
        'title' => 'Gallery',
        'post_types' => 'testimonials',

        'fields' => [
            [
                'id'               => 'listing_gallery',
                'name'             => 'Image upload',
                'type'             => 'image_upload',

                // Delete file from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same file for multiple posts
                'force_delete'     => false,

                // Maximum file uploads.
                'max_file_uploads' => 40,

                // Do not show how many files uploaded/remaining.
                'max_status'       => 'false',

                // Image size that displays in the edit page.
                'image_size'       => 'thumbnail',
            ],
        ]
    ];

    $meta_boxes[] = [
        
        'title' => 'Tour virtual y video del lugar',
        'post_types' => 'testimonials',

        'fields' => [
             [
                'id'               => 'listing_video',
                'name'             => 'Video de Youtube',
                'desc'             => 'Por favor pegue el enlace ',
                'type'             => 'oembed',
             ],
            [
                'id'               => 'listing_tour',
                'name'             => 'Link del Tour virtual',
                'desc'             => 'Por favor pegue el enlace del Tour virtual" ',
                'type'             => 'text',
            ],
        ]
    ];

     $meta_boxes[] = [
        
        'title' => 'Location',
        'post_types' => 'testimonials',

        'fields' => [
            [
                'id'   => 'address',
                'name' => 'Address',
                'type' => 'text',
            ],
            // Map field.
            [
                'id'            => 'listings_map',
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
    // More fields..

    return $meta_boxes;
}