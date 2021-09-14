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
        <div class="container-fluid landing-desarrollos" style="position:relative;">
            <?php $images = rwmb_meta( 'more_photos', array( 'size' => 'full', 'limit' => '2' ) );?>

            <img class="w-100 img-fluid mobile-img"  src="<?php echo $images[0]['url']; ?>" alt="<?php the_title();?>">
            
            <div class="content">
                <h1 class="fw-light p-0 mb-0"><?php the_title();?></h1>
                <hr class="mt-0 mb-3" style="opacity:1;">
                <div class="fs-5"><?php the_excerpt();?></div>
                <a href="#" class="btn btn1 mt-4"><?php pll_e('Más Info'); ?></a>
            </div>

            <div class="fondo-oscuro"></div>

        </div>

      <!--foto destacada 2-->
      <div class="row justify-content-center text-center text-lg-start my-5" style="position:relative;">

            <div class="col-12 col-lg-4">
                <h2 class="fs-1" style="color:#A28234;"><?php the_title();?></h2>
                <div class="fs-5"><?php echo the_content();?></div>
            </div>
            
            <div class="col-12 col-lg-6" id="el-content" style="color:#444444;">
                <img class="w-100" src="<?php echo $images[1]['url'];?>" alt="<?php echo $images[1]['title'];?>">
            </div>
            
      </div>


    <div class="row justify-content-center text-center fs-5" style="margin:6rem 0;">
        <div class="col-6 col-md-3">
            <i class="fas fa-dollar-sign fa-3x" style="color:#A28234;"></i>
            <span class="d-block fw-bold my-2"><?php pll_e('Precios desde:'); ?></span>
            <span class="d-block">
                $ <?php echo number_format(rwmb_meta( 'starting_at' )); ?>
                <?php echo rwmb_meta( 'currency' );?> 
            </span> 
        </div>

        <div class="col-6 col-md-3">
            <i class="fas fa-bed fa-3x" style="color:#A28234;"></i> 
            <span class="d-block fw-bold my-2"><?php pll_e('Recámaras desde:'); ?></span>
            <span class="d-block"><?php echo rwmb_meta( 'starting_at_bedrooms' ); ?></span>
        </div>

        <div class="col-12 col-md-3">
            <i class="fas fa-map-marker-alt fa-3x" style="color:#A28234;"></i>
            <span class="d-block fw-bold my-2"><?php pll_e('Locación:'); ?></span>
            <span class="d-block"><?php onere_get_list_terms(get_the_ID(), 'regiones'); ?></span>
        </div>
    </div> 

       <!--MAPA google-->
       <div class="container-fluid text-center" style="position:relative;">

            <div class="row justify-content-center">

                <div class="col-12 col-lg-4 p-0">
                
                    <h3 class="fw-light fs-1" style="color: #ab9154;"><?php pll_e('Ubicación'); ?></h3>
                    <h3 class="fw-light fs-5 mb-4"><?php onere_get_list_terms(get_the_ID(), 'regiones'); ?></h3>
                        
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
  <!--        <div class="container-fluid text-center mt-5" style="position:relative;">
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

        </div> -->


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
        <div style="background-color: #ab9154;"><h2 class="mb-4 mt-5 ps-0 ps-lg-2"><?php pll_e('Inventario'); ?></h2></div>
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