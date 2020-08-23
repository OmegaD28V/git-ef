<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && 
        ($_SESSION["access"] != "master" && $_SESSION["access"] != "invite")) {
            echo '<script>window.location = "usuarioInicioSession";</script>';
        }
    }
?>
<div class="contenedor-formulario">
    <form style="border-color: blue" class="user-form" method="post" name="nuevoUsuario">
        <h2>Crear un usuario</h2>
        <div class="line-form"></div>
        <div class="input-group">
            <label for="name-user">Nombre Completo</label>
            <input type="text" name="name-user" id="name-user" required>
        </div>
        <div class="input-group">
            <label style="display: inline-block" for="correo-user">Nombre de usuario</label>
            <input style="display: inline-block; width: 60%" type="text" name="correo-user" id="correo-user" placeholder="Puede ser un correo electrónico" required>
            <div class="extra-input">
                <label style="display: inline-block; width: auto; cursor: pointer;" for="no-email">Generado</label>
                <input style="display: inline-block; width: auto; cursor: pointer; margin-bottom: 0px" type="checkbox" name="no-email" id="no-email" onclick="generateNameUser()">
            </div>
        </div>
        <div class="input-group">
            <select name="permisos" id="permisos" required>
                <option selected value="">Seleccionar Tipo de usuario</option>
                <option value="0">Sub-Gerente</option>
                <option value="1">Agente de Ventas</option>
                <option value="2">Agente de Compras</option>
                <option value="3">Agente de Almacén</option>
            </select>
        </div>
        <div class="input-group">
            <label for="password-user">Contraseña</label>
            <input class="input-password" type="text" name="password-user" id="password-user" required>
            <button type="button" class="btn-hidden-password" id="btn-hidden-password"><i id="fasIconHiddenPassword" class="far fa-eye-slash"></i></button>
        </div>
        <div class="input-group">
            <label for="repassword-user">Confirmar contraseña</label>
            <input class="input-password" type="text" name="repassword-user" id="repassword-user" required>
            <button type="button" class="btn-hidden-password" id="btn-hidden-password2"><i id="fasIconHiddenPassword2" class="far fa-eye-slash"></i></button>
        </div>
        <div style="text-align: center" class="input-group">
            <input class="btn-success" type="image" src="ima/ok_48px.png" alt="Ok" id="btnRegistrarUsuario" name="btnRegistrarUsuario" value="">
        </div>
    </form>
</div>

<?php
    $tipoUsuario = 1;
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
                <script src="js/notificacion0.js"></script>
            <?php  
        }
    }
?>