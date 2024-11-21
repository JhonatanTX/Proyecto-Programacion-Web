<?php
require_once("conexion.php");
class MedioPagoModel{
    
    function __construct(){
    }
    
    function crearMedioPago($metodoPago,$fechaPago,$monto){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        
        $sentencia = "INSERT INTO mediospago (metodo_pago,fecha_pago,monto) VALUES  ($metodoPago,$fechaPago,$monto)";
        $resultado = $conexion->query($sentencia);
    
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    function listarMedioPago(){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT * FROM mediospago";
        $resultado = $conexion->query($sentencia);
        
        if ($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $arrayPago[] = $row;
            }
            return $arrayPago;
        }else{
            echo "0 results"; 
        }
    }

    function obtenerMedioPago($pagoId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT metodo_pago,fecha_pago,monto FROM mediospago WHERE id_pago = $pagoId";
        $resultado = $conexion->query($sentencia);

        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }else{
            return null;
        }
    }

    function actualizarMedioPago($pagoId,$metodoPago,$fechaPago,$monto){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "UPDATE mediospago SET metodo_pago = $metodoPago,fecha_pago = $fechaPago,monto = $monto WHERE id_pago = $pagoId";
        $resultado = $conexion->query($sentencia);

        if($resultado){
            return 1;
        }else{
            return 0;
        }
        
    }

    function borrarMedioPago($pagoId){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "DELETE FROM mediospago WHERE id_pago = $pagoId ";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }

}