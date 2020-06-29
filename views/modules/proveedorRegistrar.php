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
    <form class="formulario" name="nuevoProveedor" method="post">
        <h2>Nuevo Proveedor</h2>
        <div class="input-group">
            <label for="nameProvider">Nombre del Proveedor</label>
            <input id="nameProvider" type="text" name="nameProvider" required>
        </div>

        <div class="input-group">
            <input type="submit" id="btnRegistrarProveedor" name="btnRegistrarProveedor" value="Registrar Proveedor" title="Registrar Proveedor">
        </div>
    </form>
</div>

<?php
    $registro = new MvcController();
    $registro -> registrarProveedorController();
?>