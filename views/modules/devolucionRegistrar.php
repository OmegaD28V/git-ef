<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] == "master") {
            ?>
            <?php
        }
    }
    
// if (isset($_GET["uBuy"])) {
//     $item = "idcompra";
//     $valor = $_GET["uBuy"];
//     $producto = MvcController::compraFinalizadaController($item, $valor);
// }
    $ticket = null;
?>

<div class="contenedor-formulario">
    <form class="formulario" name="nuevaDevolucion" method="post">
        <h2>Nueva Devolución</h2>
        <div class="input-group">
            <label for="buy">Folio de compra</label>
            <select name="buy" required autofocus>
            <option selected value="">Seleccionar Compra</option>
                <?php
                    $compras = MvcController::seleccionarComprasController();
                    foreach ($compras as $key => $value) {
                    ?>
                        <option value="<?=$value["idcompra"]?>"><?=$value["folio"]?> | <?=$value["nombre"]?> | <?=$value["momento"]?></option>
                    <?php
                        $ticket = $value["idcompra"];
                    }
                ?>
            </select>
        </div>
        
        <div class="input-group">
            <label for="product">Producto</label>
            <select name="product" required autofocus>
            <option selected value="">Seleccionar Producto</option>
                <?php
                    $productos = MvcController::detalleCPController($ticket);
                    foreach ($productos as $key => $value) {
                    ?>
                        <option value="<?=$value["idpro"]?>"><?=$value["producto"]?></option>
                    <?php
                    }
                ?>
            </select>
        </div>
        
        <div class="input-group">
            <label for="units">Unidades</label>
            <input type="number" name="units" min="1" step="1" required>
        </div>
        
        <div class="input-group">
            <label for="reason">Motivo de Devolución</label>
            <textarea name="reason" cols="50" rows="10" required></textarea>
        </div>

        <div class="input-group">
            <input type="submit" id="btnAgregarDevolucion" name="btnAgregarDevolucion" value="Agregar Devolución" title="Agregar Devolución">
        </div>
    </form>
</div>

<?php
    $registroDevolucion = MvcController::registrarDevolucionController();
    if (isset($_GET["not1"])) {
        if ($_GET["not1"] == "true") {
            ?>
            <script type="text/javascript" src="js/notificacion1.js"></script>
            <?php
        }
    }
?>