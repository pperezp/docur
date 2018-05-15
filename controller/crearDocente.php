<?php
require_once '../model/Data.php';

$rut = $_REQUEST["rut"];
$nombre = $_REQUEST["nombre"];

$d = new Data();

$d->crearDocente($rut, $nombre);

header("location: ../view/crearDocente.php");

