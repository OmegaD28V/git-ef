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
        $domicilio = MvcController::clienteDomicilioController($cli, "cli");
        $phone = MvcController::clientePhoneController($cli, "cli");
        $idDomicilio = $domicilio["iduser_domicilio"];
        $idPhone = $phone["iduser_telefono"];
?>

<div class="contenedor-formulario">
    <form class="formulario-editar" method="post" name="editarCliente">
        <h2>Editar Cliente</h2>
        <div class="line-form"></div>
        <h4>Datos del cliente</h4>
        <div class="input-group">
            <label for="name-user">Nombre y Apellido o Razón Social</label>
            <input type="text" name="name-user" id="name-user" value="<?=$cliente["nombre"]?>" required>
        </div>
        <div class="input-group">
            <label for="ape-user">Usuario</label>
            <div class="input-disabled"><span id="correo-user"><?=$cliente["usuario"]?></span></div>
        </div>
        <div class="input-group">
            <label style="display: inline-block;" for="tel-user">Teléfono</label>
            <input style="display: inline-block; width: 60%" type="number" name="tel-user" id="tel-user" pattern="[0-9]{7,10}" maxlength="10" minlength="7" value="<?=$phone["numero"]?>">
            <div class="extra-input">
                <label style="display: inline-block; width: auto; cursor: pointer;" for="no-phone">Sin Teléfono</label>
                <input style="display: inline-block; width: auto; cursor: pointer; margin-bottom: 0px" type="checkbox" name="no-phone" id="no-phone" onclick="noPhone()">
            </div>
        </div>
        
        <!-- <div style="text-align: initial; width: 100%; margin: 20px 0px;" class="input-group" id="div-domicilio"> -->
        <div class="line-form"></div>
        
        <h4>Domicilio</h4>
        <!-- <div class="line-form-msg"><i style="margin: 0px 5px" class="fas fa-plus-circle"></i>Domicilio</div> -->
            <div class="form-group" id="col">
                <label>Colonia:</label>
                <input type="text" class="form-control" id="search_input" placeholder="Ejemplo: Ejidal, Martínez de la Torre, Veracruz" value="<?=$domicilio["colonia"].', '.$domicilio["localidad"].', '.$domicilio["estado"]?>" required>
                <input type="hidden" id="val-estado" name="val-estado" value="<?=$domicilio["estado"]?>" required>
                <input type="hidden" id="val-municipio" name="val-municipio" value="<?=$domicilio["localidad"]?>" required>
                <input type="hidden" id="val-localidad" name="val-localidad" value="<?=$domicilio["localidad"]?>" required>
                <input type="hidden" id="val-colonia" name="val-colonia" value="<?=$domicilio["colonia"]?>" required>
                <input type="hidden" id="val-CP" name="val-CP" required>
            </div>
            <div id="super-form">
                <div class="form-group">
                    <label>Estado:</label>
                    <div class="input-disabled"><span id="estado"><?=$domicilio["estado"]?></span></div>
                </div>
                <div class="form-group">
                    <label>Municipio:</label>
                    <div class="input-disabled"><span id="municipio"><?=$domicilio["localidad"]?></span></div>
                </div>
                <div class="form-group">
                    <label>Localidad:</label>
                    <div class="input-disabled"><span id="localidad"><?=$domicilio["localidad"]?></span></div>
                </div>
                <div class="form-group">
                    <label>Colonia:</label>
                    <div class="input-disabled"><span id="colonia"><?=$domicilio["colonia"]?></span></div>
                </div>
                <div class="form-group">
                    <label>Código Postal:</label>
                    <div class="input-disabled"><span id="CP">0</span></div>
                </div>
                <div class="form-group">
                    <label for="calle">Calle:</label>
                    <input type="text" id="calle" name="calle"  value="<?=$domicilio["calle"]?>"required>
                </div>
                <div class="form-group">
                    <label for="no-casa">No. Casa:</label>
                    <input type="number" id="no-casa" name="no-casa" value="<?=$domicilio["num_casa"]?>">
                </div>
                <div class="form-group">
                    <label for="no-ext">No. Exterior (Opcional):</label>
                    <input type="number" id="no-ext" name="no-ext" value="<?=$domicilio["num_casa2"]?>">
                </div>
                <h5>Entre Calles</h5>
                <div class="form-group">
                    <label for="entre-calle1">Calle 1 (Opcional):</label>
                    <input type="text" id="entre-calle1" name="entre-calle1" value="<?=$domicilio["calle1"]?>">
                </div>
                <div class="form-group">
                    <label for="entre-calle2">Calle 2 (Opcional):</label>
                    <input type="text" id="entre-calle2" name="entre-calle2" value="<?=$domicilio["calle2"]?>">
                </div>
                <h5>Describa una referencia</h5>
                <div class="form-group">
                    <label for="ref">Referencia:</label>
                    <textarea id="ref" name="ref" cols="50" rows="10" required><?=$domicilio["referencia"]?></textarea>
                </div>
            </div>
        
        <!-- </div> -->
        <div class="input-group">
            <input class="submitEditarProducto" type="submit" id="btnactualizarUsuario" name="btnactualizarUsuario" value="Actualizar">
        </div>
    </form>
</div>

<?php
        $gestor = 33;
        $actualizar = MvcController::actualizarUsuarioController($cli, $idDomicilio, $idPhone, $gestor);
        if (isset($_GET["err"])) {
            if ($_GET["err"] == "ur") {
                ?>
                    <script src="js/invalidRegister.js"></script>
                <?php  
            }
        }elseif (isset($_GET["not0"])) {
            if ($_GET["not0"] == "true") {
            ?>
                <script type="text/javascript" src="js/notificacion2.js"></script>
            <?php
            }
        }
    }
?>