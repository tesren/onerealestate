      <!--boton Idioma-->
      <div id="boton-idioma"> 
        <ul class="lang-list list-unstyled">
          <?php pll_the_languages(array('hide_current'=> 1)); ?>
        </ul>
        <i class="fas fa-globe"></i>
      </div>

      <!--Boton de busqueda en movil-->
      <button title="<?php pll_e("Buscar");?>" type="button" class="btn d-block d-lg-none btn-search shadow-6" data-bs-toggle="modal" data-bs-target="#searchModal">
        <i class="fas fa-search"></i>
      </button>
      
      <!--FOOTER-->
    <div class="row text-center footer footer2 justify-content-center">

      <div class="col-md-2 d-none d-md-block">
        <img class="w-100" src="<?php echo get_template_directory_uri()."/assets/svgs/ore/logo-solo-onere.svg" ?>" alt="logo">
      </div>

      <div class="col-12 col-md-7">

        <h4 class="text-uppercase fw-bold fs-4">ONE REAL ESTATE</h4>

        <ul class="list-unstyled my-4">
          <li>
            <h6 href="#!" class="interlineado">Boulevard Nuevo Vallarta, Local 1</h6>
          </li>
          <li>
            <h6 href="#!" class="interlineado">Nuevo Vallarta, 63735</h6>
          </li>
          <li>
            <h6 href="#!" class="interlineado">Bahía de Banderas, Nayarit.</h6>
          </li>
        </ul>
        
        <ul class="list-inline">

            <li class="list-inline-item">
              <a href="https://www.facebook.com/onerealestatemexico" target="_blank">
                <i class="fab fa-2x fa-facebook-square"></i>
              </a>
            </li>
            
            <li class="list-inline-item">
              <a href="https://www.instagram.com/one_realestate_mexico/" target="_blank">
                <i class="fab fa-2x fa-instagram"></i>
              </a>
            </li>

        </ul>

      </div>

      <div class="col-md-2 d-none d-md-block">
        <img class="w-100" src="<?php echo get_template_directory_uri()."/assets/svgs/ore/logo-solo-onere.svg" ?>" alt="logo">
      </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <script src="https://kit.fontawesome.com/164e915f72.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
        <?php wp_footer();  ?>
    </body>
</html>