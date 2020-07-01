<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] == "master") {
            ?>
            <?php
        }
    }

    if (!isset($_GET["cliD"])) {
        echo '<span>No se encontraron datos.</span>';
    }else {
        $cli = $_GET["cliD"];
        $cliente = MvcController::seleccionarUsuarioController($cli, "cli");
?>
<div class="contenedor-formulario">
    <form class="user-form" name="editarTelefonoCliente" method="post">
        <h2>Teléfono del cliente</h2>
        <div class="line-form"></div>
        <div class="input-group">
            <h4 style="text-align: center; color: blue"><?=$cliente["nombre"]?></h4>
        </div>
        <div class="input-group">
            <label for="tel-user">Telefono</label>
            <input type="number" name="tel-user" id="tel-user" min="0" step="1" maxlength="10" required>
        </div>
        <div class="input-group">
            <input type="submit" id="btnRegistrarTelefono" name="btnRegistrarTelefono" value="Registrar">
        </div>
    </form>
</div>

<?php
    $regCorreo = MvcController::regUPhoneController($cliente["iduser"]);
    if (isset($_GET["err"])) {
        if ($_GET["err"] == "ur") {
            ?>
                <script src="js/invalidRegister.js"></script>
            <?php  
        }
    }
}
?>