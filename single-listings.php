<?php 

    get_header(); 

    if ( have_posts() ):
        
        while( have_posts() ) : the_post();
            $currentlang = get_bloginfo('language');
             //Declarar array con etiquetas
?>

    <div class="row">
        <div class="col-12">

        <div id="primary-slider" class="splide">
            <div class="splide__track">
                <ul class="splide__list">

                <?php

                    $images_full = rwmb_meta( 'listing_gallery', array( 'size' => 'full' ) );
                   
                        foreach ( $images_full as $image_full ) { ?>

                        <li class="splide__slide">
                            <img src="<?php echo $image_full['url'];?>" alt="<?php echo $image_full['title'];?>">
                        </li>

                <?php   }?>

                </ul>
            </div>
        </div>

        <div id="secondary-slider" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php

                    $images_full = rwmb_meta( 'listing_gallery', array( 'size' => 'thumbnail' ) );
                   
                        foreach ( $images_full as $image_full ) { ?>

                        <li class="splide__slide">
                            <img src="<?php echo $image_full['url'];?>" alt="<?php echo $image_full['title'];?>">
                        </li>

                    <?php    }?>
                </ul>
            </div>
        </div>


            <h1 class="mx-5 mt-5 mb-1"><?php the_title();?><h1>
            <h4 class="mx-5 mt-1 mb-2 fs-4">
            <?php 
            
                $locations = array_reverse(rwmb_meta( 'location' ));
   
                $i =1;
                if ( ! empty( $locations ) && ! is_wp_error( $locations ) ) {
                    foreach ( $locations as $location ) {
                        echo $location->name;
                        if( $i < count($locations) ){
                            echo ', ';
                        }
                        $i++;
                    }
                }
            ?>
            </h4>

            <div class="mx-5 my-2 fs-5">
                <p>
                    <?php echo the_content(); ?>

                </p>
            </div>

            
                
                <p class="mx-5 my-2 fs-5">
                    <?php if($currentlang == "en-US"){
                        echo rwmb_meta( 'place_description_en' );
                    }else{
                        echo rwmb_meta( 'place_description_es' );

                    } 
                    
                    ?>
                </p>
                

            <div class="row justify-content-center justify-content-md-start px-5">
                    <div class="col-10">
                        <hr style="width:70%;text-align:left;margin-left:0" id="listing-hr">
                        
                        <div class="row justify-content-start" id="services-icons">
                            
                            <div class="col-6 col-md-3">
                                <h4><i class="fas fa-bed"></i> <?php echo rwmb_meta( 'bedrooms' );?> recámaras</h4>
                            </div>

                            <div class="col-6 col-md-3">
                                <h4><i class="fas fa-shower"></i> <?php echo rwmb_meta( 'bathrooms' );?> baños</h4>
                            </div>

                            <div class="col-6 col-md-3">
                                <h4><i class="fas fa-home"></i> <?php echo rwmb_meta( 'construction' );?> m2 total</h4>
                            </div>
                        
                        </div>

                        <div>
                            <?php
                                $category = get_the_terms( $post->ID, 'property_type' ); 
                                $category_parent_id = $category[0]->category_parent;
                                if ( $category_parent_id != 0 ) {
                                    $category_parent = get_term( $category_parent_id, 'category' );
                                    $css_slug = $category_parent->slug;
                                } else {
                                    $css_slug = $category[0]->slug;
                                }

                                 
                                
                            ?>

                        </div>

                        <div class="row justify-content-start my-3" id="services-icons">
                            
                            <div class="col-6 col-md-3">
                                <h4><i class="fas fa-couch"></i> <?php echo rwmb_meta( 'furniture' );?> </h4>
                            </div>

                            <?php if( !empty(rwmb_meta( 'lot_area') ) ): ?>
                            <div class="col-6 col-md-3">
                                <h4><i class="fas fa-ruler-combined"></i> <?php echo rwmb_meta( 'lot_area' );?> m2 lote</h4>
                            </div>

                            <?php
                                endif;
                            ?>
                                
                                <?php if( !empty(rwmb_meta( 'parking_stalls') ) ): ?>
                                    
                                
                               <div class="col-6 col-md-3">
                                <!--Parkings-->
                                <h4><i class="fas fa-car"></i> <?php echo rwmb_meta( 'parking_stalls' );?> </h4>
                            </div>

                            <?php
                                endif;
                            ?>
                            
                        </div>

                        <div class="row justify-content-start my-3" id="services-icons">
                                <div class="col-12 col-md-5">
                                    <h3 class="fs-1 py-3"><?php echo rwmb_meta( 'currency' );?> <i class="fas fa-dollar-sign"></i><?php echo number_format( rwmb_meta( 'price' ) );?></h3>

                                </div>

                                <!-- <div class="col-12 col-md-3 my-4">
                                    <a href="#" class="mx-4 btn btn-amarillo">Ficha técnica</a>
                                </div> -->

                        </div>

                        
                        <hr style="width:70%;text-align:left;margin-left:0" id="listing-hr">
                    </div>
            </div>

            <div class="row">
                <!--div class="col-6 col-md-3">
                    <a href="#contact-form" class="my-3 mx-5 btn btn-amarillo">Agenda tu cita</a>
                </div-->

                <?php if( !empty(rwmb_meta( 'listing_tour') ) ): ?>
                <div class="col-6 col-md-3">
                     <a href="<?php echo rwmb_meta( 'listing_tour' );?>" class="my-3 mx-5 btn btn-amarillo" target="_blank" >Tour vitual</a>
                </div>

                <?php endif; ?>

            </div>
            

            <!--Servicios-->
            <!--div class="container-fluid">
            
                <div class="row justify-content-center my-5">
                
                <div class="col-12 align-self-center">
                    
                    <div class="row justify-content-center pb-5">
                    <hr class="mb-5" style="width:90%;text-align:center;">
                        <div class="col-md-3 col-6 pb-3">
                            <div class="d-flex align-items-center justify-content-center">
                            <h4 class="fs-4"><i class="fas fa-seedling"></i> Jardín</h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 pb-3">
                            <div class="d-flex align-items-center justify-content-center">
                            <h4 class="fs-4"><i class="fas fa-couch"></i> Sala</h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-12 pb-3">
                            <div class="d-flex align-items-center justify-content-center">
                            <h4 class="fs-4"><i class="fas fa-tint"></i> Agua</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-3 col-6 pb-3">
                            <div class="d-flex align-items-center justify-content-center">
                            <h4 class="fs-4"><i class="fas fa-chair"></i> Comedor</h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 pb-3">
                            <div class="d-flex align-items-center justify-content-center">
                            <h4 class="fs-4"><i class="fas fa-plug"></i> Luz</h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-12 pb-3">
                            <div class="d-flex align-items-center justify-content-center">
                            <h4 class="fs-4"><i class="fas fa-burn"></i> Gas</h4>
                            </div>
                        </div>
                        <hr class="mt-4" style="width:90%;text-align:center;">
                    </div>

                </div>
            </div>
        </div-->

        <!--Video-->
        <div id="video_listing" >
            <?php echo rwmb_meta( 'listing_video' );?>
        </div>
        

            <h2 class="fs-1 m-5 text-center">Ubicación</h2>
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
    
            <!--contacto-->
        <div class="container-fluid py-5">
            <?php get_template_part( 'partials/content', 'contact-form' ); ?>
        </div>

        </div>
    </div>

    <?php   

        endwhile;

    endif;

    get_footer();
