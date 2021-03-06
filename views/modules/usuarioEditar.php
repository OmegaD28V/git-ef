<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && 
        ($_SESSION["access"] != "master" && $_SESSION["access"] != "invite")) {
            echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
        }
        if (isset($_GET["empD"])) {
            $user = $_GET["empD"];
            $usuario = MvcController::seleccionarUsuarioController($user, "emp");

        ?>

<div class="contenedor-formulario">
    <form style="border-color: blue" class="user-form" method="post" name="nuevoUsuario">
        <h2>Editar usuario</h2>
        <div class="line-form"></div>
        <div class="input-group">
            <label for="name-user">Nombre Completo</label>
            <input type="text" name="name-user" id="name-user" value="<?=$usuario["nombre"]?>" required>
        </div>
        <div class="input-group">
            <label style="display: inline-block" for="correo-user">Nombre de usuario</label>
            <input style="display: inline-block; width: 60%" type="text" name="correo-user" id="correo-user" value="<?=$usuario["usuario"]?>" placeholder="Puede ser un correo electrónico" required>
            <div class="extra-input">
                <label style="display: inline-block; width: auto; cursor: pointer;" for="no-email">Generado</label>
                <input style="display: inline-block; width: auto; cursor: pointer; margin-bottom: 0px" type="checkbox" name="no-email" id="no-email" onclick="generateNameUser()">
            </div>
        </div>

        <?php
                $puesto = null;
                $cargo = null;
                if($usuario["modulo"] == 33333){
                    $puesto = 0;
                    $cargo = "Sub-Gerente";
                }elseif ($usuario["modulo"] == 11303) {
                    $puesto = 1;
                    $cargo = "Agente de Ventas";
                }elseif ($usuario["modulo"] == 13130) {
                    $puesto = 2;
                    $cargo = "Agente de Compras";
                }elseif ($usuario["modulo"] == 30000) {
                    $puesto = 3;
                    $cargo = "Agente de Almacén";
                }
        ?>

        <div class="input-group">
            <select name="permisos" id="permisos" required>
                <option selected value="">Seleccionar Tipo de usuario</option>
                <option value="0">Sub-Gerente</option>
                <option value="1">Agente de Ventas</option>
                <option value="2">Agente de Compras</option>
                <option value="3">Agente de Almacén</option>
                <option selected value="<?=$puesto?>"><?=$cargo?></option>
            </select>
        </div>
        <div class="input-group">
            <label for="password-user">Contraseña</label>
            <input class="input-password" type="text" name="password-user" id="password-user" value="<?=$usuario["contrasena"]?>" required>
            <button type="button" class="btn-hidden-password" id="btn-hidden-password"><i id="fasIconHiddenPassword" class="far fa-eye-slash"></i></button>
        </div>
        <div style="text-align: center" class="input-group">
            <input class="btn-success" type="image" src="ima/ok_48px.png" alt="Ok" id="btnRegistrarUsuario" name="btnRegistrarUsuario" value="">
        </div>
    </form>
</div>

<?php
    // $editarUsuario = MvcController::actualizarUsuarioController();
?>

        <?php
        }else{
            echo '<script>window.location = "index.php?action=usuarios";</script>';
        }
    }
?>