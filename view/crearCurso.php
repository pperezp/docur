<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php require_once 'importsCSS_JS.php';?>
    </head>
    <body>
        <?php require_once 'navbar.php';?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="crearCurso.php">Crear Curso</a>
                </li>
            </ol>
        </nav>
        <div class="container">
            <div class="row p-3">
                <div class="col-6">
                    <h1>Crear Curso</h1>
                    <form action="../controller/crearCurso.php" method="post">
                        <input class="form-control form-group" type="text" name="nombre" placeholder="Nombre:" required list="cursos">
                        <input class="form-control btn btn-info" type="submit" value="Registrar Curso">
                    </form>
                </div>
            </div>

            <datalist id="cursos">
            <?php
            require_once '../model/Data.php';
            $d = new Data();
            foreach ($d->getAllCursos() as $c){
                echo "<option value='$c->nombre'>";
            }
            ?>
            </datalist>
        </div>
    </body>
</html>
