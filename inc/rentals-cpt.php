<?php

    /*
		==========================================
			LISTINGS CUSTOM POST TYPE
		==========================================

    */   
    function onere_rentals_custom_post_type(){

        $labels = array(
            'name' => 'Rentals',
            'singular_name' => 'Rental',
            'add_new' => 'Add Rental',
            'all_items' => 'All Rentals',
            'add_new_item' => 'Add Rental',
            'edit_item' => 'Edit Rental',
            'new_item' => 'New Rental',
            'view_item' => 'View Rental',
            'search_item' => 'Search Rental',
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
            'menu_icon' => 'dashicons-money-alt',
            'menu_positions' => 7,
            'exclude_from_search' => false

        );

        register_post_type('rentals', $args);

    }

    add_action('init', 'onere_rentals_custom_post_type');

          
add_filter( 'rwmb_meta_boxes', 'onere_rentals_register_meta_boxes' );

function onere_rentals_register_meta_boxes( $meta_boxes ) {
    
    $meta_boxes[] = [
        'title'      => 'Details',
        'post_types' => 'rentals',

        'fields' => [
            [
                'id'      => 'precio-alta',
                'name'    => 'Precios temporada alta',
                'type'    => 'fieldset_text',
                'desc'    => 'Ingrese los precios de la temporada alta, por mes, semana y noche',
                // Options: array of key => Label for text boxes
                // Note: key is used as key of array of values stored in the database
                'options' => array(
                    'mes'    => 'Mes',
                    'semana' => 'Semana',
                    'noche' => 'Noche',
                ),
            
                // Is field cloneable?
                'clone' => false,
            ],
            [
                'id'      => 'precio-baja',
                'name'    => 'Precios temporada baja',
                'type'    => 'fieldset_text',
                'desc'    => 'Ingrese los precios de la temporada alta, por mes, semana y noche',
                // Options: array of key => Label for text boxes
                // Note: key is used as key of array of values stored in the database
                'options' => array(
                    'mes'    => 'Mes',
                    'semana' => 'Semana',
                    'noche' => 'Noche',
                ),
            
                // Is field cloneable?
                'clone' => false,
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
                'size'            => 30,
            ],
            [
                    'name'       => 'Tipo propiedad',
                    'id'         => 'taxonomy',
                    'type'       => 'taxonomy',
                    'size'       => 30,

                    // Taxonomy slug.
                    'taxonomy'   => 'property_type',

                    // How to show taxonomy.
                    'field_type' => 'radio_list',
            ],

            [
                    'name'       => 'Ubicación',
                    'id'         => 'location',
                    'type'       => 'taxonomy',
                    'size'  => 30,
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
                'size'  => 30,
            ],
            [
                'name'  => 'Baños',
                'desc'  => 'Solo números',
                'id'    => 'bathrooms',
                'type'  => 'number',
                'size'  => 30,
            ],
            [
                'name'            => 'Muebles',
                'id'              => 'furniture',
                'type'            => 'select',
                'size'            => 30,
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
                'name'  => 'Personas',
                'desc'  => 'Especifique un número máximo de personas',
                'id'    => 'rentals_capacity',
                'type'  => 'number',
                'size'  => 30,
            ],
            [
                'name'  => 'Estacionamiento',
                'desc'  => 'Especificar tipo de estacionamiento',
                'id'    => 'parking_stalls',
                'type'  => 'text',
                'size'  => 30,
            ],
            [
                'name' => 'Mostrar en homepage',
                'id'   => 'featured_rental',
                'type' => 'checkbox',
                'std'  => 0, // 0 or 1
            ],
            [
                'name'    => 'Datos generales',
                'id'      => 'amenities',
                'type'    => 'checkbox_list',
                'inline'  => 'true',
                // Options of checkboxes, in format 'value' => 'Label'
                'options' => array(
                    'Alberca'             => 'Alberca',
                    'Alberca para niños'  => 'Alberca para niños',
                    'Bar'                 => 'Bar',
                    'Restaurante'         => 'Restaurante',
                    'Terraza'             => 'Terraza',
                    'Gimnasio'            => 'Gimnasio',
                    'Spa'                 => 'Spa',
                    'Jardines'            => 'Jardines',
                    'Jacuzzi'             => 'Jacuzzi',
                    'Asador'              => 'Asador',
                    'Sauna'               => 'Sauna',
                    'Palapa'              => 'Palapa',
                    'Área para niños'     => 'Área para niños',
                    'Área para picnic'    => 'Área para picnic',
                    'Acceso a playa'      => 'Acceso a playa',
                    'Elevador'            => 'Elevador',
                    'Estacionamiento'     => 'Estacionamiento',
                    'Área de bodega'      => 'Área de bodega',
                    'Cuarto de servicio'  =>'Cuarto de servicio',
                    'Cuarto de lavado'    =>'Cuarto de lavado',
                    'Balcón'              =>'Balcón',
                    'Acceso controlado'   =>'Acceso controlado',
                    'Seguridad 24 horas'  =>'Seguridad 24 horas',
                    'Golf'                =>'Golf',
                    'Cancha de baloncesto'=>'Cancha de baloncesto',
                    'Cancha de tennis'    =>'Cancha de tennis',
                    'Servicio de limpieza'=>'Servicio de limpieza',
                ),
                // Display options in a single row?
                // 'inline' => true,
                // Display "Select All / None" button?
                'select_all_none' => false,
            ],
            
            // More fields.
        ],
    ];

    // Add more field groups if you want
    $meta_boxes[] = [
        
        'title' => 'Gallery',
        'post_types' => 'rentals',

        'fields' => [
            [
                'id'               => 'rental_gallery',
                'name'             => 'Image upload',
                'type'             => 'image_upload',
                'size'             => 30,

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

  /*   $meta_boxes[] = [
        
        'title' => 'Tour virtual y video del lugar',
        'post_types' => 'rentals',

        'fields' => [
             [
                'id'               => 'listing_video',
                'name'             => 'Video de Youtube',
                'desc'             => 'Por favor pegue el enlace ',
                'type'             => 'oembed',
                'size'             => 30,
             ],
            [
                'id'               => 'listing_tour',
                'name'             => 'Link del Tour virtual',
                'desc'             => 'Por favor pegue el enlace del Tour virtual" ',
                'type'             => 'text',
                'size'             => 30,
            ],
        ]
    ]; */

     $meta_boxes[] = [
        
        'title' => 'Location',
        'post_types' => 'rentals',

        'fields' => [
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