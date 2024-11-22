<?php
require_once("conexion.php");
class ReservaModel{
    
    function __construct(){ 
    }
    
    function crearReserva($id_cliente,$id_viaje,$fecha_reserva,$numero_personas,$fecha_salida,$fecha_regreso,$estado_reserva,$precio_total){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        
        $sentencia = "INSERT INTO reservas (id_cliente,id_viaje,fecha_reserva,numero_personas,fecha_salida,fecha_regreso,estado_reserva,precio_total) VALUES  ($id_cliente,$id_viaje,$fecha_reserva,$numero_personas,$fecha_salida,$fecha_regreso,$estado_reserva,$precio_total)";
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

    function obtenerReserva($id_reserva){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT id_cliente,id_viaje,fecha_reserva,numero_personas,fecha_salida,fecha_regreso,estado_reserva,precio_total FROM reservas WHERE id_reserva = $id_reserva";
        $resultado = $conexion->query($sentencia);

        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }else{
            return null;
        }
    }

    function actualizarReserva($id_reserva,$id_cliente,$id_viaje,$fecha_reserva,$numero_personas,$fecha_salida,$fecha_regreso,$estado_reserva,$precio_total){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "UPDATE reservas SET id_cliente = $id_cliente,id_viaje = $id_viaje,fecha_reserva = $fecha_reserva,numero_personas = $numero_personas,fecha_salida = $fecha_salida,fecha_regreso = $fecha_regreso,estado_reserva = $estado_reserva,precio_total = $precio_total WHERE id_reserva = $id_reserva";
        $resultado = $conexion->query($sentencia);

        if($resultado){
            return 1;
        }else{
            return 0;
        }
        
    }

    function borrarReserva($id_reserva){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "DELETE FROM reservas WHERE id_reserva = $id_reserva ";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }

}