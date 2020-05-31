<?php
    require_once "conexion.php";

    class Datos extends Conexion{
        #Registro de productos
        static public function registrarProductoModel($datosModel, $tabla){
            $stmt = Conexion::conectar() -> prepare(
                "insert into $tabla (idpro_categoria, idpro_marca, codigo, nombre, modelo, descripcion, existencia) 
                values (:idpro_categoria, :idpro_marca, :codigo, :nombre, :modelo, :descripcion, 0);"
            );

            $stmt -> bindParam(":idpro_categoria", $datosModel["idpro_categoria"], PDO::PARAM_INT);
            $stmt -> bindParam(":idpro_marca", $datosModel["idpro_marca"], PDO::PARAM_INT);
            $stmt -> bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
            $stmt -> bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":modelo", $datosModel["modelo"], PDO::PARAM_STR);
            $stmt -> bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);

            $stmt -> execute();

            $stmt2 = Conexion::conectar() -> prepare(
                "select idpro from pro where status = 3 and existencia = 0;"
            );

            $stmt2 -> execute();
            $result = $stmt2 -> fetch();
            $pro = $result["idpro"];
            $precio = $datosModel["precioventa"];
            
            $stmt3 = Conexion::conectar() -> prepare(
                "insert into pro_precio (idpro, tipo, precio) 
                values (:pro, 1, :precio);"
            );
            $stmt3 -> bindParam(":pro", $pro, PDO::PARAM_INT);
            $stmt3 -> bindParam(":precio", $precio, PDO::PARAM_INT);
            $stmt3 -> execute();

            $stmt4 = Conexion::conectar() -> prepare(
                "update pro set status = 2 where idpro = :pro;"
            );
            $stmt4 -> bindParam(":pro", $pro, PDO::PARAM_INT);

            if($stmt4 -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt2 -> close();
            $stmt3 -> close();
            $stmt4 -> close();
            $stmt = null;
            $stmt2 = null;
            $stmt3 = null;
            $stmt4 = null;
        }
        
        #Actualizar productos
        static public function actualizarProductoModel($datosModel, $tabla){
            $stmt = Conexion::conectar() -> prepare(
                "update $tabla set idpro_categoria = :idpro_categoria, 
                idpro_marca = :idpro_marca, codigo = :codigo, nombre = :nombre, 
                modelo = :modelo, descripcion = :descripcion 
                where idpro = :idpro;"
            );

            $stmt -> bindParam(":idpro_categoria", $datosModel["idpro_categoria"], PDO::PARAM_INT);
            $stmt -> bindParam(":idpro_marca", $datosModel["idpro_marca"], PDO::PARAM_INT);
            $stmt -> bindParam(":codigo", $datosModel["codigo"], PDO::PARAM_STR);
            $stmt -> bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":modelo", $datosModel["modelo"], PDO::PARAM_STR);
            $stmt -> bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
            $stmt -> bindParam(":idpro", $datosModel["idpro"], PDO::PARAM_INT);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }
        
        #Actualizar Precio Producto
        static public function actualizarProPrecioModel($datosModel, $tabla){
            $stmt = Conexion::conectar() -> prepare(
                "update $tabla set precio = :precio where idpro = :idpro and tipo = 1;"
            );

            $stmt -> bindParam(":precio", $datosModel["precio"], PDO::PARAM_INT);
            $stmt -> bindParam(":idpro", $datosModel["idpro"], PDO::PARAM_INT);

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
                "update $tabla set status = 0 where idpro = :idpro;"
            );

            $stmt -> bindParam(":idpro", $valor, PDO::PARAM_STR);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }
        
        #Restaurar productos
        static public function restaurarProductoModel($tabla, $valor){
            $stmt = Conexion::conectar() -> prepare(
                "update $tabla set status = 1 where idpro = :idpro;"
            );

            $stmt -> bindParam(":idpro", $valor, PDO::PARAM_STR);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }

        #Registro de categorias
        static public function registrarCategoriaModel($valor, $tabla){
            $stmt = Conexion::conectar() -> prepare(
                "insert into $tabla (categoria) 
                values (:categoria);"
            );

            $stmt -> bindParam(":categoria", $valor, PDO::PARAM_STR);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }
        
        #Seleccionar categorias
        static public function seleccionarCategoriaModel($tabla, $item, $valor){
            if ($item == null && $valor == null) {
                $stmt = Conexion::conectar() -> prepare("select idpro_categoria, categoria 
                from $tabla where status = 1 order by categoria asc;");
                $stmt -> execute();
                return $stmt -> fetchAll();
                $stmt -> close();
                $stmt = null;
            }else {
                $stmt = Conexion::conectar() -> prepare("select idpro_categoria, categoria 
                from $tabla where $item = :$item order by categoria asc;");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
                $stmt -> execute();
                return $stmt -> fetch();
                $stmt -> close();
                $stmt = null;   
            }
        }

        #Actualizar categoria
        static public function actualizarCategoriaModel($datosModel, $tabla){
            $stmt = Conexion::conectar() -> prepare(
                "update $tabla set categoria = :categoria where idpro_categoria = :idpro_categoria;"
            );

            $stmt -> bindParam(":categoria", $datosModel["categoria"], PDO::PARAM_STR);
            $stmt -> bindParam(":idpro_categoria", $datosModel["idpro_categoria"], PDO::PARAM_INT);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }

        #Quitar Categoria
        static public function quitarCategoriaModel($tabla, $valor){
            $stmt = Conexion::conectar() -> prepare(
                "update $tabla set status = 0 where idpro_categoria = :idpro_categoria;"
            );

            $stmt -> bindParam(":idpro_categoria", $valor, PDO::PARAM_INT);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }
        
        #Seleccionar marcas
        static public function seleccionarMarcaModel($tabla, $item, $valor){
            if ($item == null && $valor == null) {
                $stmt = Conexion::conectar() -> prepare("select idpro_marca, marca from $tabla 
                where status = 1 order by marca asc;");
                $stmt -> execute();
                return $stmt -> fetchAll();
                $stmt -> close();
                $stmt = null;
            }else {
                $stmt = Conexion::conectar() -> prepare("select idpro_marca, marca from $tabla 
                where $item = :$item;");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
                $stmt -> execute();
                return $stmt -> fetch();
                $stmt -> close();
                $stmt = null;               
            }
        }

        #Actualizar marca
        static public function actualizarMarcaModel($datosModel, $tabla){
            $stmt = Conexion::conectar() -> prepare(
                "update $tabla set marca = :marca where idpro_marca = :idpro_marca;"
            );

            $stmt -> bindParam(":marca", $datosModel["marca"], PDO::PARAM_STR);
            $stmt -> bindParam(":idpro_marca", $datosModel["idpro_marca"], PDO::PARAM_INT);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }

        #Quitar Marca
        static public function quitarMarcaModel($tabla, $valor){
            $stmt = Conexion::conectar() -> prepare(
                "update $tabla set status = 0 where idpro_marca = :idpro_marca;"
            );

            $stmt -> bindParam(":idpro_marca", $valor, PDO::PARAM_INT);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }

        #Seleccionar Precio Producto
        static public function seleccionarProPrecioModel($tabla, $valor){
            $stmt = Conexion::conectar() -> prepare("
            select precio from $tabla where idpro = :idpro and tipo = 1;"
            );
            $stmt -> bindParam(":idpro", $valor, PDO::PARAM_INT);
            $stmt -> execute();
            return $stmt -> fetch();
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
                $stmt = Conexion::conectar() -> prepare("select p_c.idpro_categoria, p_c.categoria, p.idpro, p.nombre, p_p.precio, p.descripcion  
                from $tabla p 
                inner join pro_categoria p_c on p.idpro_categoria = p_c.idpro_categoria 
                inner join pro_precio p_p on p_p.idpro = p.idpro 
                where (p.status = 1) and (p_p.tipo = 1) and (p_c.status = 1) order by p.nombre;");
                $stmt -> execute();
                return $stmt -> fetchAll();
                $stmt -> close();
                $stmt = null;
            }else{
                #Mostrar detalles de un producto
                $stmt = Conexion::conectar() -> prepare("select p_c.idpro_categoria, p_c.categoria, p_m.idpro_marca, p_m.marca, p.idpro, p.codigo, p.nombre, p.modelo, 
                p_p.precio, p.descripcion, p.existencia from $tabla p 
                inner join pro_categoria p_c on p_c.idpro_categoria = p.idpro_categoria 
                inner join pro_marca p_m on p_m.idpro_marca = p.idpro_marca 
                inner join pro_precio p_p on p_p.idpro = p.idpro 
                where p.$item = :$item and p_p.tipo = 1;");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
                $stmt -> execute();
                return $stmt -> fetch();
                $stmt -> close();
                $stmt = null;
            }
        }
        
        #Seleccionar productos Deshabilitados
        static public function seleccionarProductoDeshabilitadoModel($tabla){
            $stmt = Conexion::conectar() -> prepare("select p_c.idpro_categoria, p_c.categoria, p.idpro, p.nombre, p.descripcion  
            from $tabla p 
            inner join pro_categoria p_c on p.idpro_categoria = p_c.idpro_categoria 
            where p.status = 0;");
            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
        }

        #Seleccionar productos Sin Stock
        static public function seleccionarProductoSinStockModel($tabla){
            $stmt = Conexion::conectar() -> prepare("select p_c.idpro_categoria, p_c.categoria, p.idpro, p.nombre, p.descripcion  
            from $tabla p 
            inner join pro_categoria p_c on p.idpro_categoria = p_c.idpro_categoria 
            where p.status = 2;");
            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
        }
        
        #Listar productos
        static public function listarProductoModel($tabla, $item, $valor, $modo){
            if ($modo == null) {
                $stmt = Conexion::conectar() -> prepare("select idpro, nombre from $tabla where status = 1;");
                $stmt -> execute();
                return $stmt -> fetchAll();
                $stmt -> close();
                $stmt = null;
            }elseif ($modo == "entrada") {
                $stmt = Conexion::conectar() -> prepare("select idpro, nombre from $tabla 
                where status >= 1 and status <= 2;");
                $stmt -> execute();
                return $stmt -> fetchAll();
                $stmt -> close();
                $stmt = null;   
            }
        }
        
        #Listar productos Deshabilitados
        static public function listarProductoDeshabilitadoModel($tabla, $item, $valor){
            $stmt = Conexion::conectar() -> prepare("select idpro, nombre from $tabla where status = 0;");
            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
        }
        
        #Seleccionar Productos para pestaña
        static public function tabProductoModel($tabla, $valor){
            $stmt = Conexion::conectar() -> prepare("select nombre from $tabla 
            where idpro = :idpro and status = 1;");
            $stmt -> bindParam(":idpro", $valor, PDO::PARAM_INT);
            $stmt -> execute();
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }

        #Seleccionar Caracteristicas de producto
        static public function seleccionarProductoCaracteristicasModel($tabla, $item, $valor){
            $stmt = Conexion::conectar() -> prepare("select caracteristica from $tabla   
            where $item = :$item and status = 1;");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
        }
        
        #Seleccionar productos por categoria
        static public function seleccionarProductoCategoriaModel($tabla, $item, $valor, $modo){
            if ($modo == "fichas") {
                $stmt = Conexion::conectar() -> prepare("select p_c.idpro_categoria, p_c.categoria, p.idpro, p.nombre, p_p.precio, p.descripcion  
                from $tabla p 
                inner join pro_categoria p_c on p.idpro_categoria = p_c.idpro_categoria 
                inner join pro_precio p_p on p_p.idpro = p.idpro 
                where (p.$item = :$item) and (p_p.tipo = 1) and (p.status = 1);");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
                $stmt -> execute();
                return $stmt -> fetchAll();
                $stmt -> close();
                $stmt = null;    
            } else {
                #Sin modificar
                $stmt = Conexion::conectar() -> prepare("select c.idpro_categoria, c.categoria, p.idpro, p.nombre, p_p.precio 
                from $tabla p 
                inner join pro_categoria c on p.idpro_categoria = c.idpro_categoria 
                inner join pro_precio p_p on p_p.idpro = p.idpro 
                where p.$item = :$item and p_p.tipo = 1;");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetchAll();
                $stmt -> close();
                $stmt = null;
            }
        }
        
        #Seleccionar productos por marca
        static public function seleccionarProductoMarcaModel($tabla, $item, $valor, $modo){
            if ($modo == "fichas") {
                $stmt = Conexion::conectar() -> prepare("select p_m.idpro_marca, p_m.marca, p.idpro, p.nombre, p_p.precio, p.descripcion  
                from $tabla p 
                inner join pro_marca p_m on p.idpro_marca = p_m.idpro_marca 
                inner join pro_precio p_p on p_p.idpro = p.idpro 
                where (p.$item = :$item) and (p_p.tipo = 1) and (p.status = 1);");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
                $stmt -> execute();
                return $stmt -> fetchAll();
                $stmt -> close();
                $stmt = null;    
            } else {
                #Sin modificar
                $stmt = Conexion::conectar() -> prepare("select c.idpro_marca, c.marca, p.idpro, p.nombre, p_p.precio 
                from $tabla p 
                inner join pro_marca c on p.idpro_marca = c.idpro_marca 
                inner join pro_precio p_p on p_p.idpro = p.idpro 
                where p.$item = :$item and p_p.tipo = 1;");
                $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetchAll();
                $stmt -> close();
                $stmt = null;
            }
        }
        
        #Registro de marcas
        static public function registrarMarcaModel($valor, $tabla){
            $stmt = Conexion::conectar() -> prepare(
                "insert into $tabla (marca) 
                values (:marca);"
            );

            $stmt -> bindParam(":marca", $valor, PDO::PARAM_STR);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }

        #Seleccionar productos
        static public function seleccionarProveedorModel($item, $valor){
            if ($item == null && $valor == null) {
                $stmt = Conexion::conectar() -> prepare("select iduser, nombre from user where tipo = 2 and status = 1;");
                $stmt -> execute();
                return $stmt -> fetchAll();
                $stmt -> close();
                $stmt = null;
            }
        }
        
        #Registro de proveedores
        static public function registrarProveedorModel($valor, $tabla){
            $stmt = Conexion::conectar() -> prepare(
                "insert into $tabla(tipo, nombre, usuario, contrasena, fecha) 
                values(2, :nombre, :usuario, :contrasena, now());"
            );

            $stmt -> bindParam(":nombre", $valor, PDO::PARAM_STR);
            $stmt -> bindParam(":usuario", $valor, PDO::PARAM_STR);
            $stmt -> bindParam(":contrasena", $valor, PDO::PARAM_STR);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }
        #Registrar Compra
        static public function registrarCompraModel($datosModel, $tabla){
            $stmt = Conexion::conectar() -> prepare(
                "insert into $tabla (folio, iduser, momento) 
                 values (:folio, :proveedor, now());"
            );

            $stmt -> bindParam(":folio", $datosModel["folio"], PDO::PARAM_STR);
            $stmt -> bindParam(":proveedor", $datosModel["proveedor"], PDO::PARAM_STR);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }

        #Seleccionar Compra
        static public function seleccionarCompraModel($tabla){
            $stmt = Conexion::conectar() -> prepare("select c.idcompra, c.folio, u.nombre from $tabla c 
            inner join user u on u.iduser = c.iduser 
            where c.status = 1;");
            $stmt -> execute();
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }

        #Concluir Compra
        static public function compraFinalizadaModel($item, $valor, $tabla){
            $stmt = Conexion::conectar() -> prepare(
                "update $tabla set status = 2 where $item = :$item;"
            );
            $stmt2 = Conexion::conectar() -> prepare(
                "select idpro, preciocompra, cantidad from compra_entrada where $item = :$item;"
            );
            
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
            $stmt2 -> bindParam(":".$item, $valor, PDO::PARAM_INT);
            
            $stmt -> execute();
            $stmt2 -> execute();
            $result = $stmt2 -> fetchAll();
            $resultado = "esperando";

            foreach ($result as $key => $value) {
                $stmt3 = Conexion::conectar() -> prepare(
                    "update pro set status = 1, existencia = existencia + :existencia where idpro = :idpro;"
                ); 

                $stmt3 -> bindParam(":existencia", $value["cantidad"], PDO::PARAM_INT);
                $stmt3 -> bindParam(":idpro", $value["idpro"], PDO::PARAM_INT);
                if($stmt3 -> execute()){
                    $resultado = "terminado";
                    // $stmt3 -> close();
                    // $stmt3 = null;
                }else{
                    $resultado = "error";
                }
            }
            
            if($resultado == "terminado"){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt2 -> close();
            $stmt3 -> close();
            $stmt = null;
            $stmt2 = null;
            $stmt3 = null;
        }
        
        #Registrar Entrada de productos
        static public function registrarEntradaModel($datosModel, $tabla){
            $stmt = Conexion::conectar() -> prepare(
                "insert into $tabla (idcompra, idpro, preciocompra, cantidad) 
                 values (:idcompra, :idpro, :preciocompra, :cantidad);"
            );

            $stmt -> bindParam(":idcompra", $datosModel["compra"], PDO::PARAM_INT);
            $stmt -> bindParam(":idpro", $datosModel["producto"], PDO::PARAM_INT);
            $stmt -> bindParam(":preciocompra", $datosModel["precioCompra"], PDO::PARAM_INT);
            $stmt -> bindParam(":cantidad", $datosModel["cantidad"], PDO::PARAM_INT);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }

        #Registro de usuario
        static public function registrarUsuarioModel($datosModel, $tabla, $tipoUsuario){
            $stmt = Conexion::conectar() -> prepare(
                "insert into $tabla (tipo, nombre, usuario, contrasena, fecha) 
                 values (:tipo, :nombre, :usuario, :contrasena, now());"
            );

            $nombre = $datosModel["nombre"]." ".$datosModel["apellidos"];

            $stmt -> bindParam(":tipo", $tipoUsuario, PDO::PARAM_INT);
            $stmt -> bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt -> bindParam(":usuario", $datosModel["correo"], PDO::PARAM_STR);
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
                "select *, DATE_FORMAT(fecha, '%d/%m/%Y') fecha from $tabla where usuario = :usuario;"
            );

            $stmt -> bindParam(":usuario", $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }

        
    }
?>