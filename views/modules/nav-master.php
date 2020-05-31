<?php
    $categorias = MvcController::seleccionarCategoriaController(null, null);
    $marcas = MvcController::seleccionarMarcaController(null, null);
?>
<header class="header" id="header">
    <div class="encabezado">
        <div class="img-logo"><img src="ima/LogoEF2.png" alt="Logo EF"></div>
        <div class="logo">Electrónica Fonseca</div>
    </div>

    <nav class="navegacion" id="navegacion">
        <ul class="nav-ul">
        <?php
            if (isset($_GET["action"])) {
                    if ($_GET["action"] == "inicio") {
                ?>
                    <li id="nav-item1" title="Inicio" class="nav-items"><a class="module" href="index.php?action=inicio"><i class="fas fa-home a-module"></i>Inicio</a></li>
                <?php                    
                    }else{
                ?>
                    <li id="nav-item1" title="Inicio" class="nav-items"><a href="index.php?action=inicio"><i class="fas fa-home"></i>Inicio</a></li>
                <?php
                    }
                ?>

                <?php
                    if ($_GET["action"] == "productoInicio") {
                ?>
                    <li id="nav-item2" title="Productos" class="nav-items"><a class="module" href="index.php?action=productoInicio"><i class="fas fa-tags a-module"></i>Productos</a>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="index.php?action=productoRegistrar" title="Nuevo Producto"><i class="fas fa-plus-circle"></i>Nuevo Producto</a>
                            </li>
                        </ul>
                    </li>
                <?php
                    }else{
                ?>
                    <li id="nav-item2" title="Productos" class="nav-items"><a href="index.php?action=productoInicio"><i class="fas fa-tags"></i>Productos</a>
                        <ul class="nav-ul-li-ul">
                                <li class="nav-items">
                                    <a class="aCat" href="index.php?action=productoRegistrar" title="Nuevo Producto"><i class="fas fa-plus-circle"></i>Nuevo Producto</a>
                                </li>
                        </ul>
                    </li>
                <?php
                    }
                ?>

                <?php
                    if ($_GET["action"] == "categoria" || $_GET["action"] == "productoCategoria") {
                ?>
                    <li id="nav-item3" title="Categorías" class="nav-items"><a class="module" href="index.php?action=categoria"><i class="fas fa-cubes a-module"></i>Categorías</a>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="index.php?action=categoriaRegistrar" title="Nueva Categoría"><i class="fas fa-cube"></i>Nueva Categoría</a>
                            </li>
                            <?php
                                foreach ($categorias as $key => $value) {
                            ?>
                                <li title="" class="nav-items">
                                    <a class="aCat" href="index.php?action=productoCategoria&cat=<?=$value["idpro_categoria"]?>" title=""><?=$value["categoria"]?></a>
                                </li>
                            <?php
                                }
                            ?>
                                
                        </ul>
                    </li>
                <?php
                    }else{
                ?>
                    <li id="nav-item3" title="Categorías" class="nav-items"><a href="index.php?action=categoria"><i class="fas fa-cubes"></i>Categorías</a>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="index.php?action=categoriaRegistrar" title="Nueva Categoría"><i class="fas fa-cube"></i>Nueva Categoría</a>
                            </li>
                            <?php
                                foreach ($categorias as $key => $value) {
                            ?>
                                <li title="" class="nav-items">
                                    <a class="aCat" href="index.php?action=productoCategoria&cat=<?=$value["idpro_categoria"]?>" title=""><?=$value["categoria"]?></a>
                                </li>
                            <?php
                                }
                            ?>
                                
                        </ul>
                    </li>
                <?php
                    }
                ?>

                <?php
                    if ($_GET["action"] == "marca" || $_GET["action"] == "productoMarca") {
                ?>
                    <li id="nav-item4" title="Marcas" class="nav-items"><a class="module" href="index.php?action=marca"><i class="fas fa-copyright"></i>Marcas</a>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="index.php?action=marcaRegistrar" title="Nueva Marca"><i class="fas fa-copyright"></i>Nueva Marca</a>
                            </li> 
                            <?php
                                foreach ($marcas as $key => $value) {
                            ?>
                                <li class="nav-items">
                                    <a class="aCat" href="index.php?action=productoMarca&tm=<?=$value["idpro_marca"]?>"><?=$value["marca"]?></a>
                                </li>
                            <?php
                                }
                            ?>
                                
                        </ul>
                    </li>
                <?php
                    }else{
                ?>
                    <li id="nav-item4" title="Marcas" class="nav-items"><a href="index.php?action=marca"><i class="fas fa-copyright"></i>Marcas</a>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="index.php?action=marcaRegistrar" title="Nueva Marca"><i class="fas fa-copyright"></i>Nueva Marca</a>
                            </li> 
                            <?php
                                foreach ($marcas as $key => $value) {
                            ?>
                                <li class="nav-items">
                                    <a class="aCat" href="index.php?action=productoMarca&tm=<?=$value["idpro_marca"]?>"><?=$value["marca"]?></a>
                                </li>
                            <?php
                                }
                            ?>
                                
                        </ul>
                    </li>
                <?php
                    }
                ?>

                <?php
                    if ($_GET["action"] == "clientes") {
                ?>
                    <li id="nav-item5" title="Clientes" class="nav-items"><a class="module" href="index.php?action=clientes"><i class="fas fa-user-friends a-module"></i></i>Clientes</a>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="index.php?action=clienteRegistrar" title="Nuevo Cliente"><i class="fas fa-user-plus"></i>Nuevo Cliente</a>
                            </li>
                        </ul>
                    </li>
                <?php
                    }else{
                ?>
                    <li id="nav-item5" title="Clientes" class="nav-items"><a href="index.php?action=clientes"><i class="fas fa-user-friends"></i></i>Clientes</a>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="index.php?action=clienteRegistrar" title="Nuevo Cliente"><i class="fas fa-user-plus"></i>Nuevo Cliente</a>
                            </li>
                        </ul>
                    </li>
                <?php
                    }
                ?>

                <?php
                    if ($_GET["action"] == "proveedores") {
                ?>
                    <li id="nav-item6" title="Proveedores" class="nav-items"><a class="module" href="index.php?action=proveedores"><i class="fas fa-users a-module"></i>Proveedores</a>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="index.php?action=proveedorRegistrar" title="Nuevo Proveedor"><i class="fas fa-user-plus"></i>Nuevo Proveedor</a>
                            </li>
                        </ul>
                    </li>
                <?php
                    }else{
                ?>
                    <li id="nav-item6" title="Proveedores" class="nav-items"><a href="index.php?action=proveedores"><i class="fas fa-users"></i>Proveedores</a>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="index.php?action=proveedorRegistrar" title="Nuevo Proveedor"><i class="fas fa-user-plus"></i>Nuevo Proveedor</a>
                            </li>
                        </ul>
                    </li>
                <?php
                    }
                ?>

                <?php
                    if ($_GET["action"] == "compras") {
                ?>
                    <li id="nav-item7" title="Compra" class="nav-items"><a class="module" href="index.php?action=compras"><i class="fas fa-shopping-cart a-module"></i>Compra</a>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="index.php?action=productoCompra" title="Nueva Compra"><i class="fas fa-cart-plus"></i>Nueva Compra</a>
                            </li>
                        </ul>
                    </li>

                <?php
                    }else{
                ?>
                    <li id="nav-item7" title="Compra" class="nav-items"><a href="index.php?action=compras"><i class="fas fa-shopping-cart"></i>Compra</a>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="index.php?action=productoCompra" title="Nueva Compra"><i class="fas fa-cart-plus"></i>Nueva Compra</a>
                            </li>
                        </ul>
                    </li>

                <?php
                    }
                ?>

                <?php
                    if ($_GET["action"] == "ventas") {
                ?>
                    <li id="nav-item8" title="Venta" class="nav-items"><a class="module" href="index.php?action=ventas"><i class="fas fa-cash-register a-module"></i>Venta</a>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="index.php?action=ventaRegistrar" title="Nueva Venta"><i class="fab fa-shopify"></i>Nueva Venta</a>
                            </li>
                        </ul>
                    </li>
                <?php
                    }else{
                ?>
                    <li id="nav-item8" title="Venta" class="nav-items"><a href="index.php?action=ventas"><i class="fas fa-cash-register"></i>Venta</a>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="index.php?action=ventaRegistrar" title="Nueva Venta"><i class="fab fa-shopify"></i>Nueva Venta</a>
                            </li>
                        </ul>
                    </li>
                <?php
                    }
            }else{
            ?>
                <li id="nav-item1" title="Inicio" class="nav-items"><a class="module" href="index.php?action=inicio"><i class="fas fa-home a-module"></i>Inicio</a></li>
                <li id="nav-item2" title="Productos" class="nav-items"><a href="index.php?action=productoInicio"><i class="fas fa-tags"></i>Productos</a>
                    <ul class="nav-ul-li-ul">
                        <li class="nav-items">
                            <a class="aCat" href="index.php?action=productoRegistrar" title="Nuevo Producto"><i class="fas fa-plus-circle"></i>Nuevo Producto</a>
                        </li>
                    </ul>
                </li>
                <li id="nav-item3" title="Categorías" class="nav-items"><a href="index.php?action=categoria"><i class="fas fa-cubes"></i>Categorías</a>
                    <ul class="nav-ul-li-ul">
                        <li class="nav-items">
                            <a class="aCat" href="index.php?action=categoriaRegistrar" title="Nueva Categoría"><i class="fas fa-cube"></i>Nueva Categoría</a>
                        </li> 
                        <?php
                            foreach ($categorias as $key => $value) {
                        ?>
                            <li class="nav-items">
                                <a class="aCat" href="index.php?action=productoCategoria&cat=<?=$value["idpro_categoria"]?>"><?=$value["categoria"]?></a>
                            </li>
                        <?php
                            }
                        ?>
                             
                    </ul>
                </li>
                <li id="nav-item4" title="Marcas" class="nav-items"><a href="index.php?action=marca"><i class="fas fa-copyright"></i>Marcas</a>
                    <ul class="nav-ul-li-ul">
                        <li class="nav-items">
                            <a class="aCat" href="index.php?action=marcaRegistrar" title="Nueva Marca"><i class="fas fa-copyright"></i>Nueva Marca</a>
                        </li> 
                        <?php
                            foreach ($marcas as $key => $value) {
                        ?>
                            <li class="nav-items">
                                <a class="aCat" href="index.php?action=productoMarca&tm=<?=$value["idpro_marca"]?>"><?=$value["marca"]?></a>
                            </li>
                        <?php
                            }
                        ?>
                             
                    </ul>
                </li>
                <li id="nav-item5" title="Clientes" class="nav-items"><a href="index.php?action=clientes"><i class="fas fa-user-friends"></i></i>Clientes</a>
                    <ul class="nav-ul-li-ul">
                        <li class="nav-items">
                            <a class="aCat" href="index.php?action=clienteRegistrar" title="Nuevo Cliente"><i class="fas fa-user-plus"></i>Nuevo Cliente</a>
                        </li>
                    </ul>
                </li>
                <li id="nav-item6" title="Proveedores" class="nav-items"><a href="index.php?action=proveedores"><i class="fas fa-users"></i>Proveedores</a>
                    <ul class="nav-ul-li-ul">
                        <li class="nav-items">
                            <a class="aCat" href="index.php?action=proveedorRegistrar" title="Nuevo Proveedor"><i class="fas fa-user-plus"></i>Nuevo Proveedor</a>
                        </li>
                    </ul>
                </li>
                <li id="nav-item7" title="Compra" class="nav-items"><a href="index.php?action=compras"><i class="fas fa-shopping-cart"></i>Compra</a>
                    <ul class="nav-ul-li-ul">
                        <li class="nav-items">
                            <a class="aCat" href="index.php?action=productoCompra" title="Nueva Compra"><i class="fas fa-cart-plus"></i>Nueva Compra</a>
                        </li>
                    </ul>
                </li>
                <li id="nav-item8" title="Venta" class="nav-items"><a href="index.php?action=ventas"><i class="fas fa-cash-register"></i>Venta</a>
                    <ul class="nav-ul-li-ul">
                        <li class="nav-items">
                            <a class="aCat" href="index.php?action=ventaRegistrar" title="Nueva Venta"><i class="fab fa-shopify"></i>Nueva Venta</a>
                        </li>
                    </ul>
                </li>
            <?php
            }
        ?>
        </ul>
    </nav>

    <div class="adjust" id="adjust">
        <!-- Anterior versión => Botón de tema oscuro/claro
        <button class="button-adjust" title="claro/oscuro" id="button-adjust"><i class="fas fa-sun"></i></button> -->
        <?php
            if (isset($_SESSION["identity"])) {
                $nombreUsuario = $_SESSION["identity"];
            }
        ?>
        <span class="span-user-log">Bienvenido <?=$nombreUsuario?></span>
        <button class="button-adjust" id="button-adjust"><i class="fas fa-user"></i>
            <div class="panel-usuario" id="panel-usuario">
                <div class="mensaje">Bienvenido</div>
                <div class="line-user"></div>
                <a href="index.php?action=usuarios" class="pU-opciones">Usuarios</a>
                <a href="index.php?action=usuarioConfiguracion" class="pU-opciones">Configuración</a>
                <a href="index.php?action=usuarioSalir" class="pU-opciones">Cerrar Sesión</a>
            </div>
        </button>
    </div>
</header>