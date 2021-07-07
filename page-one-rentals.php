<?php get_header();?>


   

        <?php 

            /*
            *  Query posts for a relationship value.
            *  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
            */

            $rentals = get_posts(array(
                'post_type' => 'rentals',
            ));

        ?>

        <div class="row p-0 mx-0 my-5">

            <?php if( $rentals ): ?>

                <?php foreach( $rentals as $unit ):  setup_postdata($unit);
                $portada = wp_get_attachment_image_src( get_post_thumbnail_id( $unit->ID ), 'full' );?>
            
                    
                    <div class="col-12 p-0 m-0 text-center text-md-start listings-rentals">
                        <div class="row">
                            
                            <div class="col-md-6">
                                <img class="img-fluid w-100" src="<?php echo $portada[0];?>" alt="Rental image">
                            </div>

                            <div class="col-md-6 ps-0 ps-md-5">
                                <h2 class="pt-3 pt-md-5"><?php echo get_the_title( $unit->ID );?></h3>
                                <hr>
                                <h5><i class="fas fa-map-marker-alt me-1"></i><?php                                          
                                    $terms_list = array_reverse(wp_get_post_terms( $unit->ID, 'regiones' ) );

                                    $i =1;
                                    if ( ! empty( $terms_list ) && ! is_wp_error( $terms_list ) ) {
                                        foreach ( $terms_list as $term ) {
                                            echo $term->name;
                                            if( $i < count($terms_list) ){
                                                echo ', ';
                                            }
                                            $i++;
                                        }
                                    }                                                                                     
                                    ?> 
                                </h5>
                                
                                <!--camas baños y construction-->
                                <div class="d-flex justify-content-center justify-content-md-start my-4">
                                    <h3><i class="fas fa-bed"></i> <?php echo $unit->bedrooms;?> Bedrooms</h3>
                                    <h3 class="px-3"><i class="fas fa-shower"></i> <?php echo $unit->bathrooms;?> Baths</h3>
                                    <h3><i class="fas fa-home"></i> <?php echo $unit->construction;?> m<sup>2</sup></h3>
                                </div>
                                
                                <!--precio y moneda-->
                                <h2 class="my-3"><?php echo $unit->currency;?>$<?php echo number_format($unit->price);?></h2>
                                
                                <a href="<?php echo get_the_permalink( $unit->ID );?>" class="btn btn1 mt-4">Más Info</a>
                            </div>

                        </div>
                    </div>

                
            
                <?php endforeach; ?>
        
            <?php endif; ?>

        </div>
        
<?php get_footer(); ?>