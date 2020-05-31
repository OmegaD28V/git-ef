<?php
if (isset($_GET["uBuy"])) {
    $item = "idcompra";
    $valor = $_GET["uBuy"];
    $producto = MvcController::compraFinalizadaController($item, $valor);
}
?>

<div class="contenedor-formulario">
    <form class="formulario" name="nuevaCompra" method="post">
        <h2>Nueva Compra</h2>
        <div class="input-group">
            <label for="codeBuy">Folio, Número o Ticket de compra</label>
            <input id="codeBuy" type="text" name="codeBuy" required>
        </div>
        <div class="input-group">
            <label for="provider">¿Quién le vende?</label>
            <select id="provider" name="provider" required autofocus>
            <option selected value="">Seleccionar Proveedor</option>
                <?php
                    $productos = MvcController::seleccionarProveedorController(null, null);
                    foreach ($productos as $key => $value) {
                    ?>
                        <option value="<?=$value["iduser"]?>"><?=$value["nombre"]?></option>
                    <?php
                    }
                ?>
            </select>
        </div>
        <div class="input-group">
            <a href="index.php?action=proveedorRegistrar">¿Este proveedor no está registrado?</a>
        </div>
        <div class="input-group">
            <input type="submit" id="btnAgregarProductos" name="btnAgregarProductos" value="Agregar Productos" title="Agregar Productos">
        </div>
    </form>
</div>

<?php
    $registro = MvcController::registrarCompraController();
    if (isset($_GET["not1"])) {
        if ($_GET["not1"] == "true") {
            ?>
            <script type="text/javascript" src="js/notificacion1.js"></script>
            <?php
        }
    }
?>