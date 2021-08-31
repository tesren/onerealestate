<?php

function onere_theme_support()
{
    //Add dinamyc title tag support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support( 'custom-header' );
}

add_action('after_setup_theme', 'onere_theme_support');

//ENABLE MENU FUNCTION

function onere_menus()
{    
    $locations = array(
        'primary' => __( 'Primary Menu', 'TierraRealEsatate' ),
        'pre-header' => __('Pre Header Menu', 'TierraRealEsatate'),
        'footer' => "Footer menu Items",
    );
    
    register_nav_menus( $locations );
}

add_action('init', 'onere_menus');


function onere_register_styles()
{
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style('onere-style', get_template_directory_uri() . "/style.css", array('onere-bootstrap'), $version , 'all');
    wp_enqueue_style('cb-bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css", array(), '5.1.0', 'all');
    //wp_enqueue_style('onere-bootstrap', get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), '5.0.0', 'all');
    wp_enqueue_style('lightslider', get_template_directory_uri() . "/assets/css/lightslider.css", array(), $version , 'all');
    wp_enqueue_style('onere-style-primary', get_template_directory_uri() . "/assets/css/onereal_styles.css", array(), $version , 'all');
    wp_enqueue_style('onere-fontawesome', get_template_directory_uri() . "/assets/css/all.min.css", array(), '5.15.1' , 'all');
    //Fontawesome cdn
    //wp_enqueue_style('cb-fontawesome', "/style.css", array(), '1.0', 'all');
    if ( is_page( 'progress-construction' ) ) {
        wp_enqueue_style('os-gallery', get_template_directory_uri() . "/assets/css/unite-gallery.css", array(), $version , 'all');
    }
}

add_action('wp_enqueue_scripts', 'onere_register_styles');


function onere_register_scripts()
{
    
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_script('onere_jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), '3.5.1', true);
    // wp_enqueue_script('cb_popper', 'https://unpkg.com/@popperjs/core@2/dist/umd/popper.js', array(), '2.0', true);
    wp_enqueue_script('cb_bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js', array(), '5.1.0', true);
    //wp_enqueue_script('one_bootstrap', get_template_directory_uri() .  '/assets/js/bootstrap.min.js', array(), '5.0.0', true);
    wp_enqueue_script('onere_gmaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDEIE8JW9xGP_o3sCjG-0gNean42Q8UhC0', array(), '', true);
    wp_enqueue_script('onere_fontawesome', get_template_directory_uri() .  '/assets/js/all.min.js', array(), '5.15.1', true);
    wp_enqueue_script('os_reallax', get_template_directory_uri() .  '/assets/js/vendor/rellax.min.js', array(), '1', true);
    wp_enqueue_script('lightslider', get_template_directory_uri() .  '/assets/js/lightslider.js', array(), $version, true);
    wp_enqueue_script('onere_main', get_template_directory_uri() .  '/assets/js/onere_main.js', array('onere_jquery'), $version, true);
    
    
}

add_action('wp_enqueue_scripts', 'onere_register_scripts');


// Async load
function os_async_scripts($url)
{
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
	return str_replace( '#asyncload', '', $url )."' async='async"; 
}

add_filter( 'clean_url', 'os_async_scripts', 11, 1 );


/*
		==========================================
			INCLUDE WALKER FILTER
		==========================================

	*/
    /**
     * Register Custom Navigation Walker
     */
    function register_navwalker(){
        require_once get_template_directory() . '/classes/class-wp-bootstrap-navwalker.php';
    }
    add_action( 'after_setup_theme', 'register_navwalker' );


    require get_template_directory() . '/inc/ajax.php';

    require get_template_directory() . '/inc/listings-cpt.php';

    require get_template_directory() . '/inc/rentals-cpt.php';

    require get_template_directory() . '/inc/developments-cpt.php';

    require get_template_directory() . '/inc/sales-team-cpt.php';

    require get_template_directory() . '/inc/testimonials-cpt.php';

    require get_template_directory() . '/inc/front-page-cpt.php';


    function check_post_type_and_remove_media_buttons() {
        global $current_screen;
        // Replace following array items with your own custom post types
        $post_types = array('listings','rentals', 'developments', 'realtors');
        if (in_array($current_screen->post_type,$post_types)) {
        remove_action('media_buttons', 'media_buttons');
        }
    }
    
    add_action('admin_head','check_post_type_and_remove_media_buttons');


    function onere_get_list_terms($postID, $taxonomy)
    {
         $terms_list = array_reverse(wp_get_post_terms( $postID, $taxonomy ) );

        $j =1;
        if ( ! empty( $terms_list ) && ! is_wp_error( $terms_list ) ) {
            foreach ( $terms_list as $term ) {
                echo $term->name;
                if( $j < count($terms_list) ){
                    echo ', ';
                }
                $j++;
            }
        }
    }

    function onere_get_property_type($postID, $taxonomy){
        
        $terms_list = array_reverse(wp_get_post_terms( $postID, $taxonomy ) );

        if ( ! empty( $terms_list ) && ! is_wp_error( $terms_list ) ) {
            foreach ( $terms_list as $term ) {
                echo $term->name;
            }
        }
    }

    function gallery_grid($loops){
        if($loops==0){
            echo'col-12 d-block col-lg-4';
        }
        else if( $loops > 0 && $loops<3){
            echo'col-12 d-none d-lg-block col-lg-4';
        }
        else if($loops>3 && $loops<8){
            echo 'd-none d-lg-block col-lg-3';
        }
        else{
            echo 'd-none d-lg-none';
        }

    }

    function check_empty_prices($precioNoche, $precioSemana, $precioMes){
        
        //si solo llenan un campo
        if(empty($precioMes) && empty($precioSemana)){
            return $precioNoche;
        }
        elseif(empty($precioNoche) && empty($precioSemana)){
            return $precioMes;
        }
        elseif( empty($precioNoche) && empty($precioMes)){
            return $precioSemana;
        }
        //si llenan 2
        elseif(empty($precioMes) && !empty($precioSemana) && !empty($precioNoche)){
            return $precioNoche;
        }
        elseif(empty($precioNoche) && !empty($precioSemana) && !empty($precioMes)){
            return $precioSemana;
        }
        elseif(empty($precioSemana) && !empty($precioNoche) && !empty($precioMes)){
            return $precioNoche;
        }
        //si llenan todos
        else{
            return $precioNoche;
        }
    }


?>