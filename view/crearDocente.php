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
                    <a href="crearDocente.php">Crear Docente</a>
                </li>
            </ol>
        </nav>
        <div class="container">
            <div class="row p-3">
                <div class="col-6">
                    <h1>Crear Docente</h1>
                    <form action="../controller/crearDocente.php" method="post">
                        <input class="form-control form-group" type="text" name="rut" placeholder="Rut:" required list="ruts">
                        <input class="form-control form-group" type="text" name="nombre" placeholder="Nombre:" required list="nombres">
                        <input class="form-control btn btn-info" type="submit" value="Registrar docente">
                    </form>
                </div>
            </div>

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
        </div>
    </body>
</html>
