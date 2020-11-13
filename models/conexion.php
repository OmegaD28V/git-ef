<?php
    class Conexion{
        public function conectar(){
            $holaMundo = "f1ltr0 Moment4Ne0";
            $pdo = new PDO('mysql:host=localhost:3306;dbname=e_f;charset=utf8', 'cliente_ef', $holaMundo);
            // $pdo = new PDO('mysql:host=localhost:3306;dbname=puntodeventa_sony', 'cliente_sony', '1234');
            return $pdo;
        }
    }