<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] != "master") {
            echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
        } 
        $modo = "fichas";
        $productosDeshabilitados = MvcController::seleccionarProductoDeshabilitadoController($modo);
    }
?>
<div class="contenedor-formulario">
    <?php
        if ($productosDeshabilitados == null) {
            ?>
    <div><span class="info-nodata">Aún no hay datos aquí</span></div>
    <div><a class="extra-button-small" href="index.php?action=inicio">Volver al Inicio</a></div>
            <?php
        }else{
            ?>
            <div class="gridFichas">
        <?php
        foreach ($productosDeshabilitados as $key => $value) {
        ?>
        <div class="fichas">
            <div class="imagen">
                <img class="img" src="ima/a3.jpg" alt="a" width="240" height="300">
            </div>
            <div class="info">
                <span class="ficha-name-pro"><?=$value["nombre"]?></span>
                <span class="ficha-detail-pro"><?=$value["descripcion"]?></span>
                <div class="acciones">
                <a class="ver-mas" href="index.php?action=producto&idpro=<?=$value["idpro"]?>">Ver más</a>
                <?php
                    if ((isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
                        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] == "master") {
                ?>
                <!-- <a class="editar" href="index.php?action=productoEditar&idpro=<?=["idpro"]?>"><i class="fas fa-pen-square"></i>Editar</a> -->
                <form class="formEliminar" method="post">
                    <input class="inputEliminar" type="hidden" value="<?=$value["idpro"]?>" name="restoreProduct">
                    <button class="inputEliminar" type="submit" value=""><i class="fas fa-redo-alt"></i>Restaurar</button>                    
                    <?php
                        $restaurar = new MvcController();
                        $restaurar -> restaurarProductoController();
                    ?>
                </form>
                    <?php
                        }
                    }
                ?>
                </div>
            </div>
        </div>
        <?php
        }

        if (isset($_GET["not4"])) {
            if ($_GET["not4"] == "true") {
                ?>
                <script type="text/javascript" src="js/notificacion4.js"></script>
                <?php
                echo '<script>
                        window.setTimeOut(function(){
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                        window.location = "index.php?action=productoInicio"
                    }, 4000);
                </script>'; 
            }
        }
        ?>
    </div>    
            <?php
        }
    ?>
</div>