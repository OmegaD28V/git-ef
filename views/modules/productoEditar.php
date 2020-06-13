<?php
    if (isset($_GET["idpro"])) {
        $item = "idpro";
        $valor = $_GET["idpro"];

        $producto = MvcController::seleccionarProductoController($item, $valor, null);
        $precio = MvcController::seleccionarProPrecioController($valor);
    }
?>

<div class="contenedor-formulario">
    <form class="formulario-editar" name="editarProducto" method="post">
        <h2>Editar Producto</h2>
        <div class="input-group">
            <label for="uCategory">Categoria</label>
            <select name="uCategory" required autofocus>
            <option value="">Seleccionar</option>
            <?php
                $categorias = MvcController::seleccionarCategoriaController(null, null);
                foreach ($categorias as $key => $value) {
                ?>
                    <option value="<?=$value["idpro_categoria"]?>"><?=$value["categoria"]?></option>
                <?php
                }
            ?>
            <option selected value="<?=$producto["idpro_categoria"]?>"><?=$producto["categoria"]?></option>
            </select>
        </div>
        
        <div class="input-group">
            <label for="input2">Marca</label>
            <select id="input2" name="uTrademark" required>
            <option value="">Seleccionar</option>
            <?php
                $marcas = MvcController::seleccionarMarcaController(null, null);
                foreach ($marcas as $key => $value) {
                ?>
                    <option value="<?=$value["idpro_marca"]?>"><?=$value["marca"]?></option>
                <?php
                }
            ?>
            <option selected value="<?=$producto["idpro_marca"]?>"><?=$producto["marca"]?></option>
            </select>
        </div>

        <div class="input-group">
            <label for="uCode">Código del Producto</label>
            <input type="text" value="<?=$producto["codigo"]?>" name="uCode" required>
        </div>
        
        <div class="input-group">
            <label for="uNameProduct">Nombre</label>
            <input type="text" value="<?=$producto["nombre"]?>" name="uNameProduct" required>
        </div>
    
        <div class="input-group">
            <label for="uModel">Modelo</label>
            <input type="text" value="<?=$producto["modelo"]?>" name="uModel" required>
            <input type="hidden" value="<?=$producto["idpro"]?>" name="idpro">
        </div>

        <div class="input-group">
            <label for="upriceSellProduct">Precio de venta $</label>
            <input type="number" name="upriceSellProduct" value="<?=$precio["precio"]?>" min="0" step="1" required>
        </div>
    
        <div class="input-group">
            <label for="uDescription">Descripción</label>
            <textarea name="uDescription" cols="50" rows="10" required><?=$producto["descripcion"]?></textarea>
        </div>
    
        <div class="input-group">
            <input type="submit" class="submitEditarProducto" name="btnActualizarProducto" value="Actualizar Producto">
        </div>
    </form>
</div>

<?php
    $actualizarProducto = new MvcController();
    $actualizarProducto -> actualizarProductoController();
    $actualizarProPrecio = new MvcController();
    $actualizarProPrecio -> actualizarProPrecioController();
?>