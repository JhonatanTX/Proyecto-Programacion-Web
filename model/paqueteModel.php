<?php
require_once("conexion.php");
class PaqueteModel{
    
    function __construct(){
    }
    
    function crearPaquete($nombrePaquete,$duracion,$descripcion,$precio){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        
        $sentencia = "INSERT INTO paquetes (nombre_paquete,duracion_dias,descripcion,precio) VALUES  ($nombrePaquete,$duracion,$descripcion,$precio)";
        $resultado = $conexion->query($sentencia);
    
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    function listarPaquete(){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT * FROM paquetes";
        $resultado = $conexion->query($sentencia);
        
        if ($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $arrayPaquete[] = $row;
            }
            return $arrayPaquete;
        }else{
            echo "0 results"; 
        }
    }

    function obtenerPaquete($paqueteId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT nombre_paquete,duracion_dias,descripcion,precio FROM paquetes WHERE id_paquete = $paqueteId";
        $resultado = $conexion->query($sentencia);

        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }else{
            return null;
        }
    }

    function actualizarPaquete($paqueteId,$nombrePaquete,$duracion,$descripcion,$precio){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "UPDATE paquetes SET nombre_paquete = $nombrePaquete,duracion_dias = $duracion,descripcion = $descripcion,precio = $precio WHERE id_paquete = $paqueteId";
        $resultado = $conexion->query($sentencia);

        if($resultado){
            return 1;
        }else{
            return 0;
        }
        
    }

    function borrarPaquete($paqueteId){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "DELETE FROM paquetes WHERE id_paquete = $paqueteId ";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }

}