<div class="row contact-form  justify-content-center">

        <div class="col-lg-6 px-2 px-lg-0 text-center">
            <img class=" img-fluid mx-0 mx-lg-4 mt-1 mt-lg-4" src="<?php echo get_template_directory_uri() .'/assets/images/logo-onereal-cuadrado.png';?>" alt="One Real Estate Contact">
        </div>
        
        <!--formulario-->
        <div class="col-lg-6 px-3 px-lg-5">

            <h3 class="text-center text-lg-start fs-1 mt-3 mt-lg-1 mb-2"><?php pll_e('Contacto'); ?></h3>

            <?php if(pll_current_language()=="es"): ?>
                <?php echo do_shortcode( '[contact-form-7 id="151" title="Formulario de contacto 1"]', true ) ?>
            <?php else:?>
                <?php echo do_shortcode( '[cf7form cf7key="formulario-de-contacto-ingles"]', true ) ?>
            <?php endif; ?>
        </div>

</div>