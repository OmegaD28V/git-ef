<?php
    if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }else {
        if ($_SESSION["ingresoVerificado"] == "ok" && $_SESSION["access"] == "master") {
            ?>
            <?php
        }
    }
?>
<div class="contenedor-formulario">
    <h2 class="build-page">Página en construcción</h2>
    <img src="ima/imgPaginaConstruccion.jpg" alt="PaginaConstruccion">
</div>