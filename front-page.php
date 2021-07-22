<?php 
    get_header();

    $rentals = get_posts(array(
      'post_type' => 'rentals',
      'numberposts' => -1,
      'meta_query'=> array(
          array(
              'key' => 'featured_rental',
              'compare' => '=',
              'value' => 1,
          )
  ),

      
  ));
    $listings = get_posts(array(
      'post_type' => 'listings',
      'numberposts' => -1,
      'meta_query'=> array(
          array(
              'key' => 'featured_listing',
              'compare' => '=',
              'value' => 1,
          )
      ),
  ));

  $frontImages = get_posts(array('post_type' => 'frontpage'));
?>


  
    <!--Carrusel-->
    <div id="carouseFront" class="carousel slide" data-bs-ride="carousel">
    <?php foreach($frontImages as $frontImage){ setup_postdata($frontImage); ?>
      <div class="carousel-inner">

        <?php
        $frontImgs = rwmb_meta('front_gallery', array('size' => 'full'), $frontImage->ID); 
        $f=0;
        
        foreach($frontImgs as $frontImg): ?>

        <div class="carousel-item <?php if($f==0){echo 'active';}?>">
          <img src="<?php echo $frontImg['url'];?>" class="d-block w-100 responsive-img" alt="<?php echo $frontImg['title'];?>">
        </div>

       <?php $f++; endforeach; ?>

      </div>
      <?php } ?>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouseFront" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouseFront" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
   


    <!--Propiedades en Venta-->

    <h2 class="titulo2 text-center mt-5 pt-4">PROPIEDADES EN <span class="fw-bold">VENTA</span></h2>

    <?php if( $listings ): 
          $l = 0;?>

    <div class="row justify-content-center p-1">

      <?php foreach( $listings as $listing ):  setup_postdata($listing);?>

        <div class="col-sm-4 col-md-6 col-lg-4" style="position:relative;">
            <div class="card text-end bg-light">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">

                <?php $images = rwmb_meta( 'listing_gallery', array('size' => 'large', 'limit' => '1' ),$listing->ID); 
                foreach ( $images as $image ) {?>

                  <a href="<?php echo get_the_permalink( $listing->ID );?>">
                    <img src="<?php echo $image['url'];?>" class="img-front-listings" alt="<?php echo $image['title'];?>"/>
                    <span class="pr-type px-2"><?php echo onere_get_property_type($listing->ID,'property_type'); ?></span>
                  </a>
                <?php }?>
                 

                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                  </a>
              </div>
              <div class="card-body">
                  <div class="card-text d-flex justify-content-between">
                    <h5 id="item-name" class="fw-normal <?php echo rwmb_meta('avaliable',[],$listing->ID);?>"><?php echo rwmb_meta('avaliable',[],$listing->ID);?></h5>
                    <span><h2><?php echo $listing->currency;?> $<?php echo number_format($listing->price);?></h2></span>
                  </div>
                  <h3><?php echo get_the_title( $listing->ID );?></h3>
                  <div class="flex1 justify-content-end justify-content-lg-start">
                    <img class="icon-size me-2" src="<?php echo get_template_directory_uri(). '/assets/images/bed-solid.svg' ?>" alt="bed"><p class="margin1"><?php echo $listing->bedrooms;?></p>
                    <img class="icon-size me-2" src="<?php echo get_template_directory_uri(). '/assets/images/bath-solid.svg' ?>" alt="bath"><p class="margin1"><?php echo $listing->bathrooms;?></p>
                    <img class="icon-size me-2" src="<?php echo get_template_directory_uri(). '/assets/images/home-solid.svg' ?>" alt="ruler"><p class="fw-bold"><?php echo $listing->construction;?>m<sup>2</sup></p>
                  </div>
                  <h5 style="margin-top: 0.5rem;"><?php onere_get_list_terms($listing->ID,'regiones'); ?> </h5>
                  <a href="<?php echo get_the_permalink( $listing->ID );?>"><p class="text-right">Mas info</p></a>
               </div>
            </div>
        </div>
      <?php endforeach;
            endif;?>
    </div>


     <!--Propiedades en Renta-->

     <h2 class="titulo2 text-center mt-5">PROPIEDADES EN <span class="fw-bold">RENTA</span></h2>

<?php if( $rentals ): 
      $k = 0;?>

