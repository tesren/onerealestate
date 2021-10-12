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

get_header();


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

    if($_GET['minconst'] && !empty($_GET['minconst']))
    {
        if(pll_current_language()=="en"){
            $minconstfeet = $_GET['minconst'];

            $minconst = $minconstfeet * 0.0929;

        }else{
            $minconst = $_GET['minconst'];
        }

    } else {
        $minconst = -1;
    }

    if($_GET['maxconst'] && !empty($_GET['maxconst']))
    {
        if(pll_current_language()=="en"){
            $maxconstfeet = $_GET['maxconst'];

            $maxconst = $maxconstfeet * 0.0929;

        }else{
            $maxconst = $_GET['maxconst'];
        }
        
    } else {
        $maxconst = 999999999;
    }?>
    


        <div class="container-fluid landing-desarrollos" style="position:relative;">
            <img class="w-100 img-fluid mobile-img" src="<?php echo get_template_directory_uri(). '/assets/images/renta-headImg.jpg' ?>" alt="Renta">

            <div class="content">
                <h1 class="fw-light p-0 mb-0"><?php pll_e('VENTA')?></h1>
                <hr class="mt-0 mb-3" style="opacity:1;">
                <p class="fs-5"><?php pll_e('Venta y Administracion de Propiedades en Puerto Vallarta-Riviera Nayarit')?></p>
                <a href="#all-listings" class="btn btn1 mt-4"><?php pll_e('Más Info'); ?></a>
            </div>
        </div>

        <div class="row justify-content-center my-5">
            <div class="col-10 col-md-8 col-lg-6">
                <button title="<?php pll_e("Buscar");?>" type="button" class="btn d-flex justify-content-center mx-auto btn-search shadow-6" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <i class="fas fa-search"></i>
                    <span class="d-flex ms-2"><?php pll_e("Buscar");?></span>
                </button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title fs-2" id="searchModalLabel"><?php pll_e("Busqueda"); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="<?php get_the_permalink(); ?>" method="get">

                        <label for="regiones_s">Ubicación</label>
                        <select class="form-select w-100 mb-3" aria-label="Default select example" id="regiones_s" name="regiones_s">
                            <option selected value="">Selecciona uno</option>
                            <?php foreach($regiones as &$category):
                                $childrenTerms =  get_term_children( $category->term_id, 'regiones' );

                                    foreach($childrenTerms as $child) :     
                                        $term = get_term_by( 'id', $child, 'regiones');?>
                                        <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                                    <?php endforeach; ?>

                            <?php endforeach; ?>
                        </select>

                        <label for="type_s">Tipo de propiedad</label>
                        <select class="form-select w-100 mb-3" aria-label="Default select example" id="type_s" name="type_s">
                            <option selected value="">Selecciona uno</option>

                            <?php foreach($propertiesType as &$type):?>
                                <option value="<?php echo $type->slug; ?>"><?php echo $type->name; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <div class="row justify-content-center mb-3">
                            <label class="text-center mb-2"><?php pll_e('Rango de precios')?></label>

                            <input class="col-3 search-form" type="number" name="minprice" id="minprice" placeholder="Min" readonly>
                            <span class="col-1 fs-4 text-center">-</span>
                            <input class="col-3 search-form" type="number" name="maxprice" id="maxprice" placeholder="Max" readonly>
                            <div id="slider-range-precios" class="mt-2 col-11"></div>
                           
                        </div>

                        <div class="row justify-content-center mb-3">
                            <label class="text-center mb-2"><?php pll_e('Rango de Recámaras'); ?></label>
                            <input class="col-3 search-form" type="number" name="minbeds" id="minbeds" placeholder="Min" readonly>
                            <span class="col-1 fs-4 text-center">-</span>
                            <input class="col-3 search-form" type="number" name="maxbeds" id="maxbeds" placeholder="Max" readonly>
                            <div id="slider-range-beds" class="mt-2 col-11"></div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <label class="text-center mb-2"><?php pll_e('Rango de m²'); ?></label>
                            <input class="col-3 search-form" type="number" name="minconst" id="minconst" placeholder="Min" readonly>
                            <span class="col-1 fs-4 text-center">-</span>
                            <input class="col-3 search-form" type="number" name="maxconst" id="maxconst" placeholder="Max" readonly>
                            <div id="slider-range-const" class="mt-2 col-11"></div>
                        </div>

                </div>

                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn1 w-100"><?php pll_e("Buscar"); ?></button>
                    </form>
                </div>

                </div>
            </div>
        </div><!-- End Modal -->


        <?php
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
                            'key' => 'construction',
                            'type' => 'NUMERIC',
                            'value' => array($minconst, $maxconst),
                            'compare' => 'BETWEEN'
                        ),
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

                $query = new WP_Query($args);
                
        ?>
        

        <div class="row p-0 mx-0 mb-5" id="all-listings">

            <?php if( $query -> have_posts() ): 
                
                $i = 1;
                ?>
                
                <?php while( $query -> have_posts()):  $query -> the_post();

                $images = rwmb_meta( 'listing_gallery', array( 'size' => 'large', 'limit' => '1' ) );?>
            
                    
                    <div class="col-12 p-0 m-0 text-center text-lg-start listings-rentals <?php if( $i%2 == 0 ){echo 'listings-dorado';}?>">
                        <div class="row">
                            
                            <div class="col-lg-6 <?php if( $i%2 == 0 ){echo 'order-1 order-lg-2';}?>">
                                <?php foreach ( $images as $image ) {?>
                                    <a href="<?php echo get_the_permalink();?>">
                                        <img class="img-fluid w-100" src="<?php echo $image['url'];?>" alt="Listing image">
                                    </a>
                                <?php } ?>
                            </div>

                            <div class="col-lg-6 ps-0 pe-0 ps-lg-5 <?php if( $i%2 == 0 ){echo 'order-2 order-lg-1 text-lg-end pe-lg-5';}?>">
                                <div class="mb-0 mt-3 d-flex justify-content-center justify-content-lg-<?php if( $i%2 == 0 ){echo 'end';}else{echo 'start';}?>">
                                    <span class="pr-type-archive px-2 mx-2"><?php echo onere_get_property_type(get_the_ID(),'property_type'); ?></span>
                                    <span class="fw-light"><?php echo pll_e(rwmb_meta('avaliable'));?></span>
                                </div>
                                
                                <h2 class="mt-3 pt-lg-1 "><?php echo get_the_title();?></h2>
                                <hr class="<?php if( $i%2 == 0 ){echo 'hr-dorado';}?>" >
                                <h5 class="my-3"><i class="fas fa-map-marker-alt me-1"></i><?php onere_get_list_terms(get_the_ID(), 'regiones'); ?></h5>
                                
                                <!--camas baños y construction-->
                                <div class="row fw-bold fs-5 justify-content-center text-center justify-content-lg-<?php if( $i%2 == 0 ){echo 'end';}else{echo 'start';}?> my-4">
                                    <div class="col-7 col-md-3">
                                        <i class="fas fa-bed "></i> 
                                        <?php echo rwmb_meta('bedrooms');?> <?php pll_e('Recámaras')?>
                                    </div>
                                    <div class="col-7 col-md-3">
                                        <i class="fas fa-shower "></i> 
                                        <?php echo rwmb_meta('bathrooms');?> <?php pll_e('Baños'); ?>
                                    </div>
                                    <div class="col-7 col-md-3">
                                        <i class="fas fa-home "></i>
                                        <?php echo onere_get_sqft(pll_current_language() ,rwmb_meta('construction'));?>
                                    </div>
                                </div>
                                
                                <!--precio y moneda-->
                                <h2 class="my-3"><?php echo rwmb_meta( 'currency');?>$<?php echo number_format(rwmb_meta('price'));?></h2>
                                
                                <a href="<?php echo get_the_permalink();?>" class="btn btn1 mt-3 mb-5 mb-lg-1"><?php pll_e('Más Info');?></a>
                            </div>

                        </div>
                    </div>

                
                                    
                <?php   
                        $i++;
                        endwhile; 
                        the_posts_pagination();
                        wp_reset_postdata();
                        else:?>
                        <div class="container text-center my-5">
                            <span class="fs-1">No hay resultados</span>
                        </div>
            <?php endif; ?>

        </div>
        
<?php get_footer(); ?>