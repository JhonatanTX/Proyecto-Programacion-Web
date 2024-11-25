<?php 
require_once("conexion.php");
class EmpleadoModel{

	function __construct() {
	}
	function listarEmpleado(){

		$objconex = new Conexion();
		$conexion = $objconex->getconexion();
		
		$sentencia = "SELECT * FROM empleados ";
		$resultado = $conexion->query($sentencia);
	
		if ($resultado->num_rows > 0) {
		  // output data of each row
			while($row = $resultado->fetch_assoc()) {
				$arrayEmpleado[] = $row;
			}
		return $arrayEmpleado;
		} else {
		  //echo "0 results";
		}
	
	}
	
	function obtenerEmpleado($id_empleado) {
        $objconex = new Conexion();
        $conexion = $objconex->getconexion();

        $sentencia = "SELECT nombre,puesto,dni FROM empleados WHERE id_empleado = $id_empleado";
        $resultado = $conexion->query($sentencia);

        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }
    }

    function actualizarEmpleado($id_empleado, $nombre, $puesto, $dni, $contraseña) {
        $objconex = new Conexion();
        $conexion = $objconex->getconexion();
        
        $sentencia = "UPDATE empleados SET nombre = '$nombre', puesto ='$puesto', dni = '$dni', contrasena = '$contraseña' WHERE id = $id_empleado";
        $resultado = $conexion->query($sentencia);

        if($resultado) {
            return 1;
        } else {
            return 0;
        }
    }

	function borrarEmpleado($id_empleado){

		$objconex = new Conexion();
		$conexion = $objconex->getconexion();
		
		$sentencia = "DELETE FROM empleados WHERE id_empleado = $id_empleado ";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}

	}

	function crearEmpleado($nombre, $puesto, $dni, $contraseña){
		$objconex = new Conexion();
		$conexion = $objconex->getconexion();
		
		$sentencia = "INSERT INTO empleados (nombre,puesto,dni,contrasena) VALUES  ('$nombre','$puesto','$dni','$contraseña')";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}


	}
}