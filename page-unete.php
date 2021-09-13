<?php
        $realtors = get_posts(array(
            'post_type' => 'realtors',
            'numberofposts' => -1

            )

        );
    
    get_header();?>
    

    <!--Equipo-->

    <div class="container-fluid mb-5">

        <div class="container-fluid landing-desarrollos" style="position:relative;">
            <img class="w-100 img-fluid mobile-img" src="<?php echo get_template_directory_uri(). '/assets/images/desaLanding.jpg' ?>" alt="Renta">

            <div class="content">
                <h1 class="fw-light p-0 mb-0">ÚNETE</h1>
                <hr class="mt-0 mb-3" style="opacity:1;">
                <p class="fs-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed congue eu magna ut accumsan.</p>
            </div>
        </div>


        <div class="row" id="row-why-us">

            <div class="col-12 col-lg-5 fs-1 text-center fw-light py-3" id="why-here" style="background-color:#A28234; color:#fff;">
                ¿POR QUÉ DEBERÍAS TRABAJAR AQUÍ?
            </div>

            <div class="col-12 col-lg-8" id="reasons">
                <div class="row text-center fs-1 fw-light py-4 ps-0 ps-lg-5" style="height:100%">

                    <div class="col align-self-center">
                        <i class="fas fa-hands-helping"></i>
                        <div class="fs-4">La mejor opción para ti</div> 
                    </div>

                    <div class="col align-self-center">
                        <i class="fas fa-suitcase"></i>
                        <div class="fs-4">Experiencia en Bienes Raíces</div> 
                    </div>

                    <div class="col align-self-center">
                        <i class="fas fa-home"></i>
                        <div class="fs-4">Excelente equipo de trabajo</div> 
                    </div>

                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-12 col-lg-6">
                <img class="w-100" src="<?php echo get_template_directory_uri(). '/assets/images/our-team.png' ?>" alt="">
            </div>

            <div class="col-12 col-lg-6 px-3 px-lg-5" style="background-color:#A28234; color:#fff;">
                <h2 class="mt-5 fs-1 fw-light">Nuestro <strong>Equipo</strong></h2>
                <p class="mb-5 fs-4 fw-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed congue eu magna ut accumsan. 
                    Suspendisse sit amet erat vel enim semper sollicitudin eget at mauris. Integer feugiat ullamcorper felis eget condimentum.
                </p>
            </div>

        </div>


        <h1 class="my-5 text-center">Nuestro <strong>Equipo</strong></h1>
        
        <div class="row justify-content-evenly mt-4 pb-5">


            <?php if( !empty($realtors) ): ?>
  
                <?php foreach( $realtors as $realtor ): ?>

                    <div class="col-11 col-md-4 col-lg-3 p-0 card-realtor text-center bg-light">

                        <?php $images = rwmb_meta( 'profile_picture', array( 'size' => 'thumbail', 'limit' => 1 ), $realtor->ID ); ?>

                        <div class="y-box"></div>
                        <img class="img-realtor img-thumbnail mt-5" src="<?php echo $images[0]['url'] ?>" alt="Profile picture">

                        <span class="fs-1 d-block mt-3 fw-normal" style="color:#76726A;"><?php echo get_the_title( $realtor->ID )?></span>
                        <span class="fs-5 d-block mt-0 mb-2 fw-light" style="color:#76726A;"><?php echo rwmb_meta('realtor_position', $args=[], $realtor->ID); ?></span>

                        <?php 
                            $phone = rwmb_meta('realtor_phone_number', $args=[], $realtor->ID);
                            $mail =  rwmb_meta('realtor_email', $args=[], $realtor->ID);
                        ?>

                        <div class="icon-block mb-5">
                            <a href="https://api.whatsapp.com/send/?phone=52<?php echo $phone ?>&text=Hello, I am interested in a unit from One Real Estate" target="_blank"><i class="fab fa-whatsapp"></i></a>
                            <a class="d-block d-lg-none" href="tel:<?php echo $phone ?>"> <i class="fa fa-phone"></i></a>
                            <a class="d-none d-lg-block" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $phone ?>"><i class="fa fa-phone"></i></a>
                            <a href="mailto:<?php echo $mail ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $mail ?>" target="_blank"> <i class="fa fa-envelope"></i></a>
                        </div>
                        <div class="y-line my-0"></div>
                    </div>

           
                <?php endforeach; ?>
            
            <?php endif; ?>
            
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 shadow-6 py-3 px-2 px-lg-5">
                <?php echo do_shortcode( '[contact-form-7 id="225" title="unete-form"]', true ); ?>
            </div>
        </div>

        <!--boton whatsapp-->
        <a href="https://wa.me/523221008151?text= " id="whatsapp" target="_blank"> 
            <i class="fab fa-whatsapp"></i>
        </a>

 
    </div>


<?php get_footer(); ?>
