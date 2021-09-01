<?php 
$services = get_posts(array('post_type' => 'services'));
get_header(); 
?>

<div class="container-fluid servicios" style="position:relative;">
    <img class="w-100 img-fluid mobile-img" src="<?php echo get_template_directory_uri(). '/assets/images/renta-headImg.jpg' ?>" alt="Renta">
    <h1 class="fw-bold p-0">SERVICIOS</h1>
</div>

<div class="row justify-content-center text-center my-4 my-lg-5">
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

<div class="row py-3 py-lg-5 nuestros-servicios">

    <div class="col-lg-6 order-2 order-lg-1 pt-3">
        <h2 class="text-center">Nuestros <strong>Servicios</strong></h2>
        <ul><?php pll_the_languages();?></ul>
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

    <div class="col-lg-6 order-1 order-lg-2">
        <img class="img-fluid w-100 px-1" src="<?php echo get_template_directory_uri(). '/assets/images/servicios.jpg' ?>" alt="Servicios">
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