<?php
        $realtors = get_posts(array(
            'post_type' => 'realtors',
            'numberofposts' => -1

            )

        );
    
    get_header();?>
    

    <!--Equipo-->

    <div class="container-fluid pt-5 mb-5">
        <h1 class="my-5 text-center">Nuestro <strong>Equipo</strong></h1>
        
        <div class="row justify-content-evenly mt-4">


            <?php if( !empty($realtors) ): ?>
  
                <?php foreach( $realtors as $realtor ): ?>

                    <div class="col-11 col-md-4 col-lg-3 card-realtor text-center bg-light">

                        <?php $images = rwmb_meta( 'profile_picture', array( 'size' => 'thumbail', 'limit' => 1 ), $realtor->ID ); ?>

                        <img class="img-realtor img-thumbnail mt-4" src="<?php echo $images[0]['url'] ?>" alt="Profile picture">

                        <span class="fs-1 d-block mt-3 fw-normal" style="color:#76726A;"><?php echo get_the_title( $realtor->ID )?></span>
                        <span class="fs-5 d-block mt-0 mb-2 fw-light" style="color:#76726A;"><?php echo rwmb_meta('realtor_position', $args=[], $realtor->ID); ?></span>

                        <?php //aqui las variables para telefono y eso ?>

                        <div class="icon-block">
                            <a href="https://api.whatsapp.com/send/?phone=523225555555&text=Hello, I am interested in a unit from One real Estate" target="_blank"><i class="fab fa-whatsapp"></i></a>
                            <a class="d-block d-lg-none" href="tel:3225555555"> <i class="fa fa-phone"></i></a>
                            <a class="d-none d-lg-block" data-bs-toggle="tooltip" data-bs-placement="top" title="322-555-5555"><i class="fa fa-phone"></i></a>
                            <a href="mailto:name@email.com" data-bs-toggle="tooltip" data-bs-placement="top" title="correo@correo.com" target="_blank"> <i class="fa fa-envelope"></i></a>
                        </div>

                    </div>

            

           
                <?php endforeach; ?>
            
            <?php endif; ?>

        </div>

 
    </div>


<?php get_footer(); ?>
