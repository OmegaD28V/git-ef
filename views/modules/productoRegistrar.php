<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] == "master") {
            ?>
            <?php
        }
    }
?>

<div class="contenedor-formulario">
    <form class="formulario" name="nuevoProducto" method="post">
        <h2>Nuevo Producto</h2>
        <div class="input-group">
            <label for="input1">Categoria</label>
            <select id="input1" name="categoryProduct" required autofocus>
            <option selected value="">Seleccionar</option>
            <?php
                $categorias = MvcController::seleccionarCategoriaController(null, null);
                foreach ($categorias as $key => $value) {
                ?>
                    <option value="<?=$value["idpro_categoria"]?>"><?=$value["categoria"]?></option>
                <?php
                }
            ?>
            </select>
        </div>

        <div class="input-group">
            <a href="index.php?action=categoriaRegistrar" class="enlace-form">Nueva Categoría</a>
        </div>
        
        <div class="input-group">
            <label for="input2">Marca</label>
            <select id="input2" name="trademarkProduct" required autofocus>
            <option selected value="">Seleccionar</option>
            <?php
                $categorias = MvcController::seleccionarMarcaController(null, null);
                foreach ($categorias as $key => $value) {
                ?>
                    <option value="<?=$value["idpro_marca"]?>"><?=$value["marca"]?></option>
                <?php
                }
            ?>
            </select>
        </div>

        <div class="input-group">
            <a href="index.php?action=marcaRegistrar" class="enlace-form">Nueva Marca</a>
        </div>

        <div class="input-group">
            <label for="input3">Código del Producto</label>
            <input id="input3" type="text" name="codeProduct" required>
        </div>

        <div class="input-group">
            <label for="input4">Nombre</label>
            <input id="input4" type="text" name="nameProduct" required>
        </div>

        <div class="input-group">
            <label for="input5">Modelo</label>
            <input id="input5" type="text" name="modelProduct" required>
        </div>
        
        <div class="input-group">
            <label for="input6">Precio de venta $ (Inicia en cero)</label>
            <div class="info-i"><span>El precio de venta se actualizará al registrar una compra</span></div>
        </div>

        <div class="input-group">
            <label for="input7">Descripción</label>
            <textarea id="input7" name="descriptionProduct" cols="50" rows="10" required></textarea>
        </div>
        
        <div class="input-group">
            <input type="submit" id="btnRegistrarProducto" name="btnRegistrarProducto" value="Registrar Producto">
            <?php
                $registro = new MvcController();
                $registro -> registrarProductoController();
                if (isset($_GET["not0"])) {
                    if ($_GET["not0"] == "true") {
                    ?>
                        <script type="text/javascript" src="js/notificacion0.js"></script>
                    <?php
                    }
                }
                if (isset($_GET["err"])) {
                    if ($_GET["err"] == "pr") {
                    ?>
                        <script type="text/javascript" src="js/invalidRegister.js"></script>
                    <?php
                    }
                }
            ?>
        </div>
    </form>
</div>