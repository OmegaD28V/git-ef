<?php 
    require_once "models/enlaces.php";
    require_once "models/crud.php";
    require_once "controllers/controller.php";
    use Spipu\Html2Pdf\Html2Pdf;
    if (isset($_POST["printpdf"])) {
        ob_start();
        $valor = $_POST["printpdf"];
        $detalleVenta = MvcController::detalleVentaController($valor);
        // $detalleVP = MvcController::detalleVPController($valor);
        require_once 'vendor/autoload.php';
        require_once 'controllers/controllerPDF.php';
        $content = ob_get_clean();

        $pdf = new Html2Pdf('p', 'Sobre n° 10', 'es', 'true', 'utf-8');
        $pdf -> writeHTML($content);
        $pdf -> Output($detalleVenta["folio"].'.pdf');
    }

    $mvc = new MvcController();
    $mvc -> pagina();