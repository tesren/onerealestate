<?php 
if(is_front_page()) {
 get_header('front');
}
else {
 get_header();
} ?>
    <!--Acerca del proyecto-->
    <div class="container d-flex justify-content-center mt-5 mb-4 pt-5 pt-md-0">
        <img class="iconsvg" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg'?>">
        <h2 class=" text-center fs-1">CONÓCENOS MEJOR</h2>
        <img class="iconsvg" src="<?php echo get_template_directory_uri() .'/assets/images/decoration.svg'?>">           
    </div>
    
    <!--VENDEDORES-->

    <div class="container text-center">
        <h2 class="fs-1 mt-3">Nuestro equipo de trabajo</h2>
        
        <div class="row justify-content-center mt-4">
            <?php 
            
                $realtors = get_posts(array(
                    'post_type' => 'realtors',
                    'numberofposts' => -1

                    )

                );
                
            ?>

            <?php if( $realtors ): ?>
  
                <?php foreach( $realtors as $realtor ): ?>

                <?php
                    $images = rwmb_meta( 'profile_picture', array( 'size' => 'full', 'limit' => 1 ), $realtor->ID ); 
                    $image = reset( $images );?>

            <div class="col-10 col-md-5 bg-light my-3 mx-4 px-0" >
                    <div class="row justify-content-start justify-content-md-start text-center text-md-start ">
                        
                        <div class="col-md-6">
                            <img class="img-fluid w-100" src="<?php echo $image['url']; ?>">
                        </div>
    
                        <div class="col-md-5 my-3 ms-2">
                            <h4 class="fs-2 fw-bold tr-nosotros-h4"><?php echo get_the_title( $realtor->ID); ?></h4>
                            <h4 class="fs-3 my-2"><?php echo $realtor->realtor_position; ?></h4>
                            <h5 class="tr-nosotros-h4"><?php echo $realtor->realtor_phone_number; ?></h5>
                            <h5 class="tr-nosotros-h4"><?php echo $realtor->realtor_email; ?></h5>
                        </div>
    
                    </div>
            </div>
                <?php endforeach; ?>
            
            <?php endif; ?>

        </div>

    </div>

    <!--VALORES DE LA EMPRESA-->

    <div class="container">
        <div class="row justify-content-center mt-5" style="height: 50vh;">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tierra_light text-center pb-4">VALORES DE LA EMPRESA</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-6 pb-3">
                        <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-handshake m-2 fa-2x" alt="Equipo"></i><p>Respeto</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6 pb-3">
                        <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-check fa-2x m-2" alt="Resolución"></i><p>Resolución</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 pb-3">
                        <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-users fa-2x m-2" alt="Equipo"></i><p>Trabajo en equipo</p>
                        </div>
                    </div>
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-6 col-lg-4">
                        <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-tie fa-2x m-2" alt="Profesionalismo"></i><p>Profesionalismo</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4">
                        <div class="d-flex align-items-center justify-content-center">
                         <i class="fas fa-hand-paper fa-2x m-2" alt="Honestidad"></i><p>Honestidad</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--MISION-->
    <div class="container">
        <div style="height: 50vh;" class="row justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-12">
                    <h2 class="tierra_light text-center">MISIÓN</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="fs-3 text-center">Garantizarle al cliente productos de calidad y el mejor servicio de la bahía.
                        </p>
                    </div>
                </div>
            </div>
        </div>   
    </div>

    <!--VISION>
    <div class="container">
        <div style="height: 50vh;" class="row justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-12">
                    <h2 class="tierra_light text-center">VISION</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="fs-3 text-center">Ser la inmobiliaria que más venda en línea para el 2024.
                        </p>
                    </div>
                </div>
            </div>
        </div>   
    </div-->


<?php get_footer(); ?>
