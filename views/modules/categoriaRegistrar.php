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
    if (isset($_GET["err"])) {
        if ($_GET["err"] == "rc") {
        ?>
            <script type="text/javascript" src="js/invalidRegister.js"></script>
        <?php
        }
    }
?>