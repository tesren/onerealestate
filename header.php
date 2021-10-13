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
  
          <div class="col-1 text-center d-none d-lg-flex" style="border-bottom: 2px solid #e5e5e5;">

            <a class=" btn-call mt-3 me-auto shadow-6" href="tel:3221008151" data-bs-toggle="tooltip" data-bs-placement="bottom" title="322-100-8151">
              <i class="fa fa-phone"></i>
            </a>

            <button title="<?php pll_e("Buscar");?>" type="button" class="btn mt-3 btn-search shadow-6" data-bs-toggle="modal" data-bs-target="#searchModal">
              <i class="fas fa-search"></i>
            </button>
    
          </div>

        </div>
      </div>
    </header>

    <?php 

    $regiones = get_terms( array(
        'taxonomy'          => 'regiones',
        'parent'            => 0,
        'hide_empty'        => false,
    ) );

    $propertiesType = get_terms( array(
        'taxonomy'          => 'property_type',
        'parent'            => 0,
        'hide_empty'        => false,
    ) );?>

    <!--Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title fs-2" id="searchModalLabel"><?php pll_e("Busqueda"); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form id="searchform" action="" method="get" onsubmit="redirect()">

                      <label for="regiones_s"><?php pll_e('Comprar o Rentar'); ?></label>
                      <select class="form-select w-100 mb-3" aria-label="Default select example" id="buysell" name="buysell" required>
                        <option value="" selected><?php pll_e('Selecciona uno');?></option>
                        <option value="<?php echo get_post_type_archive_link('listings'); ?>">Comprar</option>
                        <option value="<?php echo get_post_type_archive_link('rentals'); ?>">Rentar</option>
                      </select>

                        <label for="regiones_s"><?php pll_e('Ubicación'); ?></label>
                        <select class="form-select w-100 mb-3" aria-label="Default select example" id="regiones_s" name="regiones_s">
                            <option selected value=""><?php pll_e('Selecciona uno');?></option>
                            <?php foreach($regiones as &$category):
                                $childrenTerms =  get_term_children( $category->term_id, 'regiones' );

                                    foreach($childrenTerms as $child) :     
                                        $term = get_term_by( 'id', $child, 'regiones');?>
                                        <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                                    <?php endforeach; ?>

                            <?php endforeach; ?>
                        </select>

                        <div class="row">

                          <div class="col-6 ps-0">
                            <label for="type_s"><?php pll_e('Tipo de propiedad');?></label>
                            <select class="form-select w-100 mb-3" aria-label="Default select example" id="type_s" name="type_s">
                                <option selected value=""><?php pll_e('Selecciona uno');?></option>

                                <?php foreach($propertiesType as &$type):?>
                                    <option value="<?php echo $type->slug; ?>"><?php echo $type->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                          </div>

                          <div class="col-6 pe-0">
                            <label for="currency"><?php pll_e('Moneda');?></label>
                            <select class="form-select w-100 mb-3" aria-label="Default select example" id="currency" name="currency">
                              <option selected value=""><?php pll_e('Selecciona uno');?></option>
                              <option value="USD">USD</option>
                              <option value="MXN">MXN</option>
                            </select>
                          </div>

                        </div>                        

                        <div class="row justify-content-center mb-3">
                            <label class="text-center mb-2"><?php pll_e('Rango de precios')?></label>

                            <input class="col-3 search-form" type="number" name="minprice" id="minprice" placeholder="Min" readonly>
                            <span class="col-1 fs-4 text-center">-</span>
                            <input class="col-3 search-form" type="number" name="maxprice" id="maxprice" placeholder="Max" readonly>
                            <div id="slider-range-precios" class="mt-2 col-11"></div>
                           
                        </div>

                        <div class="row justify-content-center mb-3">
                            <label class="text-center mb-2"><?php pll_e('Rango de Recámaras'); ?></label>
                            <input class="col-3 search-form" type="number" name="minbeds" id="minbeds" placeholder="Min" readonly>
                            <span class="col-1 fs-4 text-center">-</span>
                            <input class="col-3 search-form" type="number" name="maxbeds" id="maxbeds" placeholder="Max" readonly>
                            <div id="slider-range-beds" class="mt-2 col-11"></div>
                        </div>

                   <!--      <div class="row justify-content-center mb-3">
                            <label class="text-center mb-2"><?php //pll_e('Rango de Personas'); ?></label>
                            <input class="col-3 search-form" type="number" name="minpeople" id="minpeople" placeholder="Min" readonly>
                            <span class="col-1 fs-4 text-center">-</span>
                            <input class="col-3 search-form" type="number" name="maxpeople" id="maxpeople" placeholder="Max" readonly>
                            <div id="slider-range-people" class="mt-2 col-11"></div>
                        </div> -->

                </div>

                <div class="modal-footer text-center">
                    <button  type="submit" class="btn btn1 w-100"><?php pll_e("Buscar"); ?></button>
                    </form>
                </div>

                </div>
            </div>
        </div><!-- End Modal -->