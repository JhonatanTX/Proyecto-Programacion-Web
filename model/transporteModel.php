<?php
require_once("conexion.php");
class TransporteModel{
    
    function __construct(){ 
    }
    
    function crearTransporte($tipo_transporte,$id_proveedor,$numero_servicio,$precio,$fecha_salida,$destino){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        
        $sentencia = "INSERT INTO transportes (tipo_transporte,id_proveedor,numero_servicio,precio,fecha_salida,destino) VALUES  ($tipo_transporte,$id_proveedor,$numero_servicio,$precio,$fecha_salida,$destino)";
        $resultado = $conexion->query($sentencia);
    
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    function listarTransporte(){
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

    function obtenerTransporte($id_transporte){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT tipo_transporte,id_proveedor,numero_servicio,precio,fecha_salida,destino FROM transportes WHERE id_transporte = $id_transporte";
        $resultado = $conexion->query($sentencia);

        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }else{
            return null;
        }
    }

    function actualizarTransporte($id_transporte,$tipo_transporte,$id_proveedor,$numero_servicio,$precio,$fecha_salida,$destino){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "UPDATE transportes SET tipo_transporte = $tipo_transporte,id_proveedor = $id_proveedor,numero_servicio = $numero_servicio,precio = $precio,fecha_salida = $fecha_salida,destino = $destino WHERE id_transporte = $id_transporte";
        $resultado = $conexion->query($sentencia);

        if($resultado){
            return 1;
        }else{
            return 0;
        }
        
    }

    function borrarTransporte($id_transporte){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "DELETE FROM transportes WHERE id_transporte = $id_transporte ";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }

}