<div class="contenedor-formulario">
    <form class="formulario" name="nuevoProducto" method="post">
        <h2>Nuevo Producto</h2>
        <div class="input-group">
            <label for="input1">Categoria</label>
            <select id="input1" name="category" required autofocus>
            <option selected value="">Seleccionar</option>
            <?php
                $categorias = MvcController::seleccionarCategoriaController();
                foreach ($categorias as $key => $value) {
                ?>
                    <option value="<?=$value["idcategoria"]?>"><?=$value["categoria"]?></option>
                <?php
                }
            ?>
            </select>
        </div>

        <div class="input-group">
            <label for="input2">Nombre</label>
            <input id="input2" type="text" name="nameProduct" required>
        </div>
    
        <div class="input-group">
            <label for="input3">Precio</label>
            <input id="input3" type="text" name="price" required>
        </div>
    
        <div class="input-group">
            <input type="submit" id="btnRegistrarProducto" name="btnRegistrarProducto" value="Registrar Producto" title="Registrar Producto">
        </div>
    </form>
</div>

<?php
    $registro = new MvcController();
    $registro -> registrarProductoController(null, null);
    ?>
        <script type="text/javascript" src="js/notificacion.js"></script>
    <?php
?>