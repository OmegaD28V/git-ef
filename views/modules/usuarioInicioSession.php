<div class="contenedor-formulario">
    <form class="user-form" method="post" name="inicioSesionUsuario">
        <h2>Iniciar Sesion</h2>
        <div class="input-group">
            <label for="email-user">Nombre de usuario o Correo electrónico</label>
            <input type="text" name="email-user" id="email-user" required>
        </div>
        <div class="input-group">
            <label for="password-user">Contraseña</label>
            <input type="text" class="input-password" name="password-user" id="password-user2" required>
            <button type="button" class="btn-hidden-password-login" id="btn-hidden-password3"><i id="fasIconHiddenPassword3" class="far fa-eye-slash"></i></button>
        </div>
        <div class="input-group">
            <input type="submit" id="btnRegistrarUsuario" name="btnRegistrarUsuario" value="Iniciar Sesión">
        </div>
        <div class="input-group">
            <a href="index.php?action=usuarioRegistrarse" class="extra-button">No tengo una cuenta</a>
        </div>
    </form>
</div>

<?php
    $inicioSesion = new MvcController();
    $inicioSesion -> inicioSesionUsuarioController();
    if (isset($_GET["not0"])) {
        if ($_GET["not0"] == "true") {
        ?>
            <script type="text/javascript" src="js/notUserReg.js"></script>
        <?php
        }
    }
    if (isset($_GET["err"])) {
        if ($_GET["err"] == "ul") {
        ?>
            <script type="text/javascript" src="js/invalidUserLogin.js"></script>
        <?php
        }
    }
?>