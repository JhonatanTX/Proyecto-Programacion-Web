<?php
require_once("conexion.php");
class PromocionModel{
    
    function __construct(){
    }
    
    function crearPromocion($descuento,$descripcion,$paqueteId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        
        $sentencia = "INSERT INTO promociones (descuento,descripcion_promocion,id_paquete) VALUES  ($descuento,$descripcion,$paqueteId)";
        $resultado = $conexion->query($sentencia);
    
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    function listarPromocion(){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT * FROM promociones";
        $resultado = $conexion->query($sentencia);
        
        if ($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $arrayPromocion[] = $row;
            }
            return $arrayPromocion;
        }else{
            echo "0 results"; 
        }
    }

    function obtenerPromocion($promocionId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT descuento,descripcion_promocion,id_paquete FROM promociones WHERE id_promocion = $promocionId";
        $resultado = $conexion->query($sentencia);

        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }else{
            return null;
        }
    }

    function actualizarPromocion($promocionId,$descuento,$descripcion,$paqueteId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "UPDATE promociones SET descuento = $descuento,descripcion_promocion = $descripcion,id_paquete = $paqueteId WHERE id_promocion = $promocionId";
        $resultado = $conexion->query($sentencia);

        if($resultado){
            return 1;
        }else{
            return 0;
        }
        
    }

    function borrarPaquete($promocionId){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "DELETE FROM promociones WHERE id_promocion = $promocionId ";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }

}