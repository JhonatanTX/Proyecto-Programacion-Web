<?php
require_once("conexion.php");
class ProveedorModel{
    
    function __construct(){
    }
    
    function crearProveedor($nombre_empresa,$tipo_servicio,$contacto,$direccion,$telefono,$correo_electronico,$tarifas){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        
        $sentencia = "INSERT INTO proveedores (nombre_empresa,tipo_servicio,contacto,direccion,telefono,correo_electronico,tarifas) VALUES  ('$nombre_empresa','$tipo_servicio','$contacto','$direccion','$telefono','$correo_electronico','$tarifas')";
        $resultado = $conexion->query($sentencia);
    
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    function listarProveedor(){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT * FROM proveedores";
        $resultado = $conexion->query($sentencia);
        
        if ($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $arrayProveedor[] = $row;
            }
            return $arrayProveedor;
        }else{
            echo "0 results"; 
        }
    }

    function obtenerProveedor($id_proveedor){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT nombre_empresa,tipo_servicio,contacto,direccion,telefono,correo_electronico,tarifas FROM proveedores WHERE id_proveedor = $id_proveedor";
        $resultado = $conexion->query($sentencia);

        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }else{
            return null;
        }
    }

    function actualizarProveedor($id_proveedor,$nombre_empresa,$tipo_servicio,$contacto,$direccion,$telefono,$correo_electronico,$tarifas){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "UPDATE proveedores SET nombre_empresa = '$nombre_empresa',tipo_servicio = '$tipo_servicio',contacto = '$contacto',direccion = '$direccion',telefono = '$telefono',correo_electronico = '$correo_electronico',tarifas = '$tarifas' WHERE id_proveedor = '$id_proveedor'";
        $resultado = $conexion->query($sentencia);

        if($resultado){
            return 1;
        }else{
            return 0;
        }
        
    }

    function borrarProveedor($id_proveedor){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "DELETE FROM proveedores WHERE id_proveedor = $id_proveedor ";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }

    function buscarIdProveedor($nombre_empresa){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();

        $sentencia = "SELECT id_proveedor FROM proveedores WHERE nombre_empresa = '$nombre_empresa'";
        $resultado = $conexion->query($sentencia);
        return $resultado;
    }
}