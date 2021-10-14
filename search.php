<?php 
    $regiones = get_terms( array(
        'taxonomy'          => 'regiones',
        'parent'            => 0,
        'hide_empty'        => false,
    ) );

    $propertiesType = get_terms( array(
        'taxonomy'          => 'property_type',
        'parent'            => 0,
        'hide_empty'        => false,
    ) );

    if($_GET['regiones_s'] && !empty($_GET['regiones_s']))
    {
        $regiones_s = $_GET['regiones_s'];

    }else{
        $regiones_s = array(); 

        foreach($regiones as &$category):
            $childrenTerms =  get_term_children( $category->term_id, 'regiones' );

                foreach($childrenTerms as $child) :     
                    $term = get_term_by( 'id', $child, 'regiones');
                    array_push($regiones_s, $term->slug);
                 endforeach; 

         endforeach;
    }

    if($_GET['type_s'] && !empty($_GET['type_s']))
    {
        $pType = $_GET['type_s'];
    }
    else{
        $pType = array();

        foreach ($propertiesType as $propertyType){
            array_push($pType, $propertyType->slug);
        } 
    }

    if($_GET['minprice'] && !empty($_GET['minprice']))
    {
        $minprice = $_GET['minprice'];
    } else {
        $minprice = 0;
    }

    if($_GET['maxprice'] && !empty($_GET['maxprice']))
    {
        $maxprice = $_GET['maxprice'];
    } else {
        $maxprice = 999999999;
    }

    if($_GET['minbeds'] && !empty($_GET['minbeds']))
    {
        $minbeds = $_GET['minbeds'];
    } else {
        $minbeds = -1;
    }

    if($_GET['maxbeds'] && !empty($_GET['maxbeds']))
    {
        $maxbeds = $_GET['maxbeds'];
    } else {
        $maxbeds = 999999999;
    }

    if($_GET['currency'] && !empty($_GET['currency']))
    {
        $currency = $_GET['currency'];
    } else {
        $currency = array('MXN','USD');
    }

    if($_GET['post_type'] && !empty($_GET['post_type']))
    {
        $post_type = $_GET['post_type'];
    } else {
        $post_type = array('listings','rentals');
    }

    get_header();

    if($post_type =="listings"):
        $args = array(
            'post_type' => 'listings',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key' => 'price',
                    'type' => 'NUMERIC',
                    'value' => array($minprice, $maxprice),
                    'compare' => 'BETWEEN'
                ),
                array(
                    'key' => 'bedrooms',
                    'type' => 'NUMERIC',
                    'value' => array($minbeds, $maxbeds),
                    'compare' => 'BETWEEN'
                ),
                array(
                    'key' => 'currency',
                    'value' => $currency,
                    'compare' => 'LIKE'
                ),

                /* array(
                    'key' => 'construction',
                    'type' => 'NUMERIC',
                    'value' => array($minconst, $maxconst),
                    'compare' => 'BETWEEN'
                ), */
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'property_type',
                    'field'    => 'slug',
                    'terms'    => $pType,
                ),
                array(
                    'taxonomy' => 'regiones',
                    'field'    => 'slug',
                    'include_children' => true,
                    'terms'    => $regiones_s,
                ),
            ),
        );
    else:
        $args = array(
            'post_type' => 'rentals',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key' => 'bedrooms',
                    'type' => 'NUMERIC',
                    'value' => array($minbeds, $maxbeds),
                    'compare' => 'BETWEEN'
                ),
                array(
                    'key' => 'currency',
                    'value' => $currency,
                    'compare' => 'LIKE'
                ),

                /* array(
                    'key' => 'construction',
                    'type' => 'NUMERIC',
                    'value' => array($minconst, $maxconst),
                    'compare' => 'BETWEEN'
                ), */
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'property_type',
                    'field'    => 'slug',
                    'terms'    => $pType,
                ),
                array(
                    'taxonomy' => 'regiones',
                    'field'    => 'slug',
                    'include_children' => true,
                    'terms'    => $regiones_s,
                ),
            ),
        );
    endif;

    $query = new WP_Query($args);
    
