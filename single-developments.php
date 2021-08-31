<?php 

$units = get_posts(array(
    'post_type' => 'inventory',
    'meta_query' => array(
        array(
            'key' => 'developments', // name of custom field
            'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
            'compare' => 'LIKE'
        )
    )
));

    get_header(); 

    if ( have_posts() ){
        
        while( have_posts() ){the_post(); ?>

    <div class="container-fluid single-developments">
        <!--Imagen con texto-->
      <div class="container-fluid " style="position:relative;">
        <?php $images = rwmb_meta( 'more_photos', array( 'size' => 'full', 'limit' => '2' ) );?>

            <img class="w-100 img-fluid mobile-img"  src="<?php echo $images[0]['url']; ?>" alt="<?php the_title();?>">

            <!--logo Desarrollo-->
            <?php $logos = rwmb_meta( 'logo-dev', array( 'size' => 'large' ) );
                $j = 0;
                    foreach ( $logos as $logo ) { ?>

                <img id="logo-desarrollo" class="img-fluid " src="<?php echo $logo[ 'url' ];?>" alt="<?php echo $logo[ 'title' ];?>">
            <?php     $j++; }?>
            
            <div class="row text-center dev-prices">
                <div style="background-color: #ab9154;" class="col-12 col-lg-5 p-2">

                    <div class="row">
                        <span class="col-6">Precios Desde:</span>
                        <span class ="col-6">Recámaras Desde:</span>
                    </div>

                    <div class="row">
                        <h3 class="col-6"><?php echo rwmb_meta( 'currency' );?> <i class="fas fa-dollar-sign"></i><?php echo number_format(rwmb_meta( 'starting_at' )); ?> </h3>
                        <h3 class="col-6"><i class="fas fa-bed"></i> <?php echo rwmb_meta( 'starting_at_bedrooms' ); ?></h3>
                    </div>

                </div>
            </div>
     </div>

      <!--foto destacada 2-->
      <div class="container-fluid text-center text-lg-start" style="position:relative;">
        
        <div class="description row px-3 px-lg-5">

            <div class="col-12 col-lg-4">
                <div style="background-color: #ab9154;"><h2 class="p-2">Descripción</h2></div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-7" id="el-content"><p><?php echo the_content();?></p></div>
            </div>

        </div>

        <div class="fondo-oscuro"></div>
          <img class="img-fluid w-100 mobile-img" src="<?php echo $images[1]['url'];?>" alt="<?php echo $images[1]['title'];?>">

      </div>

       <!--MAPA google-->
       <div class="container-fluid text-center text-lg-start" style="position:relative;">

        <div class="row justify-content-center justify-content-lg-end location-titles">

            <div class="col-12 col-lg-4 p-0">
            
                <div style="background-color: #ab9154;"><h2 class="mb-0 ps-0 ps-lg-2">Ubicación</h2></div>

                <div class="row justify-content-center justify-content-lg-end">
                    <div class="col-6 col-lg-6 mb-3 mb-lg-0 p-0" style="background-color: #929292;">
                        <h3 class="py-1 mb-0 ps-0 ps-lg-2"><?php 
                            
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
            <div style="height: 60vh;" class="col-12">
                <?php $args = array(
                    'width'        => '100%',
                    'height'       => '100%',
                    'zoom'         => 14,
                    'marker'       => true,
                );
                
                echo rwmb_meta( 'development_map', $args );
                ?>
            </div>
        </div>

         <!--Galeria de Amenidades-->
         <div class="container-fluid text-center mt-5" style="position:relative;">
            <div class="row justify-content-center mb-0 mb-lg-2">
                <div class="col-12 col-lg-5 p-0">
                    <div style="background-color: #ab9154;"><h2 class="mb-0 ps-0 ps-lg-2">Amenidades</h2></div>
                </div>
                
                
            </div>
            <div class="row gallery-images">
                <?php $images = rwmb_meta( 'amenities_gallery', array( 'size' => 'full' ) );
                    $k = 0;
        
                    foreach ( $images as $image ) { ?>
                        
                    <div class="<?php gallery_grid($k) ?> p-0 ">
                        <figure class="m-0 m-lg-1">
                            <img class="img-fluid img-galerias w-100" data-fancybox="amenities-gallery" data-caption="<?php echo $image['caption']?>" src="<?php echo $image['url'];?>" alt="<?php echo  $image['title'];?>" loading="lazy">
                        </figure>
                    </div>

                <?php $k++;}?>
            </div>

        </div>


        <!--Galeria de fotos-->
        <div class="container-fluid text-center mt-5" style="position:relative;">
            <div class="row justify-content-center mb-0 mb-lg-2">
                <div class="col-12 col-lg-5 p-0">
                    <div style="background-color: #ab9154;"><h2 class="mb-0 ps-0 ps-lg-2">Galería</h2></div>
                </div>
                
                
            </div>
            <div class="row gallery-images">
                <?php $images = rwmb_meta( 'more_photos', array( 'size' => 'full' ) );
                    $l = 0;

                    foreach ( $images as $image ) { ?>
                        
                    <div class="<?php gallery_grid($l) ?> p-0 " style="position:relative;">
                        <figure class="m-0 m-lg-1">
                            <img class="img-fluid img-galerias w-100" data-fancybox="gallery" data-caption="<?php echo $image['caption']?>" src="<?php echo $image['url'];?>" alt="<?php echo  $image['title'];?>" loading="lazy">
                        </figure>
                    </div>

                <?php $l++;}?>
            </div>

        </div>

    <!--Inventario-->
<div class="row mx-auto my-auto justify-content-center">

    <div class="col-12 col-lg-5 p-0 text-center">
        <div style="background-color: #ab9154;"><h2 class="mb-4 mt-5 ps-0 ps-lg-2">Inventario</h2></div>
    </div>

    <ul id="recipeCarousel" class="cs-hidden">

      <?php if( $units ): ?>
          <?php $i=1;?>
          <?php foreach( $units as $unit ): ?>
              <?php 

          
              $portada = wp_get_attachment_image_src( get_post_thumbnail_id( $unit->ID ), 'full' );

              ?>
              
                <li class="item" >
                    <div class="card text-end bg-light">

                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">

                            <?php $imagesInv = rwmb_meta( 'inventory_gallery', array('size' => 'large', 'limit' => '10' ),$unit->ID); ?>
                            
                            <?php $m=0;
                            foreach($imagesInv as $imageInv): ?>
                                <img src="<?php echo $imageInv['url'];?>" class="img-front-listings <?php if($m>0){echo 'd-none';} ?>" alt="Inventory" data-fancybox="inventory-<?php echo $unit->ID ?>" loading="lazy" />
                            <?php $m++; 
                            endforeach; ?>

                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="card-text d-flex mb-3 justify-content-between">
                                <span class="fw-light fs-3 px-2 <?php echo rwmb_meta('status',[],$unit->ID);?>"><?php echo rwmb_meta('status',[],$unit->ID);?></span>
                                <span class="fs-3 fw-bold text-end"><?php echo $unit->currency;?> $<?php echo number_format($unit->starting_at);?></span>
                            </div>

                            <h3 class="text-start fw-bold fs-3"><?php echo get_the_title( $unit->ID );?></h3>

                            <div class="flex1 justify-content-start fs-4">
                                <span class="ms-1"><i class="fas fa-bed"></i> <?php echo $unit->bedrooms;?></span>
                                <span class="ms-4"><i class="fas fa-shower"></i> <?php echo $unit->bathrooms;?></span>
                                <span class="ms-4"><i class="fas fa-home"></i> <?php echo $unit->construction;?>m<sup>2</sup></span>
                            </div>
                            
                            <span class="text-start fs-4 d-block">Modelo: <strong><?php echo $unit->model_type ?></strong></span>
                
                        </div>

                    </div>
                </li>
          <?php $i++; ?>
          <?php endforeach; ?>
         
      <?php endif; ?>
            
    </ul>
</div>



    </div><!--Single developments-->


        <!--contacto-->
       <div class="container-fluid py-5">
           <?php get_template_part( 'partials/content', 'contact-form' ); ?>
       </div>

         <!--boton whatsapp-->
         <?php 
            $permalink = get_the_permalink();
            $text = "Hola estoy interesado en el Desarrollo ".get_the_title()." que ví en ";
        ?>
        <a href="https://wa.me/523221008151?text=<?php echo $text, $permalink ?>" id="whatsapp" target="_blank"> 
            <i class="fab fa-whatsapp"></i>
        </a>

        <?php   
        

        }

    };

    get_footer();