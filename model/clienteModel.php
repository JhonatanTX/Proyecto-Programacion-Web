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
        }else{
            echo "0 results"; 
        }
    }

    function obtenerCliente($clienteId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT usuario,nombre,apellido,email,telefono FROM clientes WHERE id_cliente = $clienteId";
        $resultado = $conexion->query($sentencia);

        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }else{
            return null;
        }
    }

    function actualizarCliente($clienteId,$usuario,$contraseña,$nombre,$apellido,$email,$telefono){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "UPDATE clientes SET usuario = $usuario,contraseña = $contraseña,nombre = $nombre,apellido = $apellido,email = $email,telefono = $telefono WHERE id_cliente = $clienteId";
        $resultado = $conexion->query($sentencia);

        if($resultado){
            return 1;
        }else{
            return 0;
        }
        
    }

    function borrarCliente($clienteId){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "DELETE FROM clientes WHERE id_cliente = $clienteId ";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }

    function crearCliente($usuario,$contraseña,$nombre,$apellido,$email,$telefono){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "INSERT INTO clientes (usuario,nombre,apellido,contraseña,email,telefono) VALUES  ('$usuario', '$nombre', '$apellido','$contraseña','$email','$telefono')";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }
}