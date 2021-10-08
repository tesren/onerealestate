<?php
add_action( 'init', 'messages_register_post_type' );

function messages_register_post_type(){

    $labels = array(
        'menu_name'          =>  'Mensajes' ,
        'name_admin_bar'     =>  'Mensaje' ,
        'add_new'            =>  'Add Mensaje' ,
        'add_new_item'       =>  'Add new Mensaje' ,
        'new_item'           =>  'New Mensaje' ,
        'edit_item'          =>  'Edit Mensaje' ,
        'view_item'          =>  'View Mensaje' ,
        'update_item'        =>  'View Mensaje' ,
        'all_items'          =>  'All Mensajes' ,
        'search_items'       =>  'Search Mensajes' ,
        'parent_item_colon'  =>  'Parent Mensaje' ,
        'not_found'          =>  'No Mensajes found' ,
        'not_found_in_trash' =>  'No Mensajes found in Trash' ,
        'name'               =>  'Mensajes' ,
        'singular_name'      =>  'Mensaje' ,

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
        //'taxonomies' => array('category', 'post_tag'),
        'menu_icon' => 'dashicons-format-aside',
        'menu_positions' => 7,
        'exclude_from_search' => false

    );

    register_post_type('mensaje', $args);

}

add_action('init', 'messages_register_post_type');

add_filter( 'rwmb_meta_boxes', 'messages_register_meta_boxes' );

function messages_register_meta_boxes( $meta_boxes ) {

    $meta_boxes[] = [
        'title'   => 'Info del Mensaje de contacto' ,
        'post_types' => 'mensaje',
        
        'fields'  => [
            [
                'type' => 'text',
                'name' =>'Email', 'online-generator' ,
                'id'   =>   'contact_email',
                'desc' =>    'Email del contacto', 'online-generator' ,
            ],
            [
                'type' => 'text',
                'name' =>    'Asunto', 'online-generator' ,
                'id'   =>   'contact_asunto',
                'desc' =>    'Asunto del contacto', 'online-generator' ,
            ],
     /*        [
                'type' => 'number',
                'name' =>    'Phone', 'online-generator' ,
                'id'   =>   'contact_phone',
                'desc' =>    'Teléfono del contacto', 'online-generator' ,
            ], */
        ],
    ];

    return $meta_boxes;
}