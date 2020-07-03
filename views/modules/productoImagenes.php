<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] != "master") {
            echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
        }
    }

    if (isset($_GET["pPic"])) {
        $pro = $_GET["pPic"];

        $producto = MvcController::productoController($pro);
        $imagenes = MvcController::verImgProController($pro);
    }
?>

<div class="contenedor-formulario">
    <div class="multi-form">
        <h2>Imágenes</h2>

        <div class="line-form"></div>

        <div class="form-group"></div>
            <label for=""><?=$producto["nombre"]?></label>
        <div>

        <div class="line-form"></div>
        
        <div class="form-group">
            <div class="slider">
            <?php
                foreach ($imagenes as $key => $value) {
                    ?>
                <img class="i-p-img" src="<?=$value["ruta"]?>" alt="img" loading="lazy" width="240" height="300">
                <form class="form-quitar-image" method="post" name="eliminaImagen">
                    <input type="hidden" value="<?=$value["idpro_imagen"]?>" name="removePicture">
                    <input type="hidden" value="<?=$value["idpro"]?>" name="pro">
                    <button class="input-quitar-image" type="submit" value="">x</button>
                    <?php
                        $quitarImagen = new MvcController();
                        $quitarImagen -> quitarImgProController();
                    ?>
                </form>
                    <?php                    
                }
            ?>
            <div class="line-form"></div>
                <img class="prevImagen" src="ima/waitImage.jpg" alt="img" loading="lazy" width="240" height="300">
            </div>
        </div>

        <div class="line-form"></div>
        
        <form class="form-group" name="subirImagen" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <label for="imageProduct">Archivo JPG o PNG</label>
                <input name="imageProduct" type="file" id="imageProduct" required></input>
                <input name="pro" type="hidden" value="<?=$pro?>" required></input>
            </div>
            
            <div class="input-group">
                <input id="btnRegistrarImagen" name="btnRegistrarImagen" type="submit" value="Subir Imagen"></input>
                <?php
                    $subirImagen = MvcController::subirImgProController();
                    if (isset($_GET["notiU"])) {
                        if ($_GET["notiU"] == "true") {
                            ?>
                            <script type="text/javascript" src="js/notImgUpload.js"></script>
                            <?php
                        }
                    }elseif (isset($_GET["notx"])) {
                        if ($_GET["notx"] == "true") {
                            ?>
                            <script type="text/javascript" src="js/notError.js"></script>
                            <?php
                        }
                    }elseif (isset($_GET["not3"])) {
                        if ($_GET["not3"] == "true") {
                            ?>
                            <script type="text/javascript" src="js/notificacion3.js"></script>
                            <?php
                        }
                    }
                ?>
            </div>
        </form>
    </div>
</div>