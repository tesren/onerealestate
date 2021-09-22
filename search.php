<?php get_header();?>

    <?php if(have_posts()):?>
       
        
        <div class="row justify-content-evenly ms-0 ms-lg-2 mb-5 contenedor-margin">

            <div class="col-lg-3 p-0 text-center text-lg-start mt-3">
                <span class="fs-1 d-block fw-light" style="color: #76726A;"><?php echo pll_e('Resultados') ?></span>
            </div>

            <div class="col-lg-4 p-0 text-center text-lg-end mt-3">
                <?php get_search_form(); ?>
            </div>

        </div>

    <div class="row justify-content-center" id="search-page" style="min-height:80vh;">

       <?php while( have_posts() ): the_post(); 
            $portada = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ) , 'full' );
            $imagesListing = rwmb_meta( 'listing_gallery', array( 'size' => 'large', 'limit'=>1 ), get_the_ID() );
            $imagesRental = rwmb_meta( 'rental_gallery', array( 'size' => 'large' ,'limit'=>1), get_the_ID() );
            $imagesDevs = rwmb_meta( 'more_photos', array( 'size' => 'large', 'limit'=>1 ), get_the_ID() );
       ?>
        

            <div class="col-12 col-md-10 col-lg-8">


                <div class="row mb-3">

                    <div class="col-lg-4">
                        <a href="<?php echo get_the_permalink(); ?>">
                            <img style="border-radius:10px; height: 250px; object-fit:cover;" class="w-100" src="<?php 
                                if(!empty($imagesListing[0]['url']) ){
                                    echo $imagesListing[0]['url'];
                                }elseif(!empty($imagesRental[0]['url'])){
                                    echo $imagesRental[0]['url'];
                                }else{
                                    echo $imagesDevs[0]['url'];
                                } 
                            ?>" alt="">
                        </a>
                    </div>

                    <div class="col-lg-8">

                        <div class="d-flex mt-2">
                        
                            <span class="pr-type-archive px-2 me-2">
                                <?php 
                                    if( !empty($imagesListing[0]['url']) ){
                                        echo onere_get_property_type(get_the_ID(),'property_type');
                                    }elseif(!empty($imagesRental[0]['url'])){
                                        echo onere_get_property_type(get_the_ID(),'property_type');
                                    }else{
                                        pll_e('Desarrollo');
                                    } 
                                ?>
                            </span>
                            <span class="ms-2 fw-light"><?php echo get_the_date(); ?></span>
                        </div>
                        <a href="<?php echo get_the_permalink(); ?>">
                            <h2 class="fs-2 mt-1"><?php the_title(); ?></h2>
                            <p class="secondary-text"><?php echo get_the_excerpt(); ?></p>
                        </a>
                    </div>
                    <hr class="mt-2">
                </div>


            </div>

        
                
               
       <?php endwhile; 
            the_posts_pagination(); ?>

    </div>
    
    <?php else:?>
        <div class="container contenedor-margin text-center pt-5" style="height:80vh;">
            <div class="row justify-content-center my-5">
                <div class="col-11 col-md-10 col-lg-6">
                    <?php get_search_form(); ?>
                </div>
            </div>
            <h1 class="mb-5"><?php echo pll_e('No hay resultados');?></h1>
            <a class="btn btn1 w-25" href="<?php echo get_home_url(); ?>"><?php echo pll_e('Volver'); ?></a>
        </div>
        
    <?php endif; ?>


<?php get_footer(); ?>