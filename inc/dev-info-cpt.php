<?php

add_action( 'init', 'dev_info_register_post_type' );

function dev_info_register_post_type(){

    $labels = array(
        'menu_name'          => esc_html__( 'Información para Agentes', 'onere' ),
        'name_admin_bar'     => esc_html__( 'Información para Agentes', 'onere' ),
        'add_new'            => esc_html__( 'Agregar Info', 'onere' ),
        'add_new_item'       => esc_html__( 'Agregar Info', 'onere' ),
        'new_item'           => esc_html__( 'Nueva Info', 'onere' ),
        'edit_item'          => esc_html__( 'Editar Información', 'onere' ),
        'view_item'          => esc_html__( 'Ver Información para Agentes', 'onere' ),
        'update_item'        => esc_html__( 'Ver Información para Agentes', 'onere' ),
        'all_items'          => esc_html__( 'Información para Agentes', 'onere' ),
        'search_items'       => esc_html__( 'Buscar Info', 'onere' ),
        'parent_item_colon'  => esc_html__( 'Parent Información Agentes', 'onere' ),
        'not_found'          => esc_html__( 'No se encontró nada', 'onere' ),
        'not_found_in_trash' => esc_html__( 'No se encontró nada en la papelera', 'onere' ),
        'name'               => esc_html__( 'Información para Agentes', 'onere' ),
        'singular_name'      => esc_html__( 'Información para Agentes', 'onere' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'has_archive' => true,
        'publicly_queryable' =>  false,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'supports' => array(
            'title',
            //'editor',
            //'excerpt', 
            'thumbnail',
            'revisions',
			//'comments',
			//'author',
            //'page-attributes',
        ),
        //'taxonomies' => array('category', 'post_tag'),
        'menu_icon' => 'dashicons-media-text',
        'menu_positions' => 17,
        'exclude_from_search' => false,
        'show_in_nav_menus' => true,
    );

    register_post_type('dev-info', $args);

}

add_action('init', 'dev_info_register_post_type');


add_filter( 'rwmb_meta_boxes', 'dev_info_register_meta_boxes' );

function dev_info_register_meta_boxes( $meta_boxes ) {

    $meta_boxes[] = [
        'title'   => 'Archivos e información',
        'context' => 'normal',
        'post_types' => 'dev-info',

        'fields'  => [
            [
                'type' => 'file_advanced',
                'name' => 'Archivos e imagenes',
                'id'   => 'brochure',
                'desc' => 'Suba archivos de cualquier tipo con información del Desarrollo', 
                'max_file_uploads' => 20,
                'max_status'       => true,
                'required' => true,
            ],
            [
                'type' => 'text',
                'name' => 'Sitio web',
                'id'   => 'website',
                'desc' => 'Link del sitio web del proyecto',
                'placeholder' => 'Pegue el enlace tal cual y como viene sin modificarlo',
            ],
            [
                'type' => 'text',
                'name' => 'Recorrido virtual',
                'id'   => 'virtual_tour',
                'desc' => 'Link del recorrido virtual del proyecto',
                'placeholder' => 'Pegue el enlace tal cual y como viene sin modificarlo',
            ],
        ],
    ];

    return $meta_boxes;
}
