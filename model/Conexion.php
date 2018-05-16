<?php
define("ONLINE", false);

class Conexion {

    private $mysql;
    private $bdName;
    private $user;
    private $pass;
    
    public function __construct() {
        if (!ONLINE) {
            $this->bdName = "docur";
            $this->user = "root";
            $this->pass = "123456";
        }else{
            $this->bdName = "u843528536_docur";
            $this->user = "u843528536_root";
            $this->pass = "852WkG0ol4eO";
        }
    }

    public function conectar() {
        $this->mysql = new mysqli(
                "localhost", $this->user, $this->pass, $this->bdName
        );

        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }
    }

    public function ejecutar($query) {
        return $this->mysql->query($query);
    }

    public function desconectar() {
        $this->mysql->close();
    }

}
