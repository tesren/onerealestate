<!DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <meta charset="UTF-8">
        <title>One Real Estate</title>
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
    <header class="fixed-top bg-gradiente">
      <div class="container-fluid">
        <div class="row justify-content-center">
        
          <div class="col-12 col-lg-10" style="border-bottom: 2px solid #e5e5e5;">
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
  
          <div class="col-12 col-md-3 col-lg-1 text-center" >

            <a class="d-none d-lg-block btn-call mt-3 me-auto" href="tel:3221008151" data-bs-toggle="tooltip" data-bs-placement="bottom" title="322-100-8151">
              <i class="fa fa-phone"></i>
            </a>
    
          </div>
       
        </div>
      </div>
    </header>