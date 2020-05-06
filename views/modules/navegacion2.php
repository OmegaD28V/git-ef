<?php
    $categorias = MvcController::seleccionarCategoriaController();
?>
<header class="header" id="header">
    <div class="encabezado">
        <div class="img-logo"><img src="ima/LogoEF.jpeg" alt="Logo EF"></div>
        <div class="logo">Electrónica Fonseca</div>
    </div>
    <div class="button-nav" id="button-nav">
        <button id="nav-button" class="nav-button"><i id="fasIconDesp" class="fas fa-angle-up"></i></button>
    </div>

    <nav class="navegacion" id="navegacion">
        <ul class="nav-ul">
        <?php
            if (isset($_GET["action"])) {
                    if ($_GET["action"] == "inicio") {
                ?>
                    <li id="nav-item1" title="Inicio" class="nav-items"><a class="module" href="index.php?action=inicio"><i class="fas fa-home"></i>Inicio</a></li>
                <?php                    
                    }else{
                ?>
                    <li id="nav-item1" title="Inicio" class="nav-items"><a href="index.php?action=inicio"><i class="fas fa-home"></i>Inicio</a></li>
                <?php
                    }
                ?>

                <?php
                    if ($_GET["action"] == "categoriaLista" || $_GET["action"] == "productoCategoria") {
                ?>
                    <li id="nav-item2" title="Categorías" class="nav-items"><a class="module" href="index.php?action=categoriaLista"><i class="fas fa-cubes"></i>Categorías</a>
                        <ul class="nav-ul-li-ul">
                            <?php
                                foreach ($categorias as $key => $value) {
                            ?>
                                <li title="" class="nav-items">
                                    <a class="aCat" href="index.php?action=productoCategoria&idcategoria=<?=$value["idcategoria"]?>" title=""><?=$value["categoria"]?></a>
                                </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </li>
                <?php
                    }else{
                ?>
                    <li id="nav-item2" title="Categorías" class="nav-items"><a href="index.php?action=categoriaLista"><i class="fas fa-cubes"></i>Categorías</a>
                        <ul class="nav-ul-li-ul">
                            <?php
                                foreach ($categorias as $key => $value) {
                            ?>
                                <li title="" class="nav-items">
                                    <a class="aCat" href="index.php?action=productoCategoria&idcategoria=<?=$value["idcategoria"]?>" title=""><?=$value["categoria"]?></a>
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
                    if ($_GET["action"] == "productoLista") {
                ?>
                    <li id="nav-item3" title="Lista de productos" class="nav-items"><a class="module" href="index.php?action=productoLista"><i class="fas fa-list-ul"></i></i>Productos</a></li>
                <?php
                    }else{
                ?>
                    <li id="nav-item3" title="Lista de productos" class="nav-items"><a href="index.php?action=productoLista"><i class="fas fa-list-ul"></i></i>Productos</a></li>
                <?php
                    }
                ?>

                <?php
                    if ($_GET["action"] == "productoInicio") {
                ?>
                    <li id="nav-item4" title="Productos" class="nav-items"><a class="module" href="index.php?action=productoInicio"><i class="fas fa-tags"></i>Productos</a>
                        <ul class="nav-ul-li-ul">
                                <li class="nav-items">
                                    <a class="aCat" href="index.php?action=productoRegistrar" title="Nuevo Producto"><i class="fas fa-plus-circle"></i>Nuevo Producto</a>
                                </li>
                        </ul>
                    </li>
                <?php
                    }else{
                ?>
                    <li id="nav-item4" title="Productos" class="nav-items"><a href="index.php?action=productoInicio"><i class="fas fa-tags"></i>Productos</a>
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
                    if ($_GET["action"] == "proveedores") {
                ?>
                    <li id="nav-item5" title="Proveedores" class="nav-items"><a class="module" href="index.php?action=proveedores"><i class="fas fa-handshake"></i>Proveedores</a></li>
                <?php
                    }else{
                ?>
                    <li id="nav-item5" title="Proveedores" class="nav-items"><a href="index.php?action=proveedores"><i class="fas fa-handshake"></i>Proveedores</a></li>
                <?php
                    }
                ?>

                <?php
                    if ($_GET["action"] == "compras") {
                ?>
                    <li id="nav-item6" title="Compra" class="nav-items"><a class="module" href="index.php?action=compras"><i class="fas fa-shopping-cart"></i>Compra</a></li>
                <?php
                    }else{
                ?>
                    <li id="nav-item6" title="Compra" class="nav-items"><a href="index.php?action=compras"><i class="fas fa-shopping-cart"></i>Compra</a></li>
                <?php
                    }
                ?>

                <?php
                    if ($_GET["action"] == "ventas") {
                ?>
                    <li id="nav-item7" title="Venta" class="nav-items"><a class="module" href="index.php?action=ventas"><i class="fas fa-cash-register"></i>Venta</a></li>
                <?php
                    }else{
                ?>
                    <li id="nav-item7" title="Venta" class="nav-items"><a href="index.php?action=ventas"><i class="fas fa-cash-register"></i>Venta</a></li>
                <?php
                    }
            }else{
            ?>
                <li id="nav-item1" title="Inicio" class="nav-items"><a class="module" href="index.php?action=inicio"><i class="fas fa-home"></i>Inicio</a></li>
                <li id="nav-item2" title="Categorías" class="nav-items"><a href="index.php?action=categoriaLista"><i class="fas fa-cubes"></i>Categorías</a>
                    <ul class="nav-ul-li-ul">
                        <?php
                            foreach ($categorias as $key => $value) {
                        ?>
                            <li title="" class="nav-items">
                                <a class="aCat" href="index.php?action=productoCategoria&idcategoria=<?=$value["idcategoria"]?>"><?=$value["categoria"]?></a>
                            </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>
                <li id="nav-item3" title="Lista de productos" class="nav-items"><a href="index.php?action=productoLista"><i class="fas fa-list-ul"></i></i>Productos</a></li>
                <li id="nav-item4" title="Productos" class="nav-items"><a href="index.php?action=productoInicio"><i class="fas fa-tags"></i>Productos</a>
                    <ul class="nav-ul-li-ul">
                            <li class="nav-items">
                                <a class="aCat" href="index.php?action=productoRegistrar" title="Nuevo Producto"><i class="fas fa-plus-circle"></i>Nuevo Producto</a>
                            </li>
                    </ul>
                </li>
                <li id="nav-item5" title="Proveedores" class="nav-items"><a href="index.php?action=proveedores"><i class="fas fa-handshake"></i>Proveedores</a></li>
                <li id="nav-item6" title="Compra" class="nav-items"><a href="index.php?action=compras"><i class="fas fa-shopping-cart"></i>Compra</a></li>
                <li id="nav-item7" title="Venta" class="nav-items"><a href="index.php?action=ventas"><i class="fas fa-cash-register"></i>Venta</a></li>
            <?php
            }
        ?>
        </ul>
    </nav>

    <div class="adjust" id="adjust">
        <!-- Anterior versión => Botón de tema oscuro/claro
        <button class="button-adjust" title="claro/oscuro" id="button-adjust"><i class="fas fa-sun"></i></button> -->
        <button class="button-adjust" id="button-adjust"><i class="fas fa-user"></i>
            <div class="panel-usuario">
                <div class="mensaje">Bienvenido</div>
                <div class="line-user"></div>
                <a href="index.php?action=usuarioInicioSession" class="pU-actions">Ingresar con Sesion</a>
                <a href="index.php?action=usuarioRegistrarse" class="pU-actions">Quiero una cuenta</a>
                <div class="pU-opciones">opciones</div>
            </div>
        </button>
    </div>
</header>