<?php 

    get_header(); 

    if ( have_posts() ):
        
        while( have_posts() ) : the_post();
            //$currentlang = get_bloginfo('language');
             //Declarar array con etiquetas
?>
    <div class="container-fluid single-listings">
        <div class="row">

            <div class="col-12 col-lg-6">
                <div style="background-color: #ab9154;"><h1 class="text-center text-lg-start ms-0 ms-lg-5 mb-0"><?php the_title();?></h1></div>
                <div class="row justify-content-center justify-content-lg-end ">

                    <div style="background-color: #929292;" class="col-6 col-lg-4 p-0">
                        <h3 class="py-1 text-center"><?php 
                
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
                        ?></h3>
                        
                    </div>

                </div>
            </div>

        </div>
        <div class="row pt-3 pt-lg-5">

            <div class="col-lg-6 order-2 order-lg-1">
                <div class="px-4 px-lg-5 pt-4"><?php echo the_content(); ?></div>
                <h2 class="py-3 mt-1 mt-lg-5 text-center"><?php echo rwmb_meta( 'currency' );?> <i class="fas fa-dollar-sign"></i><?php echo number_format( rwmb_meta( 'price' ) );?> al mes</h2>
            </div>

            <div class="col-lg-6 order-1 order-lg-2">
                <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                <img class="w-100 img-fluid px-0" src="<?php echo $backgroundImg[0]; ?>" alt="<?php the_title();?>" alt="">

                <div class="row ps-4 ps-lg-5 pt-3 text-center">
                    <div class="col-6 col-lg-3">
                        <h5><i class="fas fa-ruler-combined"></i> <?php echo rwmb_meta( 'lot_area' );?> m<sup>2</sup></h5>
                    </div>
                    <div class="col-6 col-lg-3">
                        <h5><i class="fas fa-home"></i> <?php echo rwmb_meta( 'construction' );?> m<sup>2</sup></h5>
                    </div>
                    <div class="col-6 col-lg-3">
                        <h5><i class="fas fa-bed"></i> <?php echo rwmb_meta( 'bedrooms' );?></h5>
                    </div>
                    <div class="col-6 col-lg-3">
                        <h5><i class="fas fa-shower"></i> <?php echo rwmb_meta( 'bathrooms' );?></h5>
                    </div>
                </div>
            </div>

        </div>

        <div class="row my-4">

            <div class="col-lg-6">
                <!--foto destacada-->
                <?php $ft_photos = rwmb_meta( 'featured_img_2', array( 'size' => 'full' ) );
                                $l = 0;
                                    foreach ( $ft_photos as $ft_photo ) { ?>

                <img class="img-fluid w-100" src="<?php echo $ft_photo[ 'url' ];?>" alt="<?php echo $ft_photo[ 'title' ];?>">
                <?php $l++; }?>
                        
            </div>
            
            <!--datos generales-->
            <div class="col-lg-6">
                <div class="row">
                    <h2 class="text-center fw-normal">Datos Generales</h2>
                </div>
            </div>

        </div>
        
        <!--mapa-->
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
         <div class="container-fluid my-5">
            <?php get_template_part( 'partials/content', 'contact-form' ); ?>
         </div>

    </div>


    <?php   

        endwhile;

    endif;

    get_footer();
