<?php
if (!(isset($_SESSION["ingresoVerificado"]) && (isset($_SESSION["access"])))) { 
    echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
}else {
    if ($_SESSION["ingresoVerificado"] == "ok") {
        session_destroy();
        echo '<script>window.location = "index.php?action=usuarioInicioSession";</script>';
    }
}
?>