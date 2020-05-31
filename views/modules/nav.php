<?php
    $categorias = MvcController::seleccionarCategoriaController(null, null);
    $marcas = MvcController::seleccionarMarcaController(null, null);
?>
<header class="header" id="header">
    <div class="encabezado">
        <div class="img-logo"><img src="ima/LogoEF1.jpeg" alt="Logo EF"></div>
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
                    </li>
                <?php
                    }else{
                ?>
                    <li id="nav-item2" title="Productos" class="nav-items"><a href="index.php?action=productoInicio"><i class="fas fa-tags"></i>Productos</a></li>
                <?php
                    }
                ?>

                <?php
                    if ($_GET["action"] == "categoria" || $_GET["action"] == "productoCategoria") {
                ?>
                    <li id="nav-item2" title="Categorías" class="nav-items"><a class="module" href="index.php?action=categoria"><i class="fas fa-cubes a-module"></i>Categorías</a>
                        <ul class="nav-ul-li-ul">
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
                    <li id="nav-item2" title="Categorías" class="nav-items"><a href="index.php?action=categoria"><i class="fas fa-cubes"></i>Categorías</a>
                        <ul class="nav-ul-li-ul">
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
            }else{
            ?>
                <li id="nav-item1" title="Inicio" class="nav-items"><a class="module" href="index.php?action=inicio"><i class="fas fa-home a-module"></i>Inicio</a></li>
                <li id="nav-item2" title="Productos" class="nav-items"><a href="index.php?action=productoInicio"><i class="fas fa-tags"></i>Productos</a></li>
                <li id="nav-item3" title="Categorías" class="nav-items"><a href="index.php?action=categoria"><i class="fas fa-cubes"></i>Categorías</a>
                    <ul class="nav-ul-li-ul">
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
        </ul>
    </nav>

    <div class="adjust" id="adjust">
        <!-- Anterior versión => Botón de tema oscuro/claro
        <button class="button-adjust" title="claro/oscuro" id="button-adjust"><i class="fas fa-sun"></i></button> -->
        <span class="span-user-log">Hola, Regístrate o Inicia Sesion</span>
        <button class="button-adjust" id="button-adjust"><i class="fas fa-user"></i>
            <div class="panel-usuario" id="panel-usuario">
                <div class="mensaje">Bienvenido</div>
                <div class="line-user"></div>
                <a href="index.php?action=usuarioInicioSession" class="pU-actions">Iniciar Sesion</a>
                <a href="index.php?action=usuarioRegistrarse" class="pU-actions">Crear Cuenta</a>
                <a href="index.php?action=usuarioConfiguracion" class="pU-opciones">Configuración</a>
            </div>
        </button>
    </div>
</header>