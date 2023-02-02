
<?php
    if( isset( $_POST['dev_id'] ) ){
        $files = rwmb_meta('brochure', [], $_POST['dev_id']);

        $clean_name = urlencode($_POST['dev_name']);
        // Nombre del archivo ZIP
        $zipname =  $clean_name.'.zip';

        $zip_path = get_template_directory().'/assets/zips/'.$zipname;
        $download_path = get_template_directory_uri().'/assets/zips/'.$zipname;

        // Crear una nueva instancia de ZipArchive
        $zip = new ZipArchive;

        // Crear el archivo ZIP
        if ($zip->open($zip_path, ZipArchive::CREATE) === TRUE) {

            // Añadir los archivos al archivo ZIP
            foreach ($files as $file) {
                $zip->addFile($file['path'], $file['name'] );
            }
            //echo 'ok ';

        } 
        else {
            return 'failed';
        }

        //$zip->open($zipname, ZipArchive::CREATE);
        $zip->close();


        // Descargar el archivo ZIP
        header('Content-Type: application/zip');
        header("Content-Disposition: attachment; filename=$zipname");
        header('Content-Length: ' . filesize($zip_path));?>
        
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const link = document.createElement("a");
                const devCards = document.getElementById("anchor");

                link.href = "<?php echo $download_path; ?>";
                link.setAttribute("download", "");
                link.innerHtml = "Click me";
                //link.classList.add("d-none");

                devCards.appendChild(link);


                link.click();

                //link.remove();
            });
        </script>
    <?php 

    }?>

<?php $devs = get_posts(array(
    'post_type' => 'dev-info',
    'numberposts' => -1,
));
?>

<h1 class="fs-2 mt-2">Información para Agentes</h1>

<div id="anchor">

</div>

<?php if( count($devs) > 0): ?>

    <div class="row w-100 mx-auto" id="dev-cards">
        
        <?php foreach($devs as $dev): ?>

            <?php 
                $thumbnail_id = get_post_thumbnail_id($dev->ID);
                if($thumbnail_id){
                    $thumbnail_url = wp_get_attachment_url($thumbnail_id);
                }
                else {
                    $thumbnail_url = get_template_directory_uri().'/assets/images/default-dev-admin.jpg' ;
                }

            ?>

            <div class="col-12 col-lg-4">

                <div class="card shadow-4 w-100 p-0">
                    <img src="<?php echo $thumbnail_url; ?>" class="card-img-top" style="height:250px; object-fit:cover;" alt="<?php echo $dev->post_title; ?>">
                    <div class="card-body">
                        <h2 class="card-title fs-4"><?php echo $dev->post_title; ?></h2>
                        
                        <p class="card-text">De clic en el botón de "Descargar" para obtener archivos con información del proyecto.</p>
                        
                        <?php $url = rwmb_meta('website', [], $dev->ID); ?>
                        <?php $virtual_url = rwmb_meta('virtual_tour', [], $dev->ID); ?>

                        <div class="row mx-auto w-100">
                            <?php if($url): ?>
                                <div class="col px-1">
                                    <a href="<?php echo $url; ?>" target="_blank" rel="noopener norefferer" class="btn btn-secondary d-flex justify-content-center mb-2">
                                        <svg class="align-self-center me-1" width="16" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M352 256c0 22.2-1.2 43.6-3.3 64H163.3c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64H348.7c2.2 20.4 3.3 41.8 3.3 64zm28.8-64H503.9c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64H380.8c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32H376.7c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0H167.7c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 21 58.2 27 94.7zm-209 0H18.6C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192H131.2c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64H8.1C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6H344.3c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352H135.3zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6H493.4z"/></svg>
                                        Sitio Web
                                    </a>
                                </div>
                            <?php endif; ?>

                            <?php if($virtual_url): ?>
                                <div class="col px-1">
                                    <a href="<?php echo $virtual_url; ?>" target="_blank" rel="noopener norefferer" class="btn btn-secondary d-flex justify-content-center mb-2">
                                        <svg class="align-self-center me-1" width="16" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 128C0 92.7 28.7 64 64 64H320c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2V384c0 11.8-6.5 22.6-16.9 28.2s-23 5-32.9-1.6l-96-64L416 337.1V320 192 174.9l14.2-9.5 96-64c9.8-6.5 22.4-7.2 32.9-1.6z"/></svg>
                                        Tour Virtual
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        


                        <form action="" method="post" class="px-1">
                            <input type="hidden" name="dev_id" value="<?php echo $dev->ID; ?>">
                            <input type="hidden" name="dev_name" value="<?php echo $dev->post_title; ?>">
                            <button type="submit" id="download_button" class="btn btn-primary w-100">
                                <svg width="16" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zM432 456c-13.3 0-24-10.7-24-24s10.7-24 24-24s24 10.7 24 24s-10.7 24-24 24z"/></svg>
                                Descargar Información
                            </button>
                        </form>
                        
                    </div>
                </div>

                <!-- <?php $files = rwmb_meta('brochure', [], $dev->ID);?>
                <?php //foreach ( $files as $file ) : ?>
                    <a class="link-primary file d-block" href="//<?php// echo $file['url']; ?>" download><?php// echo $file['name']; ?></a>
                <?php// endforeach; ?> -->

            </div>

        <?php endforeach; ?>

        <script>
            
            function downloadFiles(){
                var downloadButton = document.getElementById('download_button');
                var files = document.querySelectorAll('.file');

                for (var i = 0; i < files.length; i++) {
                    files[i].click();
                }
            }

        </script>

    </div>

<?php else: ?>

    <h2 class="text-center fs-1 my-5">Por el momento no hay información, vuelve más tarde</h2>

<?php endif; ?>