<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && 
        ($_SESSION["access"] != "master" && $_SESSION["access"] != "invite")) {
            echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
        }
    }

    $modo = "lista";
    $productos = MvcController::seleccionarProductoController(null, null, $modo);
?>
<div class="contenedor-formulario">
    <table>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Acción</th>
        </tr>
        <?php
            foreach ($productos as $key => $value) {
            ?>
            <tr>
                <td><?=$value["nombre"]?></td>
                <td class="precio">$<?=$value["precioventa"]?></td>
                <td>
                    <a class="editar" title="Editar" href="index.php?action=productoEditar&idproducto=<?php echo $value["idproducto"];?>"><i class="fas fa-pen-square"></i></a>
                    <form class="formEliminar" method="post">
                        <input class="inputEliminar" type="hidden" value="<?=$value["idproducto"]?>" name="dropProduct">
                        <div class="divEliminar">    
                            <button class="inputEliminar" type="submit" title="Eliminar" value=""><i class="fas fa-minus-square"></i></button>
                        </div>
                        
                        <?php
                            $eliminar = new MvcController();
                            $eliminar -> eliminarProductoController();
                        ?>
                    </form>
                </td>
            </tr>
            <?php
            }
        ?>
    </table>
</div>