<?php
    if (isset($_GET["tm"])) {
        $item = "idpro_marca";
        $valor = $_GET["tm"];
        $modo = "fichas";

        $productoMarca = MvcController::seleccionarProductoMarcaController($item, $valor, $modo);
    }
?>
<div class="contenedor-formulario">
    <?php
        if ($productoMarca == null) {
            ?>
    <div><span class="info-nodata">Aún no hay datos aquí</span></div>
    <div><a class="extra-button-small" href="index.php?action=inicio">Volver al Inicio</a></div>
            <?php
        }else{
            ?>
    <div class="gridFichas">
        <?php
        foreach ($productoMarca as $key => $value) {
        ?>
        <div>
            <a style="text-decoration: none; color: currentcolor" href="index.php?action=producto&idpro=<?=$value["idpro"]?>">
                <div class="fichas">
                    <div class="imagen">
                        <?php
                            $imagenFicha = MvcController::fichaImagenController($value["idpro"]);
                            if ($imagenFicha == null) {
                                ?>
                            <div class="no-image-card"><span>Producto sin imagen</span></div>
                            <!-- <img class="i-p-img" src="ima/a3.jpg" alt="a" width="240" height="300"> -->
                                <?php
                            }else {
                                ?>
                            <img class="i-p-img" src="<?=$imagenFicha["ruta"]?>" alt="img" loading="lazy" width="240" height="300">
                                <?php                    
                            }
                        ?>
                    </div>
                    <div class="info">
                        <span class="ficha-name-pro"><?=$value["nombre"]?></span>
                        <div>
                            <span class="ficha-price-pro">$<?=$value["precio"]?></span>
                            <span class="ficha-price-pro"><?='Stock: '.$value["existencia"]?></span>
                        </div>
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
                                <li class="pro-items"><a href="index.php?action=productoImagenes&pPic=<?=$value["idpro"]?>">Agregar Imágenes</a></li>
                                <li class="pro-items"><a href="index.php?action=productoCaracteristica&pFts=<?=$value["idpro"]?>">Agregar caracteristicas</a></li>
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
                                }else {
                                    ?>
                        <a class="ver-mas" href="index.php?action=producto&idpro=<?=$value["idpro"]?>">Ver más</a>
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
            </a>
        </div>
        <?php
        }
        ?>
    </div>    
            <?php
        }
    ?>
</div>