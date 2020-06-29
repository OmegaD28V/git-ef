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
            if (isset($_POST["categoryProduct"])) {
                if (
                    preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,20}+$/", $_POST["codeProduct"]) && 
                    preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,100}+$/", $_POST["nameProduct"]) && 
                    preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}+$/", $_POST["modelProduct"]) && 
                    preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ,.-_ ]{1,250}+$/m", $_POST["descriptionProduct"])
                ) {
                    $tabla = "pro";
                    $datosController = array(
                        "idpro_categoria" => $_POST["categoryProduct"], 
                        "idpro_marca" => $_POST["trademarkProduct"], 
                        "codigo" => $_POST["codeProduct"], 
                        "nombre" => $_POST["nameProduct"], 
                        "modelo" => $_POST["modelProduct"],
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
                }else {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoRegistrar&err=pr";
                        </script>';
                }
            }
        }
        
        #Actualizar productos
        public function actualizarProductoController(){
            $tabla = "pro";
            if(isset($_POST["uCategory"])){
                if (
                    preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,20}+$/", $_POST["uCode"]) && 
                    preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,100}+$/", $_POST["uNameProduct"]) && 
                    preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}+$/", $_POST["uModel"]) && 
                    preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ,.-_ ]{1,250}+$/m", $_POST["uDescription"])
                ) {
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
                            window.location = "index.php?action=productoInicio&err=ep";
                        </script>';
                    }
                }else{
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoInicio&err=ep";
                        </script>';
                }
            }
        }

        #Actualizar Precio Producto
        public function actualizarProPrecioController(){
            if(isset($_POST["idpro"]) && isset($_POST["uPriceSellProduct"])){
                $tabla = "pro_precio";
                if (preg_match("/^[0-9.]{1,9}+$/", $_POST["uPriceSellProduct"])) {
                    $datosController = array(
                        "precio" => $_POST["uPriceSellProduct"], 
                        "idpro" => $_POST["idpro"]);
                    
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
                }else {
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

        #Registrar Característica.
        static public function regCaracteristicaController(){
            if (isset($_POST["idpro"]) && isset($_POST["featureProduct"])) {
                if (preg_match("/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\W ]{1,150}+$/", $_POST["featureProduct"])) {
                    $tabla = "pro_caracteristica";
                    $datos = array(
                        "idpro" => $_POST["idpro"], 
                        "caracteristica" => $_POST["featureProduct"]
                    );

                    $respuesta = Datos::regCaracteristicaModel($tabla, $datos);

                    if ($respuesta == "ok") {
                        echo '<script>
                                if(window.history.replaceState){
                                    window.history.replaceState(null, null, window.location.href);
                                }
                                window.location = "index.php?action=productoCaracteristica&pFts='.$datos["idpro"].'&not0=true";
                            </script>';
                    }else {
                        echo '<script>
                                if(window.history.replaceState){
                                    window.history.replaceState(null, null, window.location.href);
                                }
                                window.location = "index.php?action=productoCaracteristica&pFts='.$datos["idpro"].'&not0=false";
                            </script>';
                    }
                }else{
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoCaracteristica&pFts='.$datos["idpro"].'&not0=false";
                        </script>';
                }
            }
        }

        #Seleccionar Características.
        static public function seleccionarCaracteristicasController($pro, $item){
            $tabla = "pro_caracteristica";
            $respuesta = Datos::seleccionarCaracteristicasModel($tabla, $pro, $item);
            return $respuesta;
        }

        #Actualizar Característica.
        public function actualCaracteristicaController(){
            if (isset($_POST["uFeature"]) && isset($_POST["uHFeature"]) && $_POST["pro"]) {
                $tabla = "pro_caracteristica";
                $datos = array(
                    "id" => $_POST["uHFeature"], 
                    "caracteristica" => $_POST["uFeature"], 
                    "pro" => $_POST["pro"]
                );

                $respuesta = Datos::actualCaracteristicaModel($tabla, $datos);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoCaracteristica&pFts='.$datos["pro"].'&not2=true";
                        </script>';
                }else {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoCaracteristica";
                        </script>';
                }
            }
        }

        #Seleccionar producto para características o imágenes.
        static public function productoController($valor){
            $tabla = "pro";
            $respuesta = Datos::productoModel($tabla, $valor);
            return $respuesta;
        }

        #Quitar Característica.
        public function quitarCaracteristicaController(){
            if (isset($_POST["removeFeature"]) && isset($_POST["pro"])) {
                $tabla = "pro_caracteristica";
                $valor = $_POST["removeFeature"];
                $respuesta = Datos::quitarCaracteristicaModel($tabla, $valor);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoCaracteristica&pFts='.$_POST["pro"].'&not3=true";
                        </script>';
                }
                return $respuesta;
            }
        }

        #Subir Imagen de producto.
        static public function subirImgProController(){
            if (isset($_POST["pro"])) {
                $pro = $_POST["pro"];
                if (isset($_FILES["imageProduct"]["tmp_name"]) && !empty($_FILES["imageProduct"]["tmp_name"])) {
                    list($ancho, $alto) = getimagesize($_FILES["imageProduct"]["tmp_name"]);
                    // $ancho = 240;
                    // $alto = 300;
                    $rutaSave = "views/img/pro/";
    
                    #Funciones para imagenes.
                    if ($_FILES["imageProduct"]["type"] == "image/jpeg") {
                        $random = mt_rand(100, 9999);
                        $rutaFile = $rutaSave.$random.".jpg";
                        $origen = imagecreatefromjpeg($_FILES["imageProduct"]["tmp_name"]);
                        $destino = imagecreatetruecolor($ancho, $alto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $ancho, $alto, $ancho, $alto);
                        imagejpeg($destino, $rutaFile);
                    }elseif ($_FILES["imageProduct"]["type"] == "image/png") {
                        $random = mt_rand(100, 9999);
                        $rutaFile = $rutaSave.$random.".png";
                        $origen = imagecreatefrompng($_FILES["imageProduct"]["tmp_name"]);
                        $destino = imagecreatetruecolor($ancho, $alto);
                        imagealphablending($destino, FALSE);
                        imagesavealpha($destino, TRUE);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $ancho, $alto, $ancho, $alto);
                        imagepng($destino, $rutaFile);
                    }else{
                        return "invalid";
                    }
                    $tabla = "pro_imagen";
                    $archivo = $rutaFile;
                    $respuesta = Datos::subirImgProModel($tabla, $archivo, $pro);
                    if ($respuesta == "ok") {
                        echo '<script>
                                if(window.history.replaceState){
                                    window.history.replaceState(null, null, window.location.href);
                                }
                                window.location = "index.php?action=productoImagenes&pPic='.$pro.'&notiU=true";
                            </script>';
                    }else {
                        echo '<script>
                                if(window.history.replaceState){
                                    window.history.replaceState(null, null, window.location.href);
                                }
                                window.location = "index.php?action=productoImagenes&pPic='.$pro.'&notx=true";
                            </script>';
                    }
                }else {
                    // echo '<script>
                    //             if(window.history.replaceState){
                    //                 window.history.replaceState(null, null, window.location.href);
                    //             }
                    //             window.location = "index.php?action=productoImagenes&pPic='.$pro.'&notx=true";
                    //         </script>';
                }
            }
            // echo '<script>
            //             if(window.history.replaceState){
            //                 window.history.replaceState(null, null, window.location.href);
            //             }
            //             window.location = "index.php?action=productoImagenes&pPic='.$pro.'&notx=true";
            //         </script>';
        }

        #ver imagenes del producto
        static public function verImgProController($pro){
            $tabla = "pro_imagen";
            $respuesta = Datos::verImgProModel($tabla, $pro);
            return $respuesta;
        }
        
        #Imagen para ficha
        static public function fichaImagenController($pro){
            $tabla = "pro_imagen";
            $respuesta = Datos::fichaImagenModel($tabla, $pro);
            return $respuesta;
        }

        #Quitar imagen de producto.
        public function quitarImgProController(){
            if (isset($_POST["removePicture"]) && isset($_POST["pro"])) {
                $tabla = "pro_imagen";
                $img = $_POST["removePicture"];
                $pro = $_POST["pro"];
                $respuesta = Datos::quitarImgProModel($tabla, $img);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoImagenes&pPic='.$pro.'&not3=true";
                        </script>';
                }else {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoImagenes&pPic='.$pro.'&notx=true";
                        </script>';
                }
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
                if (preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9-_& ]{1,60}$/", $_POST["nameCategory"])) {
                    
                    $valor = $_POST["nameCategory"];
                    $respuesta = Datos::registrarCategoriaModel($valor, $tabla);
                    if ($respuesta == "ok") {
                        echo '<script>
                                if(window.history.replaceState){
                                    window.history.replaceState(null, null, window.location.href);
                                }
                                window.location = "index.php?action=categoriaRegistrar&not0=true";
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
                }else {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=categoriaRegistrar&err=rc";
                        </script>';
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
                if (preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9-_& ]{1,60}$/", $_POST["nameCategory"])) {
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
                                window.location = "index.php?action=categoria&err=ec";
                            </script>';
                    }
                }else {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=categoria&err=ec";
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

        #Registrar Marca
        static public function registrarMarcaController(){
            $tabla = "pro_marca";
            if(isset($_POST["nameTrademark"])){
                if ((preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9-_& ]{1,60}$/", $_POST["nameTrademark"]))) {
                    $valor = $_POST["nameTrademark"];
                    $respuesta = Datos::registrarMarcaModel($valor, $tabla);
                    if ($respuesta == "ok") {
                        echo '<script>
                                if(window.history.replaceState){
                                    window.history.replaceState(null, null, window.location.href);
                                }
                                window.location = "index.php?action=marcaRegistrar&not0=true";
                            </script>';
                    }else{
                        echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=marcaRegistrar&err=mr";
                        </script>';
                    } 
                }else {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=marcaRegistrar&err=mr";
                        </script>';
                }
                
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
                if ((preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9-_& ]{1,60}$/", $_POST["nameTrademark"]))) {
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
                                window.location = "index.php?action=marca&err=em";
                            </script>';
                    }
                }else {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=marca&err=em";
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
                if (
                    preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9-_ ]{1,20}+$/", $_POST["codeBuy"])
                ) {
                    $datosController = array(
                        "folio" => $_POST["codeBuy"], 
                        "proveedor" => $_POST["provider"] 
                    );
                    $verificarCompra = Datos::verificarCompraModel($tabla, $datosController);
                    if ($verificarCompra["coincide"] >= 1) {
                        echo '<script>
                                if(window.history.replaceState){
                                    window.history.replaceState(null, null, window.location.href);
                                }
                                window.location = "index.php?action=compras&not6=true";
                            </script>';
                    }else{
                        $ticket = null;
                        $registro = Datos::registrarCompraModel($tabla, $datosController);
                        $select = Datos::seleccionarCompraModel($tabla, $datosController, $ticket);
                        $ticket = $select["idcompra"];
                        if ($registro == "ok") {
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
                                    window.location = "index.php?action=productoCompra&err=pc";
                                </script>';
                        }
                    }  
                }else {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoCompra&err=pc";
                        </script>';
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
            if (isset($_POST["removeIntro"]) && isset($_GET["into"])) {
                $ticket = $_GET["into"];
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
        public function uQuitarEntradaController($ticket){
            if (isset($_POST["removeIntro"]) && isset($_GET["into"])) {
                $ticket = $_GET["into"];
                $tabla = "compra_entrada";
                $valor = $_POST["removeIntro"];
                $respuesta = Datos::quitarEntradaModel($tabla, $valor);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=compraEditar&into='.$ticket.'&not3=true";
                        </script>';
                }
                return $respuesta;
            }
        }

        #Quitar Compra sin concluir
        public function quitarCompraController(){
            if (isset($_POST["removeBuy"])) {
                $tabla = "compra";
                $valor = $_POST["removeBuy"];
                $respuesta = Datos::quitarCompraModel($tabla, $valor);
                if ($respuesta == "ok") {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=compras&not3=true";
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
            if(isset($_POST["hiddenCompra"]) && isset($_GET["into"])){
                if (
                    preg_match("/^[0-9]{1,9}+$/", $_POST["buyPrice"]) && 
                    preg_match("/^[0-9]{1,9}+$/", $_POST["cuantity"])
                ) {
                    $ticket = $_GET["into"];
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
                                window.location = "index.php?action=productoEntrada&into='.$ticket.'&err=re";
                            </script>';
                    }   
                }else {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=productoEntrada&into='.$ticket.'&err=re";
                        </script>'; 
                }
            }
        }
        
        #Registrar Entrada Update
        static public function uRegistrarEntradaController($ticket){
            $tabla = "compra_entrada";
            if(isset($_POST["hiddenCompra"]) && isset($_GET["into"])){
                if (
                    preg_match("/^[0-9]{1,9}+$/", $_POST["buyPrice"]) && 
                    preg_match("/^[0-9]{1,9}+$/", $_POST["cuantity"])
                ) {
                    $ticket = $_GET["into"];
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
                                window.location = "index.php?action=compraEditar&into='.$ticket.'&not0=true";
                            </script>';
                    }else{
                        echo '<script>
                                if(window.history.replaceState){
                                    window.history.replaceState(null, null, window.location.href);
                                }
                                window.location = "index.php?action=compraEditar&into='.$ticket.'&err=re";
                            </script>';
                    }  
                }else {
                    echo '<script>
                            if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                            }
                            window.location = "index.php?action=compraEditar&into='.$ticket.'&err=re";
                        </script>';
                }
            }
        }

        #Registrar usuario
        static public function registrarUsuarioController($tipoUsuario){
            if(isset($_POST["name-user"])){
                if ($tipoUsuario == 3) {
                    //Validación de campos en servidor.
                    if (
                        preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,75}+$/", $_POST["name-user"]) && 
                        preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,75}+$/", $_POST["ape-user"]) && 
                        (preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/", $_POST["correo-user"]) || 
                        preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ-_ ]{1,150}+$/", $_POST["correo-user"])) && 
                        preg_match("/^[0-9a-zA-Z ]{4,30}+$/", $_POST["password-user"]) && 
                        preg_match("/^[0-9a-zA-Z ]{4,30}+$/", $_POST["repassword-user"])
                        ) {
                        if ($_POST["password-user"] != $_POST["repassword-user"]) {
                            echo '<script>
                                    if(window.history.replaceState){
                                        window.history.replaceState(null, null, window.location.href);
                                    }
                                </script>';
                            echo '<div><span>Error!</span></div>';
                            echo '<div><span>Las contraseñas no coinciden</span></div>';
                        }else{
                            $tabla = "user";
                            $datosController = array(
                                "nombre" => $_POST["name-user"], 
                                "apellidos" => $_POST["ape-user"], 
                                "correo" => $_POST["correo-user"], 
                                "contrasena" => $_POST["password-user"]
                            );
                            $respuesta = Datos::registrarUsuarioModel($datosController, $tabla, $tipoUsuario);
                            if ($respuesta == "ok") {
                                echo '<script>
                                        if(window.history.replaceState){
                                            window.history.replaceState(null, null, window.location.href);
                                        }
                                        window.location = "index.php?action=usuarioInicioSession&not0=true";
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
                    }else{
                        echo '<script>
                                if(window.history.replaceState){
                                    window.history.replaceState(null, null, window.location.href);
                                }
                                window.location = "index.php?action=usuarioRegistrarse&err=ur";
                            </script>';
                    }
                }if ($tipoUsuario == 33) {
                    if (
                        isset($_POST["name-user"]) && 
                        isset($_POST["ape-user"]) && 
                        isset($_POST["correo-user"]) && 
                        isset($_POST["tel-user"]) && 
                        isset($_POST["val-estado"]) && 
                        isset($_POST["val-municipio"]) && 
                        isset($_POST["val-colonia"]) && 
                        isset($_POST["calle"]) && 
                        isset($_POST["no-casa"]) && 
                        isset($_POST["no-ext"]) && 
                        isset($_POST["entre-calle1"]) && 
                        isset($_POST["entre-calle2"]) && 
                        isset($_POST["ref"])
                    ) {
                        echo '<span>Valido todo</span>';
                        //Validación de campos en servidor.
                        if (
                            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{1,75}+$/", $_POST["name-user"]) && 
                            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{1,75}+$/", $_POST["ape-user"]) && 
                            (preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/", $_POST["correo-user"]) || 
                            preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ._\- ]{1,150}$/", $_POST["correo-user"])) && 
                            preg_match("/^[0-9]{0,10}+$/", $_POST["tel-user"]) && 
                            preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ._\- ]{1,100}$/", $_POST["val-estado"]) && 
                            preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ._\- ]{1,100}$/", $_POST["val-municipio"]) && 
                            preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ._\- ]{1,100}$/", $_POST["val-colonia"]) && 
                            preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ._\- ]{1,100}$/", $_POST["calle"]) && 
                            preg_match("/^[0-9]{0,7}+$/", $_POST["no-casa"]) && 
                            preg_match("/^[0-9]{0,7}+$/", $_POST["no-ext"]) && 
                            preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ._\- ]{0,60}+$/", $_POST["entre-calle1"]) && 
                            preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ._\- ]{0,60}+$/", $_POST["entre-calle2"]) && 
                            preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ.,_\- ]{1,250}$/m", $_POST["ref"])
                            ) {
                            $tabla = "user";
                            $datosController = array(
                                "nombre" => $_POST["name-user"], 
                                "apellidos" => $_POST["ape-user"], 
                                "correo" => $_POST["correo-user"], 
                                "tel" => $_POST["tel-user"], 
                                "estado" => $_POST["val-estado"], 
                                "municipio" => $_POST["val-municipio"], 
                                "colonia" => $_POST["val-colonia"], 
                                "CP" => $_POST["val-CP"], 
                                "calle" => $_POST["calle"], 
                                "no-casa" => $_POST["no-casa"], 
                                "no-ext" => $_POST["no-ext"], 
                                "calle1" => $_POST["entre-calle1"], 
                                "calle2" => $_POST["entre-calle2"], 
                                "ref" => $_POST["ref"]
                            );
                            $respuesta = Datos::registrarUsuarioModel($datosController, $tabla, $tipoUsuario);
                            if ($respuesta == "ok") {
                                echo '<script>
                                        if(window.history.replaceState){
                                            window.history.replaceState(null, null, window.location.href);
                                        }
                                        window.location = "index.php?action=uClienteRegistrar&not0=true";
                                    </script>';
                            }else{
                                echo '<script>
                                        if(window.history.replaceState){
                                            window.history.replaceState(null, null, window.location.href);
                                        }
                                        window.location = "index.php?action=uClienteRegistrar";
                                    </script>';
                                echo '<div><span>Error!</span></div>';
                                echo '<div><span>verifique sus datos</span></div>';
                            }
                        }else{
                            echo '<script>
                                    if(window.history.replaceState){
                                        window.history.replaceState(null, null, window.location.href);
                                    }
                                    window.location = "index.php?action=uClienteRegistrar&err=ur";
                                </script>';
                        }   
                    }
                }
            }
        }
        
        #Actualizar usuario
        static public function actualizarUsuarioController($cli, $idDomicilio, $idPhone, $gestor){
            if(isset($_POST["name-user"])){
                if (
                    isset($_POST["name-user"]) && 
                    isset($_POST["tel-user"]) && 
                    isset($_POST["val-estado"]) && 
                    isset($_POST["val-municipio"]) && 
                    isset($_POST["val-colonia"]) && 
                    isset($_POST["calle"]) && 
                    isset($_POST["no-casa"]) && 
                    isset($_POST["no-ext"]) && 
                    isset($_POST["entre-calle1"]) && 
                    isset($_POST["entre-calle2"]) && 
                    isset($_POST["ref"])
                ) {
                    echo '<span>Valido todo</span>';
                    //Validación de campos en servidor.
                    if (
                        preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ. ]{1,75}+$/", $_POST["name-user"]) && 
                        preg_match("/^[0-9]{0,10}+$/", $_POST["tel-user"]) && 
                        preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ._\- ]{1,100}$/", $_POST["val-estado"]) && 
                        preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ._\- ]{1,100}$/", $_POST["val-municipio"]) && 
                        preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ._\- ]{1,100}$/", $_POST["val-colonia"]) && 
                        preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ._\- ]{1,100}$/", $_POST["calle"]) && 
                        preg_match("/^[0-9]{0,7}+$/", $_POST["no-casa"]) && 
                        preg_match("/^[0-9]{0,7}+$/", $_POST["no-ext"]) && 
                        preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ._\- ]{0,60}+$/", $_POST["entre-calle1"]) && 
                        preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ._\- ]{0,60}+$/", $_POST["entre-calle2"]) && 
                        preg_match("/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ.,_\- ]{1,250}$/m", $_POST["ref"])
                        ) {
                        $tabla = "user";
                        $datosController = array(
                            "nombre" => $_POST["name-user"], 
                            "tel" => $_POST["tel-user"], 
                            "estado" => $_POST["val-estado"], 
                            "municipio" => $_POST["val-municipio"], 
                            "colonia" => $_POST["val-colonia"], 
                            "calle" => $_POST["calle"], 
                            "no-casa" => $_POST["no-casa"], 
                            "no-ext" => $_POST["no-ext"], 
                            "calle1" => $_POST["entre-calle1"], 
                            "calle2" => $_POST["entre-calle2"], 
                            "ref" => $_POST["ref"]
                        );
                        $respuesta = Datos::actualizarUsuarioModel($datosController, $tabla, $cli, $idDomicilio, $idPhone, $gestor);
                        if ($respuesta == "ok") {
                            echo '<script>
                                    if(window.history.replaceState){
                                        window.history.replaceState(null, null, window.location.href);
                                    }
                                    window.location = "index.php?action=clientes&not0=true";
                                </script>';
                        }else{
                            echo '<script>
                                    if(window.history.replaceState){
                                        window.history.replaceState(null, null, window.location.href);
                                    }
                                    window.location = "index.php?action=clienteEditar&cliD='.$cli.'";
                                </script>';
                            echo '<div><span>Error!</span></div>';
                            echo '<div><span>verifique sus datos</span></div>';
                        }
                    }else{
                        echo '<script>
                                if(window.history.replaceState){
                                    window.history.replaceState(null, null, window.location.href);
                                }
                                window.location = "index.php?action=clienteEditar&cliD='.$cli.'&err=ur";
                            </script>';
                    }   
                }
            }
        }

        #Seleccionar todos los usuarios.
        static public function seleccionarUsuariosController($valor){
            $tabla = "user";
            $respuesta = Datos::seleccionarUsuariosModel($tabla, $valor);
            return $respuesta;
        }
        
        #Seleccionar domicilio de usuario.
        static public function clienteDomicilioController($user, $valor){
            $tabla = "user_domicilio";
            $respuesta = Datos::clienteDomicilioModel($tabla, $user, $valor);
            return $respuesta;
        }
        
        #Seleccionar correo de usuario.
        static public function clienteCorreoController($user, $valor){
            $tabla = "user_correo";
            $respuesta = Datos::clienteCorreoModel($tabla, $user, $valor);
            return $respuesta;
        }
        
        #Seleccionar telefono de usuario.
        static public function clientePhoneController($user, $valor){
            $tabla = "user_telefono";
            $respuesta = Datos::clientePhoneModel($tabla, $user, $valor);
            return $respuesta;
        }
        
        #Seleccionar usuario.
        static public function seleccionarUsuarioController($user, $tipo){
            $tabla = "user";
            $respuesta = Datos::seleccionarUsuarioModel($tabla, $user, $tipo);
            return $respuesta;
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
                        window.location = "index.php?action=usuarioInicioSession&err=ul";
                    </script>';
                    // echo '<div><span>No se pudo iniciar sesión</span></div>';
                    // echo '<div><span>verifique sus datos</span></div>';
                }
            }
        }    

        #Validaciones de Ajax de esta línea hacia abajo.
        #Validar Nombre de usuario.
        // static public function validNameController($valor){
        //     if (preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/", $valor)){
        //             $respuesta = "ok";
        //         }else {
        //             $respuesta = "error";
        //         }
        //     return $respuesta;
        // }
        
        // #Validar Apellido de usuario.
        // static public function validApeController($valor){
        //     if (preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/", $valor)){
        //             $respuesta = "ok";
        //         }else {
        //             $respuesta = "error";
        //         }
        //     return $respuesta;
        // }

    }