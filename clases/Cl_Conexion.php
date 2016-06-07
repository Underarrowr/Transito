<?php

class Cl_Conexion {

    private $host = "localhost";
    private $database = "transito";
    private $user = "root";
    private $password = "root";
    private $cone;

    function __construct() {
        try {
            $this->cone = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function sqlOperation($sql) {
        try {
            $resp = mysqli_query($this->cone, $sql);
            return mysqli_affected_rows($this->cone);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function sqlSelection($sql) {
        try {
            $resp = mysqli_query($this->cone, $sql);
            return $resp;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
