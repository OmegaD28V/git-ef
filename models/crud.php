<?php
    require_once "conexion.php";

    class Datos extends Conexion{
        #Registro de productos
        static public function registrarProductoModel($datosModel, $tabla){
            $stmt = Conexion::conectar() -> prepare(
                "insert into $tabla (idcategoria, nombre, precioventa) 
                 values ( :idcategoria, :nombre, :precioventa);"
            );

            $stmt -> bindParam(":idcategoria", $datosModel["idcategoria"], PDO::PARAM_INT);
            $stmt -> bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":precioventa", $datosModel["precioventa"], PDO::PARAM_STR);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }
        
        #Actualizar productos
        static public function actualizarProductoModel($datosModel, $tabla){
            $stmt = Conexion::conectar() -> prepare(
                "update $tabla set idcategoria=:idcategoria, nombre=:nombre, precioventa=:precioventa 
                where idproducto=:idproducto;"
            );

            $stmt -> bindParam(":idcategoria", $datosModel["idcategoria"], PDO::PARAM_INT);
            $stmt -> bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":precioventa", $datosModel["precioventa"], PDO::PARAM_INT);
            $stmt -> bindParam(":idproducto", $datosModel["idproducto"], PDO::PARAM_STR);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }
        
        #Eliminar productos
        static public function eliminarProductoModel($tabla, $valor){
            $stmt = Conexion::conectar() -> prepare(
                "delete from $tabla where idproducto = :idproducto;"
            );

            $stmt -> bindParam(":idproducto", $valor, PDO::PARAM_STR);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }
        
        #Seleccionar categorias
        static public function seleccionarCategoriaModel($tabla){
            $stmt = Conexion::conectar() -> prepare("select * from $tabla order by categoria asc;");
            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
        }
        
        #Seleccionar categoria
        static public function categoriaModel($tabla, $valor){
            $stmt = Conexion::conectar() -> prepare("select * from $tabla where idcategoria = :idcategoria;");
            $stmt -> bindParam(":idcategoria", $valor, PDO::PARAM_INT);
            $stmt -> execute();
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }
        
        #Seleccionar productos
        static public function seleccionarProductoModel($tabla, $item, $valor){
            if ($item == null && $valor == null) {
                $stmt = Conexion::conectar() -> prepare("select c.idcategoria, c.categoria, p.idproducto, p.nombre, p.precioventa from $tabla p
                inner join categoria c on p.idcategoria = c.idcategoria;");
                $stmt -> execute();
                return $stmt -> fetchAll();
                $stmt -> close();
                $stmt = null;
            }else{
                $stmt = Conexion::conectar() -> prepare("select c.idcategoria, c.categoria, p.idproducto, p.nombre, p.precioventa from $tabla p
                inner join categoria c on p.idcategoria = c.idcategoria where $item = :$item;");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetch();
                $stmt -> close();
                $stmt = null;
            }
            
        }
        
        #Seleccionar productos por categoria
        static public function seleccionarProductoCategoriaModel($tabla, $item, $valor){
            // if ($item == null && $valor == null) {
            //     $stmt = Conexion::conectar() -> prepare("select c.idcategoria, c.categoria, p.idproducto, p.nombre, p.precioventa from $tabla p
            //     inner join categoria c on p.idcategoria = c.idcategoria;");
            //     $stmt -> execute();
            //     return $stmt -> fetchAll();
            //     $stmt -> close();
            //     $stmt = null;
            // }else{
                $stmt = Conexion::conectar() -> prepare("select c.idcategoria, c.categoria, p.idproducto, p.nombre, p.precioventa from $tabla p
                inner join categoria c on p.idcategoria = c.idcategoria where p.idcategoria = :$item;");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetchAll();
                $stmt -> close();
                $stmt = null;
            // }
            
        }

        #Registro de usuario
        static public function registrarUsuarioModel($datosModel, $tabla){
            $stmt = Conexion::conectar() -> prepare(
                "insert into $tabla (nombre, apellidos, correo, fecha, contrasena) 
                 values (:nombre, :apellidos, :correo, now(), :contrasena);"
            );

            $stmt -> bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":apellidos", $datosModel["apellidos"], PDO::PARAM_STR);
            $stmt -> bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
            $stmt -> bindParam(":contrasena", $datosModel["contrasena"], PDO::PARAM_STR);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }
        
        #Inicio sesion de usuario
        static public function inicioSesionUsuarioModel($tabla, $valor){
            $stmt = Conexion::conectar() -> prepare(
                "select *, DATE_FORMAT(fecha, '%d/%m/%Y') fecha from $tabla where correo = :correo;"
            );

            $stmt -> bindParam(":correo", $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }
    }
?>