<?php
    class Paginas{
        public function enlacesPaginasModel($enlaces){
            if($enlaces == "inicio" || $enlaces == "productoInicio" ||  $enlaces == "productoRegistrar"
             || $enlaces == "productoEditar" || $enlaces == "categoriaLista" || $enlaces == "productoLista" 
             || $enlaces == "productoCategoria" || $enlaces == "proveedores" || $enlaces == "compras" 
             || $enlaces == "ventas" || $enlaces == "usuarioRegistrarse" || $enlaces == "usuarioInicioSession" 
             || $enlaces == "usuarioConfiguracion" || $enlaces == "categoriaRegistrar" || $enlaces == "usuarioSalir"){
                $module =  "views/modules/".$enlaces.".php";
            }else if($enlaces == "index"){
                $module =  "views/modules/productoInicio.php";
            }else if ($enlaces == "ok") {
                $module = "views/modules/productoInicio.php";
            }else{
                $module =  "views/modules/productoInicio.php";
            }
            return $module;
        }
    }
?>