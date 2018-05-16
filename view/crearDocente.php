<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Crear Docente</h1>
        <form action="../controller/crearDocente.php" method="post">
            <input type="text" name="rut" placeholder="Rut:" required list="ruts">
            <input type="text" name="nombre" placeholder="Nombre:" required list="nombres">
            <input type="submit" value="Registrar docente">
        </form>

        <a href="../index.php">Volver</a>

        <?php
        require_once '../model/Data.php';
        $lista = array();
        $d = new Data();
        foreach ($d->getAllDocentes() as $doc) {
            array_push($lista, $doc);
        }
        ?>

        <datalist id="nombres">
        <?php
        foreach ($lista as $doc){
            echo "<option value='$doc->nombre'>";
        }
        ?>
        </datalist>

        <datalist id="ruts">
        <?php
        foreach ($lista as $doc){
            echo "<option value='$doc->rut'>";
        }
        ?>
        </datalist>

    </body>
</html>
