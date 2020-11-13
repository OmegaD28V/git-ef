<?php
    // if (!isset($_SESSION["ingresoVerificado"])) {
    //     echo '<script>window.location = "usuarioInicioSession";</script>';
    //     return;
    // }else {
    //     if ($_SESSION["ingresoVerificado"] != "ok") {
    //         echo '<script>window.location = "usuarioInicioSession";</script>';
    //         return;
    //     }
    // }
    $categorias = MvcController::seleccionarCategoriaController(null, null);
?>

<div class="contenedor-formulario">
    <table class="tableCategorias">
        <tr>
            <caption class="thCategorias">Categorías</caption>
        </tr>
            <?php
                foreach ($categorias as $key => $value) {
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
                        <td><a class="cell" href="index.php?action=productoCategoria&cat=<?=$value["idpro_categoria"]?>"><?=$value["categoria"]?></a></td>
                        <?php
                            if ((isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
                                if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] == "master") {
                        ?>
                        <td>
                            <a class="editar" href="index.php?action=categoriaEditar&cat=<?=$value["idpro_categoria"]?>"><i class="fas fa-pen-square"></i>Editar</a>        
                            <!-- <form class="formEliminarT" method="post">
                                <input type="hidden" value="<?=$value["idpro_categoria"]?>" name="removeCategory">
                                <button class="btn-remove" type="submit" value="<?=$value["idpro_categoria"]?>"><i class="fas fa-minus-square"></i>Quitar</button>
                                <?php
                                    // $quitarCategoria = new MvcController();
                                    // $quitarCategoria -> quitarCategoriaController();
                                ?>
                            </form> -->
                        </td>
                            <?php
                                }elseif ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] == "invite"){
                                    if (substr($_SESSION["low"], 0, 1) == 3) {
                                        ?>
                        <td>
                            <a class="editar" href="index.php?action=categoriaEditar&cat=<?=$value["idpro_categoria"]?>"><i class="fas fa-pen-square"></i>Editar</a>        
                            <!-- <form class="formEliminarT" method="post">
                                <input type="hidden" value="<?=$value["idpro_categoria"]?>" name="removeCategory">
                                <button class="btn-remove" type="submit" value="<?=$value["idpro_categoria"]?>"><i class="fas fa-minus-square"></i>Quitar</button>
                                <?php
                                    // $quitarCategoria = new MvcController();
                                    // $quitarCategoria -> quitarCategoriaController();
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

                if (isset($_GET["not3"])) {
                    if ($_GET["not3"] == "true") {
                        ?>
                        <script type="text/javascript" src="js/notificacion3.js"></script>
                        <?php
                    }
                }elseif (isset($_GET["not2"])) {
                    if ($_GET["not2"] == "true") {
                        ?>
                        <script type="text/javascript" src="js/notificacion2.js"></script>
                        <?php
                    }
                }
                if (isset($_GET["err"])) {
                    if ($_GET["err"] == "ec") {
                        ?>
                        <script type="text/javascript" src="js/invalidRegister.js"></script>
                        <?php
                    }
                }
            ?>
    </table>
</div>  