<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="index.php">Docur v0.1</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?php
            if(Pagina::$ACTUAL == Pagina::$CREAR_CURSO || Pagina::$ACTUAL == Pagina::$CREAR_DOCENTE){
                echo "active";
            }
            ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Crear
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="crearDocente.php">Docente</a>
                <a class="dropdown-item" href="crearCurso.php">Curso</a>
            </div>
        </li>

        <li class="nav-item <?php
        if(Pagina::$ACTUAL == Pagina::$ASIGNAR_CURSO){
            echo "active";
        }
        ?>">
            <a class="nav-link" href="asignarCursoDocente.php">Asignar curso</a>
        </li>
        <li class="nav-item <?php
        if(Pagina::$ACTUAL == Pagina::$INDEX){
            echo "active";
        }
        ?>">
            <a class="nav-link" href="index.php">Buscar</a>
        </li>
    </ul>
</nav>
