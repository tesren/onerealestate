<?php get_header();?>


        <div class="container-fluid landing-desarrollos" style="position:relative;">
            <img class="w-100 img-fluid mobile-img" src="<?php echo get_template_directory_uri(). '/assets/images/renta-headImg.jpg' ?>" alt="Renta">
            <div class="content">
                <h1 class="fw-light p-0 mb-0"><?php pll_e('RENTA')?></h1>
                <hr class="mt-0 mb-3" style="opacity:1;">
                <p class="fs-5"><?php pll_e('Renta y Administracion de Propiedades en Puerto Vallarta-Riviera Nayarit')?></p>
                <a href="#all-rentals" class="btn btn1 mt-4"><?php pll_e('Más Info'); ?></a>
            </div>
        </div>

      
        <div class="row justify-content-center my-5">
            <div class="col-11 col-md-10 col-lg-6">
                <?php get_search_form(); ?>
            </div>
        </div>

        <div class="row p-0 mx-0 mb-5" id="all-rentals">

            <?php if( have_posts() ): 
                
                $i = 1;
                ?>
                
                <?php while( have_posts()):  the_post();
                $images = rwmb_meta( 'rental_gallery', array( 'size' => 'large', 'limit' => '1' ) );?>
            
                    
                    <div class="col-12 p-0 m-0 text-center text-lg-start listings-rentals <?php if( $i%2 == 0 ){echo 'listings-dorado';}?>">
                        <div class="row">
                            
                            <div class="col-lg-6 <?php if( $i%2 == 0 ){echo 'order-1 order-lg-2';}?>">
                                <?php foreach ( $images as $image ) {?>
                                    <a href="<?php echo get_the_permalink();?>">
                                        <img class="img-fluid w-100" src="<?php echo $image['url'];?>" alt="Rental image">
                                    </a>
                                <?php } ?>
                            </div>

                            <div class="col-lg-6 ps-0 pe-0 ps-lg-5 pt-3 <?php if( $i%2 == 0 ){echo 'order-2 order-lg-1 text-lg-end pe-lg-5';}?>">
                                <span class="pr-type-archive px-2"><?php echo onere_get_property_type(get_the_ID(),'property_type'); ?></span>
                                <h2 class="pt-2 pt-lg-1 "><?php echo get_the_title();?></h3>
                                <hr class="<?php if( $i%2 == 0 ){echo 'hr-dorado';}?>" >
                                <h5 class="my-3"><i class="fas fa-map-marker-alt me-1"></i><?php echo onere_get_list_terms( get_the_ID(), 'regiones' ); ?> 
                                </h5>
                                
                                
                                 <!--camas baños y construction-->
                                 <div class="row fw-bold fs-5 justify-content-center justify-content-lg-<?php if( $i%2 == 0 ){echo 'end';}else{echo 'start';}?> my-4">
                                    <span class="col-7 col-md-4">
                                        <i class="fas fa-bed"></i> 
                                        <?php echo rwmb_meta('bedrooms');?> <?php pll_e('Recámaras')?>
                                    </span>
                                    <span class="col-7 col-md-3">
                                        <i class="fas fa-shower"></i> 
                                        <?php echo rwmb_meta('bathrooms');?> <?php pll_e('Baños'); ?>
                                    </span>
                                    <span class="col-7 col-md-3">
                                        <i class="fas fa-male"></i>
                                        <?php echo rwmb_meta('rentals_capacity');?> <?php pll_e('Huéspedes') ?>
                                    </span>
                                </div>

                                <!--precio y moneda-->
                                <?php $pricesBaja = rwmb_meta( 'precio-baja' ); 
                                      $priceNoche = $pricesBaja['noche'];
                                      $priceSemana = $pricesBaja['semana'];
                                      $priceMes = $pricesBaja['mes'];
                                ?>
                                <span class="fw-light fs-4"><?php pll_e('Precios desde:')?></span>
                                <h2 class="my-1"><?php echo rwmb_meta( 'currency');?>$<?php echo number_format(check_empty_prices($priceNoche, $priceSemana, $priceMes));?></h2>

                                <a href="<?php echo get_the_permalink();?>" class="btn btn1 mt-3 mb-5 mb-lg-1"><?php pll_e('Más Info'); ?></a>
                            </div>

                        </div>
                    </div>

                
                                    
                <?php   $i++;
                        
                        endwhile; 
                        the_posts_pagination();
                        ?>
            
            <?php endif; ?>

        </div>
        
<?php get_footer(); ?>