<div class="row justify-content-center p-1">

  <?php foreach( $rentals as $rental ):  setup_postdata($rental);?>

    <div class="col-sm-4 col-md-6 col-lg-4" style="position:relative;">
        <div class="card text-end bg-light">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">

            <?php $imagesr = rwmb_meta( 'rental_gallery', array('size' => 'large', 'limit' => '1' ),$rental->ID); 
              foreach ( $imagesr as $imager ) {?>
                <a href="<?php echo get_the_permalink( $rental->ID );?>">
                  <img src="<?php echo $imager['url'];?>" class="img-front-listings" alt="<?php echo $imager['title'];?>"/>
                  <span class="pr-type px-2"><?php echo onere_get_property_type($rental->ID,'property_type'); ?></span>
                </a>
              <?php }?>
  
              <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
              </a>
          </div>
          <div class="card-body">
              <div class="card-text d-flex justify-content-between">
                <h5 id="item-name">EN RENTA</h5>

                <?php 
                  $pricesBaja = rwmb_meta( 'precio-baja',$args = [], $rental->ID); 
                  $priceNoche = $pricesBaja['noche'];
                  $priceSemana = $pricesBaja['semana'];
                  $priceMes = $pricesBaja['mes'];
                ?>
                <span><h2>Desde: <?php echo $rental->currency;?> $<?php echo number_format(check_empty_prices($priceNoche, $priceSemana, $priceMes));?></h2></span>
              </div>
              <h3><?php echo get_the_title( $rental->ID );?></h3>
              <div class="flex1 justify-content-end justify-content-lg-start">
                <img class="icon-size me-2" src="<?php echo get_template_directory_uri(). '/assets/images/bed-solid.svg' ?>" alt="bed"><p class="margin1"><?php echo $rental->bedrooms;?></p>
                <img class="icon-size me-2" src="<?php echo get_template_directory_uri(). '/assets/images/bath-solid.svg' ?>" alt="bath"><p class="margin1"><?php echo $rental->bathrooms;?></p>
                <p class="fw-bold"><i class="fas fa-male"></i> <?php echo $rental->rentals_capacity;?></p>
              </div>
              <h5 style="margin-top: 0.5rem;"><?php                                          
                                $terms_list = array_reverse(wp_get_post_terms( $rental->ID, 'regiones' ) );

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
                                ?> </h5>
              <a href="<?php echo get_the_permalink( $rental->ID );?>"><p class="text-right">Mas info</p></a>
           </div>
        </div>
    </div>
  <?php endforeach;
        endif;?>
</div>
    
    <!--TITULO 1-->
    <div class="row text-center pad2">
        <h1 class="titulo2">RENTA Y VENTA DE PROPIEDADES<br>EN <span style="font-weight: bold;">PUERTO VALLARTA.</span></h1>
    </div>
  

    <!--IMAGEN PROPIEDADES DE LUJO-->
    <div class="container-fluid text-center" style="position: relative; z-index: 1;">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/img-2.jpg';?>" class="img-fluid w-100 p-0 responsive-img" alt="Vive en el paraiso">
        <h2 class="p-5" id="prop-de-lujo">Propiedades de lujo</h2>
        <div class="fondo-oscuro"></div>
    </div>

    <!--TESTIMONIALES-->
    <?php 
      $testimonials = get_posts(array(
          'post_type' => 'testimonials',
      )); ?>

    <?php if( !empty($testimonials) ): 
                    
                    $i = 0;
                    $j = 0;

                    ?>

    <div class="row text-center mt-5 mb-3">
      <h1 class="fw-bold mt-5">TESTIMONIALES</h1>
    </div>

    <div id="carouselTestimonials" class="carousel slide carousel-dark" data-bs-ride="carousel">

        <div class="carousel-indicators">
        <?php foreach( $testimonials as $testi ):  setup_postdata($testi);?>
          <button type="button" data-bs-target="#carouselTestimonials" data-bs-slide-to="<?php echo $j;?>" class="<?php if($j==0){echo 'active';}?>" aria-current="true" aria-label="Slide <?php echo $j+1;?>"></button>
        <?php $j++; endforeach; ?>
        </div>

        <div class="carousel-inner">

          <?php foreach( $testimonials as $testi ):  setup_postdata($testi);
          $fotoTesti = wp_get_attachment_image_src( get_post_thumbnail_id( $testi->ID ), 'full' );?>
            <div class="carousel-item <?php if($i==0){echo 'active';}?>">
              <div class="row justify-content-center pb-5">

                  <div class="col-6 col-md-4 col-lg-2" style="position:relative;">
                      <img src="<?php echo $fotoTesti[0];?>" class="w-100 img-fluid img-testimonials" alt="Testimonio 1">
                  </div>

                  <div class="col-12 col-md-6 col-lg-4">
                      <div><h3 class="text-2 my-2"><?php echo get_the_title($testi->ID);?></h3></div>
                      <div class="text-1"><p><?php echo the_content($testi->ID);?></p>
                      </div>
                  </div>
              </div>
          </div>

          <?php  $i++;  endforeach; ?>
        
            
          
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselTestimonials" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselTestimonials" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
    <?php endif; ?>

    <!--TITULO 2 Y BOTON-->
    <div class="row mt-5">
        <div class="col-12">
            <div class="text-center p-2">
            <h1 class="text1">¿Quieres vender o rentar un <span style="font-weight:bold">inmueble?</span></h1>
            </div>

            <div style="padding-bottom: 10rem;" class="text-center">
            <button class="btn2">Hablar con un asesor</button>
            </div>
        </div>
    </div>
    
       
<?php get_footer(); ?>