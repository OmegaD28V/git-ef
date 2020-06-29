<?php
    if (isset($_GET["idpro"])) {
        $item = "idpro";
        $valor = $_GET["idpro"];

        $producto = MvcController::seleccionarProductoController($item, $valor, null);
        $cProducto = MvcController::seleccionarProductoCaracteristicasController($item, $valor);
        $imagenes = MvcController::verImgProController($valor);
    }
?>
<div class="contenedor-formulario">
    <div class="grid-info-pro">
        <div class="title-pro">
            <span class="t-p-name"><?=$producto["nombre"]?></span>
        </div>
        <div class="gallery-pro">
            <div class="slider">
            <?php
                if ($imagenes == null) {
                    ?>
                <img class="i-p-img" src="ima/a3.jpg" alt="a" width="240" height="300">
                    <?php
                }else {
                    foreach ($imagenes as $key => $value) {
                        ?>
                    <img class="i-p-img" src="<?=$value["ruta"]?>" alt="img" loading="lazy" width="240" height="300">
                        <?php                    
                    }    
                }
            ?>
            </div>
        </div>
        <div class="detail-pro">
            <h2 class="p-title">Detalles del producto</h2>
            <div class="d-p-div">
                <table class="table-d-p">
                    <tr class="d-g">
                        <th>Categoría</th>
                        <td><span class="d-p-category"><?=$producto["categoria"]?></span></td>
                    </tr>
                    <tr class="l-g">
                        <th>Marca</th>
                        <td><span class="d-p-trademark"><?=$producto["marca"]?></span></td>
                    </tr>
                    <tr class="d-g">
                        <th>Modelo</th>
                        <td><span class="d-p-model"><?=$producto["modelo"]?></span></td>
                    </tr>
                    <tr class="l-g">
                        <th>Precio</th>
                        <td><span class="d-p-price">$<?=$producto["precio"]?></span></td>
                    </tr>
                    <tr class="d-g">
                        <th>Existencia</th>
                        <td><span class="d-p-price"><?=$producto["existencia"]?> unidades</span></td>
                    </tr>
                </table>                
            </div>
        </div>
        <div class="description-pro">
        <h2 class="p-title">Descripción</h2>
            <p class="d-p-desc"><?=$producto["descripcion"]?></p>
        </div>
        <div class="features-pro">
            <h2 class="p-title">Características</h2>
            <ul class="f-p-ul">
                <?php
                    foreach ($cProducto as $key => $value) {
                ?>
                    <li class="f-p-ul-li"><span class="f-p-feature"><?=$value["caracteristica"]?></span></li> 
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</div>