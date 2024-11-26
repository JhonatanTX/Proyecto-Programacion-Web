<?php
require_once("conexion.php");
class ClienteModel{

    function __construct(){
    }

    function listarCliente(){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT * FROM clientes";
        $resultado = $conexion->query($sentencia);

        if ($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $arrayCliente[] = $row;
            }
            return $arrayCliente;
        }
    }

    function obtenerCliente($id_cliente){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT nombre,apellido,correo_electronico,telefono,direccion FROM clientes WHERE id_cliente = $id_cliente";
        $resultado = $conexion->query($sentencia);

        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }else{
            return null;
        }
    }

    function actualizarCliente($id_cliente,$nombre,$apellido,$correo_electronico,$telefono,$direccion){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "UPDATE clientes SET nombre = '$nombre',apellido = '$apellido',correo_electronico = '$correo_electronico',telefono = '$telefono' ,direccion = '$direccion' WHERE id_cliente = '$id_cliente'";
        $resultado = $conexion->query($sentencia);

        if($resultado){
            return 1;
        }else{
            return 0;
        }
        
    }

    function borrarCliente($id_cliente){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "DELETE FROM clientes WHERE id_cliente = $id_cliente ";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }

    function crearCliente($nombre,$apellido,$correo_electronico,$telefono,$direccion){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "INSERT INTO clientes (nombre,apellido,correo_electronico,telefono,direccion) VALUES  ('$nombre', '$apellido','$correo_electronico','$telefono','$direccion')";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }

    function buscarIdCliente($nombre){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();

        $sentencia = "SELECT id_cliente FROM clientes WHERE nombre = '$nombre'";
        $resultado = $conexion->query($sentencia);
        return $resultado;
    }
}