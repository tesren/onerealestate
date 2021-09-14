<?php get_header(); ?>

<?php if( have_posts() ):?> 
                          
    <?php while( have_posts()):  the_post(); ?>

    <h1><?php echo the_title() ?></h1>
    <div><?php echo the_content() ?></div>
    
    <?php endwhile; ?>

<?php endif; ?>

   <!--contacto-->
   <div class="container-fluid my-5">
        <?php get_template_part( 'partials/content', 'contact-form' ); ?>
    </div>

    <!--boton whatsapp-->
    <a href="https://wa.me/523221008151?text= " id="whatsapp" target="_blank"> 
        <i class="fab fa-whatsapp"></i>
    </a>
<?php get_footer(); ?>