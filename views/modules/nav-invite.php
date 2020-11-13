<?php
    $categorias = MvcController::seleccionarCategoriaController(null, null);
    $marcas = MvcController::seleccionarMarcaController(null, null);
?>
<header class="header" id="header">
    <div class="encabezado">
        <div class="img-logo"><img src="ima/LogoEF2.png" alt="Logo EF"></div>
        <div class="logo">Electrónica Fonseca</div>
        <div class="search" id="div-search">
            <input class="search__form__input" type="text" name="search" id="search" placeholder="Busca productos, marcas, etc." required>
            <button type="submit" class="search__form__button" id="btn-search"><i id="icon-search" class="fas fa-search"></i></button>
            <div id="buscando"></div>
        </div>
    </div>

    <nav class="navegacion" id="navegacion">
        <ul class="nav-ul">
        <?php
            if (isset($_GET["action"])) {
                    if ($_GET["action"] == "inicio") {
                ?>
                    <li id="nav-item1" title="Inicio" class="nav-items"><a class="module" href="inicio"><i class="fas fa-home a-module"></i>Inicio</a></li>
                <?php                    
                    }else{
                ?>
                    <li id="nav-item1" title="Inicio" class="nav-items"><a href="inicio"><i class="fas fa-home"></i>Inicio</a></li>
                <?php
                    }
                ?>

                <?php
                    if ($_GET["action"] == "productoInicio") {
                ?>
                    <li id="nav-item2" title="Productos" class="nav-items"><a class="module" href="productoInicio"><i class="fas fa-tags a-module"></i>Productos</a>
                        <ul class="nav-ul-li-ul">
                            <?php
                            if (substr($_SESSION["low"], 0, 1) >= 2) {
                                ?>
                    <li class="nav-items">
                        <a class="aCat" href="productoRegistrar" title="Nuevo Producto"><i class="fas fa-plus-circle"></i>Nuevo Producto</a>
                    </li>
                    <li class="nav-items"><a href="productoSinStock"><i class="fab fa-creative-commons-zero"></i>Ver productos sin existencia</a></li>
                    <li class="nav-items"><a href="productoDeshabilitado"><i class="fas fa-recycle"></i>Ver productos deshabilitados</a></li>
                                <?php
                            }elseif (substr($_SESSION["low"], 0, 1) == 1) {
                                ?>
                    <li class="nav-items"><a href="productoSinStock"><i class="fab fa-creative-commons-zero"></i>Ver productos sin existencia</a></li>
                    <li class="nav-items"><a href="productoDeshabilitado"><i class="fas fa-recycle"></i>Ver productos deshabilitados</a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                <?php
                    }else{
                ?>
                    <li id="nav-item2" title="Productos" class="nav-items"><a href="productoInicio"><i class="fas fa-tags"></i>Productos</a>
                        <ul class="nav-ul-li-ul">
                            <?php
                            if (substr($_SESSION["low"], 0, 1) >= 2) {
                                ?>
                    <li class="nav-items">
                        <a class="aCat" href="productoRegistrar" title="Nuevo Producto"><i class="fas fa-plus-circle"></i>Nuevo Producto</a>
                    </li>
                    <li class="nav-items"><a href="productoSinStock"><i class="fab fa-creative-commons-zero"></i>Ver productos sin existencia</a></li>
                    <li class="nav-items"><a href="productoDeshabilitado"><i class="fas fa-recycle"></i>Ver productos deshabilitados</a></li>
                                <?php
                            }elseif (substr($_SESSION["low"], 0, 1) == 1) {
                                ?>
                    <li class="nav-items"><a href="productoSinStock"><i class="fab fa-creative-commons-zero"></i>Ver productos sin existencia</a></li>
                    <li class="nav-items"><a href="productoDeshabilitado"><i class="fas fa-recycle"></i>Ver productos deshabilitados</a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                <?php
                    }
                ?>

                <?php
                    if ($_GET["action"] == "categoria" || $_GET["action"] == "productoCategoria") {
                ?>
                    <li id="nav-item3" title="Categorías" class="nav-items"><a class="module" href="categoria"><i class="fas fa-cubes a-module"></i>Categorías</a>
                        <ul class="nav-ul-li-ul">
                            <?php
                            if (substr($_SESSION["low"], 0, 1) >= 2) {
                                ?>
                    <li class="nav-items">
                        <a class="aCat" href="categoriaRegistrar" title="Nueva Categoría"><i class="fas fa-cube"></i>Nueva Categoría</a>
                    </li>
                                <?php
                            }elseif (substr($_SESSION["low"], 0, 1) == 1) {
                            }
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
                    <li id="nav-item3" title="Categorías" class="nav-items"><a href="categoria"><i class="fas fa-cubes"></i>Categorías</a>
                        <ul class="nav-ul-li-ul">
                            <?php
                            if (substr($_SESSION["low"], 0, 1) >= 2) {
                                ?>
                    <li class="nav-items">
                        <a class="aCat" href="categoriaRegistrar" title="Nueva Categoría"><i class="fas fa-cube"></i>Nueva Categoría</a>
                    </li>
                                <?php
                            }elseif (substr($_SESSION["low"], 0, 1) == 1) {
                            }
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
                    <li id="nav-item4" title="Marcas" class="nav-items"><a class="module" href="marca"><i class="fas fa-copyright"></i>Marcas</a>
                        <ul class="nav-ul-li-ul">
                            <?php
                            if (substr($_SESSION["low"], 0, 1) >= 2) {
                                ?>
                    <li class="nav-items">
                        <a class="aCat" href="marcaRegistrar" title="Nueva Marca"><i class="fas fa-copyright"></i>Nueva Marca</a>
                    </li> 
                                <?php
                            }elseif (substr($_SESSION["low"], 0, 1) == 1) {
                            }
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
                    <li id="nav-item4" title="Marcas" class="nav-items"><a href="marca"><i class="fas fa-copyright"></i>Marcas</a>
                        <ul class="nav-ul-li-ul">
                            <?php
                            if (substr($_SESSION["low"], 0, 1) >= 2) {
                                ?>
                    <li class="nav-items">
                        <a class="aCat" href="marcaRegistrar" title="Nueva Marca"><i class="fas fa-copyright"></i>Nueva Marca</a>
                    </li> 
                                <?php
                            }elseif (substr($_SESSION["low"], 0, 1) == 1) {
                            }
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
                    if (
                        $_GET["action"] == "uClientes" || $_GET["action"] == "uCliente" || $_GET["action"] == "uClienteEditar" || 
                        $_GET["action"] == "uClienteRegistrar" || $_GET["action"] == "uClienteAddress" || 
                        $_GET["action"] == "uClientePhone" || $_GET["action"] == "uClienteCorreo"
                    ) {
                ?>
                    <li id="nav-item5" title="Clientes" class="nav-items"><a class="module" href="uClientes"><i class="fas fa-user-friends a-module"></i></i>Clientes</a>
                            <?php
                            if (substr($_SESSION["low"], 2, 1) >= 2) {
                                ?>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="uClienteRegistrar" title="Nuevo Cliente"><i class="fas fa-user-plus"></i>Nuevo Cliente</a>
                            </li> 
                        </ul>
                                <?php
                            }
                            ?>
                    </li>
                <?php
                    }else{
                ?>
                    <li id="nav-item5" title="Clientes" class="nav-items"><a href="uClientes"><i class="fas fa-user-friends"></i></i>Clientes</a>
                        <?php
                            if (substr($_SESSION["low"], 2, 1) >= 2) {
                                ?>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="uClienteRegistrar" title="Nuevo Cliente"><i class="fas fa-user-plus"></i>Nuevo Cliente</a>
                            </li> 
                        </ul>
                                <?php
                            }
                            ?>
                    </li>
                <?php
                    }
                ?>

                <?php
                    if (
                        $_GET["action"] == "uProveedores" || $_GET["action"] == "uProveedor" || $_GET["action"] == "uProveedorEditar" || 
                        $_GET["action"] == "uProveedorRegistrar" || $_GET["action"] == "uProveedorAddress" || 
                        $_GET["action"] == "uProveedorPhone" || $_GET["action"] == "uProveedorCorreo"
                    ) {
                ?>
                    <li id="nav-item6" title="Proveedores" class="nav-items"><a class="module" href="uProveedores"><i class="fas fa-users a-module"></i>Proveedores</a>
                            <?php
                            if (substr($_SESSION["low"], 1, 1) >= 2) {
                                ?>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="uProveedorRegistrar" title="Nuevo Proveedor"><i class="fas fa-user-plus"></i>Nuevo Proveedor</a>
                            </li> 
                        </ul>
                                <?php
                            }
                            ?>
                    </li>
                <?php
                    }else{
                ?>
                    <li id="nav-item6" title="Proveedores" class="nav-items"><a href="uProveedores"><i class="fas fa-users"></i>Proveedores</a>
                            <?php
                            if (substr($_SESSION["low"], 1, 1) >= 2) {
                                ?>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="uProveedorRegistrar" title="Nuevo Proveedor"><i class="fas fa-user-plus"></i>Nuevo Proveedor</a>
                            </li> 
                        </ul>
                                <?php
                            }
                            ?>
                    </li>
                <?php
                    }
                ?>

                <?php
                    if (
                        $_GET["action"] == "compras" || $_GET["action"] == "compraRegistrar" || 
                        $_GET["action"] == "compraEntrada" || $_GET["action"] == "compra" || 
                        $_GET["action"] == "compraEditar"
                    ) {
                ?>
                    <li id="nav-item7" title="Compra" class="nav-items"><a class="module" href="compras"><i class="fas fa-shopping-cart a-module"></i>Compras</a>
                            <?php
                            if (substr($_SESSION["low"], 3, 1) >= 2) {
                                ?>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="compraRegistrar" title="Nueva Compra"><i class="fas fa-cart-plus"></i>Nueva Compra</a>
                            </li>
                        </ul>
                                <?php
                            }
                            ?>

                            <!-- <li class="nav-items"><a href="devoluciones"><i class="fas fa-reply"></i>Ver Devoluciones</a></li>
                            <li class="nav-items"><a href="devolucionRegistrar"><i class="fas fa-hand-holding-usd"></i>Nueva Devolución</a></li> -->
                    </li>

                <?php
                    }else{
                ?>
                    <li id="nav-item7" title="Compra" class="nav-items"><a href="compras"><i class="fas fa-shopping-cart"></i>Compras</a>
                            <?php
                            if (substr($_SESSION["low"], 3, 1) >= 2) {
                                ?>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="compraRegistrar" title="Nueva Compra"><i class="fas fa-cart-plus"></i>Nueva Compra</a>
                            </li>
                        </ul>
                                <?php
                            }
                            ?>

                            <!-- <li class="nav-items"><a href="devoluciones"><i class="fas fa-reply"></i>Ver Devoluciones</a></li>
                            <li class="nav-items"><a href="devolucionRegistrar"><i class="fas fa-hand-holding-usd"></i>Nueva Devolución</a></li> -->
                    </li>

                <?php
                    }
                ?>

                <?php
                    if (
                        $_GET["action"] == "ventas" || $_GET["action"] == "ventaRegistrar" || 
                        $_GET["action"] == "ventaSalida" || $_GET["action"] == "venta" || 
                        $_GET["action"] == "ventaEditar"
                    ) {
                ?>
                    <li id="nav-item8" title="Venta" class="nav-items"><a class="module" href="ventas"><i class="fas fa-cash-register a-module"></i>Ventas</a>
                        <?php
                            if (substr($_SESSION["low"], 4, 1) >= 2) {
                                ?>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="ventaRegistrar" title="Nueva Venta"><i class="fab fa-shopify"></i>Nueva Venta</a>
                            </li>
                        </ul>
                                <?php
                            }
                            ?>
                    </li>
                <?php
                    }else{
                ?>
                    <li id="nav-item8" title="Venta" class="nav-items"><a href="ventas"><i class="fas fa-cash-register"></i>Ventas</a>
                        <?php
                            if (substr($_SESSION["low"], 4, 1) >= 2) {
                                ?>
                        <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="ventaRegistrar" title="Nueva Venta"><i class="fab fa-shopify"></i>Nueva Venta</a>
                            </li>
                        </ul>
                                <?php
                            }
                            ?>
                    </li>
                <?php
                    }
            }else{
            ?>
                <li id="nav-item1" title="Inicio" class="nav-items"><a class="module" href="inicio"><i class="fas fa-home a-module"></i>Inicio</a></li>
                <li id="nav-item2" title="Productos" class="nav-items"><a href="productoInicio"><i class="fas fa-tags"></i>Productos</a>
                    <ul class="nav-ul-li-ul">
                        <?php
                            if (substr($_SESSION["low"], 0, 1) >= 2) {
                                ?>
                    <li class="nav-items">
                        <a class="aCat" href="productoRegistrar" title="Nuevo Producto"><i class="fas fa-plus-circle"></i>Nuevo Producto</a>
                    </li>
                    <li class="nav-items"><a href="productoSinStock"><i class="fab fa-creative-commons-zero"></i>Ver productos sin existencia</a></li>
                    <li class="nav-items"><a href="productoDeshabilitado"><i class="fas fa-recycle"></i>Ver productos deshabilitados</a></li>
                                <?php
                            }elseif (substr($_SESSION["low"], 0, 1) == 1) {
                                ?>
                    <li class="nav-items"><a href="productoSinStock"><i class="fab fa-creative-commons-zero"></i>Ver productos sin existencia</a></li>
                    <li class="nav-items"><a href="productoDeshabilitado"><i class="fas fa-recycle"></i>Ver productos deshabilitados</a></li>
                                <?php
                            }
                            ?>
                    </ul>
                </li>
                <li id="nav-item3" title="Categorías" class="nav-items"><a href="categoria"><i class="fas fa-cubes"></i>Categorías</a>
                    <ul class="nav-ul-li-ul">
                        <?php
                            if (substr($_SESSION["low"], 0, 1) >= 2) {
                                ?>
                    <li class="nav-items">
                        <a class="aCat" href="categoriaRegistrar" title="Nueva Categoría"><i class="fas fa-cube"></i>Nueva Categoría</a>
                    </li>
                                <?php
                            }elseif (substr($_SESSION["low"], 0, 1) == 1) {
                            }
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
                <li id="nav-item4" title="Marcas" class="nav-items"><a href="marca"><i class="fas fa-copyright"></i>Marcas</a>
                    <ul class="nav-ul-li-ul">
                        <?php
                            if (substr($_SESSION["low"], 0, 1) >= 2) {
                                ?>
                    <li class="nav-items">
                        <a class="aCat" href="marcaRegistrar" title="Nueva Marca"><i class="fas fa-copyright"></i>Nueva Marca</a>
                    </li> 
                                <?php
                            }elseif (substr($_SESSION["low"], 0, 1) == 1) {
                            }
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
                <li id="nav-item5" title="Clientes" class="nav-items"><a href="uClientes"><i class="fas fa-user-friends"></i></i>Clientes</a>
                        <?php
                            if (substr($_SESSION["low"], 2, 1) >= 2) {
                                ?>
                    <ul class="nav-ul-li-ul">
                        <li class="nav-items">
                            <a class="aCat" href="uClienteRegistrar" title="Nuevo Cliente"><i class="fas fa-user-plus"></i>Nuevo Cliente</a>
                        </li> 
                    </ul>
                                <?php
                            }
                            ?>
                </li>
                <li id="nav-item6" title="Proveedores" class="nav-items"><a href="uProveedores"><i class="fas fa-users"></i>Proveedores</a>
                        <?php
                            if (substr($_SESSION["low"], 1, 1) >= 2) {
                                ?>
                    <ul class="nav-ul-li-ul">
                        <li class="nav-items">
                            <a class="aCat" href="uProveedorRegistrar" title="Nuevo Proveedor"><i class="fas fa-user-plus"></i>Nuevo Proveedor</a>
                        </li> 
                    </ul>
                                <?php
                            }
                            ?>
                </li>
                <li id="nav-item7" title="Compra" class="nav-items"><a href="compras"><i class="fas fa-shopping-cart"></i>Compras</a>
                        <?php
                            if (substr($_SESSION["low"], 3, 1) >= 2) {
                                ?>
                    <ul class="nav-ul-li-ul">
                        <li class="nav-items">
                            <a class="aCat" href="compraRegistrar" title="Nueva Compra"><i class="fas fa-cart-plus"></i>Nueva Compra</a>
                        </li>
                    </ul>
                                <?php
                            }
                            ?>
                        <!-- <li class="nav-items"><a href="devoluciones"><i class="fas fa-reply"></i>Ver Devoluciones</a></li>
                        <li class="nav-items"><a href="devolucionRegistrar"><i class="fas fa-hand-holding-usd"></i>Nueva Devolución</a></li> -->
                </li>
                <li id="nav-item8" title="Venta" class="nav-items"><a href="ventas"><i class="fas fa-cash-register"></i>Ventas</a>
                        <?php
                            if (substr($_SESSION["low"], 4, 1) >= 2) {
                                ?>
                    <ul class="nav-ul-li-ul">
                        <li class="nav-items">
                            <a class="aCat" href="ventaRegistrar" title="Nueva Venta"><i class="fab fa-shopify"></i>Nueva Venta</a>
                        </li>
                    </ul>
                                <?php
                            }
                            ?>
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
        <span class="span-user-log">Bienvenid@ <?=$nombreUsuario?></span>
        <button class="button-adjust" id="button-adjust"><i class="fas fa-user"></i>
            <div class="panel-usuario" id="panel-usuario">
                <div class="mensaje">Bienvenido</div>
                <div class="line-user"></div>
                <a href="usuarioConfiguracion" class="pU-opciones">Configuración</a>
                <a href="usuarioSalir" class="pU-opciones">Cerrar Sesión</a>
            </div>
        </button>
    </div>
</header>