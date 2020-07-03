<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] != "master") {
            echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
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
        <h2>Domicilio del cliente</h2>
        <div class="line-form"></div>
        <div class="input-group">
            <h4 style="text-align: center; color: blue"><?=$cliente["nombre"]?></h4>
        </div>
        <h4>Domicilio</h4>
        <!-- <div class="line-form-msg"><i style="margin: 0px 5px" class="fas fa-plus-circle"></i>Domicilio</div> -->
        <div class="form-group" id="col">
            <label>Colonia:</label>
            <input type="text" class="form-control" id="search_input" placeholder="Ejemplo: Ejidal, Martínez de la Torre, Veracruz" required>
            <input type="hidden" id="val-estado" name="val-estado" required>
            <input type="hidden" id="val-municipio" name="val-municipio" required>
            <input type="hidden" id="val-localidad" name="val-localidad" required>
            <input type="hidden" id="val-colonia" name="val-colonia" required>
            <input type="hidden" id="val-CP" name="val-CP" required>
        </div>
        
        <div class="input-group">
            <input type="submit" id="btnRegistrarTelefono" name="btnRegistrarTelefono" value="Registrar">
        </div>
    </form>
</div>

<?php
    $regCorreo = MvcController::regUDomicilioController($cliente["iduser"], 3);
    if (isset($_GET["err"])) {
        if ($_GET["err"] == "ur") {
            ?>
                <script src="js/invalidRegister.js"></script>
            <?php  
        }
    }
}
?>