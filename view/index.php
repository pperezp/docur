<?php
require_once 'Pagina.php';
Pagina::$ACTUAL = Pagina::$INDEX;
?>
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
            </ol>
        </nav>
        <div class="container">
            <?php require_once 'buscar.php';?>
            
            
            <div class="p-3">
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

                
                $titulo = "<h3 class='titulo'>$nomCurso</h3>";
                $html = "<table class='table table-striped'>
                        <tr>
                            <th>ID</th>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Año Rendición</th>
                        </tr>";
                
                echo "<h3>$nomCurso</h3>";
                echo "<a target='_blank' href='reporte.php'>PDF</a>";
                echo "<table class='table table-striped'>
                        <tr>
                            <th>ID</th>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Año Rendición</th>
                        </tr>";

                foreach ($lista as $a) {
                    $html .= "<tr>
                            <td>$a->id</td>
                            <td>$a->rut</td>
                            <td>$a->nombre</td>
                            <td>$a->anioRendicion</td>
                        </tr>";
                    
                    echo "<tr>
                            <td>$a->id</td>
                            <td>$a->rut</td>
                            <td>$a->nombre</td>
                            <td>$a->anioRendicion</td>
                        </tr>";
                }
                
                $html .= "</table>";
                echo "</table>";
                
                session_start();
                
                $_SESSION["titulo"] = $titulo;
                $_SESSION["contenido"] = $html;
                $_SESSION["curso"] = $nomCurso;
            } else if (isset($_REQUEST["docente"])) {
                $filtro = $_REQUEST["docente"];

                $lista = $d->getCursos($filtro);

                $titulo = "<h3 class='titulo'>Resultados para \"$filtro\"</h3>";
                echo "<h3>Resultados para \"$filtro\"</h3>";
                echo "<a target='_blank' href='reporte.php'>Ver como PDF</a>";
                
                $html = "<table class='table table-striped'>
                        <tr>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Curso</th>
                            <th>Año Rendición</th>
                        </tr>";
                echo "<table class='table table-striped'>
                        <tr>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Curso</th>
                            <th>Año Rendición</th>
                        </tr>";

                foreach ($lista as $a) {
                    $html .= "<tr>
                            <td>$a->rut</td>
                            <td>$a->docente</td>
                            <td>$a->nombreCurso</td>
                            <td>$a->anioRendicion</td>
                        </tr>";
                    
                    echo "<tr>
                            <td>$a->rut</td>
                            <td>$a->docente</td>
                            <td>$a->nombreCurso</td>
                            <td>$a->anioRendicion</td>
                        </tr>";
                }
                
                $html .= "</table>";
                echo "</table>";
                
                session_start();
                
                $_SESSION["titulo"] = $titulo;
                $_SESSION["contenido"] = $html;
                $_SESSION["curso"] = $filtro;
                }
            ?>
            </div>
        </div>
    </body>
</html> 
