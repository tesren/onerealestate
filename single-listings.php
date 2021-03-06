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
                        <h3 class="py-1 text-center"><?php onere_get_list_terms(get_the_ID(),'regiones'); ?></h3>
                        
                    </div>

                </div>
            </div>

        </div>
        <div class="row pt-3 pt-lg-5">

            <div class="col-lg-6 order-2 order-lg-1">
                <div class="px-4 px-lg-5 pt-4"><?php echo the_content(); ?></div>

                <div class="row mt-5 text-center justify-content-evenly">

                    <div class="col-6 col-lg-3">
                        <i class="fas fa-ruler-combined fa-2x"></i> 
                        <span class="d-block fs-5"><?php echo onere_get_sqft(pll_current_language() ,rwmb_meta( 'lot_area' )); ?></span>
                    </div>
                    <div class="col-6 col-lg-3">
                        <i class="fas fa-home fa-2x"></i> 
                        <span class="d-block fs-5"><?php echo onere_get_sqft(pll_current_language() ,rwmb_meta( 'construction' ));?></span>
                    </div>
                    <div class="col-6 col-lg-3">
                        <i class="fas fa-bed fa-2x"></i> 
                        <span class="d-block fs-5"><?php echo rwmb_meta( 'bedrooms' );?> <?php pll_e('Recámaras');?></span>
                    </div>
                    <div class="col-6 col-lg-5">
                        <i class="fas fa-shower fa-2x"></i> 
                        <span class="d-block fs-5"><?php echo rwmb_meta( 'bathrooms' );?> <?php pll_e('Baños');?></span>
                    </div>
                    <div class="col-9 col-lg-5">
                        <i class="fas fa-couch fa-2x"></i> 
                        <span class="d-block fs-5"><?php echo pll_e(rwmb_meta( 'furniture' ));?></span>
                    </div>

                </div>

                <h2 class="py-3 mt-1 mt-lg-5 text-center" style="color:#A28234;">
                    <?php echo rwmb_meta( 'currency' );?> $<?php echo number_format( rwmb_meta( 'price' ) );?>
                </h2>
            </div>

            <div class="col-lg-6 order-1 order-lg-2">

                <?php $images = rwmb_meta( 'listing_gallery', array( 'size' => 'full', 'limit' => '1' ) );
                
                foreach ( $images as $image ) { ?> 
                <img class="w-100 img-fluid px-0" src="<?php echo $image['url']; ?>" alt="<?php the_title();?>">
                <?php } ?>

            </div>

        </div>

        <div class="row my-4">

            <div class="col-lg-6">
                <!--foto destacada-->
                <?php $photos = rwmb_meta( 'listing_gallery', array( 'size' => 'full', 'limit' => '2' ) );?>
                
                <img class="img-fluid w-100" src="<?php echo $photos[1]['url'];?>" alt="<?php echo $photo[1][ 'title' ];?>">
                
            </div>
            
           <!--datos generales-->
           <div class="col-lg-6 ps-2 ps-lg-4 datos-generales">
                <div class="row justify-content-start">
                    <h2 class="text-center fw-normal mt-2 mt-lg-4"><?php pll_e('Datos Generales');?></h2>
                    
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
                <?php $images = rwmb_meta( 'listing_gallery', array( 'size' => 'full' ) );
                    $j = 0;
        
                    foreach ( $images as $image ) { ?>
                        
                    <div class="<?php gallery_grid($j) ?> p-0 gallery-images">
                        <figure class="m-0 m-lg-1"><img class="img-fluid img-galerias w-100" data-fancybox="gallery-listings" data-caption="<?php echo $image['caption']?>" src="<?php echo $image['url'];?>" alt="<?php echo  $image['title'];?>"></figure>
                    </div>

                <?php $j++;}?>
            </div>

        </div>
        
        
          <!--mapa-->
          <div class="container-fluid text-center mt-5" style="position:relative;">
            <div class="row justify-content-center location-titles">

                <div class="col-12 col-lg-6 p-0">
                   
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

    get_footer();?>