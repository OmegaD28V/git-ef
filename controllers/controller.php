<?php
    class MvcController{
        #Llamada a la plantilla
        public function pagina(){
            include "views/template.php";
        }

        #Enlaces
        public function enlacesPaginasController(){
            if (isset($_GET['action'])) {
                $enlaces = $_GET['action'];
            }else{
                $enlaces = "index";
            }

            $respuesta = Paginas::enlacesPaginasModel($enlaces);
            include $respuesta;
        }

        #Registrar producto
        static public function registrarProductoController(){
            $tabla = "producto";
            if(isset($_POST["category"])){
                $datosController = array(
                    "idcategoria" => $_POST["category"], 
                    "nombre" => $_POST["nameProduct"], 
                    "precioventa" => $_POST["price"]);
                
                $respuesta = Datos::registrarProductoModel($datosController, $tabla);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoRegistrar";
                        </script>';
                }else{
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoRegistrar";
                        </script>';
                }
            }
        }
        
        #Actualizar productos
        public function actualizarProductoController(){
            $tabla = "producto";
            if(isset($_POST["uCategory"])){
                $datosController = array(
                    "idproducto" => $_POST["idproducto"], 
                    "idcategoria" => $_POST["uCategory"], 
                    "nombre" => $_POST["uNameProduct"], 
                    "precioventa" => $_POST["uPrice"]);
                
                $respuesta = Datos::actualizarProductoModel($datosController, $tabla);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoInicio";
                        </script>';
                }else{
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoInicio";
                        </script>';
                }
            }
        }
        
        #Seleccionar Categorías
        static public function seleccionarCategoriaController(){
            $tabla = "categoria";
            $respuesta = Datos::seleccionarCategoriaModel($tabla);
            return $respuesta;
        }

        #Seleccionar Categorías
        static public function categoriaController($valor){
            $tabla = "categoria";
            $respuesta = Datos::categoriaModel($tabla, $valor);
            return $respuesta;
        }
        
        #Seleccionar ProductoCategorías
        static public function seleccionarProductoCategoriaController($item, $valor){
            $tabla = "producto";
            $respuesta = Datos::seleccionarProductoCategoriaModel($tabla, $item, $valor);
            return $respuesta;
        }
        
        #Seleccionar Productos
        static public function seleccionarProductoController($item, $valor){
            $tabla = "producto";
            $respuesta = Datos::seleccionarProductoModel($tabla, $item, $valor);
            return $respuesta;
        }
        
        #Eliminar Productos
        public function eliminarProductoController(){
            if (isset($_POST["dropProduct"])) {
                $tabla = "producto";
                $valor = $_POST["dropProduct"];
                $respuesta = Datos::eliminarProductoModel($tabla, $valor);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoInicio";
                        </script>';
                }
                return $respuesta;
            }
            
        }

        #Registrar usuario
        static public function registrarUsuarioController(){
            $tabla = "usuario";
            if(isset($_POST["name-user"])){
                $datosController = array(
                    "nombre" => $_POST["name-user"], 
                    "apellidos" => $_POST["ape-user"], 
                    "correo" => $_POST["correo-user"], 
                    "contrasena" => $_POST["password-user"]);
                
                $respuesta = Datos::registrarUsuarioModel($datosController, $tabla);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=usuarioRegistrarse";
                        </script>';
                }else{
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=usuarioRegistrarse";
                        </script>';
                }
            }
        }

        #Inicio Sesion de usuario
        public function inicioSesionUsuarioController(){
            if (isset($_POST["email-user"])) {
                $tabla = "usuario";
                // $item = "correo";
                $valor = $_POST["email-user"];
                $respuesta = Datos::inicioSesionUsuarioModel($tabla, $valor);

                if ($respuesta["correo"] == $_POST["email-user"] && $respuesta["contrasena"] == $_POST["password-user"]) {
                    $_SESSION["ingresoVerificado"] = "ok";
                    echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                        window.location = "index.php?action=categoriaLista";
                    </script>';
                    echo '<div>Ingresado</div>';
                }else {
                    echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';
                    echo '<div><span>No se pudo iniciar sesión</span></div>';
                    echo '<div><span>verifique sus datos</span></div>';
                }
            }
        }
    }
?>