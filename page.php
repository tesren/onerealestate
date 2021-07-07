<?php /*
@package vallarta4yourentalstheme
*/
get_header(); 
?>
<article class="v4you-page-dark-color mt-5">
<?php the_title('<h1 class="v4you-title">','</h1>');?>

<?php 
        if ( have_posts() ){
            
            while( have_posts() ){
                
                the_post();
                the_content(); ?>
<?php       }
            
        }
    ?>
</article>
<?php get_footer(); ?>