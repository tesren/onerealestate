<?php 
    get_header();

    $developments = get_posts(array(
        'post_type' => 'developments',
        'numberposts' => -1,
        
    ));
    $listings = get_posts(array(
        'post_type' => 'listings',
        'numberposts' => -1,
    ));
?>

      <!--FORMULARIO-->
    <div class="row">
      <div style="padding: 0rem;" class="col-12">
        <section class="main py-5" style="height:90vh; background-image: url(<?php echo get_template_directory_uri() .'/assets/images/header.jpg';?>);">
          <!-- <div class="container py-5">
            <div class="row justify-content-center py-5">
              <div class="col-lg-12 py-5">
                <h1 class="text-white text-center">Busquemos el lugar de tus sueños</h1>
                <form action="#" method="post">
                  
                  <div class="form-row">
                    <div class="col-6 col-sm-4 col-lg-4">
                      <label for="tipo" class="sr-only">tipo</label>
                      <select class="form-control" name="tipo" id="tipo">
                        <option value="">RENTA</option>
                        <option value="">VENTA</option>
                      </select>
                    </div>
  
                    <div class="col-6 col-sm-4 col-lg-4">
                      <label for="tipo" class="sr-only">tipo</label>
                      <select class="form-control" name="tipo" id="tipo">
                        <option value="">TIPO</option>
                        <option value="">CASA</option>
                        <option value="">DEPARTAMENTO</option>
                      </select>                     
                    </div>
                    
                    <div class="col-12 col-sm-4 col-lg-4">
                      <label for="tipo" class="sr-only">tipo</label>
                      <select class="form-control" name="tipo" id="tipo">
                        <option value="">UBICACIÓN</option>
                        <option value="">PUERTO VALLARTA</option>
                        <option value="">PUNTA DE MITA</option>
                        <option value="">BUCERÍAS</option>
                      </select>
                    </div>
  
                  </div>
  
                  <div class="form-row"> 
                    <div class="col-12 text-right pad1">
                      <label for="tipo" class="sr-only">tipo</label>
                      <input type="button" class="btn1" value="BUSCAR">
                    </div>
                  </div>
  
                </form>
              </div>
            </div>
          </div> -->
        </section>
      </div>
    </div>



    <!--CARD-BOX-->

    <div class="row align-items-center p-1">

      <div class="col-sm-4">
          <div class="card text-end bg-light">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img
              src="https://mdbootstrap.com/img/new/standard/nature/111.jpg"
              class="img-fluid"
              />
              <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
              </a>
          </div>
          <div class="card-body">
              <div class="card-text d-flex justify-content-between">
              <h5 id="item-name">EN VENTA</h5>
              <span><h2>US $445,000</h2></span>
              </div>
              <h3>Casa frente a playa destiladoras</h3>
              <div class="flex1 align-items-center">
              <img class="icon-size margin1" src="<?php echo get_template_directory_uri(). '/assets/images/bed-solid.svg' ?>" alt="bed"><p class="margin1">2</p>
              <img class="icon-size margin1" src="<?php echo get_template_directory_uri(). '/assets/images/bath-solid.svg' ?>" alt="bath"><p class="margin1">2</p>
              <img class="icon-size margin1" src="<?php echo get_template_directory_uri(). '/assets/images/ruler-vertical-solid.svg' ?>" alt="ruler"><p class="margin1">362m</p>
              </div>
              <h5 style="margin-top: 0.5rem;">MARINA VALLARTA</h5>
              <a href="#!" ><p class="text-right">Mas info</p></a>
          </div>
          </div>
      </div>



    

    </div>
    

    <!--TITULO 1-->

    <div class="row text-center pad2">
        <h1 class="titulo2">RENTA Y VENTA DE PROPIEDADES<br>EN <span style="font-weight: bold;">PUERTO VALLARTA.</span></h1>
    </div>

    <!--IMAGEN VIVE EN EL PARAISO-->

    <div class="row">
        <img style="position: relative;
        z-index: 1;" src="<?php echo get_template_directory_uri() .'/assets/images/img-2.jpg';?>" class="img-fluid" alt="Vive en el paraiso">
    </div>

    <!--TESTIMONIALES-->

    <div style="padding-bottom: 3rem; padding-top: 10rem;" class="row text-center">
      <h1 style="font-weight: bold;">TESTIMONIALES</h1>
    </div>


    <div class="row justify-content-center" style="padding-bottom: 10rem;">

        <div class="col-sm-2 col-md-4 col-lg-2">
            <img src="<?php echo get_template_directory_uri() .'/assets/images/1.png';?>" class="img-size-1" alt="Testimonio 1">
        </div>

        <div class="col-sm-3 col-md-6 col-lg-3">
            <div><h3 class="text-2">Laura Montezv</h3></div>
            <div class="text-1"><p>Lorem ipsum dolor sit amet, consectetur
            adipiscing elit. Sed lobortis tellus a urna
            scelerisque venenatis. Quisque aliquet velit
            non tempor facilisis. Quisque sit amet aliquet
            leo, a fringilla diam.</p>
            </div>
        </div>

        <div class="col-sm-2 col-md-4 col-lg-2">
            <img src="<?php echo get_template_directory_uri() .'/assets/images/2.png';?>" class="img-size-1" alt="Testimonio 2">
        </div>

        <div class="col-sm-3 col-md-6 col-lg-3">
            <div><h3 class="text-2">Louis & Katy</h3></div>
            <div class="text-1"><p>Lorem ipsum dolor sit amet, consectetur
            adipiscing elit. Sed lobortis tellus a urna
            scelerisque venenatis. Quisque aliquet velit
            non tempor facilisis. Quisque sit amet aliquet
            leo, a fringilla diam.</p>
            </div>
        </div>

    </div>
 

    <!--TITULO 2 Y BOTON-->
    <div class="row">
        <div class="col-12">
            <div class="text-center p-2">
            <h1 class="text1">¿Quieres vender o rentar un <span style="font-weight:bold">inmueble?</span></h1>
            </div>

            <div style="padding-bottom: 10rem;" class="text-center">
            <button class="btn2">Hablar con un asesor</button>
            </div>
        </div>
    </div>
    
       
<?php get_footer(); ?>