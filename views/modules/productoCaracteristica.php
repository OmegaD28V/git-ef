<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && 
        ($_SESSION["access"] != "master" && $_SESSION["access"] != "invite")) {
            echo '<script>window.location = "usuarioInicioSession";</script>';
        }
    }

    if (isset($_GET["pFts"])) {
        $pro = $_GET["pFts"];

        $producto = MvcController::productoController($pro);
        $caracteristicas = MvcController::seleccionarCaracteristicasController($pro, null);
    }
?>

<div class="contenedor-formulario">
    <div class="multi-form">
        <h2>Características de Producto</h2>
        <div class="input-group">
            <span><?=$producto["nombre"]?></span>
        </div>

        <div class="line-form"></div>

        <div class="form-group">
            <table class="tableEntradas">
                    <tr>
                        <caption class="thCategorias">Características</caption>
                    </tr>
                    <tr class="d-g">
                        <th class="thSub">#</th>
                        <th class="thSub">Característica</th>
                        <th class="thSub">Editar</th>
                        <th class="thSub">Quitar</th>
                    </tr>
                    <?php
                    foreach ($caracteristicas as $key => $value) {
                        if ($value == null) {
                        }else {
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
                        <td><span class="d-p-price"><?=$key + 1?></span></td>
                        <td><span class="d-p-price"><?=$value["caracteristica"]?></span></td>
                        <td>
                            <a class="edit-square" href="index.php?action=productoCEditar&uPFts=<?=$value["idpro_caracteristica"]?>&pFts=<?=$producto["idpro"]?>"><i class="fas fa-pen-square"></i></a>
                        </td>
                        <td>
                            <form class="formEliminar" method="post" name="eliminaEntrada">
                                <input class="inputEliminar" type="hidden" value="<?=$value["idpro_caracteristica"]?>" name="removeFeature">
                                <input class="inputEliminar" type="hidden" value="<?=$producto["idpro"]?>" name="pro">
                                <button class="inputEliminar" type="submit" value=""><i class="fas fa-times-circle"></i></button>
                                <?php
                                    $quitarEntrada = new MvcController();
                                    $quitarEntrada -> quitarCaracteristicaController();
                                ?>
                            </form>
                        </td>
                    </tr>
                        <?php
                        }
                    }
                    ?>
            </table>
        </div>

        <div class="line-form"></div>
        
        <form class="form-group" name="editarProducto" method="post">
            <div class="input-group">
                <input type="hidden" value="<?=$producto["idpro"]?>" name="idpro">
                <label for="featureProduct">Característica</label>
                <textarea id="featureProduct" name="featureProduct" cols="50" rows="5" required></textarea>
            </div>

            <div class="input-group">
                <input type="submit" class="btnRegistrarProducto" name="btnRegistrarProducto" value="Agregar Característica">
            </div>
            <?php
                $regCaracteristica = MvcController::regCaracteristicaController();
                if (isset($_GET["not0"])) {
                    if ($_GET["not0"] == "true") {
                        ?>
                        <script type="text/javascript" src="js/notificacion0.js"></script>
                        <?php
                    }
                }
                if (isset($_GET["not2"])) {
                    if ($_GET["not2"] == "true") {
                        ?>
                        <script type="text/javascript" src="js/notificacion2.js"></script>
                        <?php
                    }
                }
                if (isset($_GET["not3"])) {
                    if ($_GET["not3"] == "true") {
                        ?>
                        <script type="text/javascript" src="js/notificacion3.js"></script>
                        <?php
                    }
                }
            ?>
        </form>
    </div>
</div>