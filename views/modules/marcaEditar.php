<?php
    if (isset($_GET["tm"])) {
        $item = "idpro_marca";
        $valor = $_GET["tm"];

        $marca = MvcController::seleccionarMarcaController($item, $valor);
        
    }
?>

<div class="contenedor-formulario">
    <form class="formulario-editar" name="editarMarca" method="post">
        <h2>Editar Marca</h2>
        <div class="input-group">
            <input id="hidden-idtrademark" type="hidden" name="hidden-idtrademark" value="<?=$_GET["tm"]?>">
        </div>

        <div class="input-group">
            <label for="nameTrademark">Nombre de la Marca</label>
            <input id="nameTrademark" type="text" name="nameTrademark" value="<?=$marca["marca"]?>" required>
        </div>

        <div class="input-group">
            <input class="submitEditarProducto" type="submit" id="btnEditarMarca" name="btnEditarMarca" value="Actualizar Marca">
        </div>
    </form>
</div>

<?php
    $registro = new MvcController();
    $registro -> actualizarMarcaController();
?>