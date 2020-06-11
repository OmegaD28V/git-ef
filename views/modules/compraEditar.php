<?php
    if (!isset($_GET["into"])) {
        echo '<span>No se encontraron datos.</span>';
    }else {
        $valor = $_GET["into"];
    
        $compra = MvcController::recuperarCompraController($valor);
        $entradas = MvcController::detalleCPController($compra["idcompra"]);
?>
<div class="contenedor-formulario">
    <div class="multi-form">
        <h2>Nueva Entrada</h2>
        <div class="input-group">
            <span><b>Folio:</b> <?=$compra["folio"]?></span>
        </div>
        <div class="input-group">
            <span><b>Proveedor:</b> <?=$compra["nombre"]?></span>
        </div>
        
        <div class="line-form"></div>

        <div class="form-group">
           <table class="tableEntradas">
                <tr>
                    <caption class="thCategorias">Entradas</caption>
                </tr>
                <tr class="d-g">
                    <th class="thSub">#</th>
                    <th class="thSub">Nombre</th>
                    <th class="thSub">Precio de compra</th>
                    <th class="thSub">Unidades</th>
                    <th class="thSub">Quitar</th>
                </tr>
                <?php
                foreach ($entradas as $key => $valueEntradas) {
                    if ($valueEntradas == null) {
                    }else {
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
                    <td><span class="d-p-price"><?=$valueEntradas["producto"]?></span></td>
                    <td><span class="d-p-price"><?=$valueEntradas["preciocompra"]?></span></td>
                    <td><span class="d-p-price"><?=$valueEntradas["cantidad"]?></span></td>

                    <td>
                        <!-- <a class="btn-remove-item" href="index.php?action=removeIntro&into="><i class="fas fa-times-circle"></i></a> -->
                        <form class="formEliminar" method="post" name="eliminaEntrada">
                            <input class="inputEliminar" type="hidden" value="<?=$valueEntradas["idcompra_entrada"]?>" name="removeIntro">
                            <button class="inputEliminar" type="submit" value=""><i class="fas fa-times-circle"></i></button>
                            <?php
                                $quitarEntrada = new MvcController();
                                $quitarEntrada -> uQuitarEntradaController();
                            ?>
                        </form>
                    </td>
                </tr>
                    <?php
                    }
                }
                ?>
            </table> 
        </div>
        
        

        <div class="line-form"></div>

        <form class="form-group" name="nuevaEntrada" method="post">
            <div class="input-group">
                
                <input class="inputEliminar" type="hidden" value="<?=$compra["idcompra"]?>" name="hiddenCompra">
                
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
                <label for="buyPrice">Precio de Compra</label>
                <input id="buyPrice" type="number" name="buyPrice" min="0" step="0.01" required>
            </div>

            <div class="input-group">
                <label for="cuantity">Unidades</label>
                <input id="cuantity" type="number" name="cuantity" min="0" step="1" required>
            </div>

            <div class="line-form"></div>

            <div class="input-group">
                <input type="submit" id="btnRegistrarEntrada" name="btnRegistrarEntrada" value="Agregar Producto" title="Registrar Entrada">
            </div>
            <?php
                $registro = MvcController::uRegistrarEntradaController();
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
                }
            ?>

            <div class="input-group">
                <a class="extra-button" href="index.php?action=productoCompra&uBuy=<?=$compra["idcompra"]?>">Concluir Compra</a>
            </div>
        </form>
    </div>
</div>
<?php
    }
?>