<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] == "master") {
            ?>
            <?php
        }
    }

    if (isset($_GET["cdet"])) {
        $item = "idcompra";
        $valor = $_GET["cdet"];

        $detalleCompra = MvcController::detalleCompraController($valor);
        $detalleCP = MvcController::detalleCPController($valor);
    }
?>
<div class="contenedor-formulario">
    <div class="grid-info-pro">
        <div class="description-pro">
            <span class="t-p-name"><?=$detalleCompra["momento"]?></span>
        </div>
        
        <div class="description-pro">
            <h2 class="p-title">Proveedor</h2>
            <p class="d-p-desc"><?=$detalleCompra["proveedor"]?></p>
        </div>
        
        <div class="description-pro">
            <h2 class="p-title">Folio</h2>
            <p class="d-p-desc"><?=$detalleCompra["folio"]?></p>
        </div>

        <div class="detail-pro">
            <h2 class="p-title">Productos</h2>
            <div class="d-p-div">
                <table class="table-d-p">
                    
                <tr class="d-g">
                    <th>Nombre</th>
                    <td>Precio de compra</td>
                    <td>Unidades</td>
                </tr>
                    <?php
                        foreach ($detalleCP as $key => $value) {
                            ?>
                <tr class="d-g">
                    <th><span class="d-p-category"><?=$value["producto"]?></span></th>
                    <td><span class="d-p-category"><?=$value["preciocompra"]?></span></td>
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
            <p class="d-p-desc"><?=$detalleCompra["total"]?></p>
        </div>
    </div>
</div>