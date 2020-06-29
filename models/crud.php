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
            
            $stmt3 = Conexion::conectar() -> prepare(
                "insert into pro_precio (idpro, tipo, precio) 
                values (:pro, 1, 0);"
            );
            $stmt3 -> bindParam(":pro", $pro, PDO::PARAM_INT);
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

        #Registrar Característica.
        static public function regCaracteristicaModel($tabla, $datos){
            $stmt = Conexion::conectar() -> prepare("
                insert into $tabla(idpro, caracteristica) values(:idpro, :caracteristica);
            ");

            $stmt -> bindparam(":idpro", $datos["idpro"], PDO::PARAM_INT);
            $stmt -> bindparam(":caracteristica", $datos["caracteristica"], PDO::PARAM_STR);

            if ($stmt -> execute()) {
                return "ok";
            }else{
                return "error";
            }

            $stmt -> close();
            $stmt = null;
        }

        #Seleccionar Características.
        static public function seleccionarCaracteristicasModel($tabla, $pro, $item){
            if ($item == null) {
                $stmt = Conexion::conectar() -> prepare("
                    select idpro_caracteristica, caracteristica from $tabla 
                    where idpro = :idpro and status = 1;
                ");

                $stmt -> bindParam(":idpro", $pro, PDO::PARAM_INT);
                $stmt -> execute();
                return $stmt -> fetchAll();
                $stmt -> close();
                $stmt = null;    
            }else{
                $stmt = Conexion::conectar() -> prepare("
                    select caracteristica from $tabla 
                    where idpro_caracteristica = :idpro_caracteristica and idpro = :idpro;
                ");

                $stmt -> bindParam(":idpro_caracteristica", $item, PDO::PARAM_INT);
                $stmt -> bindParam(":idpro", $pro, PDO::PARAM_INT);
                $stmt -> execute();
                return $stmt -> fetch();
                $stmt -> close();
                $stmt = null;
            }
            
        }

        #Actualizar Característica.
        static public function actualCaracteristicaModel($tabla, $datos){
            $stmt = Conexion::conectar() -> prepare("
                update $tabla set caracteristica = :caracteristica where idpro_caracteristica = :id;
            ");
            $stmt -> bindParam(":caracteristica", $datos["caracteristica"], PDO::PARAM_STR);
            $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
            if ($stmt -> execute()) {
                return "ok";
            }else {
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }
        
        #Seleccionar producto para características o imágenes.
        static public function productoModel($tabla, $valor){
            $stmt = Conexion::conectar() -> prepare("
                select p.idpro, p.nombre from $tabla p 
                where p.idpro = :idpro;
            ");

            $stmt -> bindParam(":idpro", $valor, PDO::PARAM_INT);
            $stmt -> execute();
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }

        #Quitar Característica.
        static public function quitarCaracteristicaModel($tabla, $valor){
            $stmt = Conexion::conectar() -> prepare("
                update $tabla set status = 0 where idpro_caracteristica = :idpro_caracteristica;
            ");

            $stmt -> bindParam(":idpro_caracteristica", $valor, PDO::PARAM_INT);
            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }

        #Subir Imagen Producto.
        static public function subirImgProModel($tabla, $archivo, $pro){
            $stmt = Conexion::conectar() -> prepare("
                insert into $tabla(idpro, ruta) values(:idpro, :ruta);
            ");
            $stmt -> bindParam(":idpro", $pro, PDO::PARAM_INT);
            $stmt -> bindParam(":ruta", $archivo, PDO::PARAM_STR);
            if ($stmt -> execute()) {
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }

        #Ver imagenes de producto.
        static public function verImgProModel($tabla, $pro){
            $stmt = Conexion::conectar() -> prepare("
                select idpro_imagen, idpro, ruta from $tabla where idpro = :idpro and status = 1;
            ");
            $stmt -> bindParam(":idpro", $pro, PDO::PARAM_INT);
            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
        }
        
        #Imagen para ficha.
        static public function fichaImagenModel($tabla, $pro){
            $stmt = Conexion::conectar() -> prepare("
                select idpro_imagen, idpro, ruta from $tabla where idpro = :idpro and status = 1;
            ");
            $stmt -> bindParam(":idpro", $pro, PDO::PARAM_INT);
            $stmt -> execute();
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }

        #Quitar Imagen de producto.
        public function quitarImgProModel($tabla, $img){
            $stmt = Conexion::conectar() -> prepare("
                update $tabla set status = 0 where idpro_imagen = :idpro_imagen;
            ");
            $stmt -> bindParam(":idpro_imagen", $img, PDO::PARAM_INT);
            if ($stmt -> execute()) {
                return "ok";
            }else {
                return "error";
            }
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
        static public function registrarCompraModel($tabla, $datosModel){
            $stmt = Conexion::conectar() -> prepare(
                "insert into $tabla (folio, iduser, momento) 
                 values (:folio, :proveedor, now());"
            );

            $stmt -> bindParam(":folio", $datosModel["folio"], PDO::PARAM_STR);
            $stmt -> bindParam(":proveedor", $datosModel["proveedor"], PDO::PARAM_INT);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }

        #Verificar Compras Sin Concluir
        static public function verificarCompraModel($tabla, $datosModel){
            $stmt = Conexion::conectar() -> prepare("
            select count(*) as coincide from $tabla c 
            inner join user u on u.iduser = c.iduser 
            where c.folio = :folio and c.iduser = :proveedor and c.status >= 1;
            ");

            $stmt -> bindParam(':folio', $datosModel["folio"], PDO::PARAM_STR);
            $stmt -> bindParam(':proveedor', $datosModel["proveedor"], PDO::PARAM_INT);
            $stmt -> execute();
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }

        #Seleccionar Compra
        static public function seleccionarCompraModel($tabla, $datosModel, $ticket){
            if ($ticket == null) {
                $stmt = Conexion::conectar() -> prepare("select c.idcompra, c.folio, u.nombre from $tabla c 
                inner join user u on u.iduser = c.iduser 
                where c.folio = :folio and c.iduser = :proveedor and c.status = 1;");

                $stmt -> bindParam(':folio', $datosModel["folio"], PDO::PARAM_STR);
                $stmt -> bindParam(':proveedor', $datosModel["proveedor"], PDO::PARAM_INT);
                $stmt -> execute();
                return $stmt -> fetch();
                $stmt -> close();
                $stmt = null;
            } elseif ($datosModel == null) {
                $stmt = Conexion::conectar() -> prepare("select c.idcompra, c.folio, u.nombre from $tabla c 
                inner join user u on u.iduser = c.iduser 
                where c.idcompra = :idcompra and c.status = 1;");

                $stmt -> bindParam(':idcompra', $ticket, PDO::PARAM_INT);

                $stmt -> execute();
                return $stmt -> fetch();
                $stmt -> close();
                $stmt = null;
            }
        }

        #Seleccionar Compras
        static public function seleccionarComprasModel($tabla){
            $stmt = Conexion::conectar() -> prepare("select 
            c.idcompra, c.folio, c.iduser, c.status, u.nombre, 
            DATE_FORMAT(c.momento, '%d/%M/%Y - %H:%i:%S') momento 
            from $tabla c inner join user u on u.iduser = c.iduser 
            where c.status >= 1 order by c.momento desc;");
            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
        }
        
        #Recuperar Compra
        static public function recuperarCompraModel($tabla, $valor){
            $stmt = Conexion::conectar() -> prepare("
                select c.idcompra, c.folio, u.nombre from $tabla c 
                inner join user u on u.iduser = c.iduser 
                where c.idcompra = :idcompra and c.status = 1;"
            );
            $stmt -> bindParam(":idcompra", $valor, PDO::PARAM_INT);
            $stmt -> execute();
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }

        #Detalle de compra
        static public function detalleCompraModel($tabla, $valor){
            $stmt = Conexion::conectar() -> prepare("select c.folio, DATE_FORMAT(c.momento, '%d/%M/%Y - %H:%i:%S') momento, u.nombre as proveedor, 
            sum(c_e.preciocompra * c_e.cantidad) as total from $tabla c 
            inner join compra_entrada c_e on c.idcompra = c_e.idcompra 
            inner join user u on c.iduser = u.iduser 
            where c.idcompra = :idcompra and c_e.status = 1;");

            $stmt -> bindParam(":idcompra", $valor, PDO::PARAM_INT);
            $stmt -> execute();
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }
        
        #Detalle de compra producto
        static public function detalleCPModel($tabla, $valor){
            $stmt = Conexion::conectar() -> prepare("select 
            c_e.idcompra_entrada, p.nombre as producto, p.idpro, c_e.preciocompra, c_e.cantidad from $tabla c_e 
            inner join pro p on c_e.idpro = p.idpro where c_e.idcompra = :idcompra and c_e.status = 1;");

            $stmt -> bindParam(":idcompra", $valor, PDO::PARAM_INT);
            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
        }

        #Quitar Entrada
        static public function quitarEntradaModel($tabla, $valor){
            $stmt = Conexion::conectar() -> prepare(
                "update $tabla set status = 0 where idcompra_entrada = :idcompra_entrada;"
            );

            $stmt -> bindParam(":idcompra_entrada", $valor, PDO::PARAM_INT);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }

        #Quitar Compra sin concluir
        static public function quitarCompraModel($tabla, $valor){
            $stmt = Conexion::conectar() -> prepare(
                "update $tabla set status = 0 where idcompra = :idcompra;"
            );

            $stmt -> bindParam(":idcompra", $valor, PDO::PARAM_INT);

            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt -> close();
            $stmt = null;
        }

        #Concluir Compra
        static public function compraFinalizadaModel($item, $valor, $tabla){
            $stmt = Conexion::conectar() -> prepare(
                "update $tabla set status = 2 where $item = :$item;"
            );
            $stmt2 = Conexion::conectar() -> prepare(
                "select idpro, preciocompra, cantidad from compra_entrada where $item = :$item and status = 1;"
            );
            
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
            $stmt2 -> bindParam(":".$item, $valor, PDO::PARAM_INT);
            
            $stmt -> execute();
            $stmt2 -> execute();
            $result0 = $stmt2 -> fetchAll();
            $result1 = "esperando";
            $result2 = "esperando";

            foreach ($result0 as $key => $value) {
                $stmt3 = Conexion::conectar() -> prepare("
                select p.idpro, p_p.precio from pro p 
                inner join pro_precio p_p on p.idpro = p_p.idpro 
                where p.idpro = :idpro and p_p.tipo = 1;
                ");
                $stmt3 -> bindParam(":idpro", $value["idpro"], PDO::PARAM_INT);
                $stmt3 -> execute();
                $result0_1 = $stmt3 -> fetch();
                $precioAnterior = (float) $result0_1["precio"];
                $precioCompra = (float) $value["preciocompra"];
                $precioCompra20p = (float) $value["preciocompra"] + (($value["preciocompra"] / 100) * 20);
                if ($result0_1 == null) {
                    
                }elseif($precioAnterior < $precioCompra){
                    $stmt3_1 = Conexion::conectar() -> prepare("
                        update pro_precio set precio = :precio where idpro = :idpro and tipo = 1;
                    ");
                    $stmt3_1 -> bindParam(":precio", $precioCompra20p, PDO::PARAM_INT);
                    $stmt3_1 -> bindParam(":idpro", $result0_1["idpro"], PDO::PARAM_INT);
                    if ($stmt3_1 -> execute()) {
                        $result1 = "terminado";
                    }else {
                        $result1 = "error";
                    }                    
                }
            }

            foreach ($result0 as $key => $value) {
                $stmt4 = Conexion::conectar() -> prepare(
                    "update pro set status = 1, existencia = existencia + :existencia where idpro = :idpro;"
                ); 

                $stmt4 -> bindParam(":existencia", $value["cantidad"], PDO::PARAM_INT);
                $stmt4 -> bindParam(":idpro", $value["idpro"], PDO::PARAM_INT);
                if($stmt4 -> execute()){
                    $result2 = "terminado";
                    // $stmt4 -> close();
                    // $stmt4 = null;
                }else{
                    $result2 = "error";
                }
            }
            
            if($result1 == "terminado" && $result2 != "error"){
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
            if($tipoUsuario == 3){
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
            }elseif ($tipoUsuario == 33) {
                //Primera consulta: Registra al usuario.
                $stmt = Conexion::conectar() -> prepare(
                    "insert into $tabla (tipo, nombre, usuario, contrasena, fecha, status) 
                     values (3, :nombre, :usuario, :contrasena, now(), 3);"
                );
    
                $nombre = $datosModel["nombre"]." ".$datosModel["apellidos"];
    
                $stmt -> bindParam(":nombre", $nombre, PDO::PARAM_STR);
                $stmt -> bindParam(":usuario", $datosModel["correo"], PDO::PARAM_STR);
                $stmt -> bindParam(":contrasena", $datosModel["correo"], PDO::PARAM_STR);
    
                $stmt -> execute();
                    //Segunda consulta: Consulta al usuario recién registrado.
                    $stmt2 = Conexion::conectar() -> prepare(
                        "select iduser from user where tipo = 3 and status = 3 and usuario = :usuario;"
                    );

                    $stmt2 -> bindParam(":usuario", $datosModel["correo"], PDO::PARAM_STR);
                    $stmt2 -> execute();
                    $usuario = $stmt2 -> fetch();
                    $user = $usuario["iduser"];

                    if ($datosModel["tel"] != "") {//Verificar si se registró un teléfono
                        //Tercera consulta: Registro de teléfono.
                        $stmt3 = Conexion::conectar() -> prepare(
                            "insert into user_telefono (iduser, tipo, numero) values (:iduser, 1, :numero);"
                        );
                        $stmt3 -> bindParam(":iduser", $user, PDO::PARAM_INT);
                        $stmt3 -> bindParam(":numero", $datosModel["tel"], PDO::PARAM_INT);
                        $stmt3 -> execute();
                    }else{
                    }

                    
                        $stmt4 = Conexion::conectar() -> prepare(
                            "insert into 
                            user_domicilio (iduser, estado, localidad, colonia, calle, num_casa, num_casa2, calle1, calle2, referencia) 
                            values(:iduser, :estado, :localidad, :colonia, :calle, :num_casa, :num_casa2, :calle1, :calle2, :referencia);"
                        );
                        $stmt4 -> bindParam(":iduser", $user, PDO::PARAM_INT);
                        $stmt4 -> bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);
                        $stmt4 -> bindParam(":localidad", $datosModel["municipio"], PDO::PARAM_STR);
                        $stmt4 -> bindParam(":colonia", $datosModel["colonia"], PDO::PARAM_STR);
                        $stmt4 -> bindParam(":calle", $datosModel["calle"], PDO::PARAM_STR);
                        $stmt4 -> bindParam(":num_casa", $datosModel["no-casa"], PDO::PARAM_INT);
                        $stmt4 -> bindParam(":num_casa2", $datosModel["no-ext"], PDO::PARAM_INT);
                        $stmt4 -> bindParam(":calle1", $datosModel["calle1"], PDO::PARAM_STR);
                        $stmt4 -> bindParam(":calle2", $datosModel["calle2"], PDO::PARAM_STR);
                        $stmt4 -> bindParam(":referencia", $datosModel["ref"], PDO::PARAM_STR);
                        $stmt4 -> execute();

                            $stmt5 = Conexion::conectar() -> prepare(
                                "update user set status = 1 where iduser = :iduser;"
                            );
                            $stmt5 -> bindParam(":iduser", $user, PDO::PARAM_INT);
                            if($stmt5 -> execute()){
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
        }
        
        #Actualizar usuario
        static public function actualizarUsuarioModel($datosModel, $tabla, $cli, $idDomicilio, $idPhone, $gestor){
            if($gestor == 33){//Actualizar usuario desde algun usuario del personal de la empresa.
                //Primera consulta: Actualizar al usuario.
                $stmt = Conexion::conectar() -> prepare(
                    "update $tabla set nombre = :nombre, fecha = now() where iduser = :iduser;"
                );
    
                $stmt -> bindParam(":nombre",  $datosModel["nombre"], PDO::PARAM_STR);
                $stmt -> bindParam(":iduser", $cli, PDO::PARAM_INT);
    
                $stmt -> execute();
                    //Segunda consulta: Actualizar teléfono de usuario.
                    $stmt2 = Conexion::conectar() -> prepare(
                        "update user_telefono set numero = :numero where iduser_telefono = :iduser_telefono:"
                    );

                    $stmt2 -> bindParam(":usuario", $datosModel["tel"], PDO::PARAM_STR);
                    $stmt2 -> bindParam(":iduser_telefono", $idPhone, PDO::PARAM_INT);
                    $stmt2 -> execute();
                        //Tercera consulta: Actualizar domicilio.
                        $stmt3 = Conexion::conectar() -> prepare(
                            "update user_domicilio set 
                            estado = :estado, localidad = :localidad, colonia = :colonia, 
                            calle = :calle, num_casa = :num_casa, 
                            num_casa2 = :num_casa2, calle1 = :calle1, 
                            calle2 = :calle2, referencia = :referencia 
                            where iduser_domicilio = :iduser_domicilio;"
                        );
                        $stmt3 -> bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);
                        $stmt3 -> bindParam(":localidad", $datosModel["municipio"], PDO::PARAM_STR);
                        $stmt3 -> bindParam(":colonia", $datosModel["colonia"], PDO::PARAM_STR);
                        $stmt3 -> bindParam(":calle", $datosModel["calle"], PDO::PARAM_STR);
                        $stmt3 -> bindParam(":num_casa", $datosModel["no-casa"], PDO::PARAM_INT);
                        $stmt3 -> bindParam(":num_casa2", $datosModel["no-ext"], PDO::PARAM_INT);
                        $stmt3 -> bindParam(":calle1", $datosModel["calle1"], PDO::PARAM_STR);
                        $stmt3 -> bindParam(":calle2", $datosModel["calle1"], PDO::PARAM_STR);
                        $stmt3 -> bindParam(":referencia", $datosModel["ref"], PDO::PARAM_STR);
                        $stmt3 -> bindParam(":iduser_domicilio", $idDomicilio, PDO::PARAM_INT);
                        if($stmt3 -> execute()){
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
        }

        #Seleccionar todos los usuarios.
        static public function seleccionarUsuariosModel($tabla, $valor){
            if ($valor == "cli") {
                $stmt = Conexion::conectar() -> prepare("
                    select u.iduser, u.nombre, u.usuario, DATE_FORMAT(u.fecha, '%d/%M/%Y - %H:%i:%S') fecha 
                    from $tabla u 
                    where tipo = 3 and status = 1;
                ");
                $stmt -> execute();
                return $stmt -> fetchAll();
                $stmt -> close();
                $stmt = null;
            }elseif ($valor == "prov") {
                // $stmt = Conexion::conectar() -> prepare("
                //     select usuario from $tabla where usuario = :usuario;
                // ");
                // $stmt -> bindParam(":usuario", $valor, PDO::PARAM_STR);
                // $stmt -> execute();
                // return $stmt -> fetch();
                // $stmt -> close();
                // $stmt = null;
            }else{
                $stmt = Conexion::conectar() -> prepare("
                    select usuario from $tabla where usuario = :usuario;
                ");
                $stmt -> bindParam(":usuario", $valor, PDO::PARAM_STR);
                $stmt -> execute();
                return $stmt -> fetch();
                $stmt -> close();
                $stmt = null;
            }
        }
        
        #Seleccionar domicilio de cliente.
        static public function clienteDomicilioModel($tabla, $user, $tipo){
            if ($tipo == "cli") {
                $stmt = Conexion::conectar() -> prepare("
                    select * 
                    from $tabla 
                    where iduser = :iduser and status = 1;
                ");
                $stmt -> bindParam(":iduser", $user, PDO::PARAM_INT);
                $stmt -> execute();
                return $stmt -> fetch();
                $stmt -> close();
                $stmt = null;
            }elseif ($user == "prov") {
                // $stmt = Conexion::conectar() -> prepare("
                //     select usuario from $tabla where usuario = :usuario;
                // ");
                // $stmt -> bindParam(":usuario", $valor, PDO::PARAM_STR);
                // $stmt -> execute();
                // return $stmt -> fetch();
                // $stmt -> close();
                // $stmt = null;
            }else{
                // $stmt = Conexion::conectar() -> prepare("
                //     select usuario from $tabla where usuario = :usuario;
                // ");
                // $stmt -> bindParam(":usuario", $valor, PDO::PARAM_STR);
                // $stmt -> execute();
                // return $stmt -> fetch();
                // $stmt -> close();
                // $stmt = null;
            }
        }
        
        #Seleccionar correo de cliente.
        static public function clienteCorreoModel($tabla, $user, $tipo){
            if ($tipo == "cli") {
                $stmt = Conexion::conectar() -> prepare("
                    select * 
                    from $tabla 
                    where iduser = :iduser and status = 1;
                ");
                $stmt -> bindParam(":iduser", $user, PDO::PARAM_INT);
                $stmt -> execute();
                return $stmt -> fetch();
                $stmt -> close();
                $stmt = null;
            }elseif ($user == "prov") {
                // $stmt = Conexion::conectar() -> prepare("
                //     select usuario from $tabla where usuario = :usuario;
                // ");
                // $stmt -> bindParam(":usuario", $valor, PDO::PARAM_STR);
                // $stmt -> execute();
                // return $stmt -> fetch();
                // $stmt -> close();
                // $stmt = null;
            }else{
                // $stmt = Conexion::conectar() -> prepare("
                //     select usuario from $tabla where usuario = :usuario;
                // ");
                // $stmt -> bindParam(":usuario", $valor, PDO::PARAM_STR);
                // $stmt -> execute();
                // return $stmt -> fetch();
                // $stmt -> close();
                // $stmt = null;
            }
        }
        
        #Seleccionar telefono de cliente.
        static public function clientePhoneModel($tabla, $user, $tipo){
            if ($tipo == "cli") {
                $stmt = Conexion::conectar() -> prepare("
                    select * 
                    from $tabla 
                    where iduser = :iduser and status = 1 and tipo = 1;
                ");
                $stmt -> bindParam(":iduser", $user, PDO::PARAM_INT);
                $stmt -> execute();
                return $stmt -> fetch();
                $stmt -> close();
                $stmt = null;
            }elseif ($user == "prov") {
                // $stmt = Conexion::conectar() -> prepare("
                //     select usuario from $tabla where usuario = :usuario;
                // ");
                // $stmt -> bindParam(":usuario", $valor, PDO::PARAM_STR);
                // $stmt -> execute();
                // return $stmt -> fetch();
                // $stmt -> close();
                // $stmt = null;
            }else{
                // $stmt = Conexion::conectar() -> prepare("
                //     select usuario from $tabla where usuario = :usuario;
                // ");
                // $stmt -> bindParam(":usuario", $valor, PDO::PARAM_STR);
                // $stmt -> execute();
                // return $stmt -> fetch();
                // $stmt -> close();
                // $stmt = null;
            }
        }
        
        #Seleccionar usuario.
        static public function seleccionarUsuarioModel($tabla, $user, $tipo){
            if ($tipo == "cli") {
                $stmt = Conexion::conectar() -> prepare("
                    select u.iduser, u.nombre, u.usuario
                    from $tabla u 
                    where iduser = :iduser and tipo = 3 and status = 1;
                ");
                $stmt -> bindParam(":iduser", $user, PDO::PARAM_INT);
                $stmt -> execute();
                return $stmt -> fetch();
                $stmt -> close();
                $stmt = null;
            }elseif ($user == "prov") {
                // $stmt = Conexion::conectar() -> prepare("
                //     select usuario from $tabla where usuario = :usuario;
                // ");
                // $stmt -> bindParam(":usuario", $valor, PDO::PARAM_STR);
                // $stmt -> execute();
                // return $stmt -> fetch();
                // $stmt -> close();
                // $stmt = null;
            }else{
                // $stmt = Conexion::conectar() -> prepare("
                //     select usuario from $tabla where usuario = :usuario;
                // ");
                // $stmt -> bindParam(":usuario", $valor, PDO::PARAM_STR);
                // $stmt -> execute();
                // return $stmt -> fetch();
                // $stmt -> close();
                // $stmt = null;
            }
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