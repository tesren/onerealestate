<?php get_header();?>

        <div class="container-fluid landing-desarrollos" style="position:relative;">
            <img class="w-100 img-fluid mobile-img" src="<?php echo get_template_directory_uri(). '/assets/images/desaLanding.jpg' ?>" alt="Renta">

            <div class="content">
                <h1 class="fw-light p-0 mb-0"><?php pll_e('DESARROLLOS');?></h1>
                <hr class="mt-0 mb-3" style="opacity:1;">
                <p class="fs-5"><?php pll_e('Desarrollos nuevos o en construcción que ofrecen una amplia gama de servicios y precios, desde viviendas de lujo hasta condominios.
                                La información sobre cualquiera de estos desarrollos, como su ubicación, servicios, imágenes e inventario, se puede encontrar en 
                                sus páginas de descripción haciendo clic en la fotos correspondiente a continuación')?></p>
                <a href="#archive-devs" class="btn btn1 mt-4"><?php pll_e('Más Info'); ?></a>
            </div>
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

            <div class="row justify-content-center my-5">

                <?php while( have_posts()):  the_post();

                    $images = rwmb_meta( 'more_photos', array( 'size' => 'large', 'limit' => '1' ) );
                    $logo = rwmb_meta( 'logo-dev', array( 'size' => 'large', 'limit' => '1' ) ); ?>      

                        <div class="col-11 col-md-5 col-lg-3 text-center mb-5" id="archive-devs">
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