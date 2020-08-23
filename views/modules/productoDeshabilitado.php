<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && 
        ($_SESSION["access"] != "master" && $_SESSION["access"] != "invite")) {
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
        <div>
            <a style="text-decoration: none; color: currentcolor" href="index.php?action=producto&idpro=<?=$value["idpro"]?>">
                <div class="fichas">
                    <div class="imagen">
                        <?php
                            $imagenFicha = MvcController::fichaImagenController($value["idpro"]);
                            if ($imagenFicha == null) {
                                ?>
                            <div class="no-image-card"><span>Producto sin imagen</span></div>
                            <!-- <img class="i-p-img" src="ima/a3.jpg" alt="a" width="240" height="300"> -->
                                <?php
                            }else {
                                ?>
                            <img class="i-p-img" src="<?=$imagenFicha["ruta"]?>" alt="img" loading="lazy" width="240" height="300">
                                <?php                    
                            }
                        ?>
                    </div>
                    <div class="info">
                        <span class="ficha-name-pro"><?=$value["nombre"]?></span>
                        <div>
                            <span class="ficha-price-pro">$<?=$value["precio"]?></span>
                            <span style="font-size: 0.8rem; color: #39b54a;" class="ficha-price-pro"><?='Existencia: '.$value["existencia"]?></span>
                        </div>
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
            </a>
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