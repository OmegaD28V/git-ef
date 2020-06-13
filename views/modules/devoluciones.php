<?php
    $devoluciones = MvcController::seleccionarDevolucionesController();
?>

<div class="contenedor-formulario">
    <table class="tableCategorias">
        <tr>
            <caption class="thCategorias">Compras</caption>
        </tr>
        <tr>
            <th><span class="thSub">Folio de compra</span></th>
            <th><span class="thSub">Motivo</span></th>
            <th><span class="thSub">Fehca y Hora</span></th>
            <th><span class="thSub">Producto</span></th>
            <th><span class="thSub">Unidades</span></th>
        </tr>
            <?php
                foreach ($devoluciones as $key => $value) {
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
                        
                            // $totales = MvcController::detalleDevolucionController($value["iddevolucion"]); 

                            // $total = $totales["total"];
                            // if ($totales["total"] == null) {
                            //     $total = 0;
                            // }
                        ?>
                        <td><span class="d-p-price"><?=$value["folio"]?></span></td>
                        <td><span class="d-p-price"><?=$value["motivo"]?></span></td>
                        <td><span class="d-p-price"><?=$value["momento"]?></span></td>
                        <td><span class="d-p-price"><?=$value["producto"]?></span></td>
                        <td><span class="d-p-price"><?=$value["unidades"]?></span></td>
                        <!-- <td>
                            <a class="ver-det" href="index.php?action=compra&cdet=">Detalles</a>
                            <a class="editar" href="index.php?action=compraEditar&into="><i class="fas fa-pen-square"></i>Editar</a>        
                            <form class="formEliminar" method="post">
                                <input class="inputEliminar" type="hidden" value="" name="removeTrademark">
                                <button class="inputEliminar" type="submit" value=""><i class="fas fa-minus-square"></i>Quitar</button>
                            </form>
                        </td> -->
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
</div>  