<?php
require_once '../model/Data.php';

$nombre = $_REQUEST["nombre"];

$d = new Data();

$d->crearCurso($nombre);

header("location: ../view/crearCurso.php");

