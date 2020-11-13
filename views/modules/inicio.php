<?php
    $noProductos = MvcController::contarProductosController();
    $articulos = 12;
    if($noProductos["total"] <= $articulos){
        $p = MvcController::seleccionarProductoController(null, null, "fichas");
    }else{
        if (!isset($_GET["pag"])) {
            echo '<script>window.location = "index.php?action=inicio&pag=1"</script>';
        }else{
            $paginas = ceil($noProductos["total"] / $articulos);
            $inicio = ($_GET["pag"] - 1) * $articulos;
            // $productos = MvcController::seleccionarProductoController(null, null, "fichas");
            $p = MvcController::selProPagController($inicio, $articulos);
            if ($_GET["pag"] < 1 || $_GET["pag"] > $paginas) {
                echo '<script>window.location = "index.php?action=inicio&pag=1"</script>';
            }
        }
    }

    if ((isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] == "master") {
            ?>
            <?php
        }
    }
?>
<div class="contenedor-formulario">
    <!-- <div>
        <label for="s-item-p-pag">Productos por página</label>
        <select name="s-items-p-pag" id="s-items-p-pag">
            <option value=""></option>
        </select>
    </div> -->
    <div class="gridFichas">
        <?php
            foreach ($p as $key => $value) {
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
                                <img class="i-p-img" src="<?=$imagenFicha["ruta"]?>" alt="img" loading="lazy" >
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
                                    <li class="pro-items"><a href="compraRegistrar">Comprar más unidades</a></li>
                                    <li class="pro-items"><a href="index.php?action=productoImagenes&pPic=<?=$value["idpro"]?>">Imágenes</a></li>
                                    <li class="pro-items"><a href="index.php?action=productoCaracteristica&pFts=<?=$value["idpro"]?>">Características</a></li>
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
                                    }elseif($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] == "invite"){
                                        if (substr($_SESSION["low"], 0, 1) == 3) {
                                            ?>
                            <a class="ver-mas" href="index.php?action=producto&idpro=<?=$value["idpro"]?>">Ver más</a>
                            <div class="pro">Más acciones
                                <ul class="pro-ul">
                                    <li class="pro-items"><a href="compraRegistrar">Comprar más unidades</a></li>
                                    <li class="pro-items"><a href="index.php?action=productoImagenes&pPic=<?=$value["idpro"]?>">Imágenes</a></li>
                                    <li class="pro-items"><a href="index.php?action=productoCaracteristica&pFts=<?=$value["idpro"]?>">Características</a></li>
                                </ul>
                            </div>
                            <a class="editar" href="index.php?action=productoEditar&idpro=<?=$value["idpro"]?>"><i class="fas fa-pen-square"></i>Editar</a>        
                                            <?php
                                        }elseif (substr($_SESSION["low"], 0, 1) == 2) {
                                            ?>
                            <a class="ver-mas" href="index.php?action=producto&idpro=<?=$value["idpro"]?>">Ver más</a>
                            <div class="pro">Más acciones
                                <ul class="pro-ul">
                                    <li class="pro-items"><a href="compraRegistrar">Comprar más unidades</a></li>
                                    <li class="pro-items"><a href="index.php?action=productoImagenes&pPic=<?=$value["idpro"]?>">Imágenes</a></li>
                                    <li class="pro-items"><a href="index.php?action=productoCaracteristica&pFts=<?=$value["idpro"]?>">Características</a></li>
                                </ul>
                            </div>
                                            <?php
                                        }elseif (substr($_SESSION["low"], 0, 1) == 1) {
                                            ?>
                            <a class="ver-mas" href="index.php?action=producto&idpro=<?=$value["idpro"]?>">Ver más</a>
                                            <?php
                                        }
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

    <?php if($noProductos["total"] <= $articulos){}else{ ?>
        <div class="pnt">
            <a class="pnt__previous <?=$_GET["pag"] <= 1 ? 'disabled' : '' ?>" id="prev" href="index.php?action=inicio&pag=<?=$_GET["pag"]-1?>">< Anterior</a>

            <?php for($i = 1; $i <= $paginas; $i++):?>
                <a class="pnt__pag <?=$_GET["pag"] == $i ? 'active' : '' ?>" href="index.php?action=inicio&pag=<?=$i?>"><?=$i?></a>
            <?php endfor ?>
            
            <a class="pnt__next <?=$_GET["pag"] >= $paginas ? 'disabled' : '' ?>" id="next" href="index.php?action=inicio&pag=<?=$_GET["pag"]+1?>">Siguiente ></a>
        </div>
    <?php } ?>


    <?php
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
    ?>
</div>