<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && 
        ($_SESSION["access"] != "master" && $_SESSION["access"] != "invite")) {
            echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
        }
    }

    if (isset($_GET["cdet"])) {
        $item = "idcompra";
        $valor = $_GET["cdet"];

        $detalleVenta = MvcController::detalleVentaController($valor);
        $detalleVP = MvcController::detalleVPController($valor);
    }
?>
<div class="contenedor-formulario">
    <div class="grid-info-pro">
        <div class="description-pro">
            <span class="t-p-name"><?=$detalleVenta["momento"]?></span>
        </div>
        
        <div class="description-pro">
            <h2 class="p-title">Cliente</h2>
            <p class="d-p-desc"><?=$detalleVenta["cliente"]?></p>
        </div>
        
        <div class="description-pro">
            <h2 class="p-title">Folio</h2>
            <p class="d-p-desc"><?=$detalleVenta["folio"]?></p>
        </div>

        <div class="detail-pro">
            <h2 class="p-title">Productos</h2>
            <div class="d-p-div">
                <table class="table-d-p">
                    
                <tr class="d-g">
                    <th>Nombre</th>
                    <td>Precio de venta</td>
                    <td>Unidades</td>
                </tr>
                    <?php
                        foreach ($detalleVP as $key => $value) {
                            ?>
                <tr class="d-g">
                    <th><span class="d-p-category"><?=$value["producto"]?></span></th>
                    <td><span class="d-p-category"><?=$value["precioventa"]?></span></td>
                    <td><span class="d-p-category"><?=$value["cantidad"]?></span></td>
                </tr> 
                            <?php
                        }
                    ?>
                </table>                
            </div>
        </div>

        <div class="description-pro">
            <h2 class="p-title">Total $</h2>
            <p class="d-p-desc"><?=$detalleVenta["total"]?></p>
        </div>
    </div>
</div>