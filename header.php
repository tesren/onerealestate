<!DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <meta charset="UTF-8">
        <title> </title>
         <meta charset="<?php bloginfo('charset');?>">
        <?php if( is_singular() && pings_open( get_queried_object() )  ) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
        <?php endif; ?>
        <?php wp_head();?>
        <!-- <link rel="shortcut icon" href="favicon.svg" type="image/x-icon"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--fuente-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <!--fancybox-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>
        
    </head>
    
    <body <?php body_class();?>>

      <!--NAVBAR-->
    <header class="fixed-top bg-light">
      <div class="container-fluid">
        <div class="row">
        
          <div class="col-12 col-md-9 col-lg-10">
            <nav class="navbar navbar-expand-lg navbar-light" role="navigation" style="position:relative;">
              <a class="navbar-brand" href="<?php echo get_home_url(); ?>" id="tr-header-brand-1">
                <img src="<?php echo get_template_directory_uri() .'/assets/svgs/ore/logo-one-real-estate-black.svg';?>" id="nav_heder_logo" alt="Logo One real estate">
              </a>
             
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
  
          <div class="col-12 col-md-3 col-lg-2 text-center" style="min-height:4px; background-color: #A28234; z-index: 1;">
              <div class="row g-0 justify-content-center" style="height:100%;">
                <div class="col-10 col-md-8 align-self-center">
                    <div class="row justify-content-center">
                      <span class="col-5 col-lg-12 text-4 d-none d-lg-block">Tour virtual</span>
                      <span class="col-6 col-lg-12 d-none d-lg-block" style="color:white;"> 322 100 8151</span>
                    </div>
                </div>
                <div class="col-2 col-md-2 align-self-center d-none d-lg-block" style="padding-left:0;">
                    <i class="fas fa-2x fa-phone my-1" style="color:white;"></i>
                </div>
              </div>
          </div>
       
        </div>
      </div>
    </header>
    <div class="contenedor-margin mt-3 mt-lg-5">

