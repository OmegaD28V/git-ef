<div class="contenedor-formulario">
    <form class="user-form" method="post" name="nuevoUsuario">
        <h2>Crear una cuenta</h2>
        <div class="input-group">
            <label for="name-user">Nombre</label>
            <input type="text" name="name-user" id="name-user" required>
        </div>
        <div class="input-group">
            <label for="ape-user">Apellidos</label>
            <input type="text" name="ape-user" id="ape-user" required>
        </div>
        <div class="input-group">
            <label for="correo-user">Correo electrónico</label>
            <input type="email" name="correo-user" id="name-user" required>
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
        <div class="input-group">
            <input type="submit" id="btnRegistrarUsuario" name="btnRegistrarUsuario" value="Registrarse">
        </div>
        <div class="input-group">
            <a href="#" class="user-a-register">¡Ya tengo una cuenta!</a>
        </div>
    </form>
</div>

<?php
    $registrarse = new MvcController();
    $registrarse -> registrarUsuarioController();
?>