<?php
    $productos = MvcController::seleccionarProductoController(null, null);
?>
<div class="contenedor-formulario">
    <div class="gridFichas">
    <?php
        foreach ($productos as $key => $value) {
    ?>
        <div class="fichas">
            <div class="imagen">
                <label class="img" for="imagen">Imagen</label>
            </div>
            <div class="info">
                <label class="nombreProducto" for="nombreProducto"><?=$value["nombre"]?></label>
                <label class="precioProducto" for="precioProducto">$<?=$value["precioventa"]?></label>
                <div class="acciones">
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
                </div>
            </div>
        </div>
    <?php
        }
    ?>
    </div>    
</div>