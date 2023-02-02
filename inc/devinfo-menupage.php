<?php

add_menu_page(
    'Info Desarrollos',
    'Info Desarrollos',
    'read',
    'dev-info-realtors',
    'custom_admin_page',
    'dashicons-media-text',
    7
);

function load_custom_wp_admin_style($hook) {
	// Load only on ?page=mypluginname
	if( $hook != 'toplevel_page_dev-info-realtors' ) {
		return;
	}
	wp_enqueue_style( 'bootstrap_admin_css', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '5.2.0' , 'all'  );
	wp_enqueue_style( 'custom_wp_admin_css', get_template_directory_uri().'/assets/css/admin-styles.css', array(), '1.0' , 'all'  );
}

add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );



function custom_admin_page(){

    require_once( get_template_directory(). '/inc/devinfo-menupage-template.php' );

}