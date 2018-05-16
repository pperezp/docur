<?php
require_once '../model/Data.php';

$docente = $_REQUEST["docente"];
$curso = $_REQUEST["curso"];
$anio = $_REQUEST["anio"];

$idDocente = trim(explode("-",$docente)[0]);
$idCurso = trim(explode("-",$curso)[0]);

$d = new Data();

$d->addCursoDocente($idDocente, $idCurso, $anio);

header("location: ../view/asignarCursoDocente.php");