<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] != "master") {
            echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
        }
    }

    $proveedores = MvcController::seleccionarUsuariosController("prov");
?>

<div class="contenedor-formulario">
    <table class="tableCategorias">
        <tr>
            <caption class="thCategorias">Proveedores</caption>
        </tr>
        <tr>
            <th><span class="thSub">Nombre</span></th>
            <th><span class="thSub">Correo</span></th>
            <th><span class="thSub">Teléfono</span></th>
            <th><span class="thSub">Domicilio</span></th>
            <th><span class="thSub">Acción</span></th>
        </tr>
            <?php
                foreach ($proveedores as $key => $value) {
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
                            $tel = MvcController::clientePhonesController($value["iduser"], "prov");
                            $dom = MvcController::clienteDomiciliosController($value["iduser"], "prov");
                            $email = MvcController::clienteCorreosController($value["iduser"], "prov");
                            $telefono = "";
                            $domicilio = "";
                            $correo = "";
                            $numCasa = "";
                                ?>
                        <td>
                                <?php
                            if ($email == null) {
                                $correo = "Sin correo";
                                ?>
                            <div class="content-msg-a">
                                <span class="d-p-price"><?=$correo?></span>
                                <a class="a-span-bottom" href="index.php?action=uProveedorCorreo&provD=<?=$value["iduser"]?>">Agregar</a>
                            </div>
                            <?php
                            }else {
                                foreach ($email as $key => $value) {
                                    $correo = $value["correo"];
                                    ?>
                            <span class="d-p-price"><?=$correo?></span>
                                    <?php
                                }
                            }
                                ?>
                        </td>
                        <td>
                                <?php  
                            if ($tel == null) {
                                $telefono = "Sin teléfono";
                                ?>
                            <div class="content-msg-a">
                                <span class="d-p-price"><?=$telefono?></span>
                                <a class="a-span-bottom" href="index.php?action=uProveedorPhone&provD=<?=$value["iduser"]?>">Agregar</a>
                            </div>
                            <?php
                            }else {
                                foreach ($tel as $key => $value) {
                                    $telefono = $value["numero"];
                                    ?>
                            <span class="d-p-price"><?=$telefono?></span>
                                    <?php
                                }
                            }
                                ?>
                        </td>
                        <td>
                                <?php
                            if ($dom == null) {
                                $domicilio = "Sin domicilio";
                                ?>
                            <div class="content-msg-a">
                                <span class="d-p-price"><?=$domicilio?></span>
                                <a class="a-span-bottom" href="index.php?action=uProveedorAddress&provD=<?=$value["iduser"]?>">Agregar</a>
                            </div>
                            <?php
                            }else {
                                foreach ($dom as $key => $value) {
                                    if ($value["num_casa"] == 0) {
                                        $numCasa = "S/N";
                                    }else {
                                        $numCasa = $value["num_casa"];
                                    }
                                    $domicilio = $value["colonia"].", ".$value["calle"].", ".$numCasa;
                                    ?>
                                <span class="d-p-price"><?=$domicilio?></span>
                                    <?php
                                }   
                            }
                                ?>
                        </td>

                        <td>
                            <a class="ver-det" href="index.php?action=uProveedor&provD=<?=$value["iduser"]?>">Detalles</a>
                            <?php
                                if ($tel == null || $dom == null || $email == null) {
                                        
                                }else{
                                   ?>
                            <a class="editar" href="index.php?action=uProveedorEditar&provD=<?=$value["iduser"]?>"><i class="fas fa-pen-square"></i>Editar</a>        
                                   <?php 
                                }
                            ?>
                            <!-- <form class="formEliminarT" method="post" name="eliminarUsuario">
                                <input class="inputEliminar" type="hidden" value="" name="removeUser">
                                <button class="btn-remove" type="submit"><i class="fas fa-times-circle"></i>Quitar</button>
                                <?php
                                    // $quitarUsuario = new MvcController();
                                    // $quitarUsuario -> quitarUsuarioController(2);
                                ?>
                            </form> -->
                        </td>
                    </tr>
                <?php
                }

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
    </table>
</div>  