<div class="contenedor-formulario">
    <form class="user-form" method="post" name="nuevoUsuario">
        <h2>Nuevo Proveedor</h2>
        <div class="line-form"></div>
        <h4>Datos del Proveedor</h4>
        <div class="input-group">
            <label for="input-btn-switch" style="display: inline-block; width: 60%">Cambia entre persona Física o Moral</label>
            <label for="input-btn-switch" name="btn-switch" class="btn-switch">
                <input type="checkbox" id="input-btn-switch" class="input-btn-switch">
                <span class="check-btn-switch round"></span>
            </label>
        </div>
        <div class="input-group fisica">
            <label for="name-user">Nombre</label>
            <input type="text" name="name-user" id="name-user" required>
        </div>
        <div class="input-group fisica">
            <label for="ape-user">Apellidos</label>
            <input type="text" name="ape-user" id="ape-user" required>
        </div>
        <div class="input-group">
            <label style="display: inline-block;" for="correo-user">Correo Electrónico</label>
            <input style="display: inline-block; width: 60%" type="text" name="correo-user" id="correo-user" required>
            <div class="extra-input">
                <label style="display: inline-block; width: auto; cursor: pointer;" for="no-email">Sin Correo</label>
                <input style="display: inline-block; width: auto; cursor: pointer; margin-bottom: 0px" type="checkbox" name="no-email" id="no-email" onclick="generateNameUser()">
            </div>
        </div>
        <div class="input-group">
            <label style="display: inline-block;" for="tel-user">Teléfono</label>
            <input style="display: inline-block; width: 60%" type="number" name="tel-user" id="tel-user" min="0" step="1">
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
                <input type="text" class="form-control" id="search_input" placeholder="Ejemplo: Ejidal, Martínez de la Torre, Veracruz" required>
                <input type="hidden" id="val-estado" name="val-estado" required>
                <input type="hidden" id="val-municipio" name="val-municipio" required>
                <input type="hidden" id="val-localidad" name="val-localidad" required>
                <input type="hidden" id="val-colonia" name="val-colonia" required>
                <input type="hidden" id="val-CP" name="val-CP" required>
            </div>
        
        <!-- </div> -->
        <div class="input-group">
            <input type="submit" id="btnRegistrarUsuario" name="btnRegistrarUsuario" value="Registrar">
        </div>
    </form>
</div>

<?php
    $tipoUsuario = 22;
    $registrarse = MvcController::registrarUsuarioController($tipoUsuario);
    if (isset($_GET["err"])) {
        if ($_GET["err"] == "ur") {
            ?>
                <script src="js/invalidRegister.js"></script>
            <?php  
        }
    }elseif (isset($_GET["not0"])) {
        if ($_GET["not0"] == "true") {
        ?>
            <script type="text/javascript" src="js/notUserReg.js"></script>
        <?php
        }
    }
?>