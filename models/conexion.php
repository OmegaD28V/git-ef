<?php
    class Conexion{
        public function conectar(){
            $mysqli = new PDO('mysql:host=localhost:3306;dbname=puntodeventa_sony', 'cliente_sony', '1234');
            return $mysqli;
        }
    }
?>