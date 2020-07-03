<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] != "master") {
            echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
        }
    }

    $ventas = MvcController::seleccionarVentasController();
?>

<div class="contenedor-formulario">
    <?php
        if ($ventas == null) {
            ?>
    <div><span class="info-nodata">Aún no hay datos aquí</span></div>
    <div><a class="extra-button-small" href="index.php?action=ventaRegistrar">Nueva venta</a></div>
            <?php
        }else{
            ?>
            <table class="tableCategorias">
            <tr>
                <caption class="thCategorias">Ventas</caption>
            </tr>
            <tr>
                <th><span class="thSub">Folio</span></th>
                <th><span class="thSub">Cliente</span></th>
                <th><span class="thSub">Fehca y Hora</span></th>
                <th><span class="thSub">Total $</span></th>
                <th><span class="thSub">Estado</span></th>
                <th><span class="thSub">Acción</span></th>
            </tr>
                <?php
                    foreach ($ventas as $key => $value) {
                    ?>
                        <tr 
                            <?php
                                if (($key % 2) == 0) {
                                    ?>
                            class="color-gray" 
                                    <?php
                                }else {
                                    ?>
                            class="color-darkgray" 
                                    <?php
                                }
                            ?>
                        >
                            <?php 
                            
                                $totales = MvcController::detalleVentaController($value["idventa"]); 
                                $status = $value["status"];
                                if ($status == 2) {
                                    $estado = "Terminada";
                                }else {
                                    $estado = "Sin concluir";
                                }

                                $total = $totales["total"];
                                if ($totales["total"] == null) {
                                    $total = 0;
                                }
                            ?>
                            <td><span class="d-p-price"><?=$value["folio"]?></span></td>
                            <td><span class="d-p-price"><?=$value["nombre"]?></span></td>
                            <td><span class="d-p-price"><?=$value["momento"]?></span></td>
                            <td><span class="d-p-price">$ <?=$total?></span></td>
                            <td><span class="d-p-price"><?=$estado?></span></td>
                            <td>
                                <a class="ver-det" href="index.php?action=venta&cdet=<?=$value["idventa"]?>">Detalles</a>
                                <?php if ($status == 1) {
                                    ?>
                                <a class="editar" href="index.php?action=ventaEditar&into=<?=$value["idventa"]?>"><i class="fas fa-pen-square"></i>Editar</a>        
                                <form class="formEliminarT" method="post" name="eliminarVenta">
                                    <input class="inputEliminar" type="hidden" value="<?=$value["idventa"]?>" name="removeSell">
                                    <button class="btn-remove" type="submit" value=""><i class="fas fa-times-circle"></i>Quitar</button>
                                    <?php
                                        // $quitarVenta = new MvcController();
                                        // $quitarVenta -> quitarVentaController();
                                    ?>
                                </form>
                                <?php
                                }?>
                            </td>
                        </tr>
                    <?php
                    }

                    if (isset($_GET["not2"])) {
                        if ($_GET["not2"] == "true") {
                            ?>
                            <script type="text/javascript" src="js/notificacion2.js"></script>
                            <?php
                        }
                    }elseif (isset($_GET["not3"])) {
                        if ($_GET["not3"] == "true") {
                            ?>
                            <script type="text/javascript" src="js/notificacion3.js"></script>
                            <?php
                        }
                    }elseif (isset($_GET["not6"])) {
                        if ($_GET["not6"] == "true") {
                            ?>
                            <script type="text/javascript" src="js/notificacion6.js"></script>
                            <?php
                        }
                    }
                ?>
        </table>
            <?php
        }
    ?>
</div>  