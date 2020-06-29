<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <?php
        require_once "models/conexion.php";
    ?>
    <head>
        <?php
            if (isset($_GET['action'])) {
                if($_GET['action'] == "inicio"){
                        $modulo =  "EF | Inicio";
                }elseif ($_GET['action'] == "productoInicio") {
                    $modulo =  "EF | Productos";
                }elseif ($_GET['action'] == "productoRegistrar") {
                    $modulo =  "EF | Nuevo Producto";
                }elseif ($_GET['action'] == "productoEditar") {
                    $modulo = "EF | Editar Producto";
                }elseif ($_GET['action'] == "categoria") {
                    $modulo =  "EF | Categorías";
                }elseif ($_GET['action'] == "productoLista") {
                    $modulo =  "EF | Productos";
                }elseif ($_GET['action'] == "productoCategoria" && isset($_GET["idcategoria"])) {
                    $categoria = MvcController::categoriaController($_GET["idcategoria"]);
                    $modulo = "EF | ".$categoria["categoria"];
                }elseif ($_GET['action'] == "proveedores") {
                    $modulo =  "EF | Proveedores";
                }elseif ($_GET['action'] == "compras") {
                    $modulo =  "EF | Compras";
                }elseif ($_GET['action'] == "ventas") {
                    $modulo =  "EF | Ventas";
                }elseif ($_GET['action'] == "usuarioInicioSession") {
                    $modulo =  "EF | Iniciar Sesion";
                }elseif ($_GET['action'] == "usuarioRegistrarse") {
                    $modulo =  "EF | Crear una cuenta";
                }elseif ($_GET['action'] == "usuarioConfiguracion") {
                    $modulo =  "EF | Configuración";
                }elseif ($_GET['action'] == "categoriaRegistrar") {
                    $modulo =  "EF | Nueva Categoría";
                }elseif ($_GET['action'] == "marca") {
                    $modulo =  "EF | Marcas";
                }elseif ($_GET['action'] == "marcaRegistrar") {
                    $modulo =  "EF | Registrar Marca";
                }elseif ($_GET['action'] == "categoriaEditar") {
                    $modulo =  "EF | Editar Categoría";
                }elseif ($_GET['action'] == "productoEntrada") {
                    $modulo =  "EF | Entrada de productos";
                }elseif ($_GET['action'] == "proveedorRegistrar") {
                    $modulo =  "EF | Registrar Proveedor";
                }elseif ($_GET['action'] == "productoCompra") {
                    $modulo =  "EF | Registrar Compra";
                }elseif ($_GET['action'] == "producto" && isset($_GET["idpro"])) {
                    $valor = $_GET["idpro"];
                    $producto = MvcController::tabProductoController($valor);
                    $modulo =  "EF | ".$producto["nombre"];
                }elseif ($_GET['action'] == "productoDeshabilitado") {
                    $modulo =  "EF | Productos Deshabilitados";
                }elseif ($_GET['action'] == "productoSinStock") {
                    $modulo =  "EF | Productos Sin Stock";
                }elseif ($_GET['action'] == "compra") {
                    $modulo =  "EF | Detalle de Compra";
                }else{
                    $modulo = "Electrónica Fonseca.";
                }
            }else {
                $modulo = "Electrónica Fonseca";
            }
        ?>
        <title><?=$modulo?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="ima/MiSitioWebIcono.png" type="image/x-icon">
        <!-- <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet"> -->
        <link rel="stylesheet" href="css/estilo.css">
        <link href="css/all.css" rel="stylesheet">
        <script type="text/javascript" src="views/scripts/jquery-3.4.1.min.js"></script>
        <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500&display=swap" rel="stylesheet"> -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <!-- API Google Places -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZXLpj_YTM5xyDp2mz3iu2m7cDkpd7Lz8&libraries=places&callback=initMap"></script>
        
        <script src="https://kit.fontawesome.com/088ef51476.js" crossorigin="anonymous"></script>
    </head>        
        
    <body>
        <div class="main-container" id="main-container">
            <?php
                if (!isset($_SESSION["ingresoVerificado"])) {
                    include "modules/nav.php";
                }else {
                    if (isset($_SESSION["access"])) {
                        if ($_SESSION["access"] == "master") {
                            include "modules/nav-master.php";
                        }elseif ($_SESSION["access"] == "invite") {
                            include "modules/nav-invite.php";
                        }elseif ($_SESSION["access"] == "user") {
                            include "modules/nav-user.php";
                        }
                    }else {
                        echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';
                    echo '<div><span>Error!</span></div>';
                    }
                }
            ?>
            <section class="section" id="section">
                <?php
                    $mvc = new MvcController();
                    $mvc -> enlacesPaginasController();
                ?>
            </section> 
        </div>
        <footer class="footer">
            <?php
                include "modules/footer.php";
            ?>
        </footer>
        <script type="text/javascript" src="views/scripts/uno.js"></script>
        <script type="text/javascript" src="js/interMenu.js"></script>
        <script type="text/javascript" src="js/visibleUser.js"></script>
        <script type="text/javascript" src="js/hiddenPasswordUIS.js"></script>
        <script type="text/javascript" src="js/hiddenPasswordUR.js"></script>
        <script type="text/javascript" src="js/darkMode.js"></script>
        <script src="js/validarProducto.js"></script>
    </body>
</html>