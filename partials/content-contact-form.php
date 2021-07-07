<div class="row">

        <div class="col-sm-6 order-sm-1 bg-azul text-start px-xxl-5" id="texto-formulario">
            <h3 class="">Por favor sientase libre de contactarnos por medio de nuestro formulario de contacto o por nuestros numeros de teléfono</h3>
        </div>
        
        <!--formulario-->
        <div class="col-sm-6 order-sm-12">
            <h3 class="pt-3 px-3 px-xxl-5 fs-1">Escríbenos</h3>
            <form id="v4youContactForm" action="#" class="text-start px-3 px-xxl-5" method="POST" data-url="<?php echo admin_url('admin-ajax.php');?>">
                <div class="form-floating mb-3">
                    <h4 class="labels-form-grande d-none d-xl-block">Nombre</h4>
                    <input type="text" class="form-control" id="name" name="name" placeholder="nombre" required>
                    <label class="labels-form-small d-xl-none" for="name">Nombre</label>
                </div>

                <div class="form-floating mb-3">
                    <h4 class="labels-form-grande d-none d-xl-block">Correo electrónico</h4>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    <label class="labels-form-small d-xl-none" for="email">Correo electrónico</label>
                </div>

                <div class="form-floating mb-3">
                    <h4 class="labels-form-grande d-none d-xl-block">Teléfono</h4>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="322 555 5555" required>
                    <label class="labels-form-small d-xl-none" for="phone">Teléfono</label>
                </div>

                <div class="form-floating mb-3">
                    <h4 class="labels-form-grande d-none d-xl-block">Mensaje</h4>
                    <textarea class="form-control" placeholder="Mensaje" id="message" name="message" style="height: 150px" required></textarea>
                    <label class="labels-form-small d-xl-none" for="message">Mensaje</label>
                </div>

                
                <button type="submit" class="btn btn-amarillo btn-lg">Enviar mensaje</button>

            </form>
        </div>

    </div>