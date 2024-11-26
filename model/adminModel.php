<?php 
require_once('conexion.php');

class AdminModel{

    function __construct(){
    }
    
    function verEmpleado($nombre,$contraseña){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT nombre FROM empleados WHERE nombre = '$nombre' AND contrasena ='$contraseña'";
        $resultado = $conexion->query($sentencia);

        if ($resultado->num_rows > 0){
            return 1;
        }else{
            return 0;
        }

    }



}