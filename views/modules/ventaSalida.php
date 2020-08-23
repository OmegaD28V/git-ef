<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && 
        ($_SESSION["access"] != "master" && $_SESSION["access"] != "invite")) {
            echo '<script>window.location = "usuarioInicioSession";</script>';
        }
    }

    if (!isset($_GET["into"])) {
        echo '<span>No se encontraron datos.</span>';
    }else {
        $ticket = $_GET["into"];
        $venta = MvcController::seleccionarVentaController($ticket);
        $salidas = MvcController::detalleVPController($venta["idventa"]);
?>
<div class="contenedor-formulario">
    <div class="multi-form">
        <h2>Nueva Salida</h2>
        <div class="input-group">
            <span><b>Folio:</b> <?=$venta["folio"]?></span>
        </div>
        <div class="input-group">
            <span><b>Cliente:</b> <?=$venta["nombre"]?></span>
        </div>
        
        <div class="line-form"></div>

        <div class="form-group">
           <table class="tableEntradas">
                <tr>
                    <caption class="thCategorias">Productos</caption>
                </tr>
                <tr class="d-g">
                    <th class="thSub">#</th>
                    <th class="thSub">Nombre</th>
                    <th class="thSub">Precio de venta</th>
                    <th class="thSub">Unidades</th>
                    <th class="thSub">Quitar</th>
                </tr>
                <?php
                if ($salidas != null) {
                    foreach ($salidas as $key => $valueSalidas) {
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
                        <td><span class="d-p-price"><?=$key + 1?></span></td>
                        <td><span class="d-p-price"><?=$valueSalidas["producto"]?></span></td>
                        <td><span class="d-p-price">$<?=$valueSalidas["precioventa"]?></span></td>
                        <td><span class="d-p-price"><?=$valueSalidas["cantidad"]?></span></td>
    
                        <td>
                            <!-- <a class="btn-remove-item" href="index.php?action=removeIntro&into="><i class="fas fa-times-circle"></i></a> -->
                            <form class="formEliminar" method="post" name="eliminaSalida">
                                <input class="inputEliminar" type="hidden" value="<?=$valueSalidas["idventa_salida"]?>" name="removeIntro">
                                <button class="inputEliminar" type="submit" value=""><i class="fas fa-times-circle"></i></button>
                                <?php
                                    $quitarSalida = new MvcController();
                                    $quitarSalida -> quitarSalidaController($ticket);
                                ?>
                            </form>
                        </td>
                    </tr>
                        <?php
                    }
                    ?>
            </table> 
                <?php
                }else {
                    ?>
            </table> 
                <div><span style="margin: -20px 0 10px 0" class="info-nodata">Vacío</span></div>
                    <?php
                }
                    ?>
        </div>
        
        

        <div class="line-form"></div>

        <form class="form-group" name="nuevaEntrada" method="post">
            <div class="input-group">
                
                <input class="inputEliminar" type="hidden" value="<?=$venta["idventa"]?>" name="hiddenVenta">
                
                <label for="product">Producto</label>
                <select id="product" name="product" required autofocus>
                <option selected value="">Seleccionar Producto</option>
                <?php
                    $modo = "entrada";
                    $productos = MvcController::seleccionarProductoController(null, null, $modo);
                    foreach ($productos as $key => $valueProductos) {
                    ?>
                        <option value="<?=$valueProductos["idpro"]?>"><?=$valueProductos["nombre"]?></option>
                    <?php
                    }
                ?>
                </select>
            </div>

            <div class="input-group">
                <a href="index.php?action=productoRegistrar" class="enlace-form">¿Este producto no está registrado?</a>
            </div>

            <div class="input-group">
                <label for="buyPrice">Precio de Venta</label>
                <input id="Price" type="text" name="Price" disabled>
                <label for="buyPrice">Existencia</label>
                <input id="exist" type="hidden" name="exist" min="0" step="1" required>
                <input id="buyPrice" type="hidden" name="buyPrice" min="0" step="0.01" required>
            </div>

            <div class="input-group">
                <label style="display: inline-block" for="cuantity">Unidades</label>
                <input style="display: inline-block; width: 60%" id="cuantity" type="number" name="cuantity" min="1" step="1" required>
                <div style="border: none" class="extra-input">
                    <input style="display: inline-block; width: auto; cursor: pointer; margin-bottom: 0px" id="enable" type="text" name="enable" disabled>
                </div>
            </div>

            <div class="line-form"></div>

            <div class="input-group">
                <input type="submit" id="btnRegistrarSalida" name="btnRegistrarSalida" value="Agregar Producto" title="Registrar">
            </div>
            <?php
                $registro = MvcController::registrarSalidaController($ticket);
                if (isset($_GET["not0"])) {
                    if ($_GET["not0"] == "true") {
                        ?>
                        <script type="text/javascript" src="js/notificacion0.js"></script>
                        <?php
                    }
                }elseif (isset($_GET["not3"])) {
                    if ($_GET["not3"] == "true") {
                        ?>
                        <script type="text/javascript" src="js/notificacion3.js"></script>
                        <?php
                    }
                }elseif (isset($_GET["err"])) {
                    if ($_GET["err"] == "re") {
                        ?>
                        <script type="text/javascript" src="js/invalidRegister.js"></script>
                        <?php
                    }
                }
            ?>

            <div class="input-group">
                <a class="extra-button" href="index.php?action=ventaRegistrar&uBuy=<?=$venta["idventa"]?>">Cerrar Venta</a>
            </div>
        </form>
    </div>
</div>
<?php
    }
?>