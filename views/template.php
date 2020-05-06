<?php
    session_start();
?>
<html lang="es">
    <?php
        require_once "models/conexion.php";
    ?>
    <head>
        <?php
            if (isset($_GET['action'])) {
                if($_GET['action'] == "inicio"){
                        $modulo =  "Inicio";
                }elseif ($_GET['action'] == "productoInicio") {
                    $modulo =  "Productos";
                }elseif ($_GET['action'] == "productoRegistrar") {
                    $modulo =  "Nuevo Producto";
                }elseif ($_GET['action'] == "productoEditar") {
                    $modulo = "Editar Producto";
                }elseif ($_GET['action'] == "categoriaLista") {
                    $modulo =  "Categorías";
                }elseif ($_GET['action'] == "productoLista") {
                    $modulo =  "Productos";
                }elseif ($_GET['action'] == "productoCategoria" && isset($_GET["idcategoria"])) {
                    $categoria = MvcController::categoriaController($_GET["idcategoria"]);
                    $modulo = $categoria["categoria"];
                }elseif ($_GET['action'] == "proveedores") {
                    $modulo =  "Proveedores";
                }elseif ($_GET['action'] == "compras") {
                    $modulo =  "Compras";
                }elseif ($_GET['action'] == "ventas") {
                    $modulo =  "Ventas";
                }elseif ($_GET['action'] == "usuarioInicioSession") {
                    $modulo =  "Iniciar Sesion";
                }elseif ($_GET['action'] == "usuarioRegistrarse") {
                    $modulo =  "Crear una cuenta";
                }elseif ($_GET['action'] == "usuarioConfiguracion") {
                    $modulo =  "Configuración";
                }elseif ($_GET['action'] == "categoriaRegistrar") {
                    $modulo =  "Nueva Categoría";
                }else{
                    $modulo = "ninguno";
                }
            }else {
                $modulo = "Inicio";
            }
        ?>
        <title>EF | <?=$modulo?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="ima/MiSitioWebIcono.png" type="image/x-icon">
        <!-- <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet"> -->
        <link rel="stylesheet" href="css/estilo.css">
        <link href="css/all.css" rel="stylesheet">
        <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500&display=swap" rel="stylesheet"> -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <!-- <script src="https://kit.fontawesome.com/088ef51476.js" crossorigin="anonymous"></script> -->
    </head>        
        
    <body>
        <div class="main-container" id="main-container">
            <?php
                include "modules/nav.php";
            ?>
            <section class="section" id="section">
                <?php
                    $mvc = new MvcController();
                    $mvc -> enlacesPaginasController();
                ?>
            </section> 
        </div>
        <script type="text/javascript" src="js/interMenu.js"></script>
        <script type="text/javascript" src="js/visibleUser.js"></script>
        <script type="text/javascript" src="js/hiddenPasswordUIS.js"></script>
        <script type="text/javascript" src="js/hiddenPasswordUR.js"></script>
        <!-- <script type="text/javascript" src="js/darkMode.js"></script> -->
        <script src="js/validarProducto.js"></script>
    </body>
</html>