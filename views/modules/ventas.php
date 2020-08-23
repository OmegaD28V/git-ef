<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && 
        ($_SESSION["access"] != "master" && $_SESSION["access"] != "invite")) {
            echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
        }
    }

    if (isset($_GET["pag"])) {
        $noVentas = MvcController::contarVentasController("cli");
        $cantidad = 5;
        $paginas = ceil($noVentas["total"] / $cantidad);
        $inicio = ($_GET["pag"] - 1) * $cantidad;
        $ventas = MvcController::seleccionarVentasController($inicio, $cantidad);
        if ($_GET["pag"] < 1 || $_GET["pag"] > $paginas) {
            echo '<script>window.location = "index.php?action=ventas&pag=1"</script>';
        }
    }else{
        echo '<script>window.location = "index.php?action=ventas&pag=1"</script>';
    }
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
                <th><span class="thSub">Fecha y Hora</span></th>
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
                                <?php
                                if (substr($_SESSION["low"], 4, 1) == 4) {
                                    ?>
                                <a class="ver-det" href="index.php?action=venta&cdet=<?=$value["idventa"]?>">Detalles</a>
                                <?php if ($status == 1) {
                                    ?>
                                <a class="editar" href="index.php?action=ventaEditar&into=<?=$value["idventa"]?>"><i class="fas fa-pen-square"></i>Editar</a>        
                                <form class="formEliminarT" method="post" name="eliminarVenta">
                                    <input class="inputEliminar" type="hidden" value="<?=$value["idventa"]?>" name="removeSell">
                                    <button class="btn-remove" type="submit" value=""><i class="fas fa-times-circle"></i>Quitar</button>
                                    <?php
                                        $quitarVenta = new MvcController();
                                        $quitarVenta -> quitarVentaController();
                                    ?>
                                </form>
                                <?php
                                }?>
                                    <?php
                                }elseif (substr($_SESSION["low"], 4, 1) == 3) {
                                    ?>
                                <a class="ver-det" href="index.php?action=venta&cdet=<?=$value["idventa"]?>">Detalles</a>
                                <?php if ($status == 1) {
                                    ?>
                                <a class="editar" href="index.php?action=ventaEditar&into=<?=$value["idventa"]?>"><i class="fas fa-pen-square"></i>Editar</a>
                                <?php
                                }?>
                                    <?php
                                }elseif (substr($_SESSION["low"], 4, 1) == 2 || substr($_SESSION["low"], 4, 1) == 1) {
                                    ?>
                                <a class="ver-det" href="index.php?action=venta&cdet=<?=$value["idventa"]?>">Detalles</a>
                                    <?php
                                }elseif (substr($_SESSION["low"], 4, 1) == 0) {
                                    ?>
                                <span>Ninguna</span>
                                    <?php
                                }
                                ?>
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

    <div class="pnt">
        <a class="pnt__previous <?=$_GET["pag"] <= 1 ? 'disabled' : '' ?>" href="index.php?action=ventas&pag=<?=$_GET["pag"]-1?>">< Anterior</a>

        <?php for($i = 1; $i <= $paginas; $i++):?>
            <a class="pnt__pag <?=$_GET["pag"] == $i ? 'active' : '' ?>" href="index.php?action=ventas&pag=<?=$i?>"><?=$i?></a>
        <?php endfor ?>
        
        <a class="pnt__next <?=$_GET["pag"] >= $paginas ? 'disabled' : '' ?>" href="index.php?action=ventas&pag=<?=$_GET["pag"]+1?>">Siguiente ></a>
    </div>

</div>  