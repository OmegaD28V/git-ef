<?php
    if (isset($_GET["pPic"])) {
        $pro = $_GET["pPic"];

        $producto = MvcController::productoController($pro);
        // $caracteristicas = MvcController::seleccionarCaracteristicasController($pro, null);
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
                <img class="prevImagen" src="ima/waitImage.jpg" alt="img" loading="lazy" width="240" height="300">
            </div>
        </div>

        <div class="line-form"></div>
        
        <form class="form-group" name="editarProducto" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <label for="imageProduct">Archivo JPG o PNG</label>
                <input name="imageProduct" type="file" id="imageProduct" required></input>
                <input name="pro" type="hidden" value="<?=$pro?>" required></input>
            </div>
            
            <div class="input-group">
                <input id="btnRegistrarImagen" name="btnRegistrarImagen" type="submit" value="Subir Imagen"></input>
                <?php
                    $subirImagen = MvcController::subirImgProController();
                    if (isset($_GET["not0"])) {
                        if ($_GET["not0"] == "true") {
                            ?>
                            <script type="text/javascript" src="js/notificacion0.js"></script>
                            <?php
                        }
                    }elseif (isset($_GET["notx"])) {
                        if ($_GET["notx"] == "true") {
                            ?>
                            <script type="text/javascript" src="js/notError.js"></script>
                            <?php
                        }
                    }
                ?>
            </div>
        </form>
    </div>
</div>