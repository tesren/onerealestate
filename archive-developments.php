<?php get_header();?>

<div class="container-fluid landing-desarrollos" style="position:relative;">
            <img class="w-100 img-fluid mobile-img" src="<?php echo get_template_directory_uri(). '/assets/images/desaLanding.jpg' ?>" alt="Renta">
            <h1 class="fw-bold p-0">DESARROLLOS</h1>
        </div>

      
        <form class="row my-5 text-center justify-content-center mx-3 mx-lg-0" action="">

            <select class="col-md-12 col-lg-2 form-select form-select-lg mx-0 mx-lg-2 mb-2 mb-lg-0" aria-label="form-select-lg lugar" name="lugar">
                <option selected>Elige un lugar</option>
                <option value="1">Puerto Vallarta</option>
                <option value="2">Bucerías</option>
                <option value="2">Punta de Mita</option>
                </option>
            </select>

            <div class="col-lg-2 form-floating px-0 px-lg-2 mb-4 mb-lg-0">
                <input type="number" class="form-control" id="max-price" placeholder="Precio" name="maxPrice">
                <label class="ms-2" for="max-price">Precio Máximo</label>
            </div>
            
            <div class="col-lg-3 px-0">
                <button type="submit" class="btn btn1">Buscar</button>
            </div>
            
        </form>


            <?php if( have_posts() ): 
                
                $i = 1;
                ?>

                <?php while( have_posts()):  the_post();

                    $images = rwmb_meta( 'more_photos', array( 'size' => 'large', 'limit' => '1' ) );?>

                    <div class="container text-center card-desarrollos mb-5 p-0">
                        <a href="<?php echo get_the_permalink(); ?>"><img class="w-100" src="<?php echo $images[0]['url'];?>" alt="<?php echo $images[0]['title'];?>"></a>
                        <h2 class="mt-3 col-12 mb-0"><?php echo get_the_title();?></h2>
                        <hr>

                        <div class="row justify-content-center justify-content-lg-start my-3">
                            <h4 class="col-11 col-lg-5"><i class="fas fa-map-marker-alt me-1"></i> <?php onere_get_list_terms(get_the_ID(), 'regiones'); ?></h4>
                            <h4 class="col-11 col-lg-5"><i class="fas fa-bed"></i> Desde <?php echo rwmb_meta('starting_at_bedrooms');?> Recámaras</h4>
                        </div>

                        <div class="row justify-content-center justify-content-lg-between pb-4">
                            <h3 class="col-11 col-lg-6 mb-3 mb-lg-0">Precios desde: <?php echo rwmb_meta('currency');?> $<?php echo number_format(rwmb_meta('starting_at'));?></h3>
                            <a class="boton-blanco col-12 col-lg-2 px-4" href="<?php echo get_the_permalink(); ?>">Más Info</a>
                        </div>
                    </div>


                <?php   
                    $i++;
                    endwhile; 
                    the_posts_pagination();
                    ?>
            
            <?php endif; ?>
                        

<?php get_footer(); ?>