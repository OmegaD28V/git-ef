<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] != "master") {
            echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
        }
    }

if (isset($_GET["uBuy"])) {
    $item = "idventa";
    $valor = $_GET["uBuy"];
    $producto = MvcController::compraFinalizadaController($item, $valor);
}
?>

<div class="contenedor-formulario">
    <form class="formulario" name="nuevaCompra" method="post">
        <h2>Nueva Venta</h2>
        <div class="input-group">
            <label for="client">Cliente</label>
            <select id="client" name="client" required autofocus>
            <option selected value="">Seleccione Cliente</option>
                <?php
                    $productos = MvcController::seleccionarClienteController(null, null);
                    foreach ($productos as $key => $value) {
                    ?>
                        <option value="<?=$value["iduser"]?>"><?=$value["nombre"]?></option>
                    <?php
                    }
                ?>
            </select>
        </div>
        <div class="input-group">
            <a href="index.php?action=uClienteRegistrar" class="enlace-form">¿Este cliente no está registrado?</a>
        </div>
        <div class="input-group">
            <input type="submit" id="btnAgregarProductos" name="btnAgregarProductos" value="Agregar Productos" title="Agregar Productos">
        </div>
    </form>
</div>

<?php
    $registro = MvcController::registrarVentaController();
    if (isset($_GET["not1"])) {
        if ($_GET["not1"] == "true") {
            ?>
            <script type="text/javascript" src="js/notificacion1.js"></script>
            <?php
        }
    }elseif (isset($_GET["err"])) {
        if ($_GET["err"] == "pc") {
            ?>
            <script type="text/javascript" src="js/invalidRegister.js"></script>
            <?php
        }
    }
?>