<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] != "master") {
            echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
        }
    }

    if (!isset($_GET["provD"])) {
        echo '<span>No se encontraron datos.</span>';
    }else {
        $prov = $_GET["provD"];
        $proveedor = MvcController::seleccionarUsuarioController($prov, "prov");
?>
<div class="contenedor-formulario">
    <form class="user-form" name="editarCorreoCliente" method="post">
        <h2>Correo del Proveedor</h2>
        <div class="line-form"></div>
        <div class="input-group">
            <h4 style="text-align: center; color: blue"><?=$proveedor["nombre"]?></h4>
        </div>
        <div class="input-group">
            <label for="correo-user">Correo Electrónico</label>
            <input type="text" name="correo-user" id="correo-user" required>
        </div>
        <div class="input-group">
            <input type="submit" id="btnRegistrarCorreo" name="btnRegistrarCorreo" value="Registrar">
        </div>
    </form>
</div>

<?php
    $regCorreo = MvcController::regUCorreoController($proveedor["iduser"], 2);
    if (isset($_GET["err"])) {
        if ($_GET["err"] == "ur") {
            ?>
                <script src="js/invalidRegister.js"></script>
            <?php  
        }
    }
}
?>