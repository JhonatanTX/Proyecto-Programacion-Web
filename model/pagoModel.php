<?php
require_once("conexion.php");
class PagoModel{
    
    function __construct(){
    }
    
    function crearPago($monto_pagado,$fecha_pago,$metodo_pago,$id_reserva){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        
        $sentencia = "INSERT INTO pagos (monto_pagado,fecha_pago,metodo_pago,id_reserva) VALUES  ('$monto_pagado','$fecha_pago','$metodo_pago','$id_reserva')";
        $resultado = $conexion->query($sentencia);
    
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    function listarPago(){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT p.id_pago,p.id_reserva,p.monto_pagado,p.fecha_pago,p.metodo_pago FROM pagos p ";
        $resultado = $conexion->query($sentencia);
        
        if ($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $arrayPago[] = $row;
            }
            return $arrayPago;
        }else{
            //echo "0 results"; 
        }
    }

    function obtenerPago($id_pago){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT monto_pagado,fecha_pago,metodo_pago,id_reserva FROM pagos WHERE id_pago = $id_pago";
        $resultado = $conexion->query($sentencia);

        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }else{
            return null;
        }
    }

    function actualizarPago($id_pago,$monto_pagado,$fecha_pago,$metodo_pago){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "UPDATE pagos SET monto_pagado = '$monto_pagado',fecha_pago = '$fecha_pago',metodo_pago = '$metodo_pago' WHERE id_pago = '$id_pago'";
        $resultado = $conexion->query($sentencia);

        if($resultado){
            return 1;
        }else{
            return 0;
        }
        
    }

    function borrarPago($id_pago){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "DELETE FROM pagos WHERE id_pago = '$id_pago' ";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }

}