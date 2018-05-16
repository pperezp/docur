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
        <?php require_once 'importsCSS_JS.php';?>
    </head>
    <body>
        <script> 
        function pulsar(e) { 
            tecla = (document.all) ? e.keyCode :e.which; 
            return (tecla!==13); 
        } 
        </script> 
        <?php require_once 'navbar.php';?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="asignarCursoDocente.php">Asignar Curso</a>
                </li>
            </ol>
        </nav>
        
        <div class="container">
            <div class="row p-3">
                <div class="col-6">
                    <h1>Asignar curso a docente</h1>

                    <form action="../controller/asignarCursoDocente.php" method="post">
                        <input class="form-control form-group" type="text" name="docente" list="docentes" placeholder="Docente:" required onkeypress="return pulsar(event)">
                        <input class="form-control form-group" type="text" name="curso" list="cursos" placeholder="Curso:" required onkeypress="return pulsar(event)">
                        <input class="form-control form-group" type="number" name="anio" placeholder="Año rendición:" required min="2000" max="2100" step="1">
                        <input class="form-control btn btn-info" type="submit" value="Asignar">
                    </form>
                </div>
            </div>
        </div>

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
                echo "<option value='$doc->id - $doc->nombre'>";
            }
            ?>
        </datalist>

    </body>
</html>
