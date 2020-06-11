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
            $tabla = "pro";
            if(isset($_POST["categoryProduct"])){
                $datosController = array(
                    "idpro_categoria" => $_POST["categoryProduct"], 
                    "idpro_marca" => $_POST["trademarkProduct"], 
                    "codigo" => $_POST["codeProduct"], 
                    "nombre" => $_POST["nameProduct"], 
                    "modelo" => $_POST["modelProduct"],  
                    "precioventa" => $_POST["priceSellProduct"],  
                    "descripcion" => $_POST["descriptionProduct"]);
                
                $respuesta = Datos::registrarProductoModel($datosController, $tabla);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoRegistrar&not0=true";
                        </script>';
                }else{
                    echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';
                    echo '<div><span>No se pudo registrar</span></div>';
                    echo '<div><span>verifique sus datos</span></div>';
                }
            }
        }
        
        #Actualizar productos
        public function actualizarProductoController(){
            $tabla = "pro";
            if(isset($_POST["uCategory"])){
                $datosController = array(
                    "idpro" => $_POST["idpro"], 
                    "idpro_categoria" => $_POST["uCategory"], 
                    "idpro_marca" => $_POST["uTrademark"], 
                    "codigo" => $_POST["uCode"], 
                    "nombre" => $_POST["uNameProduct"], 
                    "modelo" => $_POST["uModel"], 
                    "descripcion" => $_POST["uDescription"]);
                
                $respuesta = Datos::actualizarProductoModel($datosController, $tabla);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoInicio&not2=true";
                        </script>';
                }else{
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoInicio";
                        </script>';
                    echo '<div><span>No se pudo Actualizar</span></div>';
                    echo '<div><span>verifique sus datos</span></div>';
                }
            }
        }

        #Actualizar Precio Producto
        public function actualizarProPrecioController(){
            $tabla = "pro_precio";
            if(isset($_POST["idpro"]) && isset($_POST["upriceSellProduct"])){
                $datosController = array(
                    "idpro" => $_POST["idpro"], 
                    "precio" => $_POST["upriceSellProduct"]);
                
                $respuesta = Datos::actualizarProPrecioModel($datosController, $tabla);
                if ($respuesta == "ok") {
                }else{
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoInicio&not5=true";
                        </script>';
                }
            }
        }

        #Eliminar Productos
        public function eliminarProductoController(){
            if (isset($_POST["removeProduct"])) {
                $tabla = "pro";
                $valor = $_POST["removeProduct"];
                $respuesta = Datos::eliminarProductoModel($tabla, $valor);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoInicio&not3=true";
                        </script>';
                }
                return $respuesta;
            }
        }
        
        #Restaurar Productos
        public function restaurarProductoController(){
            if (isset($_POST["restoreProduct"])) {
                $tabla = "pro";
                $valor = $_POST["restoreProduct"];
                $respuesta = Datos::restaurarProductoModel($tabla, $valor);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoDeshabilitado&not4=true";
                        </script>';
                }
                return $respuesta;
            }
        }

        #Seleccionar Precio Producto
        static public function seleccionarProPrecioController($valor){
            $tabla = "pro_precio";
            $respuesta = Datos::seleccionarProPrecioModel($tabla, $valor);
            return $respuesta;
        }

        #Seleccionar ProductoCategorías
        static public function seleccionarProductoCategoriaController($item, $valor, $modo){
            $tabla = "pro";
            if ($modo == "fichas") {
                $respuesta = Datos::seleccionarProductoCategoriaModel($tabla, $item, $valor, $modo);
                return $respuesta;    
            }else {
                $respuesta = Datos::seleccionarProductoCategoriaModel($tabla, $item, $valor, $modo);
                return $respuesta;
            }            
        }
        
        #Seleccionar ProductoMarcas
        static public function seleccionarProductoMarcaController($item, $valor, $modo){
            $tabla = "pro";
            if ($modo == "fichas") {
                $respuesta = Datos::seleccionarProductoMarcaModel($tabla, $item, $valor, $modo);
                return $respuesta;    
            }else {
                $respuesta = Datos::seleccionarProductoMarcaModel($tabla, $item, $valor, $modo);
                return $respuesta;
            }            
        }
        
        #Seleccionar Productos
        static public function seleccionarProductoController($item, $valor, $modo){
            $tabla = "pro";
            if ($item == null && $valor == null && $modo == "lista") {
                $respuesta = Datos::listarProductoModel($tabla, $item, $valor, $modo);
                return $respuesta;
            }elseif ($item == null && $valor == null && $modo == "fichas") {
                $respuesta = Datos::seleccionarProductoModel($tabla, $item, $valor);
                return $respuesta;
            }elseif ($modo == null){
                $respuesta = Datos::seleccionarProductoModel($tabla, $item, $valor);
                return $respuesta;
            }elseif ($item == null && $valor == null && $modo == "entrada"){
                $respuesta = Datos::listarProductoModel($tabla, $item, $valor, $modo);
                return $respuesta;
            }
        }
        
        #Seleccionar Productos Deshabilitados
        static public function seleccionarProductoDeshabilitadoController($modo){
            $tabla = "pro";
            if ($modo == "lista") {
                $respuesta = Datos::listarProductoDeshabilitadoModel($tabla);
                return $respuesta;
            }elseif ($modo == "fichas") {
                $respuesta = Datos::seleccionarProductoDeshabilitadoModel($tabla);
                return $respuesta;
            }
        }
        
        #Seleccionar Productos Sin Sotck
        static public function seleccionarProductoSinStockController($modo){
            $tabla = "pro";
            if ($modo == "lista") {
                $respuesta = Datos::listarProductoSinStockModel($tabla);
                return $respuesta;
            }elseif ($modo == "fichas") {
                $respuesta = Datos::seleccionarProductoSinStockModel($tabla);
                return $respuesta;
            }
        }
        
        #Seleccionar Productos para pestaña
        static public function tabProductoController($valor){
            $tabla = "pro";
            $respuesta = Datos::tabProductoModel($tabla, $valor);
            return $respuesta;
        }
        
        #Seleccionar Caracteristicas de Producto
        static public function seleccionarProductoCaracteristicasController($item, $valor){
            $tabla = "pro_caracteristica";
            $respuesta = Datos::seleccionarProductoCaracteristicasModel($tabla, $item, $valor);
            return $respuesta;
        }

        #Registrar categoria
        static public function registrarCategoriaController(){
            $tabla = "pro_categoria";
            if(isset($_POST["nameCategory"])){
                $valor = $_POST["nameCategory"];
                
                $respuesta = Datos::registrarCategoriaModel($valor, $tabla);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=categoriaRegistrar&not0=true";
                        </script>';
                    return "ok";
                }else{
                    echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';
                    echo '<div><span>No se pudo registrar</span></div>';
                    echo '<div><span>verifique sus datos</span></div>';
                    return $respuesta;
                }
            }
        }
        
        #Seleccionar Categorías
        static public function seleccionarCategoriaController($item, $valor){
            if ($item == null && $valor == null) {
                $tabla = "pro_categoria";
                $respuesta = Datos::seleccionarCategoriaModel($tabla, $item, $valor );
                return $respuesta;   
            }else {
                $tabla = "pro_categoria";
                $respuesta = Datos::seleccionarCategoriaModel($tabla, $item, $valor);
                return $respuesta;
            }
        }

        #Actualizar categoria
        public function actualizarCategoriaController(){
            $tabla = "pro_categoria";
            if(isset($_POST["nameCategory"]) && isset($_POST["hidden-idcategory"])){
                $datosController = array(
                    "categoria" => $_POST["nameCategory"], 
                    "idpro_categoria" => $_POST["hidden-idcategory"]);
                
                $respuesta = Datos::actualizarCategoriaModel($datosController, $tabla);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=categoria&not2=true";
                        </script>';
                }else{
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=categoria";
                        </script>';
                }
            }
        }

        #Quitar Categoria
        public function quitarCategoriaController(){
            if (isset($_POST["removeCategory"])) {
                $tabla = "pro_categoria";
                $valor = $_POST["removeCategory"];
                $respuesta = Datos::quitarCategoriaModel($tabla, $valor);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=categoria&not3=true";
                        </script>';
                }
                return $respuesta;
            }
        }
        
        #Seleccionar Marcas
        static public function seleccionarMarcaController($item, $valor){
            if ($item == null && $valor = null) {
                $tabla = "pro_marca";
                $respuesta = Datos::seleccionarMarcaModel($tabla, $item, $valor);
                return $respuesta;
            }else {
                $tabla = "pro_marca";
                $respuesta = Datos::seleccionarMarcaModel($tabla, $item, $valor);
                return $respuesta;
            }
        }

        #Actualizar marca
        public function actualizarMarcaController(){
            $tabla = "pro_marca";
            if(isset($_POST["nameTrademark"]) && isset($_POST["hidden-idtrademark"])){
                $datosController = array(
                    "marca" => $_POST["nameTrademark"], 
                    "idpro_marca" => $_POST["hidden-idtrademark"]);
                
                $respuesta = Datos::actualizarMarcaModel($datosController, $tabla);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=marca&not2=true";
                        </script>';
                }else{
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=marca";
                        </script>';
                }
            }
        }

        #Quitar Marca
        public function quitarMarcaController(){
            if (isset($_POST["removeTrademark"])) {
                $tabla = "pro_marca";
                $valor = $_POST["removeTrademark"];
                $respuesta = Datos::quitarMarcaModel($tabla, $valor);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=marca&not3=true";
                        </script>';
                }
                return $respuesta;
            }
        }

        #Seleccionar Categorías
        static public function categoriaController($valor){
            $tabla = "pro_categoria";
            $respuesta = Datos::categoriaModel($tabla, $valor);
            return $respuesta;
        }

        #Registrar Marca
        static public function registrarMarcaController(){
            $tabla = "pro_marca";
            if(isset($_POST["nameTrademark"])){
                $valor = $_POST["nameTrademark"];
                
                $respuesta = Datos::registrarMarcaModel($valor, $tabla);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=marcaRegistrar";
                        </script>';
                }else{
                    echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';
                    echo '<div><span>No se pudo registrar</span></div>';
                    echo '<div><span>verifique sus datos</span></div>';
                }
            }
        }

        #Registrar Proveedor
        static public function registrarProveedorController(){
            $tabla = "user";
            if(isset($_POST["nameProvider"])){
                $valor = $_POST["nameProvider"];
                
                $respuesta = Datos::registrarProveedorModel($valor, $tabla);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=proveedorRegistrar";
                        </script>';
                }else{
                    echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';
                    echo '<div><span>No se pudo registrar</span></div>';
                    echo '<div><span>verifique sus datos</span></div>';
                }
            }
        }

        #Seleccionar Productos
        static public function seleccionarProveedorController($item, $valor){
            if ($item == null && $valor == null) {
                $respuesta = Datos::seleccionarProveedorModel(null, $item, $valor);
                return $respuesta;
            }else{
                $tabla = "pro";
                $respuesta = Datos::seleccionarProveedorModel($tabla, $item, $valor);
                return $respuesta;
            }
        }

        #Registrar Compra
        static public function registrarCompraController(){
            $tabla = "compra";
            if (isset($_POST["codeBuy"])) {
                $datosController = array(
                    "folio" => $_POST["codeBuy"], 
                    "proveedor" => $_POST["provider"] 
                );
                $verificarCompra = Datos::verificarCompraModel($tabla, $datosController);
                if ($verificarCompra >= 1) {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=compras&not6=true";
                        </script>';
                }else{
                    $ticket = null;
                    $respuesta = Datos::registrarCompraModel($tabla, $datosController);
                    $respuesta = Datos::seleccionarCompraModel($tabla, $datosController, $ticket);
                    $ticket = $compra["idcompra"];
                    if ($respuesta == "ok") {
                        echo '<script>
                                if(window.history.replaceState){
                                    window.history.replaceState(null, null, window.location.href);
                                }
                                window.location = "index.php?action=productoEntrada&into='.$ticket.'";
                            </script>';
                    }else{
                        echo '<script>
                                if(window.history.replaceState){
                                    window.history.replaceState(null, null, window.location.href);
                                }
                            </script>';
                        echo '<div><span>No se pudo registrar</span></div>';
                        echo '<div><span>verifique sus datos</span></div>';
                    }
                }
            }
        }

        #Seleccionar Compra
        static public function seleccionarCompraController($ticket){
            $datosController = null;
            $tabla = "compra";
            $respuesta = Datos::seleccionarCompraModel($tabla, $datosController, $ticket);
            return $respuesta;
        }

        #Seleccionar Compras
        static public function seleccionarComprasController(){
            $tabla = "compra";
            $respuesta = Datos::seleccionarComprasModel($tabla);
            return $respuesta;
        }
        
        #Recuperar Compra
        static public function recuperarCompraController($valor){
            $tabla = "compra";
            $respuesta = Datos::recuperarCompraModel($tabla, $valor);
            return $respuesta;
        }

        #Detalle Compra
        static public function detalleCompraController($valor){
            $tabla = "compra";
            $respuesta = Datos::detalleCompraModel($tabla, $valor);
            return $respuesta;
        }
        
        #Detalle Compra Producto
        static public function detalleCPController($valor){
            $tabla = "compra_entrada";
            $respuesta = Datos::detalleCPModel($tabla, $valor);
            return $respuesta;
        }

        #Quitar Entrada
        public function quitarEntradaController($ticket){
            if (isset($_POST["removeIntro"]) && isset($_POST["ticket"])) {
                $ticket = $_POST["ticket"];
                $tabla = "compra_entrada";
                $valor = $_POST["removeIntro"];
                $respuesta = Datos::quitarEntradaModel($tabla, $valor);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoEntrada&into='.$ticket.'&not3=true";
                        </script>';
                }
                return $respuesta;
            }
        }
        
        #Quitar Entrada Update
        public function uQuitarEntradaController(){
            if (isset($_POST["removeIntro"])) {
                $tabla = "compra_entrada";
                $valor = $_POST["removeIntro"];
                $respuesta = Datos::quitarEntradaModel($tabla, $valor);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=compraEditar&not3=true";
                        </script>';
                }
                return $respuesta;
            }
        }

        #Concluir compra
        public function compraFinalizadaController($item, $valor){
            $tabla = "compra";
            $respuesta = Datos::compraFinalizadaModel($item, $valor, $tabla);
            if ($respuesta == "ok") {
                echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                        window.location = "index.php?action=productoCompra&not1=true";
                    </script>';
            }else{
                echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                        window.location = "index.php?action=productoCompra";
                    </script>';
            }
        }

        #Registrar Entrada
        static public function registrarEntradaController($ticket){
            $tabla = "compra_entrada";
            if(isset($_POST["hiddenCompra"]) && isset($_POST["ticket"])){
                $ticket = $_POST["ticket"];
                $datosController = array(
                    "compra" => $_POST["hiddenCompra"], 
                    "producto" => $_POST["product"], 
                    "precioCompra" => $_POST["buyPrice"], 
                    "cantidad" => $_POST["cuantity"]);
                
                $respuesta = Datos::registrarEntradaModel($datosController, $tabla);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoEntrada&into='.$ticket.'&not0=true";
                        </script>';
                }else{
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                        </script>';
                    echo '<div><span>Error al registrar</span></div>';
                    echo '<div><span>verifique sus datos</span></div>';
                }
            }
        }
        
        #Registrar Entrada Update
        static public function uRegistrarEntradaController(){
            $tabla = "compra_entrada";
            if(isset($_POST["hiddenCompra"])){
                $datosController = array(
                    "compra" => $_POST["hiddenCompra"], 
                    "producto" => $_POST["product"], 
                    "precioCompra" => $_POST["buyPrice"], 
                    "cantidad" => $_POST["cuantity"]);
                
                $respuesta = Datos::registrarEntradaModel($datosController, $tabla);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=compraEditar&not0=true";
                        </script>';
                }else{
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                        </script>';
                    echo '<div><span>Error al registrar</span></div>';
                    echo '<div><span>verifique sus datos</span></div>';
                }
            }
        }

        #Registrar usuario
        static public function registrarUsuarioController($tipoUsuario){
            $tabla = "user";
            if(isset($_POST["name-user"])){
                if ($_POST["password-user"] != $_POST["repassword-user"]) {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                        </script>';
                    echo '<div><span>Error!</span></div>';
                    echo '<div><span>Las contraseñas no coinciden</span></div>';
                }else {
                    if ($tipoUsuario = 3) {
                        $datosController = array(
                            "nombre" => $_POST["name-user"], 
                            "apellidos" => $_POST["ape-user"], 
                            "correo" => $_POST["correo-user"], 
                            "contrasena" => $_POST["password-user"]);
                        
                        $respuesta = Datos::registrarUsuarioModel($datosController, $tabla, $tipoUsuario);
                        if ($respuesta == "ok") {
                            echo '<script>
                                    if(window.history.replaceState){
                                        window.history.replaceState(null, null, window.location.href);
                                    }
                                    window.location = "index.php?action=usuarioInicioSession";
                                </script>';
                        }else{
                            echo '<script>
                                    if(window.history.replaceState){
                                        window.history.replaceState(null, null, window.location.href);
                                    }
                                </script>';
                            echo '<div><span>Error!</span></div>';
                            echo '<div><span>verifique sus datos</span></div>';
                        }
                    }     
                }
                  
            }
        }

        #Inicio Sesion de usuario
        public function inicioSesionUsuarioController(){
            if (isset($_POST["email-user"])) {
                $tabla = "user";
                $valor = $_POST["email-user"];
                $respuesta = Datos::inicioSesionUsuarioModel($tabla, $valor);

                if ($respuesta["usuario"] == $_POST["email-user"] && $respuesta["contrasena"] == $_POST["password-user"]) {
                    $_SESSION["ingresoVerificado"] = "ok";
                    $_SESSION["identity"] = $respuesta["nombre"];
                    if ($respuesta["tipo"] == 0) {
                        $_SESSION["access"] = "master";
                    }elseif ($respuesta["tipo"] == 1) {
                        $_SESSION["access"] = "invite";
                    }elseif ($respuesta["tipo"] == 3) {
                        $_SESSION["access"] = "user";
                    }
                    echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                        window.location = "index.php?action=inicio";
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