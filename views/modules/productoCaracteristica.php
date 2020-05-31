<?php
    if (isset($_GET["idpro"])) {
        $item = "idpro";
        $valor = $_GET["idpro"];

        $producto = MvcController::seleccionarProductoController($item, $valor, null);
        
    }
?>

<div class="contenedor-formulario">
    <form class="formulario-editar" name="editarProducto" method="post">
        <h2>Editar Producto</h2>
        <div class="input-group">
            <span>Producto: <?=$producto["nombre"]?></span>
            <input type="hidden" value="<?=$producto["idpro"]?>" name="idpro">
        </div>
        
        <div class="input-group">
            <label for="priceProduct">Precio de venta</label>
            <input id="priceProduct" type="text" name="priceProduct" required>
        </div>

        <div class="input-group">
            <input type="submit" class="submitEditarProducto" id="btnActualizarPrecioProducto" name="btnActualizarPrecioProducto" value="Actualizar Precio">
        </div>
    </form>
</div>

<?php
    $registro = new MvcController();
    $registro -> actualizarPrecioProductoController();
?>