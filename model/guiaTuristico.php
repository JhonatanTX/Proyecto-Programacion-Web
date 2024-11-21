<?php
require_once("conexion.php");
class GuiaTuristicoModel{
    
    function __construct(){
    }
    
    function crearGuiaTuristico($nombreGuia,$telefono,$paqueteId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        
        $sentencia = "INSERT INTO guiaturisticos (nombre_guia,telefono,id_paquete) VALUES  ($nombreGuia,$telefono,$paqueteId)";
        $resultado = $conexion->query($sentencia);
    
        if($resultado){
            return 1;
        }else{
            return 0;
        }
    }

    function listarGuiaTuristico(){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT * FROM guiaturisticos";
        $resultado = $conexion->query($sentencia);
        
        if ($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $arrayGuia[] = $row;
            }
            return $arrayGuia;
        }else{
            echo "0 results"; 
        }
    }

    function obtenerGuiaTuristico($guiaId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "SELECT nombre_guia,telefono,id_paquete FROM guiaturisticos WHERE id_guia = $guiaId";
        $resultado = $conexion->query($sentencia);

        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }else{
            return null;
        }
    }

    function actualizarGuiaTuristico($guiaId,$nombreGuia,$telefono,$paqueteId){
        $objConex = new Conexion();
        $conexion = $objConex->getConexion();
        $sentencia = "UPDATE guiaturisticos SET nombre_guia = $nombreGuia,telefono = $telefono,id_paquete = $paqueteId WHERE id_guia = $guiaId";
        $resultado = $conexion->query($sentencia);

        if($resultado){
            return 1;
        }else{
            return 0;
        }
        
    }

    function borrarGuiaTuristico($guiaId){
        $objConex = new Conexion();
		$conexion = $objConex->getConexion();
		
		$sentencia = "DELETE FROM guiaturisticos WHERE id_guia = $guiaId ";
		$resultado = $conexion->query($sentencia);

		if($resultado){
			return 1;
		}else{
			return 0;
		}
    }

}