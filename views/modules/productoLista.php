<?php
    $productos = MvcController::seleccionarProductoController(null, null);
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
                    <a class="editar" title="Editar" href="index.php?action=productoEditar&idproducto=<?php echo $value["idproducto"];?>"><i class="fas fa-pen"></i></a>
                    <form class="formEliminar" method="post">
                        <input class="inputEliminar" type="hidden" value="<?=$value["idproducto"]?>" name="dropProduct">
                        <div class="divEliminar">    
                            <button class="inputEliminar" type="submit" title="Eliminar" value=""><i class="fas fa-trash"></i></button>
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