?>

<div class="container-fluid p-0" style="min-height:80vh;">

    <?php if($query -> have_posts()):?>
       
    
        <div class="row justify-content-center ms-0 ms-lg-4 mb-4 contenedor-margin" >

            <div class="col-12 col-md-10 col-lg-9 p-0  mt-3">
                <span class="fs-1 d-block fw-light text-center text-lg-start" style="color: #76726A;"><?php echo pll_e('Resultados') ?></span>
            </div>

        </div>

        <div class="row justify-content-center" id="search-page" >

            <!--Si busca listings-->
            <?php if($post_type=="listings"): ?>

                <?php while($query -> have_posts() ):$query -> the_post(); 
                    $portada = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ) , 'full' );
                    $imagesListing = rwmb_meta( 'listing_gallery', array( 'size' => 'large', 'limit'=>1 ), get_the_ID() );
                    $imagesRental = rwmb_meta( 'rental_gallery', array( 'size' => 'large' ,'limit'=>1), get_the_ID() );
                    $imagesDevs = rwmb_meta( 'more_photos', array( 'size' => 'large', 'limit'=>1 ), get_the_ID() );
            ?>
            

                <div class="col-12 col-md-10 col-lg-9">


                    <div class="row mb-3">

                        <div class="col-lg-4">
                            <a href="<?php echo get_the_permalink(); ?>">
                                <img style="border-radius:10px; height: 300px; object-fit:cover;" class="w-100" src="<?php 
                                    if(!empty($imagesListing[0]['url']) ){
                                        echo $imagesListing[0]['url'];
                                    }elseif(!empty($imagesRental[0]['url'])){
                                        echo $imagesRental[0]['url'];
                                    }else{
                                        echo $imagesDevs[0]['url'];
                                    } 
                                ?>" alt="">
                            </a>
                        </div>

                        <div class="col-lg-8">

                            <div class="d-flex mt-2">
                            
                                <span class="pr-type-archive px-2 me-2">
                                    <?php 
                                        if( !empty($imagesListing[0]['url']) ){
                                            echo onere_get_property_type(get_the_ID(),'property_type');
                                        }elseif(!empty($imagesRental[0]['url'])){
                                            echo onere_get_property_type(get_the_ID(),'property_type');
                                        }else{
                                            pll_e('Desarrollo');
                                        } 
                                    ?>
                                </span>
                                <span class="ms-2 fw-light"><?php echo onere_get_list_terms(get_the_ID(), 'regiones'); ?></span>
                            </div>

                            <a href="<?php echo get_the_permalink(); ?>">
                                <h2 class="fs-2 mt-1"><?php the_title(); ?></h2>
                                <p class="secondary-text"><?php echo get_the_excerpt(); ?></p>
                            </a>

                            <div class="d-flex mt-3 fs-5 secondary-text">
                                <span class="me-4"><i class="fas fa-bed"></i> <?php echo rwmb_meta('bedrooms'); ?> <?php pll_e('Recámaras')?></span>
                                <span class="me-4"><i class="fas fa-shower"></i> <?php echo rwmb_meta('bathrooms'); ?> <?php pll_e('Baños'); ?></span>       
                                <span><i class="fas fa-home"></i> <?php echo onere_get_sqft(pll_current_language() ,rwmb_meta('construction'));?></span>
                            </div>

                            <span class="d-block fs-1 mt-3 text-center text-lg-start" style="color:#A28234;">
                                <?php echo rwmb_meta( 'currency');?>$<?php echo number_format(rwmb_meta('price'));?>
                            </span>

                        </div>
                        <hr class="mt-2">
                    </div>


                </div>

                
            <?php endwhile; 
            the_posts_pagination(); 

            //si busca rentals
            else:?>

                <?php while($query -> have_posts() ):$query -> the_post(); 
                    $portada = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ) , 'full' );
                    $imagesListing = rwmb_meta( 'listing_gallery', array( 'size' => 'large', 'limit'=>1 ), get_the_ID() );
                    $imagesRental = rwmb_meta( 'rental_gallery', array( 'size' => 'large' ,'limit'=>1), get_the_ID() );
                    $imagesDevs = rwmb_meta( 'more_photos', array( 'size' => 'large', 'limit'=>1 ), get_the_ID() );

                    //precios
                    $pricesBaja = rwmb_meta( 'precio-baja' ); 
                    $priceNoche = $pricesBaja['noche'];
                    $priceSemana = $pricesBaja['semana'];
                    $priceMes = $pricesBaja['mes'];
                    $lowest_price = check_empty_prices($priceNoche, $priceSemana,$priceMes);
                ?>
            
                    <?php if($lowest_price <= $maxprice && $lowest_price >= $minprice ): ?>
                        <div class="col-12 col-md-10 col-lg-9">


                            <div class="row mb-3">

                                <div class="col-lg-4">
                                    <a href="<?php echo get_the_permalink(); ?>">
                                        <img style="border-radius:10px; height: 300px; object-fit:cover;" class="w-100" src="<?php 
                                            if(!empty($imagesListing[0]['url']) ){
                                                echo $imagesListing[0]['url'];
                                            }elseif(!empty($imagesRental[0]['url'])){
                                                echo $imagesRental[0]['url'];
                                            }else{
                                                echo $imagesDevs[0]['url'];
                                            } 
                                        ?>" alt="">
                                    </a>
                                </div>

                                <div class="col-lg-8">

                                    <div class="d-flex mt-2">
                                    
                                        <span class="pr-type-archive px-2 me-2">
                                            <?php 
                                                if( !empty($imagesListing[0]['url']) ){
                                                    echo onere_get_property_type(get_the_ID(),'property_type');
                                                }elseif(!empty($imagesRental[0]['url'])){
                                                    echo onere_get_property_type(get_the_ID(),'property_type');
                                                }else{
                                                    pll_e('Desarrollo');
                                                } 
                                            ?>
                                        </span>
                                        <span class="ms-2 fw-light"><?php echo onere_get_list_terms(get_the_ID(), 'regiones'); ?></span>
                                    </div>

                                    <a href="<?php echo get_the_permalink(); ?>">
                                        <h2 class="fs-2 mt-1"><?php the_title(); ?></h2>
                                        <p class="secondary-text"><?php echo get_the_excerpt(); ?></p>
                                    </a>

                                    <div class="d-flex mt-3 fs-5 secondary-text">
                                        <span class="me-4"><i class="fas fa-bed"></i> <?php echo rwmb_meta('bedrooms'); ?> <?php pll_e('Recámaras')?></span>
                                        <span class="me-4"><i class="fas fa-shower"></i> <?php echo rwmb_meta('bathrooms'); ?> <?php pll_e('Baños'); ?></span>
                                        <span><i class="fas fa-male"></i> <?php echo rwmb_meta('rentals_capacity');?> <?php pll_e('Huéspedes') ?></span>
                                    </div>

                                    <span class="d-block fs-1 mt-3 text-center text-lg-start" style="color:#A28234;">
                                        <?php pll_e('Precios desde:')?> <?php echo rwmb_meta( 'currency');?>$<?php echo number_format(check_empty_prices($priceNoche, $priceSemana, $priceMes));?>
                                    </span>
                                
                                </div>
                                <hr class="mt-2">
                            </div>

                        </div>
                    <?php endif; ?>
                
                <?php endwhile; 
                    the_posts_pagination(); ?>

        <?php endif;?>

        

        </div>
    
        <?php else:?>
        <div class="container contenedor-margin text-center pt-5" >
            <h1 class="mb-5"><?php echo pll_e('No hay resultados');?></h1>
            <a class="btn btn1 w-25" href="<?php echo get_home_url(); ?>"><?php echo pll_e('Volver'); ?></a>
        </div>
        
   
    <?php endif; ?>

    </div><!--container-fluid-->
<?php get_footer(); ?>