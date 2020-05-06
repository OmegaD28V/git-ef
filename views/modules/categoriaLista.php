<?php
    if (!isset($_SESSION["ingresoVerificado"])) {
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
        return;
    }else {
        if ($_SESSION["ingresoVerificado"] != "ok") {
            echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
            return;
        }
    }
    $categorias = MvcController::seleccionarCategoriaController();
?>

<div class="contenedor-formulario">
    <h2 class="build-page">Página en construcción</h2>
    <img src="ima/imgPaginaConstruccion.jpg" alt="PaginaConstruccion">
</div>
<div class="contenedor-formulario">
    <table class="tableCategorias">
        <tr>
            <th class="thCategorias">Categorías</th>
            <th class="thCategorias">Acción</th>
        </tr>
            <?php
                foreach ($categorias as $key => $value) {
                ?>
                    <tr>
                        <td><a href="index.php?action=productoCategoria&idcategoria=<?=$value["idcategoria"]?>"><?=$value["categoria"]?></a></td>
                        <td>
                            <a class="editar" title="Editar" href="index.php?action="><i class="fas fa-pen"></i></a>
                            <form class="formEliminar" method="post">
                                <input class="inputEliminar" type="hidden" value="" name="">
                                <div class="divEliminar">    
                                    <button class="inputEliminar" type="submit" title="Eliminar" value=""><i class="fas fa-trash"></i></button>
                                </div>
                                
                                <?php
                                ?>
                            </form>
                        </td>
                    </tr>
                <?php
                }
            ?>
    </table>
</div>  