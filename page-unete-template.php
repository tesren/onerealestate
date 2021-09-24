<?php
/*
 Template Name: Unete Page 
  */
        $realtors = get_posts(array(
            'post_type' => 'realtors',
            'numberofposts' => -1

            )

        );
    
    get_header();?>
    

    <div class="container-fluid mb-5">

        <div class="container-fluid landing-desarrollos" style="position:relative;">
            <?php $uneteimg1 = get_field('primer_imagen') ?>
            <img class="w-100 mobile-img" src="<?php echo $uneteimg1['url'] ?>" alt="<?php echo $uneteimg1['title'] ?>">

            <div class="content">
                <h1 class="fw-light p-0 mb-0"><?php pll_e('ÚNETE'); ?></h1>
                <hr class="mt-0 mb-3" style="opacity:1;">
                <p class="fs-5"><?php echo get_field( "description_unete" );?></p>
                <a href="#why-here" class="btn btn1 mt-4"><?php pll_e('Más Info'); ?></a>
            </div>

            <div class="fondo-oscuro"></div>
        </div>


        <div class="row" id="row-why-us">

            <div class="col-12 col-lg-5 fs-1 text-center fw-light py-3" id="why-here" style="background-color:#A28234; color:#fff;">
                <?php pll_e('¿POR QUÉ DEBERÍAS TRABAJAR AQUÍ?'); ?>
            </div>

            <div class="col-12 col-lg-8" id="reasons">
                <div class="row text-center fs-1 fw-light py-4 ps-0 ps-lg-5" style="height:100%">

                    <div class="col align-self-center">
                        <i class="fas fa-hands-helping"></i>
                        <div class="fs-4"><?php pll_e('La mejor opción para ti'); ?></div> 
                    </div>

                    <div class="col align-self-center">
                        <i class="fas fa-suitcase"></i>
                        <div class="fs-4"><?php pll_e('Experiencia en Bienes Raíces'); ?></div> 
                    </div>

                    <div class="col align-self-center">
                        <i class="fas fa-users"></i>
                        <div class="fs-4"><?php pll_e('Excelente equipo de trabajo'); ?></div> 
                    </div>

                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-12 col-lg-6">
                <?php $uneteimg2 = get_field('segunda_imagen') ?>
                <img class="w-100" src="<?php echo $uneteimg2['url'] ?>" alt="<?php echo $uneteimg2['title'] ?>" style="height:60vh; object-fit:cover;">
            </div>

            <div class="col-12 col-lg-6 px-3 px-lg-5" style="background-color:#A28234; color:#fff;">
                <h2 class="mt-5 fs-1 fw-light"><?php pll_e('Nuestro'); ?> <strong><?php pll_e('Equipo'); ?></strong></h2>
                <p class="mb-5 fs-4 fw-light">
                    <?php echo get_field( "team_desc" );?>
                </p>
                <div class="w-100 text-center text-lg-start">
                    <a href="#contact-form" class="my-4 px-4 btn btn-blanco"><?php pll_e('Contacto'); ?></a>
                </div>
            </div>

        </div>
        
        <div class="row justify-content-evenly" style="margin: 6rem 0;">


            <?php if( !empty($realtors) ): ?>
  
                <?php foreach( $realtors as $realtor ): ?>

                    <div class="col-11 col-md-4 col-lg-3 p-0 card-realtor text-center">

                        <?php $images = rwmb_meta( 'profile_picture', array( 'size' => 'thumbail', 'limit' => 1 ), $realtor->ID ); ?>

                        
                        <img class="img-realtor w-100" src="<?php echo $images[0]['url'] ?>" alt="Profile picture">

                        <span class="fs-2 d-block mt-4 fw-normal" ><?php echo get_the_title( $realtor->ID )?></span>
                        <span class="d-block realtor-pos"><?php echo rwmb_meta('realtor_position', $args=[], $realtor->ID); ?></span>

                        <?php 
                            $phone = rwmb_meta('realtor_phone_number', $args=[], $realtor->ID);
                            $mail =  rwmb_meta('realtor_email', $args=[], $realtor->ID);
                        ?>

                        <a class="d-block fs-5 fw-light" href="tel:<?php echo $phone ?>" style="color:black;">
                            <strong><?php pll_e('Teléfono') ?> / </strong><?php echo $phone; ?>
                        </a>
                        <a class="d-block fs-5 fw-light" href="mailto:<?php echo $mail ?>" target="_blank" style="color:black;">
                            <strong><?php pll_e('Correo') ?> / </strong><?php echo $mail; ?>
                        </a>

                       
                    </div>

           
                <?php endforeach; ?>
            
            <?php endif; ?>
            
        </div>

        <div class="row justify-content-center" id="contact-form">
            <h3 class="fs-2 fw-bold text-center mb-2" style="color:#A28234;"><?php pll_e('Únete a nuestro equipo'); ?></h3>
            <div class="col-12 col-md-8 col-lg-6 shadow-6 py-3 px-2 px-lg-5">
                <?php echo do_shortcode( '[contact-form-7 id="177" title="unete-form"]', true ); ?>
            </div>
        </div>

        <!--boton whatsapp-->
        <a href="https://wa.me/523221008151?text= " id="whatsapp" target="_blank"> 
            <i class="fab fa-whatsapp"></i>
        </a>

 
    </div>


<?php get_footer(); ?>
