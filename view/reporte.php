<?php
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

session_start();
//
///*--------------------------FECHA----------------------------------*/
setlocale(LC_TIME, 'es_ES.UTF-8');

$miFecha= gmmktime();
//
//
$fecha = strftime("%A %d de %B de %Y a las %H:%M", $miFecha);
$info = "<div class='info'>Rescatado el ".$fecha."</div>";
///*--------------------------FECHA----------------------------------*/
//
$html = $_SESSION["titulo"];
$html .= $info;
$html .= $_SESSION['contenido'];

//echo $_SESSION["titulo"];
//echo $_SESSION["contenido"];
//echo $_SESSION["curso"];
//
//if(!isset($_SESSION["titulo"])){
//    echo "titulo no setiado";
//}
//
$nomCurso = $_SESSION['curso'];

$html .= '<link rel="stylesheet" href="../css/bootstrap.min.css">';
$html .= '<script src="../js/jquery.min.js"></script>';
$html .= '<script src="../js/popper.min.js"></script>';
$html .= '<script src="../js/bootstrap.min.js"></script>';

$html .= "<style>"
        . ".info{"
        . "padding-bottom: 25px;"
        . "text-align: center;"
        . "}"
        . ""
        . ".titulo{"
        . "text-align: center;"
        . "}"
        . "</style>";

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->render();
$pdf = $dompdf->output();


$nomCurso = str_replace(" ", "_", $nomCurso);
$nomCurso = strtolower($nomCurso);

$nomArchivo = strftime("%d%m%Y_%H%M_", $miFecha);
$nomArchivo .= $nomCurso;


$dompdf->stream($nomArchivo.".pdf", array("Attachment" => false));
exit(0);