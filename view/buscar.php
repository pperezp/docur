<div class="row p-3">
    <div class="col-md-6">
        <h2>Buscar por cursos</h2>
        <form action="index.php" method="post">
            <input class="form-control form-group" type="text" name="curso" list="cursos" placeholder="Curso:">
            <input class="form-control btn btn-info" type="submit" value="Buscar">
        </form>
    </div>
    <div class="col-md-6">
        <h2>Buscar por docentes</h2>
        <form action="index.php" method="post">
            <input class="form-control form-group" type="text" name="docente" list="docentes" placeholder="Docente: (Rut o nombre)">
            <input class="form-control btn btn-info" type="submit" value="Buscar">
        </form>
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
        echo "<option value='$doc->nombre'>";
    }
    ?>
</datalist>
