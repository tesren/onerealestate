<?php 
 /*
 Template Name: Services Page 
  */
    //$services = get_posts(array('post_type' => 'services'));
    get_header();
?>


<div class="container-fluid landing-desarrollos" style="position:relative;">
    <?php $servImg = get_field('portada_servicios') ?>
    <img class="w-100 mobile-img" src="<?php echo $servImg['url'] ?>" alt="<?php echo $servImg['title'] ?>">
    <div class="content">
        <h1 class="fw-light p-0 mb-0"><?php pll_e('SERVICIOS')?></h1>
        <hr class="mt-0 mb-3" style="opacity:1;">
        <p class="fs-5"><?php echo get_field('descripcion_servicios'); ?></p>
        <a href="#all-services" class="btn btn1 mt-4"><?php pll_e('Más Info'); ?></a>
    </div>

    <div class="fondo-oscuro"></div>
</div>


<div class="row justify-content-center text-center my-4 my-lg-5" id="all-services">
    <div class="col-11 col-md-8">
        <div class="fs-5 secondary-text">
            <?php echo get_field( "descripcion" );?>
        </div>
    </div>
</div>

<div class="row py-3 py-lg-5 nuestros-servicios" >

    <div class="col-lg-7 order-2 order-lg-1 pt-3">
        <h2 class="text-center"><?php pll_e('Nuestros');?> <strong><?php pll_e('Servicios');?></strong></h2>
        <hr>
        <div class="row justify-content-center">
       
            <?php 

            $fields = get_field('servicios');

            if( $fields ): ?>
            
                <?php foreach( $fields as $name => $value ): ?>
                    <div class="col-5">
                        <p><?php echo $value['servicio']; ?></p>
                    </div>
                <?php endforeach; ?>
                
            <?php endif; ?>
        </div>

    </div>

    <div class="col-lg-5 order-1 order-lg-2">
        <div id="carouselServices" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">

                <?php $servicesImgs = get_field('imagenes');
                $i=0;
                foreach($servicesImgs as $serviceImg):
                    ?>
                    <div class="carousel-item <?php if($i==0){echo 'active';} ?>">
                        <img src="<?php echo $serviceImg['url']?>" class="d-block w-100" alt="<?php echo $serviceImg['title']?>" style="height: 450px; object-fit:cover;">
                    </div> 
                <?php $i++;
                    endforeach; 
                ?>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselServices" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselServices" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
  
    </div>
</div>

   <!--contacto-->
   <div class="container-fluid my-5">
        <?php get_template_part( 'partials/content', 'contact-form' ); ?>
    </div>

    <!--boton whatsapp-->
    <a href="https://wa.me/523221008151?text= " id="whatsapp" target="_blank"> 
        <i class="fab fa-whatsapp"></i>
    </a>


<?php get_footer(); ?>