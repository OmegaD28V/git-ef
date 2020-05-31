<?php
        $compra = MvcController::seleccionarCompraController();
?>
<div class="contenedor-formulario">
    <form class="formulario" name="nuevaEntrada" method="post">
        <h2>Nueva Entrada</h2>
        <div class="input-group">
            <input class="inputEliminar" type="hidden" value="<?=$compra["idcompra"]?>" name="hiddenCompra">
        </div>
        <div class="input-group">
            <span>Folio: <?=$compra["folio"]?></span>
        </div>
        <div class="input-group">
            <span>Proveedor: <?=$compra["nombre"]?></span>
        </div>
        <div class="input-group">
        
        <div class="input-group">
            <span>____________________________</span>
        </div>
        <div class="input-group">
            <label for="product">Producto</label>
            <select id="product" name="product" required autofocus>
            <option selected value="">Seleccionar Producto</option>
            <?php
                $modo = "entrada";
                $productos = MvcController::seleccionarProductoController(null, null, $modo);
                foreach ($productos as $key => $value) {
                ?>
                    <option value="<?=$value["idpro"]?>"><?=$value["nombre"]?></option>
                <?php
                }
            ?>
            </select>
        </div>

        <div class="input-group">
            <a href="index.php?action=productoRegistrar">¿Este producto no está registrado?</a>
        </div>

        <div class="input-group">
            <label for="buyPrice">Precio de Compra</label>
            <input id="buyPrice" type="number" name="buyPrice" required>
        </div>

        <div class="input-group">
            <label for="cuantity">Unidades</label>
            <input id="cuantity" type="number" name="cuantity" required>
        </div>

        <div class="input-group">
            <input type="submit" id="btnRegistrarEntrada" name="btnRegistrarEntrada" value="Agregar Producto" title="Registrar Entrada">
        </div>
        <?php
            $registro = MvcController::registrarEntradaController();
            if (isset($_GET["not0"])) {
                if ($_GET["not0"] == "true") {
                    ?>
                    <script type="text/javascript" src="js/notificacion0.js"></script>
                    <?php
                }
            }
        ?>
    </form>
        <div class="input-group">
            <a href="index.php?action=productoCompra&uBuy=<?=$compra["idcompra"]?>">Concluir Registro</a>
        </div>
</div>
