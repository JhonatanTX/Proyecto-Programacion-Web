<?php
require_once("conexion.php");
class TransporteModel{
    
    function __construct(){ 
    }
    
    function crearTransporte($nombreEmpresa,$tipoTransporte,$costo,$paqueteId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        
        $sentencia = "INSERT INTO transportes (nombre_empresa,tipo_transporte,costo,id_paquete) VALUES  ($nombreEmpresa,$tipoTransporte,$costo,$paqueteId)";
        $resultado = $conexion->query($sentencia);
    
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    function listarReserva(){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT * FROM transportes";
        $resultado = $conexion->query($sentencia);
        
        if ($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $arrayTransporte[] = $row;
            }
            return $arrayTransporte;
        }else{
            echo "0 results"; 
        }
    }

    function obtenerReserva($transporteId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT nombre_empresa,tipo_transporte,costo,id_paquete FROM transportes WHERE id_transporte = $transporteId";
        $resultado = $conexion->query($sentencia);

        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }else{
            return null;
        }
    }

    function actualizarReserva($transporteId,$nombreEmpresa,$tipoTransporte,$costo,$paqueteId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "UPDATE transportes SET nombre_empresa = $nombreEmpresa,tipo_transporte = $tipoTransporte,costo = $costo,id_paquete = $paqueteId WHERE id_transporte = $transporteId";
        $resultado = $conexion->query($sentencia);

        if($resultado){
            return 1;
        }else{
            return 0;
        }
        
    }

    function borrarReserva($transporteId){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "DELETE FROM transportes WHERE id_transporte = $transporteId ";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }

}