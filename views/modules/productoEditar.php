<?php
    if (isset($_GET["idproducto"])) {
        $item = "idproducto";
        $valor = $_GET["idproducto"];

        $producto = MvcController::seleccionarProductoController($item, $valor);
        
    }
?>

<div class="contenedor-formulario">
    <form class="formulario-editar" name="editarProducto" method="post">
        <h2>Editar Producto</h2>
        <div class="input-group">
            <label for="input1">Categoria</label>
            <select id="input1" name="uCategory" required autofocus>
            <option selected value="">Seleccionar</option>
            <?php
                $categorias = MvcController::seleccionarCategoriaController();
                foreach ($categorias as $key => $value) {
                ?>
                    <option value="<?=$value["idcategoria"]?>"><?=$value["categoria"]?></option>
                <?php
                }
            ?>
            <option selected value="<?=$producto["idcategoria"]?>"><?=$producto["categoria"]?></option>
            </select>
        </div>

        <div class="input-group">
            <label for="input2">Nombre</label>
            <input id="input2" type="text" value="<?=$producto["nombre"]?>" placeholder="Nombre del producto" name="uNameProduct" required>
        </div>
    
        <div class="input-group">
            <label for="input3">Precio</label>
            <input id="input3" type="text" value="<?=$producto["precioventa"]?>" placeholder="Precio del producto" name="uPrice" required>
            <input type="hidden" value="<?=$producto["idproducto"]?>" name="idproducto">
        </div>
    
        <div class="input-group">
            <input type="submit" class="submitEditarProducto" id="btnActualizarProducto" name="btnActualizarProducto" value="Actualizar Producto" title="Actualizar Producto">
        </div>
    </form>
</div>

<?php
    $registro = new MvcController();
    $registro -> actualizarProductoController();
    ?>
        <script type="text/javascript" src="js/notificacion.js"></script>
    <?php
?>