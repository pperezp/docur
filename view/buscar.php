<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Buscar</h1>
        <a href="../index.php">Volver</a>
        <h2>Buscar por cursos</h2>
        <form action="buscar.php" method="post">
            <input type="text" name="curso" list="cursos" placeholder="Curso:">
            <input type="submit" value="Buscar">
        </form>

        <h2>Buscar por docentes</h2>
        <form action="buscar.php" method="post">
            <input type="text" name="docente" list="docentes" placeholder="Docente: (Rut o nombre)">
            <input type="submit" value="Buscar">
        </form>

        <datalist id="cursos">
            <?php
            require_once("../model/Data.php");
            $d = new Data();
            foreach ($d->getAllCursos() as $c) {
                echo "<option value='$c->id - $c->nombre'>";
            }
            ?>
        </datalist>

        <datalist id="docentes">
            <?php
            foreach ($d->getAllDocentes() as $doc) {
                echo "<option value='$doc->nombre'>";
            }
            ?>
        </datalist>

        <?php
        $quiereBuscar = false;

        if (isset($_REQUEST["curso"]) || isset($_REQUEST["docente"])) {
            require_once '../model/Data.php';
            $d = new Data();
            $lista = array();
        }

        if (isset($_REQUEST["curso"])) {
            $curso = $_REQUEST["curso"];
            $idCurso = trim(explode("-", $curso)[0]);
            $nomCurso = trim(explode("-", $curso)[1]);

            $lista = $d->getAlumnos($idCurso);

            echo "<h3>$nomCurso</h3 >";
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Año Rendición</th>
                    </tr>";

            foreach ($lista as $a) {
                echo "<tr>
                        <td>$a->id</td>
                        <td>$a->rut</td>
                        <td>$a->nombre</td>
                        <td>$a->anioRendicion</td>
                    </tr>";
            }
            echo "</table>";
        } else if (isset($_REQUEST["docente"])) {
            $filtro = $_REQUEST["docente"];

            $lista = $d->getCursos($filtro);
            
            echo "<h3>Resultados para \"$filtro\"</h3>";
            echo "<table border='1'>
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Curso</th>
                        <th>Año Rendición</th>
                    </tr>";
            
            foreach ($lista as $a) {
                echo "<tr>
                        <td>$a->rut</td>
                        <td>$a->docente</td>
                        <td>$a->nombreCurso</td>
                        <td>$a->anioRendicion</td>
                    </tr>";
            }
            echo "</table>";
        }
        ?>
    </body>
</html>
