<?php
    require_once "../models/crud.php";
    require_once "../controllers/controller.php";

    #Clase de Ajax.
    class Ajax{
        public $validEmail;
        public $pro;
        // public $validName;
        // public $validApe;

        #Validación Email.
        public function validEmailAjax(){
            $valor = $this -> validEmail;
            $respuesta = MvcController::seleccionarUsuariosController($valor);
            echo json_encode($respuesta);
        }
        
        #Validación precio.
        public function proAjax(){
            $valor = $this -> pro;
            $r = MvcController::seleccionarProPrecioController($valor);
            echo json_encode($r);
        }
        
        // #Validación Nombre.
        // public function validNameAjax(){
        //     $valor = $this -> validName;
        //     $respuesta = MvcController::validNameController($valor);
        //     echo json_encode($respuesta);
        // }
        
        // #Validación Apellido.
        // public function validApeAjax(){
        //     $valor = $this -> validApe;
        //     $respuesta = MvcController::validApeController($valor);
        //     echo json_encode($respuesta);
        // }
    }

    #Objeto de Ajax que recibe la variable post.
    if (isset($_POST["validEmail"])) {
        $objValidEmail = new Ajax();
        $objValidEmail -> validEmail = $_POST["validEmail"];
        $objValidEmail -> validEmailAjax();
    }
    
    #Objeto de Ajax que recibe la variable post.
    if (isset($_POST["pro"])) {
        $objPro = new Ajax();
        $objPro -> pro = $_POST["pro"];
        $objPro -> proAjax();
    }
    
    // #Objeto de Ajax que recibe la variable post.
    // if (isset($_POST["validName"])) {
    //     $objValidName = new Ajax();
    //     $objValidName -> validName = $_POST["validName"];
    //     $objValidName -> validNameAjax();
    // }
    
    // #Objeto de Ajax que recibe la variable post.
    // if (isset($_POST["validApe"])) {
    //     $objValidApe = new Ajax();
    //     $objValidApe -> validApe = $_POST["validApe"];
    //     $objValidApe -> validApeAjax();
    // }
    
?>