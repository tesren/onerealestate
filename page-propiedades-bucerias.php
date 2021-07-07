<?php get_header();?>

    <div class="container-fluid text-center  pt-1 pt-md-5 mt-5 mb-2 d-flex justify-content-center">
        <img  class="iconsvg" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg'?>">
        <h1 class="fs-1"><?php the_title(); ?></h1>
        <img  class="iconsvg" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg'?>">
    </div>

    <!--listings-->
    <div class="container-fluid" id="listings">

        <?php 

            /*
            *  Query posts for a relationship value.
            *  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
            */

            $listings = get_posts(array(
                'post_type' => 'listings',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'regiones',
                        'field'    => 'slug',
                        'terms'    => 'bucerias'
                    )
            )
            ));

        ?>
        <?php if( $listings ): ?>

        <?php foreach( $listings as $unit ): ?>
        <?php 

        //$photo = get_field('photo', $unit->ID);
        $portada = wp_get_attachment_image_src( get_post_thumbnail_id( $unit->ID ), 'full' );

        ?>
            <!--listing info-->
        <div class="my-4" style="position:relative;">
                

            <div class="row justify-content-center mt-2 mb-0 text-center">
                <h3 class="col-11 fs-1 mb-1 fw-bold"><?php echo get_the_title( $unit->ID );?></h3>
                <p class="col-11 fs-1 mb-1"> <?php 
                                        $locations = array_reverse( $unit->location );

                                        $j =1;
                                        if ( ! empty( $locations ) && ! is_wp_error( $locations ) ) {
                                            foreach ( $locations as $location ) {
                                                echo $location->name;
                                                if( $i < count($locations) ){
                                                    echo ', ';
                                                }
                                                $j++;
                                            }
                                        }
                                    ?> 
             <?php echo $unit->currency;?> $ <?php echo number_format($unit->price);?></p>
            </div>

            <!--Imagen del listing-->
            <img class="img-fluid w-100" src="<?php echo $portada[0];?>" alt="">
        
            <div class="row justify-content-center justify-content-md-between pb-3 pt-2">
                <div class="col-md-7 text-center">

                    <hr style="width:100%;text-align:left;margin-left:0">

                    <div class="row justify-content-center">

                        <h3 class="col-md-4"> <i class="fas fa-bed"></i> <?php echo $unit->bedrooms;?> Recámaras</h3>
                        <h3 class="col-md-4"><i class="fas fa-shower"></i> <?php echo $unit->bathrooms;?> baños</h3>
                        <h3 class="col-md-4"><i class="fas fa-home"></i> <?php echo $unit->construction;?> m<sup>2</sup></h3>
                        
                    </div>
                    <hr style="width:100%;text-align:left;margin-left:0">
                </div>

                <div class="col-md-2 text-center">
                    <a href="<?php echo get_the_permalink( $unit->ID );?>" class="btn btn-amarillo btn-lg mt-1 mt-md-4">Mas info</a>
                </div>
            </div>
            <hr style="width:100%;text-align:center;">
        </div>
        <?php endforeach; ?>
       
         <?php endif; ?>

    </div>
        
<?php get_footer(); ?>