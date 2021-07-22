<?php

    /*
		==========================================
			LISTINGS CUSTOM POST TYPE
		==========================================

    */   
    function tierra_listings_custom_post_type(){

        $labels = array(
            'name' => 'Listings',
            'singular_name' => 'Listing',
            'add_new' => 'Add Listing',
            'all_items' => 'All Listings',
            'add_new_item' => 'Add Listing',
            'edit_item' => 'Edit Listing',
            'new_item' => 'New Listing',
            'view_item' => 'View Listing',
            'search_item' => 'Search Listing',
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
            'menu_icon' => 'dashicons-list-view',
            'menu_positions' => 7,
            'exclude_from_search' => false

        );

        register_post_type('listings', $args);

    }

    add_action('init', 'tierra_listings_custom_post_type');

    function tierra_listings_custom_taxonomies(){

        //add new taxonomi heirarchical
        $labels = array(
            'name' => 'Property Type', //Puede ser casas, depas, terrenos
            'singular_name' => 'Property Type',
            'search_items' => 'Search Properties',
            'all_items' => 'All Properties',
            'parent_item' => 'Parent Property', 
            'parent_item_colon' => 'Parent Property:',
            'edit_item' => 'Edit Property',
            'update_item' => 'Update Property',
            'add_new_item' => 'Add New Property', 
            'new_item_name' => 'New Property Name',
            'manu_name' => 'Property Type'
        );

        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_in_menu' => true,
            'show_ui' => true,
            'show_admin_column' => true, //muestra u oculta la columna en vista admon para filtrar
            'query_var' => true,
            'rewrite' => array('slug' => 'property-type') //Este parametro saldra en la URL
        );

        register_taxonomy('property_type', array('listings', 'rentals'), $args );

        //add new taxonomi NOT heirarchical

         register_taxonomy('regiones', array('listings','developments', 'rentals'), array(
            'label' => 'Areas',
            'show_ui' => true,
            'show_in_menu' => true,
            'show_admin_column' => true, //muestra u oculta la columna en vista admon para filtrar
            'query_var' => true,
            'rewrite' => array('slug' => 'area'), //Este parametro saldra en la URL
            'hierarchical' => true,
        ));


 
    }

    add_action('init', 'tierra_listings_custom_taxonomies');

      /*CONTACT META BOXES si quiero recolectar más campos del form solo tengo que añadirlos aquí */

          
add_filter( 'rwmb_meta_boxes', 'listings_register_meta_boxes' );

function listings_register_meta_boxes( $meta_boxes ) {
    
    $meta_boxes[] = [
        'title'      => 'Details',
        'post_types' => 'listings',

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
                'name'            => 'Disponibilidad',
                'id'              => 'avaliable',
                'type'            => 'select',
                'required'        => true,
                // Array of 'value' => 'Label' pairs
                'options'         => array(
                    'Disponible'  => 'Disponible',
                    'Apartado'    => 'Apartado',
                    'Vendido'     => 'Vendido',
                ),
                // Allow to select multiple value?
                'multiple'        => false,
                // Placeholder text
                'placeholder'     => 'Elige una opción',
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
            [
                'name' => 'Mostrar en Página de inicio',
                'id'   => 'featured_listing',
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
        'post_types' => 'listings',

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

  /*   $meta_boxes[] = [
        
        'title' => 'Tour virtual y video del lugar',
        'post_types' => 'listings',

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
    ]; */

     $meta_boxes[] = [
        
        'title' => 'Location',
        'post_types' => 'listings',

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
                'api_key'       => 'AIzaSyDEIE8JW9xGP_o3sCjG-0gNean42Q8UhC0',
            ]
        ],
    ];
    // More fields..

    return $meta_boxes;
}