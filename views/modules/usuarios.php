<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] != "master") {
            echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
        }
        $usuarios = MvcController::seleccionarUsuariosController("emp");
    }
?>
<div class="contenedor-formulario">
    <?php
        if ($usuarios == null) {
            ?>
            <div><span class="info-nodata">Aún no hay datos para mostrar</span></div>
            <div>
                <a style="margin-bottom: 10px" class="extra-button-small" href="index.php?action=usuarioRegistrar">Nuevo Usuario</a>
            </div>
            <?php
        }else{
            ?>
    <table class="tableCategorias">
        <div>
            <a style="margin-bottom: 10px" class="extra-button-small" href="index.php?action=usuarioRegistrar">Nuevo Usuario</a>
        </div>
        <tr>
            <caption class="thCategorias">Personal con acceso al sistema</caption>
        </tr>
        <tr>
            <th><span class="thSub">Nombre</span></th>
            <th><span class="thSub">Puesto</span></th>
            <th><span class="thSub">Fecha de registro</span></th>
            <!-- <th><span class="thSub">Correo</span></th>
            <th><span class="thSub">Teléfono</span></th>
            <th><span class="thSub">Domicilio</span></th> -->
            <th><span class="thSub">Acción</span></th>
        </tr>
            <?php
                foreach ($usuarios as $key => $value) {
                ?>
        <tr 
                <?php
                if (($key % 2) == 0) {
                    ?>
            class="color-gray" 
                    <?php
                }else {
                    ?>
            class="color-darkgray" 
                    <?php
                }
            ?>
        >
            <td><span class="d-p-price"><?=$value["nombre"]?></span></td>
            <?php
                $puesto = "Ninguno";
                if($value["modulo"] == 33333){
                    $puesto = "Sub-Gerente";
                }elseif ($value["modulo"] == 11303) {
                    $puesto = "Agente de ventas";
                }elseif ($value["modulo"] == 13130) {
                    $puesto = "Agente de compras";
                }elseif ($value["modulo"] == 30000) {
                    $puesto = "Agente de almacén";
                }
            ?>
            <td><span class="d-p-price"><?=$puesto?></span></td>
            <td><span class="d-p-price"><?=$value["fecha"]?></span></td>
            
            <td>
                <!-- <a class="ver-det" href="index.php?action=usuario&empD=<?=$value["iduser"]?>">Detalles</a> -->
                <!-- <a class="editar" href="index.php?action=usuarioEditar&empD=<?=$value["iduser"]?>"><i class="fas fa-pen-square"></i>Editar</a> -->
                <form class="formEliminarT" method="post" name="eliminarUsuario">
                    <input class="inputEliminar" type="hidden" value="<?=$value["iduser"]?>" name="removeUser">
                    <button class="btn-remove" type="submit"><i class="fas fa-times-circle"></i>Quitar</button>
                    <?php
                        $quitarUsuario = new MvcController();
                        $quitarUsuario -> quitarUsuarioController(1);
                    ?>
                </form>
            </td>
        </tr>
        <?php 
            }
        ?>
    </table>
            <?php
        }
    ?>

                <?php
                if (isset($_GET["not0"])) {
                    if ($_GET["not0"] == "true") {
                        ?>
                        <script type="text/javascript" src="js/notificacion2.js"></script>
                        <?php
                    }
                }elseif (isset($_GET["not3"])) {
                    if ($_GET["not3"] == "true") {
                        ?>
                        <script type="text/javascript" src="js/notificacion3.js"></script>
                        <?php
                    }
                }elseif (isset($_GET["not6"])) {
                    if ($_GET["not6"] == "true") {
                        ?>
                        <script type="text/javascript" src="js/notificacion6.js"></script>
                        <?php
                    }
                }
            ?>
</div>