<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && 
        ($_SESSION["access"] != "master" && $_SESSION["access"] != "invite")) {
            echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
        }
    }

    if (isset($_GET["pag"])) {
        $noClientes = MvcController::contarUsuariosController("cli");
        $clientes = 5;
        $paginas = ceil($noClientes["total"] / $clientes);
        $inicio = ($_GET["pag"] - 1) * $clientes;
        $clientes = MvcController::seleccionarUsuariosController("cli", $inicio, $clientes);
        if ($_GET["pag"] < 1 || $_GET["pag"] > $paginas) {
            echo '<script>window.location = "index.php?action=uClientes&pag=1"</script>';
        }
    }else{
        echo '<script>window.location = "index.php?action=uClientes&pag=1"</script>';
    }

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
                            $tel = MvcController::clientePhonesController($value["iduser"], "cli");
                            $dom = MvcController::clienteDomiciliosController($value["iduser"], "cli");
                            $email = MvcController::clienteCorreosController($value["iduser"], "cli");
                            $telefono = "";
                            $domicilio = "";
                            $correo = "";
                            $numCasa = "";
                                ?>
                        <td>
                                <?php
                            if ($email == null) {
                                $correo = "Sin correo";
                                if(substr($_SESSION["low"], 2, 1) >= 3){
                                    ?>

                                    <div class="content-msg-a">
                                        <span class="d-p-price"><?=$correo?></span>
                                        <a class="a-span-bottom" href="index.php?action=uClienteCorreo&cliD=<?=$value["iduser"]?>">Agregar</a>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="content-msg-a">
                                        <span class="d-p-price"><?=$correo?></span>
                                    </div>
                                    <?php
                                }
                                ?>
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
                                if(substr($_SESSION["low"], 2, 1) >= 3){
                                    ?>

                                    <div class="content-msg-a">
                                        <span class="d-p-price"><?=$telefono?></span>
                                        <a class="a-span-bottom" href="index.php?action=uClientePhone&cliD=<?=$value["iduser"]?>">Agregar</a>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="content-msg-a">
                                        <span class="d-p-price"><?=$telefono?></span>
                                    </div>
                                    <?php
                                }
                                ?>
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
                                if(substr($_SESSION["low"], 2, 1) >= 3){
                                    ?>

                                    <div class="content-msg-a">
                                        <span class="d-p-price"><?=$domicilio?></span>
                                        <a class="a-span-bottom" href="index.php?action=uClienteAddress&cliD=<?=$value["iduser"]?>">Agregar</a>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="content-msg-a">
                                        <span class="d-p-price"><?=$domicilio?></span>
                                    </div>
                                    <?php
                                }
                                ?>
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
                        <?php
                            if (substr($_SESSION["low"], 2, 1) >= 3) {
                                ?>
                            <a class="ver-det" href="index.php?action=uCliente&cliD=<?=$value["iduser"]?>">Detalles</a>
                            <?php
                                if ($tel == null || $dom == null || $email == null) {
                                    
                                }else{
                                    ?>
                            <a class="editar" href="index.php?action=uClienteEditar&cliD=<?=$value["iduser"]?>"><i class="fas fa-pen-square"></i>Editar</a>        
                                    <?php
                                }
                            ?>
                                <?php
                            }elseif (substr($_SESSION["low"], 2, 1) == 2 || substr($_SESSION["low"], 2, 1) == 1) {
                                ?>
                            <a class="ver-det" href="index.php?action=uCliente&cliD=<?=$value["iduser"]?>">Detalles</a>
                                <?php
                            }elseif (substr($_SESSION["low"], 2, 1) == 0) {
                                ?>
                            <span>Ninguna</span>
                                <?php
                            }
                        ?>
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

    <div class="pnt">
        <a class="pnt__previous <?=$_GET["pag"] <= 1 ? 'disabled' : '' ?>" id="prev" href="index.php?action=uClientes&pag=<?=$_GET["pag"]-1?>">< Anterior</a>

        <?php for($i = 1; $i <= $paginas; $i++):?>
            <a class="pnt__pag <?=$_GET["pag"] == $i ? 'active' : '' ?>" href="index.php?action=uClientes&pag=<?=$i?>"><?=$i?></a>
        <?php endfor ?>
        
        <a class="pnt__next <?=$_GET["pag"] >= $paginas ? 'disabled' : '' ?>" id="next" href="index.php?action=uClientes&pag=<?=$_GET["pag"]+1?>">Siguiente ></a>
    </div>

</div>  