<?php
require_once("conexion.php");
class DestinoModel{
    
    function __construct(){
    }
    
    function crearDestino($nombreDestino,$region,$descripcion){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        
        $sentencia = "INSERT INTO destinos (nombre_destino,region,descripcion) VALUES  ($nombreDestino,$region,$descripcion)";
        $resultado = $conexion->query($sentencia);
    
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    function listarDestino(){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT * FROM destinos";
        $resultado = $conexion->query($sentencia);
        
        if ($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $arrayDestinos[] = $row;
            }
            return $arrayDestinos;
        }else{
            echo "0 results"; 
        }
    }

    function obtenerCliente($destinoId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT nombre_destino,region,descripcion FROM destinos WHERE id_destino = $destinoId";
        $resultado = $conexion->query($sentencia);

        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }else{
            return null;
        }
    }

    function actualizarCliente($destinoId,$nombreDestino,$region,$descripcion){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "UPDATE destinos SET nombre_destino = $nombreDestino,region = $region,descripcion = $descripcion WHERE id_destino = $destinoId";
        $resultado = $conexion->query($sentencia);

        if($resultado){
            return 1;
        }else{
            return 0;
        }
        
    }

    function borrarCliente($destinoId){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "DELETE FROM destinos WHERE id_destino = $destinoId ";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }

}