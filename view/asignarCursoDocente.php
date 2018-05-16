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
        <script> 
        function pulsar(e) { 
            tecla = (document.all) ? e.keyCode :e.which; 
            return (tecla!==13); 
        } 
        </script> 
        
        <h1>Asignar curso a docente</h1>

        <form action="../controller/asignarCursoDocente.php" method="post">
            <input type="text" name="docente" list="docentes" placeholder="Docente:" required onkeypress="return pulsar(event)">
            <input type="text" name="curso" list="cursos" placeholder="Curso:" required onkeypress="return pulsar(event)">
            <input type="number" name="anio" placeholder="Año rendición:" required min="2000" max="2100" step="1">
            <input type="submit" value="Asignar">
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
                echo "<option value='$doc->id - $doc->nombre'>";
            }
            ?>
        </datalist>

        <a href="../index.php">Volver</a>
    </body>
</html>
