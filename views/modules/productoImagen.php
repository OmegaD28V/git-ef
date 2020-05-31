<div class="contenedor-formulario">
    <form class="formulario" name="imagenProducto" method="post" enctype="multipart/form-data">
        <h2>Imágen del producto</h2>
        <div class="input-group">
            <label for="img-product">Producto</label>
            <select id="img-product" name="img-product" required autofocus>
            <option selected value="">Seleccionar Producto</option>
            <?php
                $modo = "lista";
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
            <label for="imagen-product">Archivo JPG</label>
            <input type="file" id="imagen-product" name="imagen-product">
        </div>
        
        <div class="input-group">
            <input type="submit" id="btnRegistrarImagenProducto" name="btnRegistrarImagenProducto" value="Registrar Imagen del producto" title="Registrar Imagen del producto">
            <?php
                // $registro = new MvcController();
                // $registro -> registrarProductoImagenController();
            ?>
        </div>
    </form>
</div>

