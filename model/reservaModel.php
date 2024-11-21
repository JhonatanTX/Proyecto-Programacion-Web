<?php
require_once("conexion.php");
class ReservaModel{
    
    function __construct(){ 
    }
    
    function crearReserva($estado,$fechaReserva,$clienteId,$pagoId,$paqueteId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        
        $sentencia = "INSERT INTO reservas (estado,fecha_reserva,id_cliente,id_pago,id_paquete) VALUES  ($estado,$fechaReserva,$clienteId,$pagoId,$paqueteId)";
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
        $sentencia = "SELECT * FROM reservas";
        $resultado = $conexion->query($sentencia);
        
        if ($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $arrayReserva[] = $row;
            }
            return $arrayReserva;
        }else{
            echo "0 results"; 
        }
    }

    function obtenerReserva($reservaId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT estado,fecha_reserva,id_cliente,id_pago,id_paquete FROM reservas WHERE id_reserva = $reservaId";
        $resultado = $conexion->query($sentencia);

        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }else{
            return null;
        }
    }

    function actualizarReserva($reservaId,$estado,$fechaReserva,$clienteId,$pagoId,$paqueteId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "UPDATE reservas SET estado = $estado,fecha_reserva = $fechaReserva,id_cliente = $clienteId,id_pago = $pagoId,id_paquete = $paqueteId WHERE id_reserva = $reservaId";
        $resultado = $conexion->query($sentencia);

        if($resultado){
            return 1;
        }else{
            return 0;
        }
        
    }

    function borrarReserva($reservaId){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "DELETE FROM reservas WHERE id_reserva = $reservaId ";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }

}