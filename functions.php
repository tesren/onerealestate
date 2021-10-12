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
    wp_enqueue_style('onere-style-primary', get_template_directory_uri() . "/assets/css/one_real_styles.css", array(), $version , 'all');
    wp_enqueue_style('onere-fontawesome', get_template_directory_uri() . "/assets/css/all.min.css", array(), '5.15.1' , 'all');
    //Fontawesome cdn
    //wp_enqueue_style('cb-fontawesome', "/style.css", array(), '1.0', 'all');
    wp_enqueue_style('range-slider', get_template_directory_uri() . "/assets/css/jquery-ui.min.css", array(), $version , 'all');
    
}

add_action('wp_enqueue_scripts', 'onere_register_styles');


function onere_register_scripts()
{
    
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_script('onere_jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), '3.5.1', true);
    wp_enqueue_script('range_slider', get_template_directory_uri().'/assets/js/jquery-ui.min.js', array(), '2.0', true);
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

    require get_template_directory() . '/inc/messages-cpt.php';

    //require get_template_directory() . '/inc/services-cpt.php';


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

    function onere_get_sqft( $lang, $val){

        if( !empty($val) )
        {
            if($lang === 'en' ){
                return number_format($val * 10.76 ) . ' ft²'; 
            }
            else
            {
                return number_format( $val ) . 'm²';
            }
        }else{
             return '0';
        }  
    }

    function tierra_set_strings_transtaltion(){
        
        $strings = array(
            array(
                'name'     =>'servicios',
                'string'   =>'Servicios',
                'group'    =>'Servicios',
                'multiline'=>false,
            ),
            array(
                'name'     =>'services-mayus',
                'string'   =>'SERVICIOS',
                'group'    =>'Servicios',
                'multiline'=>false,
            ),
            array(
                'name'     =>'nuestros',
                'string'   =>'Nuestros',
                'group'    =>'Servicios',
                'multiline'=>false,
            ),
            array(
                'name'     =>'tour_virtual',
                'string'   =>'Tour Virtual',
                'group'    =>'Header',
                'multiline'=>false,
            ),
            array(
                'name'     =>'properties_for',
                'string'   =>'PROPIEDADES EN',
                'group'    =>'Front Page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'sale',
                'string'   =>'VENTA',
                'group'    =>'Front Page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'more_info',
                'string'   =>'Más Info',
                'group'    =>'Front Page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'rent',
                'string'   =>'RENTA',
                'group'    =>'Front Page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'for_sale',
                'string'   =>'EN RENTA',
                'group'    =>'Front Page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'from',
                'string'   =>'Desde',
                'group'    =>'Front Page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'rent_sale_properties',
                'string'   =>'RENTA Y VENTA DE PROPIEDADES',
                'group'    =>'Front Page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'En',
                'string'   =>'EN',
                'group'    =>'Front Page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'Luxury properties',
                'string'   =>'Propiedades de lujo',
                'group'    =>'Front Page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'Testimonials',
                'string'   =>'TESTIMONIALES',
                'group'    =>'Front Page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'Speak to agent',
                'string'   =>'Hablar con un asesor',
                'group'    =>'Front Page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'Sell or rent a',
                'string'   =>'¿Quieres vender o rentar un',
                'group'    =>'Front Page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'inmueble',
                'string'   =>'inmueble?',
                'group'    =>'Front Page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'bedrooms',
                'string'   =>'Recámaras',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'contact',
                'string'   =>'Contacto',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'bathrooms',
                'string'   =>'Baños',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'error-404',
                'string'   =>'Error 404, el URL no existe',
                'group'    =>'Error404',
                'multiline'=>false,
            ),
            array(
                'name'     =>'volver_inicio',
                'string'   =>'Volver a Inicio',
                'group'    =>'Error404',
                'multiline'=>false,
            ),
            array(
                'name'     =>'developments-Mayus',
                'string'   =>'DESARROLLOS',
                'group'    =>'Desarrollos',
                'multiline'=>false,
            ),
            array(
                'name'     =>'developments-desc',
                'string'   =>'Desarrollos nuevos o en construcción que ofrecen una amplia gama de servicios y precios, desde viviendas de lujo hasta condominios. La información sobre cualquiera de estos desarrollos, como su ubicación, servicios, imágenes e inventario, se puede encontrar en sus páginas de descripción haciendo clic en la fotos correspondiente a continuación',
                'group'    =>'Desarrollos',
                'multiline'=>false,
            ),
            array(
                'name'     =>'prices-from',
                'string'   =>'Precios desde:',
                'group'    =>'Desarrollos',
                'multiline'=>false,
            ),
            array(
                'name'     =>'venta-y-admin',
                'string'   =>'Venta y Administracion de Propiedades en Puerto Vallarta-Riviera Nayarit',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'renta-y-admin',
                'string'   =>'Renta y Administracion de Propiedades en Puerto Vallarta-Riviera Nayarit',
                'group'    =>'Rentals',
                'multiline'=>false,
            ),
            array(
                'name'     =>'people',
                'string'   =>'Huéspedes',
                'group'    =>'Rentals',
                'multiline'=>false,
            ),
            array(
                'name'     =>'professionals',
                'string'   =>'Profesionales en Venta, Renta y Administracion de Propiedades en Puerto Vallarta-Riviera Nayarit',
                'group'    =>'Services',
                'multiline'=>false,
            ),
            array(
                'name'     =>'join-us',
                'string'   =>'ÚNETE',
                'group'    =>'Únete page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'join-our-team',
                'string'   =>'Únete a nuestro equipo de Profesionales de Venta, Renta y Administracion de Propiedades en Puerto Vallarta-Riviera Nayarit',
                'group'    =>'Únete page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'why-us',
                'string'   =>'¿POR QUÉ DEBERÍAS TRABAJAR AQUÍ?',
                'group'    =>'Únete page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'best-option',
                'string'   =>'La mejor opción para ti',
                'group'    =>'Únete page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'exp-in-realestate',
                'string'   =>'Experiencia en Bienes Raíces',
                'group'    =>'Únete page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'exelent-team',
                'string'   =>'Excelente equipo de trabajo',
                'group'    =>'Únete page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'our-single',
                'string'   =>'Nuestro',
                'group'    =>'Únete page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'team',
                'string'   =>'Equipo',
                'group'    =>'Únete page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'phone',
                'string'   =>'Teléfono',
                'group'    =>'Únete page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'email',
                'string'   =>'Correo',
                'group'    =>'Únete page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'join-our-team',
                'string'   =>'Únete a nuestro equipo',
                'group'    =>'Únete page',
                'multiline'=>false,
            ),
            array(
                'name'     =>'bedrooms-from',
                'string'   =>'Recámaras desde:',
                'group'    =>'Desarrollos',
                'multiline'=>false,
            ),
            array(
                'name'     =>'location',
                'string'   =>'Locación',
                'group'    =>'Desarrollos',
                'multiline'=>false,
            ),
            array(
                'name'     =>'ubication',
                'string'   =>'Ubicación',
                'group'    =>'Desarrollos',
                'multiline'=>false,
            ),
            array(
                'name'     =>'inventory',
                'string'   =>'Inventario',
                'group'    =>'Desarrollos',
                'multiline'=>false,
            ),
            array(
                'name'     =>'general-data',
                'string'   =>'Datos Generales',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'gallery',
                'string'   =>'Galería',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'furnished',
                'string'   =>'Amueblado',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'unfurnished',
                'string'   =>'Sin amueblar',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'semi-furnished',
                'string'   =>'Semi-amueblado',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'prices-low',
                'string'   =>'Precios Temporada Baja',
                'group'    =>'Rentals',
                'multiline'=>false,
            ),
            array(
                'name'     =>'prices-high',
                'string'   =>'Precios Temporada Alta',
                'group'    =>'Rentals',
                'multiline'=>false,
            ),
            array(
                'name'     =>'month',
                'string'   =>'Mes',
                'group'    =>'Rentals',
                'multiline'=>false,
            ),
            array(
                'name'     =>'week',
                'string'   =>'Semana',
                'group'    =>'Rentals',
                'multiline'=>false,
            ),
            array(
                'name'     =>'night',
                'string'   =>'Noche',
                'group'    =>'Rentals',
                'multiline'=>false,
            ),
            array(
                'name'     =>'pool',
                'string'   =>'Alberca',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'kids-pool',
                'string'   =>'Alberca para niños',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'restaurant',
                'string'   =>'Restaurante',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'rooftop',
                'string'   =>'Terraza',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'gym',
                'string'   =>'Gimnasio',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'gardens',
                'string'   =>'Jardines',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'grill',
                'string'   =>'Asador',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'palm-roof',
                'string'   =>'Palapa',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'kids-area',
                'string'   =>'Área para niños',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'picnic-area',
                'string'   =>'Área para picnic',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'beach-access',
                'string'   =>'Acceso a playa',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'elevator',
                'string'   =>'Elevador',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'parking',
                'string'   =>'Estacionamiento',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'storage',
                'string'   =>'Área de bodega',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'service-room',
                'string'   =>'Cuarto de servicio',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'laundry-room',
                'string'   =>'Cuarto de lavado',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'Balcony',
                'string'   =>'Balcón',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'controled-access',
                'string'   =>'Acceso controlado',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'beach-club',
                'string'   =>'Club de playa',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'24-security',
                'string'   =>'Seguridad 24 horas',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'basket-court',
                'string'   =>'Cancha de baloncesto',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'tennis-court',
                'string'   =>'Cancha de tennis',
                'group'    =>'Amenidades',
                'multiline'=>false,
            ),
            array(
                'name'     =>'avaliable',
                'string'   =>'Disponible',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'on-hold',
                'string'   =>'Apartado',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'sold',
                'string'   =>'Vendido',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'search',
                'string'   =>'Buscar',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'results',
                'string'   =>'Resultados',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'development',
                'string'   =>'Desarrollo',
                'group'    =>'Desarrollos',
                'multiline'=>false,
            ),
            array(
                'name'     =>'go-back',
                'string'   =>'Volver',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'no-results',
                'string'   =>'No hay resultados',
                'group'    =>'Listings',
                'multiline'=>false,
            ),
            array(
                'name'     =>'our-team-desc',
                'string'   =>'Nuestro equipo de Profesionales cuenta con una amplia experiencia en Venta, Renta y Administracion de Propiedades en Puerto Vallarta-Riviera Nayarit. Contactanos para que formes parte de este gran equipo.',
                'group'    =>'Únete page',
                'multiline'=>false,
            ),
        );


        foreach ($strings as $string ) {
            
            pll_register_string( $string['name'], $string['string'], $string['group'], $string['multiline'] );
        };

    }

    add_action('init', 'tierra_set_strings_transtaltion');


?>