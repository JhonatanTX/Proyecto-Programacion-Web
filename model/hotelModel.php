<?php
require_once("conexion.php");
class HotelModel{
    
    function __construct(){
    }
    
    function crearHotel($nombreHotel,$direccion,$calificacion,$destinoId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        
        $sentencia = "INSERT INTO hoteles (nombre_hotel,direccion,calificacion,id_destino) VALUES  ($nombreHotel,$direccion,$calificacion,$destinoId)";
        $resultado = $conexion->query($sentencia);
    
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    function listarHotel(){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT * FROM hoteles";
        $resultado = $conexion->query($sentencia);
        
        if ($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $arrayHotel[] = $row;
            }
            return $arrayHotel;
        }else{
            echo "0 results"; 
        }
    }

    function obtenerHotel($hotelId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT nombre_hotel,direccion,calificacion,id_destino FROM hoteles WHERE id_hotel = $hotelId";
        $resultado = $conexion->query($sentencia);

        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }else{
            return null;
        }
    }

    function actualizarHotel($hotelId,$nombreHotel,$direccion,$calificacion,$destinoId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "UPDATE hoteles SET nombre_hotel = $nombreHotel,direccion = $direccion,calificacion = $calificacion,id_destino = $destinoId WHERE id_hotel = $hotelId";
        $resultado = $conexion->query($sentencia);

        if($resultado){
            return 1;
        }else{
            return 0;
        }
        
    }

    function borrarHotel($hotelId){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "DELETE FROM hoteles WHERE id_hotel = $hotelId ";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }

}