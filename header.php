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
        <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--fuente-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/css/splide.min.css">
        
    </head>
    
    <body <?php body_class();?>>

      <!--NAVBAR-->
    <header>
      <div class="container-fluid">
        <div class="row">
        
          <div class="col-12 col-md-9 col-lg-10">
            <nav class="navbar navbar-expand-xl navbar-light">
              <a class="navbar-brand" href="<?php echo get_home_url(); ?>" id="tr-header-brand-1">
                <img src="<?php echo get_template_directory_uri() .'/assets/svgs/ore/logo-one-real-estate-black.svg';?>" id="nav_heder_logo" alt="Logo Tierra" width="250px" height="auto">
              </a>
             
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
  
          <div class="col-12 col-md-3 col-lg-2 text-center" style="background-color: #A28234; z-index: 1;">
              <div class="row g-0 justify-content-center" style="height:100%;">
                <div class="col-10 col-md-8 align-self-center">
                    <span class="text-4">Tour virtual</span>
                    <span style="color:white;"> 322 100 2030</span>
                </div>
                <div class="col-2 col-md-2 align-self-center" style="padding-left:0;">
                    <i class="fas fa-2x fa-phone" style="color:white;"></i>
                </div>
              </div>
          </div>
       
        </div>
      </div>
    </header>

