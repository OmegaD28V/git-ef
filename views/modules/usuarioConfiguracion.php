<?php
    $user = " ";
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        $user = null;
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok") {
            if ($_SESSION["access"] == "master") {
                // $user = MvcController::seleccionarUsuarioController();
            }
        }
    }
?>
        
<div class="contenedor-formulario">
    <div><span class="info-title">Configuración</span></div>
    <div class="opt" id="opt">
    <?php if($user == null){ ?>
        <div><span class="info-nodata">No ha iniciado sesión en Electrónica Fonseca</span></div>
        <div>
            <a class="extra-button-small other" href="usuarioInicioSession">Iniciar Sesión</a>
            <a class="extra-button-small" href="usuarioRegistrarse">Crear cuenta</a>
        </div>
    <?php }else{ ?>
    
    <?php } ?>

        <ul class="opt__ul">
            <li class="opt__li">
                <label for="opt__switch1" class="opt__lbl" id="opt__sw1">Tema ?... Error: No se ha cargado el tema</label>
                <label for="opt__switch1" name="btn-switch" class="btn-switch">
                    <input type="checkbox" id="opt__switch1" class="input-btn-switch">
                    <span class="check-btn-switch round"></span>
                </label>
            </li>
            <li class="opt__li">
                <label for="opt__switch2" class="opt__lbl" id="opt__sw2">Modo lectura: ?... Error: No se ha cargado la opción</label>
                <label for="opt__switch2" name="btn-switch" class="btn-switch">
                    <input type="checkbox" id="opt__switch2" class="input-btn-switch">
                    <span class="check-btn-switch round"></span>
                </label>
            </li>
            <!-- <li class="opt__li">
                <label for="opt__switch3" class="opt__lbl" id="opt__sw3">Vista de productos ?... Error: No se ha cargado la opción</label>
                <button id="view1" class="opt__proview" href="#" title="Lista" value="0"><i class="fas fa-th-list"></i></button>
                <button id="view2" class="opt__proview" href="#" title="Fichas" value="0"><i class="fas fa-th-large"></i></button>
                <label for="opt__switch3" name="btn-switch" class="btn-switch opt__btn-switch">
                    <input type="checkbox" id="opt__switch3" class="input-btn-switch">
                    <span class="check-btn-switch round"></span>
                </label>
            </li> -->
        </ul>
    </div>
</div>