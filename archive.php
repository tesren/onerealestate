<?php 
    $services = get_posts(array('post_type' => 'services'));
    get_header();
?>


<div class="container-fluid landing-desarrollos" style="position:relative;">
    <img class="w-100 img-fluid mobile-img" src="<?php echo get_template_directory_uri(). '/assets/images/renta-headImg.jpg' ?>" alt="Renta">
    <div class="content">
        <h1 class="fw-light p-0 mb-0"><?php pll_e('SERVICIOS')?></h1>
        <hr class="mt-0 mb-3" style="opacity:1;">
        <p class="fs-5"><?php pll_e('Profesionales en Venta, Renta y Administracion de Propiedades en Puerto Vallarta-Riviera Nayarit') ?></p>
        <a href="#all-services" class="btn btn1 mt-4"><?php pll_e('Más Info'); ?></a>
    </div>
</div>

<div class="row justify-content-center text-center my-4 my-lg-5" id="all-services">
    <div class="col-11 col-md-8">
        <div class="fs-5 secondary-text">
            <?php 
                foreach($services as $service){
                    echo get_the_content( " ", false, $service->ID );
                }
            ?>
        </div>
    </div>
</div>

<div class="row py-3 py-lg-5 nuestros-servicios" >

    <div class="col-lg-7 order-2 order-lg-1 pt-3">
        <h2 class="text-center"><?php pll_e('Nuestros');?> <strong><?php pll_e('Servicios');?></strong></h2>
        <hr>
        <div class="row ps-3 ps-lg-5">

            <?php 
            foreach($services as $service):
                $servicesf = rwmb_meta('servicios_field', $args=[], $service->ID); 
                foreach($servicesf as $servicef):?>
                    <div class="col-6">
                        <p><?php echo $servicef ?></p>
                    </div>
                    
            <?php 
                endforeach;
            endforeach; 
            ?>
        </div>

    </div>

    <div class="col-lg-5 order-1 order-lg-2">
        <div id="carouselServices" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">

                <?php 
                foreach($services as $service):
                    $servicesImgs = rwmb_meta('services_gallery', array('size'=>'full'), $service->ID); 
                    $i=0;
                    foreach($servicesImgs as $servicesImg):?>
                        <div class="carousel-item <?php if($i==0){echo 'active';} ?>">
                            <img src="<?php echo $servicesImg['url']?>" class="d-block w-100" alt="<?php echo $servicesImg['title']?>" style="height: 450px; object-fit:cover;">
                        </div> 
                <?php $i++;
                    endforeach;
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