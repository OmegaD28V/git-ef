<?php
    class Conexion{
        public function conectar(){
            $holaMundo = "f1ltr0 Moment4Ne0";
            $mysqli = new PDO('mysql:host=localhost:3306;dbname=electronica_fonseca', 'cliente_ef', $holaMundo);
            // $mysqli = new PDO('mysql:host=localhost:3306;dbname=puntodeventa_sony', 'cliente_sony', '1234');
            return $mysqli;
        }
    }
?>