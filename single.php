<?php get_header(); ?>

  <article>
  <?php the_title();?>
  <h2 style="color:#fff;">Hola Single Page</h2>
   <?php 
        if ( have_posts() ){
            
            while( have_posts() ){
                
                the_post();
                the_content();
            }
            
        }
    ?>
</article>
<?php get_footer(); ?>