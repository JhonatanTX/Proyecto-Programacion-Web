<?php
require_once("conexion.php");
class ViajeModel{
    
    function __construct(){
    }
    
    function crearViaje($nombre_paquete,$descripcion,$destinos,$precio,$fechas_disponibles,$duracion,$transporte){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        
        $sentencia = "INSERT INTO viajes (nombre_paquete,descripcion,destinos,precio,fechas_disponibles,duracion,transporte) VALUES  ('$nombre_paquete','$descripcion','$destinos','$precio','$fechas_disponibles','$duracion','$transporte')";
        $resultado = $conexion->query($sentencia);
    
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    function listarViaje(){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT * FROM viajes";
        $resultado = $conexion->query($sentencia);
        
        if ($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $arrayViaje[] = $row;
            }
            return $arrayViaje;
        }else{
            echo "0 results"; 
        }
    }

    function obtenerViaje($id_viaje){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT nombre_paquete,descripcion,destinos,precio,fechas_disponibles,duracion,transporte FROM viajes WHERE id_viaje = $id_viaje";
        $resultado = $conexion->query($sentencia);

        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }else{
            return null;
        }
    }

    function actualizarViaje($id_viaje,$nombre_paquete,$descripcion,$destinos,$precio,$fechas_disponibles,$duracion,$transporte){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "UPDATE viajes SET nombre_paquete = '$nombre_paquete',descripcion = '$descripcion',destinos = '$destinos',precio = '$precio',fechas_disponibles = '$fechas_disponibles',duracion = '$duracion',transporte = '$transporte' WHERE id_viaje = '$id_viaje'";
        $resultado = $conexion->query($sentencia);

        if($resultado){
            return 1;
        }else{
            return 0;
        }
        
    }

    function borrarViaje($id_viaje){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "DELETE FROM viajes WHERE id_viaje = $id_viaje ";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }

    function buscarIdViaje($destinos){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();

        $sentencia = "SELECT id_viaje FROM viajes WHERE destinos = '$destinos'";
        $resultado = $conexion->query($sentencia);
        return $resultado;
    }
}