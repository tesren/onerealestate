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

        <!--boton whatsapp-->
        <a href="https://wa.me/523221008151?text= " id="whatsapp" target="_blank"> 
            <i class="fab fa-whatsapp"></i>
        </a>

 
    </div>


<?php get_footer(); ?>
