<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Crear Curso</h1>
        <form action="../controller/crearCurso.php" method="post">
            <input type="text" name="nombre" placeholder="Nombre:">
            <input type="submit" value="Registrar Curso">
        </form>
        
        <a href="../index.php">Volver</a>
        
        <h2>Listado de cursos</h2>
        <table border="1    ">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
            
            <?php
            require_once '../model/Data.php';
            $d = new Data();
            
            foreach($d->getAllCursos() as $cur){
                echo "<tr>";
                    echo "<td>$cur->id</td>";
                    echo "<td>$cur->nombre</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>
