<?php
    class Paginas{
        public function enlacesPaginasModel($enlaces){
            if($enlaces == "inicio" || $enlaces == "productoInicio" ||  $enlaces == "productoRegistrar"
             || $enlaces == "productoEditar" || $enlaces == "categoriaLista" || $enlaces == "productoLista" 
             || $enlaces == "productoCategoria" || $enlaces == "proveedores" || $enlaces == "compras" 
             || $enlaces == "ventas" || $enlaces == "usuarioRegistrarse" || $enlaces == "usuarioInicioSession" 
             || $enlaces == "usuarioConfiguracion" || $enlaces == "categoriaRegistrar"  
             || $enlaces == "usuarioSalir" || $enlaces == "marca" || $enlaces == "compraEntrada"  
             || $enlaces == "categoriaEditar" || $enlaces == "marcaRegistrar" || $enlaces == "proveedorRegistrar"
             || $enlaces == "compraRegistrar" || $enlaces == "categoria" || $enlaces == "productoImagen"
             || $enlaces == "producto" || $enlaces == "usuarios" || $enlaces == "productoDeshabilitado" 
             || $enlaces == "productoSinStock" || $enlaces == "productoMarca" || $enlaces == "productoCaracteristica" 
             || $enlaces == "productoCEditar" || $enlaces == "marcaEditar" || $enlaces == "compra" 
             || $enlaces == "removeIntro" || $enlaces == "compraEditar" || $enlaces == "productoImagenes" 
             || $enlaces == "uClienteRegistrar" || $enlaces == "uClientes" || $enlaces == "uCliente" 
             || $enlaces == "uClienteEditar" || $enlaces == "uClienteCorreo" || $enlaces == "uClienteAddress" 
             || $enlaces == "uClientePhone" || $enlaces == "uProveedorRegistrar" || $enlaces == "uProveedores" || $enlaces == "uProveedor" 
             || $enlaces == "uProveedorEditar" || $enlaces == "uProveedorCorreo" || $enlaces == "uProveedorAddress" 
             || $enlaces == "uProveedorPhone" || $enlaces == "venta" || $enlaces == "ventas" || $enlaces == "ventaRegistrar" 
             || $enlaces == "ventaEditar" || $enlaces == "ventaSalida"){
                $module =  "views/modules/".$enlaces.".php";
            }else if($enlaces == "index"){
                $module =  "views/modules/inicio.php";
            }else if ($enlaces == "ok") {
                $module = "views/modules/inicio.php";
            }else{
                $module =  "views/modules/manager404.php";
            }
            return $module;
        }
    }