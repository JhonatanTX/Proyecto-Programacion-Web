<?php 
require_once('conexion.php');

class UsuarioModel{

    function __construct(){
    }
    
    function verUsuario($usuario,$contraseña){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT usuario FROM admin WHERE usuario = $usuario AND contraseña =$contraseña";
        $resultado = $conexion->query($sentencia);

        if ($resultado->num_rows > 0){
            return 1;
        }else{
            return 0;
        }

    }



}