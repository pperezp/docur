<?php
/*https://github.com/dompdf/dompdf/releases*/

require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$content = "<html>";
    $content .= "<head>";
    $content .= "<style>";
    $content .= ".red{color:red;}";
    $content .= "</style>";
    $content .= "</head>";
    $content .= "<body>";
        $content .= "<h1 class='red'>Ejemplo 1</h1>";
    $content .= "</body>";
$content .= "</html>";

$dompdf = new Dompdf();
$dompdf->loadHtml($content);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$pdf = $dompdf->output();
$dompdf->stream("nombre.pdf");