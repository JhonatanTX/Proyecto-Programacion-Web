<?php
class Conexion {

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "agenciaviajes";

    function getConexion(){
    $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    return $conn;
    }

}