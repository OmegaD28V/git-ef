<?php
    require_once "../models/crud.php";
    require_once "../controllers/controller.php";

    #Clase de Ajax.
    class Ajax{
        public $validEmail;
        public $validPro;
        public $pro;
        public $proFPrice;
        public $strSearch;

        #Validación Email.
        public function validEmailAjax(){
            $valor = $this -> validEmail;
            $respuesta = MvcController::seleccionarUsuariosController($valor, null, null);
            echo json_encode($respuesta);
        }
        
        #Validación Producto.
        public function validProAjax(){
            $valor = $this -> validPro;
            $respuesta = MvcController::validProController($valor);
            echo json_encode($respuesta);
        }
        
        #Validación precio.
        public function proAjax(){
            $valor = $this -> pro;
            $r = MvcController::seleccionarProPrecioMinimoController($valor);
            echo json_encode($r);
        }
        
        #Obtener precio de venta.
        public function proFPriceAjax(){
            $valor = $this -> proFPrice;
            $r = MvcController::seleccionarProPrecioExistenciaController($valor);
            echo json_encode($r);
        }
        
        #Búsqueda.
        public function strSearchAjax(){
            $valor = $this -> strSearch;
            $r = MvcController::buscarProController($valor);
            echo json_encode($r);
        }
    }

    #Objeto de Ajax que recibe la variable post.
    if (isset($_POST["validEmail"])) {
        $objValidEmail = new Ajax();
        $objValidEmail -> validEmail = $_POST["validEmail"];
        $objValidEmail -> validEmailAjax();
    }
    
    #Objeto de Ajax que recibe la variable post.
    if (isset($_POST["validPro"])) {
        $objValidPro = new Ajax();
        $objValidPro -> validPro = $_POST["validPro"];
        $objValidPro -> validProAjax();
    }
    
    #Objeto de Ajax que recibe la variable post.
    if (isset($_POST["pro"])) {
        $objPro = new Ajax();
        $objPro -> pro = $_POST["pro"];
        $objPro -> proAjax();
    }
    
    #Objeto de Ajax que recibe la variable post.
    if (isset($_POST["proFPrice"])) {
        $objProFPrice = new Ajax();
        $objProFPrice -> proFPrice = $_POST["proFPrice"];
        $objProFPrice -> proFPriceAjax();
    }

    #Objeto de Ajax que recibe la variable post.
    if (isset($_POST["strSearch"])) {
        $objStrSearch = new Ajax();
        $objStrSearch -> strSearch = $_POST["strSearch"];
        $objStrSearch -> strSearchAjax();
    }
    
?>