<?php
    $marcas = MvcController::seleccionarMarcaController(null, null);
?>

<div class="contenedor-formulario">
    <table class="tableCategorias">
        <tr>
            <caption class="thCategorias">Marcas</caption>
        </tr>
            <?php
                foreach ($marcas as $key => $value) {
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
                        <td><a href="index.php?action=productoMarca&tm=<?=$value["idpro_marca"]?>"><?=$value["marca"]?></a></td>
                        <?php
                            if ((isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
                                if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] == "master") {
                        ?>
                        <td>
                            <a class="editar" href="index.php?action=marcaEditar&tm=<?=$value["idpro_marca"]?>"><i class="fas fa-pen-square"></i>Editar</a>        
                            <!-- <form class="formEliminar" method="post">
                                <input class="inputEliminar" type="hidden" value="<?=$value["idpro_marca"]?>" name="removeTrademark">
                                <button class="inputEliminar" type="submit" value="<?=$value["idpro_marca"]?>"><i class="fas fa-minus-square"></i>Quitar</button>
                                <?php
                                    // $quitarMarca = new MvcController();
                                    // $quitarMarca -> quitarMarcaController();
                                ?>
                            </form> -->
                        </td>
                            <?php
                                }elseif ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] == "invite"){
                                    if (substr($_SESSION["low"], 0, 1) == 3) {
                                        ?>
                        <td>
                            <a class="editar" href="index.php?action=marcaEditar&tm=<?=$value["idpro_marca"]?>"><i class="fas fa-pen-square"></i>Editar</a>        
                            <!-- <form class="formEliminar" method="post">
                                <input class="inputEliminar" type="hidden" value="<?=$value["idpro_marca"]?>" name="removeTrademark">
                                <button class="inputEliminar" type="submit" value="<?=$value["idpro_marca"]?>"><i class="fas fa-minus-square"></i>Quitar</button>
                                <?php
                                    // $quitarMarca = new MvcController();
                                    // $quitarMarca -> quitarMarcaController();
                                ?>
                            </form> -->
                        </td>
                                      <?php
                                    }elseif (substr($_SESSION["low"], 0, 1) <= 2) {
                                        ?>
                                      <?php
                                    }
                                }
                            }
                        ?>
                    </tr>
                <?php
                }

                if (isset($_GET["not2"])) {
                    if ($_GET["not2"] == "true") {
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
                }
                if (isset($_GET["err"])) {
                    if ($_GET["err"] == "em") {
                        ?>
                        <script type="text/javascript" src="js/invalidRegister.js"></script>
                        <?php
                    }
                }
            ?>
    </table>
</div>  