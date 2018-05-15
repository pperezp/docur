<?php
require_once 'Conexion.php';

class Data {
    private $c;
    
    function __construct() {
        $this->c = new Conexion("docur");
    }

}
