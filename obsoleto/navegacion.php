<?php
    // $categorias = MvcController::seleccionarCategoriaController();
?>
<header class="header" id="header">
    <div class="button-nav" id="button-nav">
        <button id="nav-button" class="nav-button"><i class="fas fa-bars"></i></button>
    </div>
    <div class="navegacion" id="navegacion">
        <a class="nav-items" title="inicio" href="#"><i class="fas fa-home"></i>inicio</a>
        <a class="nav-items" title="usuarios" href="index.php?action=categorias"><i class="fas fa-user"></i>usuarios</a>
        <a class="nav-items" title="productos" href="index.php?action=productos"><i class="fas fa-cubes"></i>productos</a>
        <a class="nav-items" title="nuevo producto" href="index.php"><i class="fas fa-plus-circle"></i>Nuevo Producto</a>
        <a class="nav-items" title="clientes" href="#"><i class="fas fa-address-book"></i>clientes</a>
        <a class="nav-items" title="proveedores" href="#"><i class="far fa-address-book"></i>proveedores</a>
        <a class="nav-items" title="pedidos" href="#"><i class="fas fa-truck"></i>pedidos</a>
    </div>

    <div class="adjust" id="adjust">
        <!-- <button class="button-adjust" title="claro/oscuro" id="button-adjust"><i class="fas fa-adjust"></i></button> -->
        <button class="button-adjust" title="claro/oscuro" id="button-adjust"><i class="fas fa-sun"></i></button>
    </div>
</header>