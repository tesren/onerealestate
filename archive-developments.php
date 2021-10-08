<?php get_header();?>

        <div class="container-fluid landing-desarrollos" style="position:relative;">
            <img class="w-100 img-fluid mobile-img" src="<?php echo get_template_directory_uri(). '/assets/images/desaLanding.jpg' ?>" alt="Renta">

            <div class="content">
                <h1 class="fw-light p-0 mb-0"><?php pll_e('DESARROLLOS');?></h1>
                <hr class="mt-0 mb-3" style="opacity:1;">
                <p class="fs-5"><?php pll_e('Desarrollos nuevos o en construcción que ofrecen una amplia gama de servicios y precios, desde viviendas de lujo hasta condominios. La información sobre cualquiera de estos desarrollos, como su ubicación, servicios, imágenes e inventario, se puede encontrar en sus páginas de descripción haciendo clic en la fotos correspondiente a continuación')?></p>
                <a href="#archive-devs" class="btn btn1 mt-4"><?php pll_e('Más Info'); ?></a>
            </div>
        </div>

      
        <div class="row justify-content-center my-5">
            <div class="col-11 col-md-10 col-lg-6">
                <?php get_search_form(); ?>
            </div>
        </div>


            <?php if( have_posts() ): 
                
                $i = 1;
                ?>

            <div class="row justify-content-evenly my-5">

                <?php while( have_posts()):  the_post();

                    $images = rwmb_meta( 'more_photos', array( 'size' => 'large', 'limit' => '1' ) );
                    $logo = rwmb_meta( 'logo-dev', array( 'size' => 'large', 'limit' => '1' ) ); ?>      

                        <div class="col-11 col-md-5 col-lg-3 text-center mb-5 mx-1" id="archive-devs">
                            <a href="<?php echo get_the_permalink(); ?>">
                                <img class="w-100 shadow-5" src="<?php echo $images[0]['url'];?>" alt="<?php echo $images[0]['title'];?>" style="height: 500px; object-fit:cover;">
                                <h2 class="fs-1 my-2"><?php echo get_the_title();?></h2>
                            </a>

                            <span class="d-block my-2 fs-4"><i class="fas fa-map-marker-alt me-1"></i> <?php onere_get_list_terms(get_the_ID(), 'regiones'); ?></span>
                            <span class="d-block fw-light fs-4">
                                <strong class="fw-bold"><?php pll_e('Precios desde:')?></strong><br> 
                                <?php echo rwmb_meta('currency');?> $<?php echo number_format(rwmb_meta('starting_at'));?>
                            </span>

                            <a class="btn btn1 w-50 p-0 mt-2" href="<?php echo get_the_permalink(); ?>"><?php pll_e('Más Info')?></a>
                        </div>

                <?php   
                    $i++;
                    endwhile; 
                    the_posts_pagination();
                ?>

                </div><!--Row-->

            <?php endif; ?>
                        

<?php get_footer(); ?>