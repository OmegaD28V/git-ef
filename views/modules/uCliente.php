<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && 
        ($_SESSION["access"] != "master" && $_SESSION["access"] != "invite")) {
            echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
        }
    }

    if (isset($_GET["cliD"])) {
        $cli = $_GET["cliD"];

        $detalleCliente = MvcController::detalleUsuarioController($cli, "cli");
    }
?>
<div class="contenedor-formulario">
    <div class="grid-info-pro">
        <div class="description-pro">
            <span class="t-p-name"><?='Registrado: '.$detalleCliente["fecha"]?></span>
        </div>
        
        <div class="description-pro">
            <div class="">
                <h2 style="display: inline-block; text-align: initial" class="p-title">Nombre completo</h2>
                <h2 style="display: inline-block; text-align: center" class="p-title">Correo Electrónico</h2>
                <h2 style="display: inline-block; text-align: end" class="p-title">Teléfono</h2>
            </div>
            <div class="">
                <p style="display: inline-block; text-align: initial" class="d-p-desc"><?=$detalleCliente["nombre"]?></p>
                <?php
                if ($detalleCliente["correo"] == null) {
                    ?>
                <p style="display: inline-block; text-align: center" class="d-p-desc">Sin Correo</p>
                    <?php
                }else{
                    ?>
                <p style="display: inline-block; text-align: center" class="d-p-desc"><?=$detalleCliente["correo"]?></p>
                    <?php
                }

                if ($detalleCliente["numero"] == null) {
                    ?>
                <p style="display: inline-block; text-align: end" class="d-p-desc">Sin número</p>
                    <?php
                }else{
                    ?>
                <p style="display: inline-block; text-align: end" class="d-p-desc"><?=$detalleCliente["numero"]?></p>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="detail-pro">
            <div class="d-p-div">
                <?php
                if ($detalleCliente["estado"] == null) {
                    ?>
                <span>Sin Domicilio</span>    
                    <?php
                }else{
                    ?>
                    <table style="border: none" class="tableCategorias">   
                        <tr>
                            <caption class="thCategorias">Domicilio</caption>
                        </tr>
                        <tr>
                            <th><span class="thSub">Estado</span></th>
                            <th><span class="thSub">Municipio</span></th>
                            <th><span class="thSub">Colonia</span></th>
                            <th><span class="thSub">Calle</span></th>
                            <th><span class="thSub">No. Casa</span></th>
                            <th><span class="thSub">Entre Calles</span></th>
                            <th><span class="thSub">Referencia</span></th>
                        </tr>
                        <tr class="color-gray">
                            <td><span class="d-p-price"><?=$detalleCliente["estado"]?></span></td>
                            <td><span class="d-p-price"><?=$detalleCliente["localidad"]?></span></td>
                            <td><span class="d-p-price"><?=$detalleCliente["colonia"]?></span></td>
                            <td><span class="d-p-price"><?=$detalleCliente["calle"]?></span></td>
                            <td>
                                <div class="content-msg-a">
                                <?php
                                    if($detalleCliente["num_casa"] == null || $detalleCliente["num_casa"] == 0){
                                        ?>
                                    <span class="d-p-price">S/N</span>
                                        <?php
                                    }else{
                                        ?>
                                    <span class="d-p-price"><?=$detalleCliente["num_casa"]?></span>
                                    <?php
                                        if ($detalleCliente["num_casa2"] != null && $detalleCliente["num_casa2"] != 0) {
                                            ?>
                                    <span class="d-p-price"><?='Exterior: '.$detalleCliente["num_casa2"]?></span>
                                            <?php
                                        }
                                    ?>
                                        <?php
                                    }
                                ?>
                                </div>
                            </td>
                            <td>
                                <div class="content-msg-a">
                                <?php
                                    if($detalleCliente["calle1"] != null && $detalleCliente["calle2"] != null){
                                        ?>
                                    <span class="d-p-price"><?='Entre '.$detalleCliente["calle1"]?></span>
                                    <span class="d-p-price"><?='y '.$detalleCliente["calle2"]?></span>
                                        <?php
                                    }elseif ($detalleCliente["calle1"] == null && $detalleCliente["calle2"] != null) {
                                        ?>
                                    <span class="d-p-price"><?=$detalleCliente["calle2"]?></span>
                                        <?php
                                    }elseif ($detalleCliente["calle1"] != null && $detalleCliente["calle2"] == null) {
                                        ?>
                                    <span class="d-p-price"><?=$detalleCliente["calle1"]?></span>
                                        <?php
                                    }elseif ($detalleCliente["calle1"] == null && $detalleCliente["calle2"] == null) {
                                        ?>
                                        <span class="d-p-price">Ninguna</span>
                                        <?php
                                    }
                                ?>
                                </div>
                            </td>
                            <td><span class="d-p-price"><?=$detalleCliente["referencia"]?></span></td>
                        </tr> 
                    </table>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>