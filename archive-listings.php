<?php get_header();?>


        <div class="container-fluid landing-desarrollos" style="position:relative;">
            <img class="w-100 img-fluid mobile-img" src="<?php echo get_template_directory_uri(). '/assets/images/renta-headImg.jpg' ?>" alt="Renta">

            <div class="content">
                <h1 class="fw-light p-0 mb-0"><?php pll_e('VENTA')?></h1>
                <hr class="mt-0 mb-3" style="opacity:1;">
                <p class="fs-5"><?php pll_e('Venta y Administracion de Propiedades en Puerto Vallarta-Riviera Nayarit')?></p>
                <a href="#all-listings" class="btn btn1 mt-4"><?php pll_e('Más Info'); ?></a>
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

            <select class="col-md-12 col-lg-2 form-select form-select-lg mx-0 mx-lg-2 mb-2 mb-lg-0" aria-label="form-select-lg tipo" name="tipo">
                <option selected>Tipo</option>
                <option value="1">Casa</option>
                <option value="2">Departamento</option>
            </select>

            <div class="col-lg-2 form-floating px-0 px-lg-2 mb-2 mb-lg-0">
                <input type="number" class="form-control" id="bedrooms" placeholder="Recámaras" name="beds">
                <label class="ms-2" for="bedrooms">Recámaras</label>
            </div>

            <div class="col-lg-2 form-floating px-0 px-lg-2 mb-4 mb-lg-0">
                <input type="number" class="form-control" id="max-price" placeholder="Precio" name="maxPrice">
                <label class="ms-2" for="max-price">Precio Máximo</label>
            </div>
            
            <div class="col-lg-3 px-0">
                <button type="submit" class="btn btn1">Buscar</button>
            </div>
            
        </form>

        <div class="row p-0 mx-0 mb-5" id="all-listings">

            <?php if( have_posts() ): 
                
                $i = 1;
                ?>
                
                <?php while( have_posts()):  the_post();

                $images = rwmb_meta( 'listing_gallery', array( 'size' => 'large', 'limit' => '1' ) );?>
            
                    
                    <div class="col-12 p-0 m-0 text-center text-lg-start listings-rentals <?php if( $i%2 == 0 ){echo 'listings-dorado';}?>">
                        <div class="row">
                            
                            <div class="col-lg-6 <?php if( $i%2 == 0 ){echo 'order-1 order-lg-2';}?>">
                                <?php foreach ( $images as $image ) {?>
                                    <a href="<?php echo get_the_permalink();?>">
                                        <img class="img-fluid w-100" src="<?php echo $image['url'];?>" alt="Listing image">
                                    </a>
                                <?php } ?>
                            </div>

                            <div class="col-lg-6 ps-0 pe-0 ps-lg-5 <?php if( $i%2 == 0 ){echo 'order-2 order-lg-1 text-lg-end pe-lg-5';}?>">
                                <div class="mb-0 mt-3 d-flex justify-content-center justify-content-lg-<?php if( $i%2 == 0 ){echo 'end';}else{echo 'start';}?>">
                                    <span class="pr-type-archive px-2 mx-2"><?php echo onere_get_property_type(get_the_ID(),'property_type'); ?></span>
                                    <span class="fw-light"><?php echo rwmb_meta('avaliable')?></span>
                                </div>
                                
                                <h2 class="mt-3 pt-lg-1 "><?php echo get_the_title();?></h2>
                                <hr class="<?php if( $i%2 == 0 ){echo 'hr-dorado';}?>" >
                                <h5 class="my-3"><i class="fas fa-map-marker-alt me-1"></i><?php onere_get_list_terms(get_the_ID(), 'regiones'); ?></h5>
                                
                                <!--camas baños y construction-->
                                <div class="d-flex fw-bold fs-5 justify-content-center justify-content-lg-<?php if( $i%2 == 0 ){echo 'end';}else{echo 'start';}?> my-4">
                                    <span><i class="fas fa-bed"></i> <?php echo rwmb_meta('bedrooms');?> <?php pll_e('Recámaras')?></span>
                                    <span class="px-3"><i class="fas fa-shower"></i> <?php echo rwmb_meta('bathrooms');?> <?php pll_e('Baños'); ?></span>
                                    <span><i class="fas fa-home"></i> <?php echo rwmb_meta('construction');?> m<sup>2</sup></span>
                                </div>
                                
                                <!--precio y moneda-->
                                <h2 class="my-3"><?php echo rwmb_meta( 'currency');?>$<?php echo number_format(rwmb_meta('price'));?></h2>
                                
                                <a href="<?php echo get_the_permalink();?>" class="btn btn1 mt-3 mb-5 mb-lg-1"><?php pll_e('Más Info');?></a>
                            </div>

                        </div>
                    </div>

                
                                    
                <?php   
                        $i++;
                        endwhile; 
                        the_posts_pagination();
                        ?>
            
            <?php endif; ?>

        </div>
        
<?php get_footer(); ?>