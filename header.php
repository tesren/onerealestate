<!DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <meta charset="UTF-8">
        <title>One Real Estate</title>
         <meta charset="<?php bloginfo('charset');?>">
        <?php if( is_singular() && pings_open( get_queried_object() )  ) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
        <?php endif; ?>
        <meta name="description" content="Desarrolladora Inmobiliaria y profesionales en Venta, Renta y Administracion de Propiedades Vallarta-Riviera Nayarit">
        <?php wp_head();?>
        <!-- <link rel="shortcut icon" href="favicon.svg" type="image/x-icon"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--fuente-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        
    </head>
    
    <body <?php body_class();?>>

      <!--NAVBAR-->
    <header class="fixed-top bg-gradiente">
      <div class="container-fluid">
        <div class="row justify-content-center" >
        
          <div class="col-12 col-lg-10" id="col-10-navbar" style="border-bottom: 2px solid #e5e5e5;">
            <nav class="navbar navbar-expand-lg navbar-dark" role="navigation" style="position:relative;">
              <a class="navbar-brand" href="<?php echo get_home_url(); ?>" id="tr-header-brand-1">
                <img src="<?php echo get_template_directory_uri() .'/assets/svgs/ore/logo-onere-blanco.svg';?>" id="nav_heder_logo" alt="Logo One real estate">
              </a>

              <!-- <a class="d-block d-lg-none" href="tel:3221008151"> <i class="fa fa-phone"></i></a> -->
             
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              
                <?php
                      wp_nav_menu( array(
                          'theme_location'    => 'primary',
                          'depth'             => 2,
                          'container'         => 'div',
                          'container_class'   => 'collapse navbar-collapse',
                          'container_id'      => 'navbarSupportedContent',
                          'menu_class'        => 'navbar-nav ms-auto text-uppercase',
                          'menu_id'           => 'ore_main_navbar',
                          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                          'walker'            => new WP_Bootstrap_Navwalker(),
                      ) );
                      ?>
            
            </nav>
          </div>
  
          <div class="col text-center d-none d-lg-flex" id="col-1-navbar" style="border-bottom: 2px solid #e5e5e5;">

            <a class=" btn-call mt-3 me-1 shadow-6" href="tel:3221008151" data-bs-toggle="tooltip" data-bs-placement="bottom" title="322-100-8151">
              <i class="fa fa-phone"></i>
            </a>

            <button title="<?php pll_e("Buscar");?>" type="button" class="btn mt-3 me-2 btn-search shadow-6" data-bs-toggle="modal" data-bs-target="#searchModal">
              <i class="fas fa-search"></i>
            </button>

            <a href="<?php echo wp_login_url( home_url().'/wp-admin/admin.php?page=dev-info-realtors'); ?>" class="btn btn-yellow align-self-center"><?php pll_e("INGRESAR");?></a>
    
          </div>

        </div>
      </div>
    </header>

  <!--Search Modal -->
  <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">

              <div class="modal-header">
                  <h5 class="modal-title fs-2" id="searchModalLabel"><?php pll_e("Busqueda"); ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                  <?php get_search_form( ); ?>
              </div>

              </div>
          </div>
  </div><!-- End Modal -->