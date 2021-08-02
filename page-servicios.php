<?php get_header();?>

<div class="container-fluid servicios" style="position:relative;">
    <img class="w-100 img-fluid mobile-img" src="<?php echo get_template_directory_uri(). '/assets/images/renta-headImg.jpg' ?>" alt="Renta">
    <h1 class="fw-bold p-0">SERVICIOS</h1>
</div>

<div class="row justify-content-center text-center my-4 my-lg-5">
    <div class="col-11 col-md-8">
        <p class="fs-5 secondary-text">
        Nuestra empresa está totalmente dedicada a la gestión y protección de su propiedad. Contamos con un personal altamente experimentado donde cada miembro se centra 
        en diferentes áreas como alquiler, mantenimiento, limpieza, relaciones públicas y más.<br> <br>
        El capital humano es nuestro valor agregado, que contribuye al nivel óptimo de eficiencia a través de la experiencia y la formación, nuestro objetivo es mantener 
        la propiedad en las mejores condiciones, garantizando la satisfacción y la tranquilidad.
        </p>
    </div>
</div>

<div class="row py-3 py-lg-5 nuestros-servicios">

    <div class="col-lg-6 order-2 order-lg-1 pt-3">
        <h2 class="text-center">Nuestros <strong>Servicios</strong></h2>
        <hr>
        <div class="row">
            <div class="col-6 ps-3 ps-lg-5">
                <p>Inspecciones de propiedades</p>
                <p>Mantenimiento</p>
                <p>Servicio de limpieza</p>
                <p>Preparaciones para tormentas</p>
                <p>Compra de despensa</p>
            </div>
            <div class="col-6">
                <p>Chofér</p>
                <p>Chef privado</p>
                <p>Transporte (aeropuerto-condo)</p>
                <p>Regado de plantas</p>
                <p>Logística de Arrendamiento</p>
            </div>
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


<?php get_footer(); ?>