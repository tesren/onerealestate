<?php 

    get_header(); 

    if ( have_posts() ):
        
        while( have_posts() ) : the_post();
            //$currentlang = get_bloginfo('language');
             //Declarar array con etiquetas
?>
    <div class="container-fluid single-listings contenedor-margin">
        <div class="row">

            <div class="col-12 col-lg-6 mt-3">
                <div style="background-color: #ab9154;"><h1 class="text-center text-lg-start ms-0 ms-lg-5 mb-0"><?php the_title();?></h1></div>
                <div class="row justify-content-center justify-content-lg-end ">

                    <div style="background-color: #929292;" class="col-6 col-lg-4 p-0">
                        <h3 class="py-1 mb-0 text-center"><?php onere_get_list_terms(get_the_ID(),'regiones');?></h3>
                    </div>

                </div>
            </div>

        </div>
        <div class="row pt-3 pt-lg-5">

            <div class="col-lg-6 order-2 order-lg-1">
                <!--descripcion-->
                <div class="px-4 px-lg-5 pt-4"><?php echo the_content(); ?></div>

                <!--precios-->
                <?php 
                    $pricesBaja = rwmb_meta( 'precio-baja' ); 
                    $priceBnoche = $pricesBaja['noche'];
                    $priceBsemana = $pricesBaja['semana'];
                    $priceBmes = $pricesBaja['mes'];

                    $pricesAlta = rwmb_meta( 'precio-alta' ); 
                    $priceAnoche = $pricesAlta['noche'];
                    $priceAsemana = $pricesAlta['semana'];
                    $priceAmes = $pricesAlta['mes'];
                ?>

                    <div class="row mt-3" id="carouselPrecios" > 
                        <div class="col-lg-6">
                            <h2 class="col-12 pb-3 text-center"><?php pll_e('Precios Temporada Baja'); ?></h2>
                            <div class="row justify-content-center">
                                <?php if(!empty($priceBmes)){?>
                                <h3 class="col-5 p-0"><?php pll_e('Mes'); ?>:</h3>
                                <h3 class="p-0 col-5"><?php echo rwmb_meta( 'currency' );?> <i class="fas fa-dollar-sign"></i><?php echo number_format($priceBmes);?></h3>
                                <?php } if(!empty($priceBsemana)){?>
                                <h3 class="col-5 p-0"><?php pll_e('Semana'); ?>:</h3>
                                <h3 class="p-0 col-5"><?php echo rwmb_meta( 'currency' );?> <i class="fas fa-dollar-sign"></i><?php echo number_format($priceBsemana);?></h3>
                                <?php } if(!empty($priceBnoche)){?>
                                <h3 class="col-5 p-0"><?php pll_e('Noche'); ?>:</h3>
                                <h3 class="p-0 col-5"><?php echo rwmb_meta( 'currency' );?> <i class="fas fa-dollar-sign"></i><?php echo number_format($priceBnoche);?></h3>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <h2 class="col-12 pb-3 text-center mt-3 mt-lg-0"><?php pll_e('Precios Temporada Alta'); ?></h2>
                            <div class="row justify-content-center">
                                <?php if(!empty($priceAmes)){?>
                                <h3 class="col-5 p-0"><?php pll_e('Mes'); ?>:</h3>
                                <h3 class="p-0 col-5"><?php echo rwmb_meta( 'currency' );?> <i class="fas fa-dollar-sign"></i><?php echo number_format($priceAmes);?></h3>
                                <?php } if(!empty($priceAsemana)){?>
                                <h3 class="col-5 p-0"><?php pll_e('Semana'); ?>:</h3>
                                <h3 class="p-0 col-5"><?php echo rwmb_meta( 'currency' );?> <i class="fas fa-dollar-sign"></i><?php echo number_format($priceAsemana);?></h3>
                                <?php } if(!empty($priceAnoche)){?>
                                <h3 class="col-5 p-0"><?php pll_e('Noche'); ?>:</h3>
                                <h3 class="p-0 col-5"><?php echo rwmb_meta( 'currency' );?> <i class="fas fa-dollar-sign"></i><?php echo number_format($priceAnoche);?></h3>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

            </div>

            <div class="col-lg-6 order-1 order-lg-2">
                <?php $images = rwmb_meta( 'rental_gallery', array( 'size' => 'full', 'limit' => '2' ) );?>
                <img class="w-100 img-fluid px-0" src="<?php echo $images[0]['url']; ?>" alt="<?php the_title();?>" alt="">

                <div class="row pt-3 text-center justify-content-center">
                    <div class="col-4 col-lg-3">
                        <h5><i class="fas fa-male"></i> <?php echo rwmb_meta( 'rentals_capacity' );?></h5>
                    </div>
                    <div class="col-4 col-lg-3">
                        <h5><i class="fas fa-bed"></i> <?php echo rwmb_meta( 'bedrooms' );?></h5>
                    </div>
                    <div class="col-4 col-lg-3">
                        <h5><i class="fas fa-shower"></i> <?php echo rwmb_meta( 'bathrooms' );?></h5>
                    </div>
                    <div class="col-8 col-lg-3">
                        <h5><i class="fas fa-couch"></i> <?php echo pll_e(rwmb_meta( 'furniture' ));?></h5>
                    </div>
                </div>
            </div>

        </div>

        <div class="row my-4">

            <div class="col-lg-6">
                <!--foto destacada-->
                <img class="img-fluid w-100" src="<?php echo $images[1]['url'];?>" alt="<?php echo $ft_photo[ 'title' ];?>">
                        
            </div>
            
            <!--datos generales-->
            <div class="col-lg-6 ps-2 ps-lg-4 datos-generales">
                <div class="row justify-content-start">
                    <h2 class="text-center fw-normal mt-2 mt-lg-5"><?php pll_e('Datos Generales');?></h2>
                    
                    <?php $values = rwmb_meta( 'amenities' );
                        foreach ( $values as $value ): ?>
                            <div class="col-6 col-md-4 col-lg-4">
                                <p><?php echo pll_e($value); ?></p>                
                            </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>

        <!--Galeria de fotos-->
        <div class="container-fluid text-center" style="position:relative;">
            <div class="row justify-content-center mb-2 location-titles">
                <div class="col-12 col-lg-5 p-0">
                    <div style="background-color: #ab9154;"><h2 class="mb-0 ps-0 ps-lg-2"><?php pll_e('Galería'); ?></h2></div>
                </div>
                
                
            </div>
            <div class="row">
                <?php $images = rwmb_meta( 'rental_gallery', array( 'size' => 'full' ) );
                    $j = 0;
        
                    foreach ( $images as $image ) { ?>
                        
                    <div class="<?php gallery_grid($j) ?> p-0 gallery-images">
                        <figure class="m-0 m-lg-1"><img class="img-fluid img-galerias w-100" data-fancybox="gallery" data-caption="<?php echo $image['caption']?>" src="<?php echo $image['url'];?>" alt="<?php echo  $image['title'];?>"></figure>
                    </div>

                <?php $j++;}?>
            </div>

        </div>
        
        <!--mapa-->
        <div class="container-fluid text-center mt-5" style="position:relative;">
            <div class="row justify-content-center mb-2 location-titles">

                <div class="col-12 col-lg-5 p-0">
                   
                    <div style="background-color: #ab9154;"><h2 class="mb-0 ps-0 ps-lg-2"><?php pll_e('Ubicación'); ?></h2></div>

                    <div class="row justify-content-center">
                        <div class="col-6 col-lg-4 mb-3 mb-lg-0 p-0" style="background-color: #929292;">
                            <h3 class="py-1 mb-0 ps-0 ps-lg-2"><?php onere_get_list_terms(get_the_ID(),'regiones'); ?></h3>
                        </div>
                    </div>
                </div>
                
                
            </div>
                
            
            <?php $args = array(
                            'width'        => '100%',
                            'height'       => '500px',
                            'zoom'         => 14,
                            'marker'       => true,
                            //'marker_icon'  => 'https://url_to_icon.png',
                            //'marker_title' => 'Click me',
                            //'info_window'  => '<h3>Title</h3><p>Content</p>.',
                        );
                        
                        echo rwmb_meta( 'listings_map', $args );
            ?>
        </div>

         <!--contacto-->
         <div class="container-fluid my-5">
            <?php get_template_part( 'partials/content', 'contact-form' ); ?>
         </div>

           <!--boton whatsapp-->
        <?php 
            $permalink = get_the_permalink();
            $text = "Hola estoy interesado en la propiedad: ".get_the_title()." que vi en: ";
        ?>
        <a href="https://wa.me/523221008151?text=<?php echo $text, $permalink ?>" id="whatsapp" target="_blank" rel="noopener"> 
            <i class="fab fa-whatsapp"></i>
        </a>

    </div>


    <?php   

        endwhile;

    endif;

    get_footer();
