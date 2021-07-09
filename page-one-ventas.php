<?php get_header();?>


   

        <?php 

            /*
            *  Query posts for a relationship value.
            *  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
            */

            $listings = get_posts(array(
                'post_type' => 'listings',
            ));

        ?>
        <div class="container-fluid landing" style="position:relative;">
            <img class="w-100 img-fluid" src="<?php echo get_template_directory_uri(). '/assets/images/renta-headImg.jpg' ?>" alt="Renta">
            <h1 class="fw-bold p-0">VENTA</h1>
        </div>

      
        <form class="row my-5 text-center justify-content-center" action="">

            <select class="col-lg-2 form-select form-select-lg mx-2" aria-label="form-select-lg lugar">
                <option selected>Elige un lugar</option>
                <option value="1">Puerto Vallarta</option>
                <option value="2">Bucerías</option>
                <option value="2">Punta de Mita</option>
                </option>
            </select>

            <select class="col-lg-2 form-select form-select-lg mx-2" aria-label="form-select-lg tipo">
                <option selected>Tipo</option>
                <option value="1">Casa</option>
                <option value="2">Departamento</option>
            </select>

            <div class="col-lg-2 form-floating">
                <input type="number" class="form-control" id="bedrooms" placeholder="Recámaras">
                <label class="ms-2" for="bedrooms">Recámaras</label>
            </div>

            <div class="col-lg-2 form-floating">
                <input type="number" class="form-control" id="max-price" placeholder="Precio">
                <label class="ms-2" for="max-price">Precio Máximo</label>
            </div>
            
            <div class="col-lg-2">
                <button type="submit" class="btn btn1">Buscar</button>
            </div>
            
        </form>
       

        <div class="row p-0 mx-0 mb-5">

            <?php if( $listings ): 
                
                $i = 1;
                ?>
                
                <?php foreach( $listings as $unit ):  setup_postdata($unit);
                $portada = wp_get_attachment_image_src( get_post_thumbnail_id( $unit->ID ), 'full' );?>
            
                    
                    <div class="col-12 p-0 m-0 text-center text-lg-start listings-rentals <?php if( $i%2 == 0 ){echo 'listings-dorado';}?>">
                        <div class="row">
                            
                            <div class="col-lg-6 <?php if( $i%2 == 0 ){echo 'order-1 order-lg-2';}?>">
                                <img class="img-fluid w-100" src="<?php echo $portada[0];?>" alt="Rental image">
                            </div>

                            <div class="col-lg-6 ps-0 pe-0 ps-lg-5 <?php if( $i%2 == 0 ){echo 'order-2 order-lg-1 text-lg-end pe-lg-5';}?>">
                                <h2 class="pt-3 pt-lg-3 "><?php echo get_the_title( $unit->ID );?></h3>
                                <hr class="<?php if( $i%2 == 0 ){echo 'hr-dorado';}?>" >
                                <h5 class="my-3"><i class="fas fa-map-marker-alt me-1"></i><?php                                          
                                    $terms_list = array_reverse(wp_get_post_terms( $unit->ID, 'regiones' ) );

                                    $j =1;
                                    if ( ! empty( $terms_list ) && ! is_wp_error( $terms_list ) ) {
                                        foreach ( $terms_list as $term ) {
                                            echo $term->name;
                                            if( $j < count($terms_list) ){
                                                echo ', ';
                                            }
                                            $j++;
                                        }
                                    }                                                                                     
                                    ?> 
                                </h5>
                                
                                <!--camas baños y construction-->
                                <div class="d-flex justify-content-center justify-content-lg-<?php if( $i%2 == 0 ){echo 'end';}else{echo 'start';}?> my-4">
                                    <h3><i class="fas fa-bed"></i> <?php echo $unit->bedrooms;?> Bedrooms</h3>
                                    <h3 class="px-3"><i class="fas fa-shower"></i> <?php echo $unit->bathrooms;?> Baths</h3>
                                    <h3><i class="fas fa-home"></i> <?php echo $unit->construction;?> m<sup>2</sup></h3>
                                </div>
                                
                                <!--precio y moneda-->
                                <h2 class="my-3"><?php echo $unit->currency;?>$<?php echo number_format($unit->price);?></h2>
                                
                                <a href="<?php echo get_the_permalink( $unit->ID );?>" class="btn btn1 mt-3 mb-5 mb-lg-1">Más Info</a>
                            </div>

                        </div>
                    </div>

                
                                    
                <?php   $i++;
                        endforeach; ?>
        
            <?php endif; ?>

        </div>
        
<?php get_footer(); ?>