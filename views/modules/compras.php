<?php
    $compras = MvcController::seleccionarComprasController();
?>

<div class="contenedor-formulario">
    <table class="tableCategorias">
        <tr>
            <caption class="thCategorias">Compras</caption>
        </tr>
        <tr>
            <th><span class="thSub">Folio</span></th>
            <th><span class="thSub">Proveedor</span></th>
            <th><span class="thSub">Fehca y Hora</span></th>
            <th><span class="thSub">Total $</span></th>
            <th><span class="thSub">Estado</span></th>
            <th><span class="thSub">Acción</span></th>
        </tr>
            <?php
                foreach ($compras as $key => $value) {
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
                        
                            $totales = MvcController::detalleCompraController($value["idcompra"]); 
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
                            <a class="ver-det" href="index.php?action=compra&cdet=<?=$value["idcompra"]?>">Detalles</a>
                            <?php if ($status == 1) {
                                ?>
                            <a class="editar" href="index.php?action=compraEditar&into=<?=$value["idcompra"]?>"><i class="fas fa-pen-square"></i>Editar</a>        
                            <form class="formEliminarT" method="post" name="eliminarCompra">
                                <input class="inputEliminar" type="hidden" value="<?=$value["idcompra"]?>" name="removeBuy">
                                <button class="btn-remove" type="submit" value=""><i class="fas fa-times-circle"></i>Quitar</button>
                                <?php
                                    $quitarCompra = new MvcController();
                                    $quitarCompra -> quitarCompraController();
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
</div>  