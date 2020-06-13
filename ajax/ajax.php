<?php
    require_once "../models/crud.php";
    require_once "../controllers/controller.php";

    #Clase de Ajax.
    class Ajax{
        public $validEmail;
        #Validación Email.
        public function validEmailAjax(){
            $valor = $this->validEmail;
            $respuesta = MvcController::seleccionarUsuariosController($valor);
            echo json_encode($respuesta);
        }
    }

    #Objeto de Ajax que recibe la variable post.
    if (isset($_POST["validEmail"])) {
        $objValidEmail = new Ajax();
        $objValidEmail -> validEmail = $_POST["validEmail"];
        $objValidEmail -> validEmailAjax();
    }
    
?>