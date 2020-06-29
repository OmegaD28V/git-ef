<?php

    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] == "master") {
            ?>
            <?php
        }
    }

    if (isset($_GET["cat"])) {
        $item = "idpro_categoria";
        $valor = $_GET["cat"];

        $categoria = MvcController::seleccionarCategoriaController($item, $valor);
        
    }
?>

<div class="contenedor-formulario">
    <form class="formulario-editar" name="editarCategoria" method="post">
        <h2>Editar Categoría</h2>
        <div class="input-group">
            <input id="hidden-idcategory" type="hidden" name="hidden-idcategory" value="<?=$_GET["cat"]?>">
        </div>

        <div class="input-group">
            <label for="nameCategory">Nombre de la Categoría</label>
            <input id="nameCategory" type="text" name="nameCategory" value="<?=$categoria["categoria"]?>" required>
        </div>

        <div class="input-group">
            <input class="submitEditarProducto" type="submit" id="btnEditarCategoria" name="btnEditarCategoria" value="Actualizar Categoría">
        </div>
    </form>
</div>

<?php
    $registro = new MvcController();
    $registro -> actualizarCategoriaController();
?>