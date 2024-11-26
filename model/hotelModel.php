<?php
require_once("conexion.php");
class HotelModel{
    
    function __construct(){
    }
    
    function crearHotel($nombre_hotel,$direccion,$telefono,$correo_electronico,$lugar,$id_proveedor){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        
        $sentencia = "INSERT INTO hoteles (nombre_hotel,direccion,telefono,correo_electronico,lugar,id_proveedor) VALUES  ('$nombre_hotel','$direccion','$telefono','$correo_electronico','$lugar','$id_proveedor')";
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
        $sentencia = "SELECT h.id_hotel, p.nombre_empresa,h.nombre_hotel, h.direccion, h.telefono, h.correo_electronico, h.lugar FROM hoteles h JOIN proveedores p ON h.id_proveedor = p.id_proveedor";
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

    function obtenerHotel($id_hotel){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT nombre_hotel,direccion,telefono,correo_electronico,lugar,id_proveedor FROM hoteles WHERE id_hotel = $id_hotel";
        $resultado = $conexion->query($sentencia);

        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }else{
            return null;
        }
    }

    function actualizarHotel($id_hotel,$nombre_hotel,$direccion,$telefono,$correo_electronico,$lugar){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "UPDATE hoteles SET nombre_hotel = '$nombre_hotel' ,direccion = '$direccion',telefono = '$telefono',correo_electronico = '$correo_electronico',lugar = '$lugar' WHERE id_hotel = '$id_hotel'";
        $resultado = $conexion->query($sentencia);

        if($resultado){
            return 1;
        }else{
            return 0;
        }
        
    }

    function borrarHotel($id_hotel){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "DELETE FROM hoteles WHERE id_hotel = '$id_hotel' ";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }


}