<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] == "master") {
            ?>
            <?php
        }
    }

    $clientes = MvcController::seleccionarUsuariosController("cli");
?>

<div class="contenedor-formulario">
    <table class="tableCategorias">
        <tr>
            <caption class="thCategorias">Clientes</caption>
        </tr>
        <tr>
            <th><span class="thSub">Nombre</span></th>
            <th><span class="thSub">Correo</span></th>
            <th><span class="thSub">Teléfono</span></th>
            <th><span class="thSub">Domicilio</span></th>
            <th><span class="thSub">Acción</span></th>
        </tr>
            <?php
                foreach ($clientes as $key => $value) {
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
                            $tel = MvcController::clientePhoneController($value["iduser"], "cli");
                            $dom = MvcController::clienteDomicilioController($value["iduser"], "cli");
                            $email = MvcController::clienteCorreoController($value["iduser"], "cli");
                            $telefono = "";
                            $domicilio = "";
                            $correo = "";
                            $numCasa;

                            if ($email == null) {
                                $correo = "Sin correo";
                                ?>
                        <td>
                            <div class="content-msg-a">
                                <span class="d-p-price"><?=$correo?></span>
                                <a class="a-span-bottom" href="index.php?action=cliente&cliD=<?=$value["iduser"]?>">Agregar</a>
                            </div>
                        </td>
                                <?php
                            }else {
                                $correo = $email["correo"];
                                ?>
                        <td><span class="d-p-price"><?=$correo?></span></td>
                                <?php
                            }

                            if ($tel == null) {
                                $telefono = "Sin número";
                                ?>
                        <td><span class="d-p-price"><?=$telefono?></span></td>
                                <?php
                            }else {
                                $telefono = $tel["numero"];
                                ?>
                        <td><span class="d-p-price"><?=$telefono?></span></td>
                                <?php
                            }
                            
                            if ($dom == null) {
                                $domicilio = "Sin domicilio";
                                ?>
                        <td><span class="d-p-price"><?=$domicilio?></span></td>
                                <?php
                            }else {
                                if ($dom["num_casa"] == 0) {
                                    $numCasa = $dom["num_casa"];
                                }else {
                                    $numCasa = $dom["num_casa"];
                                }
                                $domicilio = $dom["colonia"].", ".$dom["calle"].", ".$dom["num_casa"];
                                ?>
                        <td><span class="d-p-price"><?=$domicilio?></span></td>
                                <?php
                            }
                            
                        ?>

                        <td>
                            <a class="ver-det" href="index.php?action=cliente&cliD=<?=$value["iduser"]?>">Detalles</a>
                            <a class="editar" href="index.php?action=clienteEditar&cliD=<?=$value["iduser"]?>"><i class="fas fa-pen-square"></i>Editar</a>        
                            <!-- <form class="formEliminarT" method="post" name="eliminarCompra">
                                <input class="inputEliminar" type="hidden" value="" name="removeBuy">
                                <button class="btn-remove" type="submit" value=""><i class="fas fa-times-circle"></i>Quitar</button>
                                <?php
                                    // $quitarCompra = new MvcController();
                                    // $quitarCompra -> quitarCompraController();
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