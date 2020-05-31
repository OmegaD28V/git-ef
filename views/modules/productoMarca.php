<?php
    if (isset($_GET["tm"])) {
        $item = "idpro_marca";
        $valor = $_GET["tm"];
        $modo = "fichas";

        $productoMarca = MvcController::seleccionarProductoMarcaController($item, $valor, $modo);
    }

    if ((isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] == "master") {
            ?>
<a href="index.php?action=productoSinStock">Ver productos sin existencia</a><br>
<a href="index.php?action=productoDeshabilitado">Ver productos deshabilitados</a>
            <?php
        }
    }
?>
<div class="contenedor-formulario">
    <div class="gridFichas">
    <?php
        foreach ($productoMarca as $key => $value) {
    ?>
        <div class="fichas">
            <div class="imagen">
                <img class="img" src="ima/a3.jpg" alt="a" width="240" height="300">
            </div>
            <div class="info">
                <span class="ficha-name-pro"><?=$value["nombre"]?></span>
                <span class="ficha-price-pro">$<?=$value["precio"]?></span>
                <span class="ficha-detail-pro"><?=$value["descripcion"]?></span>
                <div class="acciones">
                <?php
                    if ((isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
                        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] == "master") {
                ?>
                <a class="ver-mas" href="index.php?action=producto&idpro=<?=$value["idpro"]?>">Ver más</a>
                <div class="pro">Más acciones
                    <ul class="pro-ul">
                        <li class="pro-items"><a href="index.php?action=productoCompra">Comprar más unidades</a></li>
                        <li class="pro-items"><a href="index.php?action=productoImagen&pPic<?=$value["idpro"]?>">Agregar Imágenes</a></li>
                        <li class="pro-items"><a href="index.php?action=productoCaracteristica&pFts<?=$value["idpro"]?>">Agregar caracteristicas</a></li>
                    </ul>
                </div>
                <a class="editar" href="index.php?action=productoEditar&idpro=<?=$value["idpro"]?>"><i class="fas fa-pen-square"></i>Editar</a>        
                <form class="formEliminar" method="post">
                    <input class="inputEliminar" type="hidden" value="<?=$value["idpro"]?>" name="removeProduct">
                    <button class="inputEliminar" type="submit" value=""><i class="fas fa-minus-square"></i>Quitar</button>                    
                    <?php
                        $quitarProducto = new MvcController();
                        $quitarProducto -> eliminarProductoController();
                    ?>
                </form>
                    <?php
                        }
                    }else {
                        ?>
                <a class="ver-mas" href="index.php?action=producto&idpro=<?=$value["idpro"]?>">Ver más</a>
                        <?php
                    }
                ?>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
    </div>    
</div>