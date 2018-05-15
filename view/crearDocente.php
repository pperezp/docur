<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Crear Docente</h1>
        <form action="../controller/crearDocente.php" method="post">
            <input type="text" name="rut" placeholder="Rut:" required>
            <input type="text" name="nombre" placeholder="Nombre:" required>
            <input type="submit" value="Registrar docente">
        </form>
        
        <a href="../index.php">Volver</a>
        
        <h2>Listado de docentes</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Rut</th>
                <th>Nombre</th>
            </tr>
            
            <?php
            require_once '../model/Data.php';
            $d = new Data();
            
            foreach($d->getAllDocentes() as $doc){
                echo "<tr>";
                    echo "<td>$doc->id</td>";
                    echo "<td>$doc->rut</td>";
                    echo "<td>$doc->nombre</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>
