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
    <form class="formulario" name="nuevaMarca" method="post">
        <h2>Nueva Marca</h2>
        <div class="input-group">
            <label for="nameTrademark">Nombre de la Marca</label>
            <input id="nameTrademark" type="text" name="nameTrademark" required>
        </div>

        <div class="input-group">
            <input type="submit" id="btnRegistrarMarca" name="btnRegistrarMarca" value="Registrar Marca" title="Registrar Marca">
        </div>
    </form>
</div>

<?php
    $registro = new MvcController();
    $registro -> registrarMarcaController();
    if (isset($_GET["not0"])) {
        if ($_GET["not0"] == "true") {
        ?>
            <script type="text/javascript" src="js/notificacion0.js"></script>
        <?php
        }
    }
    if (isset($_GET["err"])) {
        if ($_GET["err"] == "mr") {
        ?>
            <script type="text/javascript" src="js/invalidRegister.js"></script>
        <?php
        }
    }
?>