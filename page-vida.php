<!DOCTYPE html>
<html lang="es">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>One Real Estate Vacacional - Descubre la llave que le da acceso al extraordinario mundo vacacional.</title>
        <meta name="description" content="FR Vacacional descubre la llave que le da acceso al extraordinario mundo vacacional.">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets/css/splide.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">        

        <?php wp_head(); ?>

        <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/assets/css/vida-styles.css">
    </head>

<body  <?php body_class(); ?>>

  
    <div class="position-relative">
        
        <div class="row justify-content-center position-absolute w-100 h-100 top-0 start-0" id="video-text">
            <div class="col-12 align-self-center text-center">
                <img class="col-7 col-lg-4 mx-auto" src="<?php echo get_template_directory_uri()?>/assets/img/vg-logo.png" alt="Vida Getaway logo">
                <h1 class="text-white mt-5">
                    TE DAMOS LA LLAVE QUE DA ACCESO AL <br>
                    EXTRAORDINARIO MUNDO VACACIONAL
                </h1>
            </div>
        </div>

        <video id="introducing-video" class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/videos/vg-introducing-video.mp4" poster="<?php echo get_template_directory_uri(); ?>/assets/img/vg-home-banner.jpeg" controls="false" autoplay muted style="min-height:40vh; max-height:100vh; object-fit:cover;"></video>
    </div>

    <div class="text-center ff-montserrat mb-6">
        <h2 class="fs-5 fw-light my-6">
            <span class="text-blue">ENCUENTRA TU SIGUIENTE DESTINO CON</span> <br> 
            <span class="fs-1 fw-normal">ONE REAL ESTATE</span>
        </h2>

        <h2 class="fs-3 fw-normal mb-4">¿Quiénes somos?</h2>
        <p class="fs-5 col-12 col-lg-6 mx-auto text-secondary">One Real Estate es una comercializadora autorizada de Vida Getaway es un programa de certificados vacacionales que, con una tarifa preferencial por única ocasión, le permitirá conocer los espectaculares desarrollos en cualquiera de los paradisíacos destinos de Vidanta y crear momentos inolvidables de felicidad.</p>
    </div>

    <div class="row bg-darkblue ff-montserrat py-5 mb-6">

        <div class="col-12 col-lg-4 text-center align-self-center mb-3 mb-lg-0">
            <h3 class="fs-2 text-blue fw-normal">Destinos</h3>
        </div>

        <div class="col-12 col-lg-8">
            <p class="fs-6">En cualquiera de los destinos, usted y su familia podrán disfrutar de actividades para todas las edades, desde máxima relajación en exclusivos spas, increíbles caminatas en hermosos paisajes naturales, desafiantes rondas de golf en los mejores campos del país, exquisita gastronomía de clase mundial, y por supuesto, el mejor servicio de México. Los destinos que Vida Getaway ofrece son: Nuevo Vallarta, Riviera Maya, Acapulco, Los Cabos, Puerto Peñasco, Puerto Vallarta y Mazatlán.</p>
        </div>

        <div class="col-12 mt-5">

            <section id="image-carousel" class="splide" aria-label="Beautiful Images">
                <div class="splide__track">
                    <ul class="splide__list">

                        <li class="splide__slide position-relative">
                            <img src="<?php echo get_template_directory_uri()?>/assets/img/acapulco.jpeg" alt="Acapulco" loading="lazy">

                            <div class="row justify-content-center position-absolute bottom-0 start-0 w-100">
                                <div class="col-10 col-lg-7 bg-light text-dark text-center p-3 mb-1 fs-5">
                                    ACAPULCO
                                </div>
                            </div>
                            
                        </li>
                    
                        <li class="splide__slide position-relative">
                            <img src="<?php echo get_template_directory_uri()?>/assets/img/los-cabos.jpeg" alt="Los Cabos" loading="lazy">
                            <div class="row justify-content-center position-absolute bottom-0 start-0 w-100">
                                <div class="col-10 col-lg-7 bg-light text-dark text-center p-3 mb-1 fs-5">
                                    LOS CABOS
                                </div>
                            </div>
                        </li>

                        <li class="splide__slide position-relative">
                            <img src="<?php echo get_template_directory_uri()?>/assets/img/mazatlan.jpeg" alt="Mazatlán" loading="lazy">
                            <div class="row justify-content-center position-absolute bottom-0 start-0 w-100">
                                <div class="col-10 col-lg-7 bg-light text-dark text-center p-3 mb-1 fs-5">
                                    MAZATLÁN
                                </div>
                            </div>
                        </li>

                        <li class="splide__slide position-relative">
                            <img src="<?php echo get_template_directory_uri()?>/assets/img/nuevo-vallarta.jpeg" alt="Nuevo Vallarta" loading="lazy">
                            <div class="row justify-content-center position-absolute bottom-0 start-0 w-100">
                                <div class="col-10 col-lg-7 bg-light text-dark text-center p-3 mb-1">
                                    NUEVO VALLARTA
                                </div>
                            </div>
                        </li>

                        <li class="splide__slide position-relative">
                            <img src="<?php echo get_template_directory_uri()?>/assets/img/puerto-penasco.jpeg" alt="Puerto Peñasco" loading="lazy">
                            <div class="row justify-content-center position-absolute bottom-0 start-0 w-100">
                                <div class="col-10 col-lg-7 bg-light text-dark text-center p-3 mb-1">
                                    PUERTO PEÑASCO
                                </div>
                            </div>
                        </li>

                        <li class="splide__slide position-relative">
                            <img src="<?php echo get_template_directory_uri()?>/assets/img/riviera-maya.jpeg" alt="Riviera Maya" loading="lazy">
                            <div class="row justify-content-center position-absolute bottom-0 start-0 w-100">
                                <div class="col-10 col-lg-7 bg-light text-dark text-center p-3 mb-1">
                                    RIVIERA MAYA
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </section>

        </div>

    </div>

    <div class="ff-montserrat mb-6">
        <h3 class="text-center mb-6">
            <span class="fs-5 fw-light text-blue">DESCUBRIENDO EL EXTRAORDINARIO</span> <br>
            <span class="fs-1 fw-normal">MUNDO DE VIDANTA</span>
        </h3>

        <div class="row">

            <div class="col-12 col-lg-4 mb-3">
                <a href="#resortModal" class="position-relative d-block text-decoration-none link-dark" data-bs-toggle="modal" data-bs-target="#resortModal">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hotelsresorts.jpeg" alt="Hoteles" class="w-100" loading="lazy">
                    <div class="text-center fs-4 w-100 position-absolute bottom-0 start-0 p-3" style="background-color: rgba(255,255,255,0.6);">
                        HOTELES RESORTS
                    </div>
                </a>
            </div>

            <div class="col-12 col-lg-4 mb-3">
                <a href="#resortModal" class="position-relative d-block text-decoration-none link-dark" data-bs-toggle="modal" data-bs-target="#funModal">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/entertainment.jpeg" alt="Hoteles" class="w-100" loading="lazy">
                    <div class="text-center fs-4 w-100 position-absolute bottom-0 start-0 p-3" style="background-color: rgba(255,255,255,0.6);">
                        ENTRETENIMIENTO
                    </div>
                </a>
            </div>

            <div class="col-12 col-lg-4 mb-3">
                <a href="#resortModal" class="position-relative d-block text-decoration-none link-dark" data-bs-toggle="modal" data-bs-target="#experienceModal">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/experience.jpeg" alt="Hoteles" class="w-100" loading="lazy">
                    <div class="text-center fs-4 w-100 position-absolute bottom-0 start-0 p-3" style="background-color: rgba(255,255,255,0.6);">
                        EXPERIENCIAS
                    </div>
                </a>
            </div>

        </div>

    </div>

    <div class="steps ff-montserrat">
        <h3 class="text-uppercase text-center fw-normal">
            <span class="text-blue fs-2">¿Cómo puedo obtener</span> <br>
            <span class="fs-1">mi certificado vida getaway?</span>
        </h3>

        <hr class="w-25 mx-auto">

        <div class="text-center col-12 col-lg-7 mx-auto mb-6">
            <p class="my-4 fs-5">¡Es muy sencillo! únicamente seleccione a su comercializador autorizado y siga los tres sencillos pasos que le mostramos a continuación:</p>
            <a class="btn btn-dark rounded-0" rel="noopener noreferrer" href="https://www.vidagetaway.com/assets/files/vg-comercializadores-autorizados.pdf?v=349f7sif" target="_blank">
                LISTA DE COMERCIALIZADORES AUTORIZADOS 
                <i class="fa-solid fa-chevron-right"></i>
            </a>
        </div>

        <!-- Steps -->
        <div class="row justify-content-center steps">

            <div class="col-11 col-lg-6 d-flex steps-element">
                <div class="title me-3">1</div>
                <div>
                    <h5 class="fs-3 fw-normal">Elija su destino.</h5>
                    <p>Una vez que su comercializador autorizado le comparta la información de los múltiples destinos de Vidanta, analice y seleccione el que más se adecúe a sus planes vacacionales.</p>
                </div>
            </div>

            <div class="w-100"></div>

            <div class="col-11 col-lg-6 d-flex steps-element">
                <div class="title me-3">2</div>
                <div>
                    <h5 class="fs-3 fw-normal">Seleccione su certificado.</h5>
                    <p>Cada desarrollo cuenta con distintos hoteles resorts y tipos de unidades. Su asesor le ayudará a elegir la indicada, así como también a definir si su preferencia vacacional es entre 3 a 7 noches.</p>
                </div>
            </div>

            <div class="w-100"></div>

            <div class="col-11 col-lg-6 d-flex steps-element">
                <div class="title me-3">3</div>
                <div>
                    <h5 class="fs-3 fw-normal">Realice el pago y reserve sus próximas vacaciones.</h5>
                    <p>Una vez habiendo seleccionado el destino, hotel, tipo de unidad y número de noches, el comercializador le compartirá los detalles del precio final de su certificado, así como los datos para realizar el pago correspondiente. Una vez efectuado, recibirá su certificado digital con un número único de confirmación. Para reservar su estadía, simplemente deberá llamar al Centro de Atención Vida Getaway al 800-364-56-00 y proporcionar su nombre completo y el número único de confirmación de su certificado digital.</p>
                </div>
            </div>

        </div>
        
        <p class="text-center fs-4 my-5">¡Listo, prepárese para disfrutar al máximo de las más extraordinarias vacaciones!</p>
        
    </div>


    <div class="asesor my-5 ff-montserrat">
        <h5 class="fw-normal">
            <span class="fs-3 text-blue">¿CÓMO IDENTIFICAR A MI</span> <br>
            <span class="fs-2">COMERCIALIZADOR AUTORIZADO?</span>
        </h5>

        <hr class="w-25 mx-auto">
        <p class="fs-6 col-12 col-lg-7 mx-auto">Todos los comercializadores autorizados de Vida Getaway, así como sus equipos de ventas, cuentan con&nbsp;una identificación digital, la cual consta de 4 elementos: fotografía, nombre, puesto y teléfono de contacto.</p>
    </div>

    <div class="text-center ff-montserrat mb-5">
        <p class="fs-4 mb-4">LE INVITAMOS A LLAMAR AL</p>
        <a class="btn btn-dark rounded-0 mb-4" role="button" href="tel:800-364-56-00">800-364-56-00</a>
        <p class="fs-4 text-uppercase">&nbsp;donde usted podrá validar esta información.<br></p>
    </div>


    <!-- Terms -->
    <div class="terms ff-montserrat">
        <h5 class="fw-bold fs-5 mb-4">Términos y Condiciones<br></h5>
        <ol>
            <li>Certificado Getaway sujetos a disponibilidad de hospedaje. </li>
            <li>El Certificado Vida Getaway (en adelante el “Certificado”) podrán incluir desde 3 (tres) y hasta 7 (siete) noches consecutivas de hospedaje, en Plan Europeo, en unidades hoteleras tipo master room, suite o master suite según su elección y siempre que formen parte del programa, en cualquiera de los hoteles, Grand Luxxe, o The Grand Bliss, o The Grand Mayan, o Mayan Palace, ubicados en Nuevo Vallarta, Nayarit; o Riviera Maya, Quintana Roo; o Los Cabos, Baja California Sur; o Acapulco, Guerrero; o Puerto Peñasco, Sonora; o Puerto Vallarta, Jalisco; o Mazatlán, Sinaloa; (en adelante el “Hotel”). </li>
            <li>Los servicios adicionales al hospedaje no están incluidos en el costo del Certificado. </li>
            <li>Para hacer efectivo o activar su Certificado, favor de comunicarse sin costo a nuestro Centro de Atención a Clientes al 800-364-56-00, en horario de lunes a viernes de 9:00 a 19:00 horas y/o sábados de 9:00 a 15:00 horas; la reservación deberá ser realizada únicamente por el titular del Certificado y podrá ser utilizada durante un período no mayor a 12 (doce) meses contados a partir de la fecha de compra del Certificado, sujeto a disponibilidad. </li>
            <li>La disponibilidad de hospedaje no abarca las fechas o semanas correspondientes a Semana Santa, Semana de Pascua, Semana de Navidad y Semana de Año Nuevo; ni durante los meses de julio y agosto. </li>
            <li>Promoción única; sujeta a la asistencia del titular del Certificado y las personas hospedadas con él, a la presentación del concepto vacacional Vida Vacations® (duración aprox. 90 min.) al día siguiente de su llegada al Hotel. El uso de este certificado no obliga a la compra o contratación de servicio alguno.</li>
            <li>Por tratarse de Certificados promocionales para dar a conocer el concepto vacacional Vida Vacations®, la compra del Certificado estará limitada a un Certificado por titular, con una tarifa preferencial por única ocasión y no será reembolsable; al no presentarse el primer día del periodo reservado, se perderá el derecho de ocupación, al igual que el derecho a reembolso de cualquier cantidad pagada. En caso de no asistir a la presentación del concepto vacacional, se deberá pagar el costo total de hospedaje de acuerdo con la tarifa rack que esté vigente al momento de su registro de salida del Hotel. </li>
            <li>Todos los gastos adicionales al hospedaje y/o servicios complementarios contratados durante su estancia en el Hotel correrán por cuenta del titular del Certificado, incluyendo los impuestos que pudieran generarse por dichos servicios, los cuales deberán ser liquidados por el titular del Certificado en su totalidad al momento del registro de salida (check-out) en la recepción del Hotel.</li>
            <li>Promoción única para uso exclusivo del titular del Certificado una vez adquirido, no será transferible; no será acumulable con otro(s) beneficio(s), promoción(es), descuento(s) y/o certificado(s) vacacional(es) y no podrá ser canjeado por efectivo. G Luxury, S.A. de C.V., es responsable por los bienes y/o servicios que se promocionan a través de los Certificados Vida Getaway; cualquier asunto relacionado con él deberá realizarse ante G Luxury, S.A. de C.V., con domicilio en Av. Francisco Medina Ascencio, número 1768, Local E, Col. Olímpica, Puerto Vallarta, Jalisco, C.P. 48330 y será regulado por las leyes aplicables en la República Mexicana. Los tribunales con residencia en la ciudad de Puerto Vallarta, Jalisco, tendrán jurisdicción y competencia exclusiva para cualquier asunto relacionado con el presente.</li>
        </ol>
    </div>


    <!-- Modal Hoteles-->
    <div class="modal fade ff-montserrat" id="resortModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content position-relative">

                <button type="button" class="btn-close ms-0 position-absolute top-0 end-0 m-2" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="modal-header">
                    <h6 class="modal-title text-center w-100" id="exampleModalLabel">
                        <span class="text-blue fs-5">EXCLUSIVOS</span> <br>
                        <span class="fs-3">HOTELES RESORTS</span>
                    </h6>
                </div>

                <div class="modal-body">
                    <div id="carouselExample" class="carousel slide carousel-dark">

                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <div class="row justify-content-evenly py-4">
                                    <div class="col-12 col-lg-4 text-center align-self-center mb-3">
                                        <img class="w-100 mb-5" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-hr-gl.png" alt="Grand Luxxe">
                                        <p class="fw-normal fs-6 mb-4">Alojamientos lujosos, amenidades exclusivas y un servicio magnífico y personalizado lo esperan en el resort premier de Vidanta. Grand Luxxe le ofrece unas vacaciones sofisticadas capaces de sorprender hasta a los viajeros más exigentes.</p>
                                        <p class="fw-bold fs-6">Disponible en: Nuevo Vallarta y Riviera Maya</p>
                                    </div>
                                    <div class="col-6 col-lg-4">
                                        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-hr-gl-1.jpeg" alt="hoteles resorts Grand Luxxe">
                                    </div>
                                    <div class="col-6 col-lg-4">
                                        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-hr-gl-2.jpeg" alt="hoteles resorts Grand Luxxe">
                                    </div>
                                </div>                                
                            </div>

                            <div class="carousel-item">
                                <div class="row justify-content-evenly py-4">
                                    <div class="col-12 col-lg-4 text-center align-self-center mb-3">
                                        <img class="mb-5 w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-hr-tgb.png" alt="The Grand Bliss">
                                        <p class="fw-normal fs-6 mb-4">La romántica privacidad de este hotel boutique tiene todas las comodidades modernas de un resort de lujo. En The Grand Bliss la elegancia se encuentra con detalles a la medida y todo lo que tiene que hacer es llegar, relajarse y disfrutar.</p>
                                        <p class="fw-bold fs-6">Disponible en: Nuevo Vallarta y Riviera Maya</p>
                                    </div>
                                    <div class="col-6 col-lg-4">
                                        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-hr-tgb-1.jpeg" alt="hoteles resorts The Grand Bliss">
                                    </div>
                                    <div class="col-6 col-lg-4">
                                        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-hr-tgb-2.jpeg" alt="hoteles resorts The Grand Bliss">
                                    </div>
                                </div>  
                            </div>

                            <div class="carousel-item">
                                <div class="row justify-content-evenly py-4">
                                    <div class="col-12 col-lg-4 text-center align-self-center mb-3">
                                        <img class="mb-5 w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-hr-tgm.png" alt="The Grand Mayan">
                                        <p class="fw-normal fs-6 mb-4">Entre a un mundo lleno de relajación, en donde el lujo moderno coexiste con la sabiduría ancestral. The Grand Mayan rebosa de espacios únicos y oportunidades especiales para que toda su familia pueda experimentar unas vacaciones como nunca antes.</p>
                                        <p class="fw-bold fs-6">Disponible en: Nuevo Vallarta, Riviera Maya, Acapulco, Los Cabos y Puerto Peñasco</p>
                                    </div>
                                    <div class="col-6 col-lg-4">
                                        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-hr-tgm-1.jpeg" alt="hoteles resorts The Grand Mayan">
                                    </div>
                                    <div class="col-6 col-lg-4">
                                        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-hr-tgm-2.jpeg" alt="hoteles resorts The Grand Mayan">
                                    </div>
                                </div>  
                            </div>

                            <div class="carousel-item">
                                <div class="row justify-content-evenly py-4">
                                    <div class="col-12 col-lg-4 text-center align-self-center mb-3">
                                        <img class="mb-5 w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-hr-mp.png" alt="Mayan Palace">
                                        <p class="fw-normal fs-6 mb-4">Mayan Palace es nuestro resort más querido, pues mantiene un legado de diversión, relajación y felicidad inolvidable. Hay un motivo por el que Mayan Palace es uno de los destinos más conocidos en México: familias de todos los tamaños regresan año tras año a disfrutar de la cordialidad única y los alrededores exóticos que sólo se encuentran en los destinos de Mayan Palace.</p>
                                        <p class="fw-bold fs-6">Disponible en: Nuevo Vallarta, Riviera Maya, Acapulco, Puerto Peñasco, Puerto Vallarta y Mazatlán</p>
                                    </div>
                                    <div class="col-6 col-lg-4">
                                        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-hr-mp-1.jpeg" alt="Mayan Palace">
                                    </div>
                                    <div class="col-6 col-lg-4">
                                        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-hr-mp-2.jpeg" alt="Mayan Palace">
                                    </div>
                                </div>   
                            </div>

                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="width:4%;">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next" style="width:4%;">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
  
    <!-- Modal Entretenimiento-->
    <div class="modal fade ff-montserrat" id="funModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content position-relative">

                <button type="button" class="btn-close ms-0 position-absolute top-0 end-0 m-2" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="modal-header">
                    <h6 class="modal-title text-center w-100" id="exampleModalLabel">
                        <span class="text-blue fs-5">ENTRETENIMIENTO</span> <br>
                        <span class="fs-3">DE CLASE MUNDIAL</span>
                    </h6>
                </div>

                <div class="modal-body">

                    <p class="fs-6 text-center col-11 col-lg-8 mx-auto my-4">La magia vive en los detalles y en las inimaginables experiencias que se asoman en cada espacio de los hoteles resort de Vidanta. Descubra las más espectaculares propuestas teatrales, gastronómicas, acuáticas y de entretenimiento que han sido creadas para inspirar momentos de constante felicidad. Infinitas posibilidades que cautivarán los sentidos de grandes y pequeños.</p>

                    <div id="carouselFun" class="carousel slide">

                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <div class="row py-4 position-relative">
                                    <div class="col-12 col-lg-4"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-en-joya-1.jpeg" alt="Entretenimiento Cirque du soleil Joyà"></div>
                                    <div class="col-12 col-lg-4"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-en-joya-2.jpeg" alt="Entretenimiento Cirque du soleil Joyà"></div>
                                    <div class="col-12 col-lg-4"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-en-joya-3.jpeg" alt="Entretenimiento Cirque du soleil Joyà"></div>
                                    <div class="row justify-content-center position-absolute bottom-0 start-0 w-100 mb-4">
                                        <div class="col-10 col-lg-3 bg-white text-dark p-3 text-center fs-5">Cirque du soleil Joyà</div>
                                    </div>
                                </div>                               
                            </div>

                            <div class="carousel-item">
                                <div class="row py-4 position-relative">
                                    <div class="col-12 col-lg-4"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-en-omnia-1.jpeg" alt="Entretenimiento OMNIA Dayclub"></div>
                                    <div class="col-12 col-lg-4"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-en-omnia-2.jpeg" alt="Entretenimiento OMNIA Dayclub"></div>
                                    <div class="col-12 col-lg-4"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-en-omnia-3.jpeg" alt="Entretenimiento OMNIA Dayclub"></div>
                                    <div class="row justify-content-center position-absolute bottom-0 start-0 w-100 mb-4">
                                        <div class="col-10 col-lg-3 bg-white text-dark p-3 text-center fs-5">OMNIA Dayclub</div>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="row py-4 position-relative">
                                    <div class="col-12 col-lg-4"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-en-jungala-1.jpeg" alt="Entretenimiento Jungala Aqua Experience"></div>
                                    <div class="col-12 col-lg-4"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-en-jungala-2.jpeg" alt="Entretenimiento Jungala Aqua Experience"></div>
                                    <div class="col-12 col-lg-4"><img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-en-jungala-3.jpeg" alt="Entretenimiento Jungala Aqua Experience"></div>
                                    <div class="row justify-content-center position-absolute bottom-0 start-0 w-100 mb-4">
                                        <div class="col-10 col-lg-3 bg-white text-dark p-3 text-center fs-6">Jungala Aqua Experience</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselFun" data-bs-slide="prev" style="width:4%;">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselFun" data-bs-slide="next" style="width:4%;">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Experiencias-->
    <div class="modal fade ff-montserrat" id="experienceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content position-relative">

                <button type="button" class="btn-close ms-0 position-absolute top-0 end-0 m-2" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="modal-header">
                    <h6 class="modal-title text-center w-100" id="exampleModalLabel">
                        <span class="text-blue fs-5">EXPERIENCIAS</span> <br>
                        <span class="fs-3">EXTRAORDINARIAS</span>
                    </h6>
                </div>

                <div class="modal-body">

                    <p class="fs-6 text-center col-11 col-lg-8 mx-auto my-4">
                        Desde increíbles rondas de golf y exclusivos tratamientos de spa, hasta noches de cine en la comodidad de su habitación, o un hermoso y romántico picnic al atardecer en la playa, disfrute en privado de exclusivas experiencias extraordinarias llenas de lujo y sofisticación.
                    </p>

                    <div id="carouselExp" class="carousel slide mb-5">

                        <div class="carousel-inner">

                            <div class="carousel-item active position-relative">
                                <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-ex-desayunoparaiso-desk.jpeg" alt="Entretenimiento Cirque du soleil Joyà">
                                
                                <div class="row justify-content-center position-absolute bottom-0 start-0 w-100">
                                    <div class="col-10 col-lg-3 bg-white text-dark p-3 text-center fs-5">Desayuno en el Paraíso</div>
                                </div>                    
                            </div>

                            <div class="carousel-item position-relative">
                                <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-ex-glampicnic-desk.jpeg" alt="Entretenimiento Cirque du soleil Joyà">
                                
                                <div class="row justify-content-center position-absolute bottom-0 start-0 w-100">
                                    <div class="col-10 col-lg-3 bg-white text-dark p-3 text-center fs-5">Glam Picnic</div>
                                </div>
                            </div>

                            <div class="carousel-item position-relative">
                                <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-ex-golf-desk.jpeg" alt="Entretenimiento Cirque du soleil Joyà">
                                
                                <div class="row justify-content-center position-absolute bottom-0 start-0 w-100">
                                    <div class="col-10 col-lg-3 bg-white text-dark p-3 text-center fs-6">Increíbles campos de Golf</div>
                                </div>
                            </div>

                            <div class="carousel-item position-relative">
                                <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-ex-lepetitchef-desk.jpeg" alt="Entretenimiento Cirque du soleil Joyà">
                                
                                <div class="row justify-content-center position-absolute bottom-0 start-0 w-100">
                                    <div class="col-10 col-lg-3 bg-white text-dark p-3 text-center fs-5">Le Petit Chef</div>
                                </div>
                            </div>

                            <div class="carousel-item position-relative">
                                <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-ex-movienight-desk.jpeg" alt="Entretenimiento Cirque du soleil Joyà">
                                
                                <div class="row justify-content-center position-absolute bottom-0 start-0 w-100">
                                    <div class="col-10 col-lg-3 bg-white text-dark p-3 text-center fs-5">Movie Night</div>
                                </div>
                            </div>

                            <div class="carousel-item position-relative">
                                <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-ex-romanceatardecer-desk.jpeg" alt="Entretenimiento Cirque du soleil Joyà">
                                
                                <div class="row justify-content-center position-absolute bottom-0 start-0 w-100">
                                    <div class="col-10 col-lg-3 bg-white text-dark p-3 text-center fs-5">Romance al Atardecer</div>
                                </div>
                            </div>

                            <div class="carousel-item position-relative">
                                <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/vg-modalModuls-carousel-ex-spa-desk.jpeg" alt="Entretenimiento Cirque du soleil Joyà">
                                
                                <div class="row justify-content-center position-absolute bottom-0 start-0 w-100">
                                    <div class="col-10 col-lg-3 bg-white text-dark p-3 text-center fs-5">Spas de clase mundial</div>
                                </div>
                            </div>

                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExp" data-bs-slide="prev" style="width:4%;">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExp" data-bs-slide="next" style="width:4%;">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <div class="fw-bold fs-5 text-center">NOTA: disponibles sólo para huéspedes ya hospedados a través de concierge en cada destino.</div>
                </div>

            </div>
        </div>
    </div>

  <script src="<?php echo get_template_directory_uri()?>/assets/js/splide.min.js"></script>
  <?php wp_footer();?>

  <script>
    const videoHome = document.getElementById("introducing-video");

    document.addEventListener( 'DOMContentLoaded', function () {
    new Splide( '#image-carousel', {
        perPage    : 4,
        type   : 'loop',
        pagination: false,
        breakpoints: {
            640: {
                perPage: 1,
            },
        },
    } ).mount();
    } );


    videoHome.onplay = function() {
        videoHome.controls = true; 
        $("#video-text").addClass('d-none');
        $(videoHome).parent().removeClass('pause');
    }; 

    videoHome.onended = function() {
        videoHome.controls = false;
        $("#video-text").removeClass('d-none');
        $(videoHome).parent().addClass('pause');
    }; 

    videoHome.onpause = function() {
        // videoHome.controls = false; 
        $("#video-text").removeClass('d-none');
    }; 

    
  </script>


</body>
</html>