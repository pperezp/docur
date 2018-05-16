<?php
require_once 'Conexion.php';

class Data {
    private $con;
    
    public function __construct() {
        $this->con = new Conexion("docur");
    }
    
    private function ejecutar($query){
        $this->con->conectar();
        $this->con->ejecutar($query);
        $this->con->desconectar();
    }
    
    private function ejecutarSelect($query){
        $lista = array();
        
        $this->con->conectar();
        $rs = $this->con->ejecutar($query);
        
        while($ob = $rs->fetch_object()){
            array_push($lista, $ob);
        }
        
        $this->con->desconectar();
    
        return $lista;
    }
    
    public function crearDocente($rut, $nombre){
        $query = "CALL crear_docente('$rut','$nombre');";
        $this->ejecutar($query);
    }
    
    public function crearCurso($nombre){
        $query = "CALL crear_curso('$nombre');";
        $this->ejecutar($query);
    }
    
    public function addCursoDocente($idDocente, $idCurso, $anio){
        $query = "CALL add_curso_docente($idDocente, $idCurso, '$anio');";
        $this->ejecutar($query);
    }
    
    /**
     * 
     * @param type $filtro El filtro puede ser
     * el rut o el nombre
     */
    public function getCursos($filtro){
        $query = "CALL get_cursos('$filtro');";
        return $this->ejecutarSelect($query);
    }
    
    public function getAlumnos($idCurso){
        $query = "CALL get_alumnos('$idCurso');";
        return $this->ejecutarSelect($query);
    }
    
    public function getAllCursos(){
        return $this->ejecutarSelect("SELECT * FROM curso ORDER BY nombre ASC");
    }
    
    public function getAllDocentes(){
        return $this->ejecutarSelect("SELECT * FROM docente ORDER BY nombre ASC");
    }
}
