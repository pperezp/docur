<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Crear Curso</h1>
        <form action="../controller/crearCurso.php" method="post">
            <input type="text" name="nombre" placeholder="Nombre:" required list="cursos">
            <input type="submit" value="Registrar Curso">
        </form>
        
        <a href="../index.php">Volver</a>
        
        <datalist id="cursos">
        <?php
        require_once '../model/Data.php';
        $d = new Data();
        foreach ($d->getAllCursos() as $c){
            echo "<option value='$c->nombre'>";
        }
        ?>
        </datalist>
    </body>
</html>
