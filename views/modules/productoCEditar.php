<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] == "master") {
            ?>
            <?php
        }
    }

    if (isset($_GET["uPFts"]) && isset($_GET["pFts"])) {
        $valor = $_GET["uPFts"];
        $pro = $_GET["pFts"];
        $caracteristica = MvcController::seleccionarCaracteristicasController($pro, $valor);
    }
?>

<div class="contenedor-formulario">
    <form class="formulario-editar" name="editarCaracteristica" method="post">
        <h2>Editar Característica</h2>
        <div class="input-group">
            <label for="featureProduct">Característica</label>
            <textarea id="featureProduct" name="uFeature" cols="50" rows="5" required><?=$caracteristica["caracteristica"]?></textarea>
            <input type="hidden" name="uHFeature" value="<?=$valor?>">
            <input type="hidden" name="pro" value="<?=$pro?>">
        </div>

        <div class="input-group">
            <input class="submitEditarProducto" type="submit" name="btnActualizarCaracteristica" value="Actualizar Característica">
            <?php 
                $actCaracteristica = new MvcController();
                $actCaracteristica -> actualCaracteristicaController();
                if (isset($_GET["not2"])) {
                    if ($_GET["not2"] == "true") {
                        ?>
                        <script type="text/javascript" src="js/notificacion2.js"></script>
                        <?php
                    }
                }
            ?>
        </div>
    </form>
</div>