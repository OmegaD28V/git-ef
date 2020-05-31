<div class="contenedor-formulario">
    <form class="formulario" name="nuevaCategoria" method="post">
        <h2>Nueva Categoría</h2>
        <div class="input-group">
            <label for="nameCategory">Nombre de la Categoría</label>
            <input id="nameCategory" type="text" name="nameCategory" required>
        </div>

        <div class="input-group">
            <input type="submit" id="btnRegistrarCategoria" name="btnRegistrarCategoria" value="Registrar Categoría" title="Registrar Categoría">
        </div>
    </form>
</div>

<?php
    $registro = MvcController::registrarCategoriaController();
    if (isset($_GET["not0"])) {
        if ($_GET["not0"] == "true") {
        ?>
            <script type="text/javascript" src="js/notificacion0.js"></script>
        <?php
        }
    }
?>