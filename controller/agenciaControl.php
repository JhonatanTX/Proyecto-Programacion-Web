<?php
include("../model/adminModel.php");
include("../model/empleadoModel.php");
include("../model/hotelModel.php");
include("../model/viajeModel.php");
include("../model/clienteModel.php");
include("../model/transporteModel.php");
include("../model/proveedorModel.php");
include("../model/pagoModel.php");
include("../model/reservaModel.php");

$opcion = $_GET['opcion'];
switch ($opcion) {

	// LOGIN ADMIN
	case 'login-form-admin':

		include("../view/viewLoginAdmin/loginAdmin.php");
		break;
	case 'login-procesar': //VERIFICAR ADMINISTRADOR
		// code...

		$nombre = $_POST['nombre'];
		$contraseña = sha1($_POST['contrasena']);


		$objModel = new AdminModel();
		$result = $objModel->verEmpleado($nombre,$contraseña);

		if($result == 1){
			header("Location: agenciaControl.php?opcion=empleado-listado");
		}else{
			echo "Error en el usuario o clave";
		}


		break;
	
	// CASOS PARA EMPLEADOS 
	case 'empleado-listado':

		$objEmp = new EmpleadoModel();
		$resultEmpleados = $objEmp->listarEmpleado();

		include("../view/template/header.php");
		include("../view/template/menu.php");
		include("../view/empleados/listado.php");
		include("../view/template/footer.php");
		break;

	case 'empleado-eliminar':

		$objEmp = new EmpleadoModel();
		$id_empleado = $_GET['id_empleado'];
		$resultEmpleados = $objEmp->borrarEmpleado($id_empleado);

		if ($resultEmpleados == 1) {
			$msg = "El registro se borro correctamente";

			header("Location: agenciaControl.php?opcion=empleado-listado&msg=$msg");
		}

		break;
	
	case 'empleado-editar':
			$id_empleado = $_GET['id_empleado'];
			$objEmp = new EmpleadoModel();
			$empleado = $objEmp->obtenerEmpleado($id_empleado);
	
			if ($empleado) {
				// Almacena los datos del empleado para mostrarlos en el formulario
				$nombre = $empleado['nombre'];
				$puesto = $empleado['puesto'];
				$dni = $empleado['dni'];
				$contraseña = ''; // Deja el campo de contraseña vacío
				include("../view/template/header.php");
				include("../view/template/menu.php");
				include("../view/empleados/editar.php");
				include("../view/template/footer.php");
			} else {
				echo "Empleado no encontrado.";
			}
			break;
	
	case 'empleado-editar-procesar':
			$id_empleado = $_POST['id_empleado'];
			$nombre = $_POST['nombre'];
			$puesto = $_POST['puesto'];
			$dni = $_POST['dni'];
			$contraseña= sha1($_POST['contraseña']);
	
			$objEmp = new EmpleadoModel();
			$resultEmpleados = $objEmp->actualizarEmpleado($id_empleado, $nombre, $puesto, $dni, $contraseña);
	
			if ($resultEmpleados == 1) {
				$msg = "El empleado se actualizó correctamente.";
				header("Location: agenciaControl.php?opcion=empleado-listado&msg=$msg");
			} else {
				echo "Error al actualizar el empleado.";
			}
			break;


	case 'empleado-nuevo':

		include("../view/template/header.php");
		include("../view/template/menu.php");
		include("../view/empleados/nuevo.php");
		include("../view/template/footer.php");

		break;

	case 'empleado-nuevo-procesar':

		$nombre = $_POST['nombre'];
		$puesto = $_POST['puesto'];
		$dni = $_POST['dni'];
		$contraseña = sha1($_POST['contraseña']);

		$objEmp = new EmpleadoModel();
		$resultEmpleados = $objEmp->crearEmpleado($nombre,$puesto,$dni,$contraseña);

		if ($resultEmpleados == 1) {
			$msg = "Se creo un nuevo empleado";

			header("Location: agenciaControl.php?opcion=empleado-listado&msg=$msg");
		}

		break;
	
	// CASOS PARA CATEGORIAS
	
	case 'hotel-listado':

		$objHotel = new HotelModel();
		$resultHoteles = $objHotel->listarHotel();
	
		include("../view/template/header.php");
		include("../view/template/menu.php");
		include("../view/hoteles/listado.php");
		include("../view/template/footer.php");
		break;
	
	case 'hotel-nuevo':

		$objProveedor = new ProveedorModel();
		$resultProveedores = $objProveedor->listarProveedor();

		include("../view/template/header.php");
		include("../view/template/menu.php");
		include("../view/hoteles/nuevo.php");
		include("../view/template/footer.php");
		break;
	
	case 'hotel-nuevo-procesar':

		$nombre_hotel = $_POST['nombre_hotel'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$correo_electronico = $_POST['correo_electronico'];
		$lugar = $_POST['lugar'];
		$nombre_empresa = $_POST['nombre_empresa'];

		$objProveedor = new ProveedorModel();
		$resultProveedores = $objProveedor->buscarIdProveedor($nombre_empresa)->fetch_assoc();
		$id_proveedor = $resultProveedores['id_proveedor'];

		$objHotel = new HotelModel();
		$resultHoteles = $objHotel->crearHotel($nombre_hotel, $direccion, $telefono, $correo_electronico, $lugar, $id_proveedor);
	
		if ($resultHoteles == 1) {
			$msg = "El hotel fue creado exitosamente.";
			header("Location: agenciaControl.php?opcion=hotel-listado&msg=$msg");
		} else {
			echo "Error al crear el hotel.";
		}
		break;
	
	case 'hotel-eliminar':

		$id_hotel = $_GET['id_hotel'];

		$objHotel = new HotelModel();
		$resultHoteles = $objHotel->borrarHotel($id_hotel);
	
		if ($resultHoteles == 1) {
			$msg = "El hotel fue eliminado exitosamente.";
			header("Location: agenciaControl.php?opcion=hotel-listado&msg=$msg");
		} else {
			echo "Error al eliminar el hotel.";
		}
		break;
	
	case 'hotel-editar':

		$id_hotel = $_GET['id_hotel'];

		$objHotel = new HotelModel();
		$hotel = $objHotel->obtenerHotel($id_hotel);
	
		if ($hotel) {
			$nombre_hotel = $hotel['nombre_hotel'];
			$direccion = $hotel['direccion'];
			$telefono = $hotel['telefono'];
			$correo_electronico = $hotel['correo_electronico'];
			$lugar = $hotel['lugar'];
			$id_proveedor = $hotel['id_proveedor'];
	
			include("../view/template/header.php");
			include("../view/template/menu.php");
			include("../view/hoteles/editar.php");
			include("../view/template/footer.php");
		} else {
			echo "Hotel no encontrado.";
		}
		break;
	
	case 'hotel-editar-procesar':

		$id_hotel = $_POST['id_hotel'];
		$nombre_hotel = $_POST['nombre_hotel'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$correo_electronico = $_POST['correo_electronico'];
		$lugar = $_POST['lugar'];
		

		$objHotel = new HotelModel();
		$resultado = $objHotel->actualizarHotel($id_hotel, $nombre_hotel, $direccion, $telefono, $correo_electronico, $lugar);
	
		if ($resultado == 1) {
			$msg = "El hotel fue actualizado correctamente.";
			header("Location: agenciaControl.php?opcion=hotel-listado&msg=$msg");
		} else {
			echo "Error al actualizar el hotel.";
		}
		break;
	

	// CASO PARA CLIENTES

	case 'cliente-listado':

		$objCliente = new ClienteModel();
		$resultClientes = $objCliente->listarCliente();

		include("../view/template/header.php");
		include("../view/template/menu.php");
		include("../view/clientes/listado.php");
		include("../view/template/footer.php");
		break;
	
	case 'cliente-nuevo':

		include("../view/template/header.php");
		include("../view/template/menu.php");
		include("../view/clientes/nuevo.php");
		include("../view/template/footer.php");
		break;
	
	case 'cliente-nuevo-procesar':

		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$correo_electronico = $_POST['correo_electronico'];
		$telefono = $_POST['telefono'];
		$direccion = $_POST['direccion'];

		$objCliente = new ClienteModel();
		$resultado = $objCliente->crearCliente($nombre, $apellido, $correo_electronico, $telefono, $direccion);
	
		if ($resultado == 1) {
			$msg = "El cliente fue creado exitosamente.";
			header("Location: agenciaControl.php?opcion=cliente-listado&msg=$msg");
		} else {
			echo "Error al crear el cliente.";
		}
		break;
	
	case 'cliente-eliminar':

		$id_cliente = $_GET['id_cliente'];

		$objCliente = new ClienteModel();
		$resultado = $objCliente->borrarCliente($id_cliente);
	
		if ($resultado == 1) {
			$msg = "El cliente fue eliminado exitosamente.";
			header("Location: agenciaControl.php?opcion=cliente-listado&msg=$msg");
		} else {
			echo "Error al eliminar el cliente.";
		}
		break;
	
	case 'cliente-editar':

		$id_cliente = $_GET['id_cliente'];

		$objCliente = new ClienteModel();
		$cliente = $objCliente->obtenerCliente($id_cliente);
	
		if ($cliente) {
			$nombre = $cliente['nombre'];
			$apellido = $cliente['apellido'];
			$correo_electronico = $cliente['correo_electronico'];
			$telefono = $cliente['telefono'];
			$direccion = $cliente['direccion'];
	
			include("../view/template/header.php");
			include("../view/template/menu.php");
			include("../view/clientes/editar.php");
			include("../view/template/footer.php");
		} else {
			echo "Cliente no encontrado.";
		}
		break;
	
	case 'cliente-editar-procesar':

		$id_cliente = $_POST['id_cliente'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$correo_electronico = $_POST['correo_electronico'];
		$telefono = $_POST['telefono'];
		$direccion = $_POST['direccion'];

		$objCliente = new ClienteModel();
		$resultado = $objCliente->actualizarCliente($id_cliente, $nombre, $apellido, $correo_electronico, $telefono, $direccion);
	
		if ($resultado == 1) {
			$msg = "El cliente fue actualizado correctamente.";
			header("Location: agenciaControl.php?opcion=cliente-listado&msg=$msg");
		} else {
			echo "Error al actualizar el cliente.";
		}
		break;
	

	// CASOS PARA PRODUCTOS
	
	case 'viaje-listado':

		$objViaje = new ViajeModel();
		$resultViajes = $objViaje->listarViaje();

		include("../view/template/header.php");
		include("../view/template/menu.php");
		include("../view/viajes/listado.php");
		include("../view/template/footer.php");
		break;
	
	case 'viaje-nuevo':

		include("../view/template/header.php");
		include("../view/template/menu.php");
		include("../view/viajes/nuevo.php");
		include("../view/template/footer.php");
		break;
	
	case 'viaje-nuevo-procesar':

		$nombre_paquete = $_POST['nombre_paquete'];
		$descripcion = $_POST['descripcion'];
		$destinos = $_POST['destinos'];
		$precio = $_POST['precio'];
		$fechas_disponibles = $_POST['fechas_disponibles'];
		$duracion = $_POST['duracion'];
		$transporte = $_POST['transporte'];

		$objViaje = new ViajeModel();
		$resultado = $objViaje->crearViaje($nombre_paquete, $descripcion, $destinos, $precio, $fechas_disponibles, $duracion, $transporte);
	
		if ($resultado == 1) {
			$msg = "El viaje fue creado exitosamente.";
			header("Location: agenciaControl.php?opcion=viaje-listado&msg=$msg");
		} else {
			echo "Error al crear el viaje.";
		}
		break;
	
	case 'viaje-eliminar':

		$id_viaje = $_GET['id_viaje'];

		$objViaje = new ViajeModel();
		$resultado = $objViaje->borrarViaje($id_viaje);
	
		if ($resultado == 1) {
			$msg = "El viaje fue eliminado exitosamente.";
			header("Location: agenciaControl.php?opcion=viaje-listado&msg=$msg");
		} else {
			echo "Error al eliminar el viaje.";
		}
		break;
	
	case 'viaje-editar':

		$id_viaje = $_GET['id_viaje'];

		$objViaje = new ViajeModel();
		$viaje = $objViaje->obtenerViaje($id_viaje);
	
		if ($viaje) {
			$nombre_paquete = $viaje['nombre_paquete'];
			$descripcion = $viaje['descripcion'];
			$destinos = $viaje['destinos'];
			$precio = $viaje['precio'];
			$fechas_disponibles = $viaje['fechas_disponibles'];
			$duracion = $viaje['duracion'];
			$transporte = $viaje['transporte'];
	
			include("../view/template/header.php");
			include("../view/template/menu.php");
			include("../view/viajes/editar.php");
			include("../view/template/footer.php");
		} else {
			echo "Viaje no encontrado.";
		}
		break;
	
	case 'viaje-editar-procesar':

		$id_viaje = $_POST['id_viaje'];
		$nombre_paquete = $_POST['nombre_paquete'];
		$descripcion = $_POST['descripcion'];
		$destinos = $_POST['destinos'];
		$precio = $_POST['precio'];
		$fechas_disponibles = $_POST['fechas_disponibles'];
		$duracion = $_POST['duracion'];
		$transporte = $_POST['transporte'];

		$objViaje = new ViajeModel();
		$resultado = $objViaje->actualizarViaje($id_viaje, $nombre_paquete, $descripcion, $destinos, $precio, $fechas_disponibles, $duracion, $transporte);
	
		if ($resultado == 1) {
			$msg = "El viaje fue actualizado correctamente.";
			header("Location: agenciaControl.php?opcion=viaje-listado&msg=$msg");
		} else {
			echo "Error al actualizar el viaje.";
		}
		break;
	

	// CASOS PARA PROVEEDORES
	
	case 'transporte-listado':

		$objTransporte = new TransporteModel();
		$resultTransportes = $objTransporte->listarTransporte();

		include("../view/template/header.php");
		include("../view/template/menu.php");
		include("../view/transportes/listado.php");
		include("../view/template/footer.php");
		break;
	
	case 'transporte-nuevo':

		$objViaje = new ViajeModel();
		$resultViajes = $objViaje->listarViaje();

		$objProveedor = new ProveedorModel();
		$resultProveedores = $objProveedor->listarProveedor();

		include("../view/template/header.php");
		include("../view/template/menu.php");
		include("../view/transportes/nuevo.php");
		include("../view/template/footer.php");
		break;
	
	case 'transporte-nuevo-procesar':


		$tipo_transporte = $_POST['tipo_transporte'];
		$nombre_empresa = $_POST['nombre_empresa'];
		$numero_servicio = $_POST['numero_servicio'];
		$precio = $_POST['precio'];
		$fecha_salida = $_POST['fecha_salida'];
		$destino = $_POST['destino'];
		
		$objProveedor = new ProveedorModel();
		$resultProveedor = $objProveedor->buscarIdProveedor($nombre_empresa)->fetch_assoc();
		$id_proveedor = $resultProveedor['id_proveedor'];

		$objTransporte = new TransporteModel();
		$resultado = $objTransporte->crearTransporte($tipo_transporte, $id_proveedor, $numero_servicio, $precio, $fecha_salida, $destino);
	
		if ($resultado == 1) {
			$msg = "El transporte fue creado exitosamente.";
			header("Location: agenciaControl.php?opcion=transporte-listado&msg=$msg");
		} else {
			echo "Error al crear el transporte.";
		}
		break;
	
	case 'transporte-eliminar':

		$id_transporte = $_GET['id_transporte'];

		$objTransporte = new TransporteModel();
		$resultado = $objTransporte->borrarTransporte($id_transporte);
	
		if ($resultado == 1) {
			$msg = "El transporte fue eliminado exitosamente.";
			header("Location: agenciaControl.php?opcion=transporte-listado&msg=$msg");
		} else {
			echo "Error al eliminar el transporte.";
		}
		break;
	
	case 'transporte-editar':

		$objViaje = new ViajeModel();
		$resultViajes = $objViaje->listarViaje();

		$id_transporte = $_GET['id_transporte'];

		$objTransporte = new TransporteModel();
		$transporte = $objTransporte->obtenerTransporte($id_transporte);
	
		if ($transporte) {
			$tipo_transporte = $transporte['tipo_transporte'];
			$numero_servicio = $transporte['numero_servicio'];
			$precio = $transporte['precio'];
			$fecha_salida = $transporte['fecha_salida'];
			$destino = $transporte['destino'];
	
			include("../view/template/header.php");
			include("../view/template/menu.php");
			include("../view/transportes/editar.php");
			include("../view/template/footer.php");
		} else {
			echo "Transporte no encontrado.";
		}
		break;
	
	case 'transporte-editar-procesar':

		$id_transporte = $_POST['id_transporte'];
		$tipo_transporte = $_POST['tipo_transporte'];
		$numero_servicio = $_POST['numero_servicio'];
		$precio = $_POST['precio'];
		$fecha_salida = $_POST['fecha_salida'];
		$destino = $_POST['destino'];

		$objTransporte = new TransporteModel();
		$resultado = $objTransporte->actualizarTransporte($id_transporte, $tipo_transporte,$numero_servicio, $precio, $fecha_salida, $destino);
	
		if ($resultado == 1) {
			$msg = "El transporte fue actualizado correctamente.";
			header("Location: agenciaControl.php?opcion=transporte-listado&msg=$msg");
		} else {
			echo "Error al actualizar el transporte.";
		}
		break;
	
	
	// CASOS PARA DISTRIBUIDORES

	case 'proveedor-listado':

		$objProveedor = new ProveedorModel();
		$resultProveedores = $objProveedor->listarProveedor();

		include("../view/template/header.php");
		include("../view/template/menu.php");
		include("../view/proveedores/listado.php");
		include("../view/template/footer.php");
		break;
	
	case 'proveedor-nuevo':

		include("../view/template/header.php");
		include("../view/template/menu.php");
		include("../view/proveedores/nuevo.php");
		include("../view/template/footer.php");
		break;
	
	case 'proveedor-nuevo-procesar':

		$nombre_empresa = $_POST['nombre_empresa'];
		$tipo_servicio = $_POST['tipo_servicio'];
		$contacto = $_POST['contacto'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$correo_electronico = $_POST['correo_electronico'];
		$tarifas = $_POST['tarifas'];

		$objProveedor = new ProveedorModel();
		$resultado = $objProveedor->crearProveedor($nombre_empresa, $tipo_servicio, $contacto, $direccion, $telefono, $correo_electronico, $tarifas);
	
		if ($resultado == 1) {
			$msg = "El proveedor fue creado exitosamente.";
			header("Location: agenciaControl.php?opcion=proveedor-listado&msg=$msg");
		} else {
			echo "Error al crear el proveedor.";
		}
		break;
	
	case 'proveedor-eliminar':

		$id_proveedor = $_GET['id_proveedor'];

		$objProveedor = new ProveedorModel();
		$resultado = $objProveedor->borrarProveedor($id_proveedor);
	
		if ($resultado == 1) {
			$msg = "El proveedor fue eliminado exitosamente.";
			header("Location: agenciaControl.php?opcion=proveedor-listado&msg=$msg");
		} else {
			echo "Error al eliminar el proveedor.";
		}
		break;
	
	case 'proveedor-editar':

		$id_proveedor = $_GET['id_proveedor'];

		$objProveedor = new ProveedorModel();
		$proveedor = $objProveedor->obtenerProveedor($id_proveedor);
	
		if ($proveedor) {
			$nombre_empresa = $proveedor['nombre_empresa'];
			$tipo_servicio = $proveedor['tipo_servicio'];
			$contacto = $proveedor['contacto'];
			$direccion = $proveedor['direccion'];
			$telefono = $proveedor['telefono'];
			$correo_electronico = $proveedor['correo_electronico'];
			$tarifas = $proveedor['tarifas'];
	
			include("../view/template/header.php");
			include("../view/template/menu.php");
			include("../view/proveedores/editar.php");
			include("../view/template/footer.php");
		} else {
			echo "Proveedor no encontrado.";
		}
		break;
	
	case 'proveedor-editar-procesar':

		$id_proveedor = $_POST['id_proveedor'];
		$nombre_empresa = $_POST['nombre_empresa'];
		$tipo_servicio = $_POST['tipo_servicio'];
		$contacto = $_POST['contacto'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$correo_electronico = $_POST['correo_electronico'];
		$tarifas = $_POST['tarifas'];

		$objProveedor = new ProveedorModel();
		$resultado = $objProveedor->actualizarProveedor($id_proveedor, $nombre_empresa, $tipo_servicio, $contacto, $direccion, $telefono, $correo_electronico, $tarifas);
	
		if ($resultado == 1) {
			$msg = "El proveedor fue actualizado correctamente.";
			header("Location: agenciaControl.php?opcion=proveedor-listado&msg=$msg");
		} else {
			echo "Error al actualizar el proveedor.";
		}
		break;
	

	// CASOS PARA PRODUCTOS PARA COMPRAR
	
	case 'pago-listado':

		$objPago = new PagoModel();
		$resultPagos = $objPago->listarPago();

		include("../view/template/header.php");
		include("../view/template/menu.php");
		include("../view/pagos/listado.php");
		include("../view/template/footer.php");
		break;
	
	case 'pago-nuevo':

		$objCliente = new ClienteModel();
		$resultClientes = $objCliente->listarCliente();

		include("../view/template/header.php");
		include("../view/template/menu.php");
		include("../view/pagos/nuevo.php");
		include("../view/template/footer.php");
		break;
	
	case 'pago-nuevo-procesar':

		$monto_pagado = $_POST['monto_pagado'];
		$fecha_pago = $_POST['fecha_pago'];
		$metodo_pago = $_POST['metodo_pago'];
		$id_reserva = $_POST['id_reserva'];
		$nombre = $_POST['nombre'];

		$objReserva = new ReservaModel();
		$resultReserva = $objReserva->buscarIdReserva($nombre)->fetch_assoc();
		$id_reserva = $resultReserva['id_reserva'];

		$objPago = new PagoModel();
		$resultado = $objPago->crearPago($monto_pagado, $fecha_pago, $metodo_pago, $id_reserva);
	
		if ($resultado == 1) {
			$msg = "El pago fue registrado exitosamente.";
			header("Location: agenciaControl.php?opcion=pago-listado&msg=$msg");
		} else {
			echo "Error al registrar el pago.";
		}
		break;
	
	case 'pago-eliminar':

		$id_pago = $_GET['id_pago'];

		$objPago = new PagoModel();
		$resultado = $objPago->borrarPago($id_pago);
	
		if ($resultado == 1) {
			$msg = "El pago fue eliminado exitosamente.";
			header("Location: agenciaControl.php?opcion=pago-listado&msg=$msg");
		} else {
			echo "Error al eliminar el pago.";
		}
		break;
	
	case 'pago-editar':

		$id_pago = $_GET['id_pago'];

		$objPago = new PagoModel();
		$pago = $objPago->obtenerPago($id_pago);
	
		if ($pago) {
			$monto_pagado = $pago['monto_pagado'];
			$fecha_pago = $pago['fecha_pago'];
			$metodo_pago = $pago['metodo_pago'];
			$id_reserva = $pago['id_reserva'];
	
			include("../view/template/header.php");
			include("../view/template/menu.php");
			include("../view/pagos/editar.php");
			include("../view/template/footer.php");
		} else {
			echo "Pago no encontrado.";
		}
		break;
	
	case 'pago-editar-procesar':

		$id_pago = $_POST['id_pago'];
		$monto_pagado = $_POST['monto_pagado'];
		$fecha_pago = $_POST['fecha_pago'];
		$metodo_pago = $_POST['metodo_pago'];

		$objPago = new PagoModel();
		$resultado = $objPago->actualizarPago($id_pago, $monto_pagado, $fecha_pago, $metodo_pago);
	
		if ($resultado == 1) {
			$msg = "El pago fue actualizado correctamente.";
			header("Location: agenciaControl.php?opcion=pago-listado&msg=$msg");
		} else {
			echo "Error al actualizar el pago.";
		}
		break;
	

	// PEDIDOS

	case 'reserva-listado':

		$objRes = new ReservaModel();
		$resultReservas = $objRes->listarReserva();
	
		include("../view/template/header.php");
		include("../view/template/menu.php");
		include("../view/reservas/listado.php");
		include("../view/template/footer.php");
		break;
	
	case 'reserva-nueva':

		$objCliente = new ClienteModel();
		$resultClientes = $objCliente->listarCliente();

		$objViaje = new ViajeModel();
		$resultViajes = $objViaje->listarViaje();
	
		include("../view/template/header.php");
		include("../view/template/menu.php");
		include("../view/reservas/nueva.php");
		include("../view/template/footer.php");
		break;
	
	case 'reserva-nueva-procesar':
	
		$fecha_reserva = $_POST['fecha_reserva'];
		$numero_personas = $_POST['numero_personas'];
		$fecha_salida = $_POST['fecha_salida'];
		$fecha_regreso = $_POST['fecha_regreso'];
		$estado_reserva = $_POST['estado_reserva'];
		$precio_total = $_POST['precio_total'];
		$nombre = $_POST['nombre'];
		$destinos = $_POST['destinos'];

		$objCliente = new ClienteModel();
		$resultCliente = $objCliente->buscarIdCliente($nombre)->fetch_assoc();
		$id_cliente = $resultCliente['id_cliente'];
		
		$objViaje = new ViajeModel();
		$resultViaje = $objViaje->buscarIdViaje($destinos)->fetch_assoc();
		$id_viaje = $resultViaje['id_viaje'];

		$objRes = new ReservaModel();
		$resultado = $objRes->crearReserva($id_cliente, $id_viaje, $fecha_reserva, $numero_personas, $fecha_salida, $fecha_regreso, $estado_reserva, $precio_total);
	
		if ($resultado == 1) {
			$msg = "La reserva fue creada exitosamente.";
			header("Location: agenciaControl.php?opcion=reserva-listado&msg=$msg");
		} else {
			echo "Error al crear la reserva.";
		}
		break;
	
	case 'reserva-eliminar':
	
		$id_reserva = $_GET['id_reserva'];
		$objRes = new ReservaModel();
		$resultado = $objRes->borrarReserva($id_reserva);
	
		if ($resultado == 1) {
			$msg = "La reserva fue eliminada exitosamente.";
			header("Location: agenciaControl.php?opcion=reserva-listado&msg=$msg");
		} else {
			echo "Error al eliminar la reserva.";
		}
		break;
	
	case 'reserva-editar':

		$id_reserva = $_GET['id_reserva'];
		$objRes = new ReservaModel();
		$reserva = $objRes->obtenerReserva($id_reserva);
	
		if ($reserva) {

			$id_cliente = $reserva['id_cliente'];
			$id_viaje = $reserva['id_viaje'];
			$fecha_reserva = $reserva['fecha_reserva'];
			$numero_personas = $reserva['numero_personas'];
			$fecha_salida = $reserva['fecha_salida'];
			$fecha_regreso = $reserva['fecha_regreso'];
			$estado_reserva = $reserva['estado_reserva'];
			$precio_total = $reserva['precio_total'];
	
			include("../view/template/header.php");
			include("../view/template/menu.php");
			include("../view/reservas/editar.php");
			include("../view/template/footer.php");
		} else {
			echo "Reserva no encontrada.";
		}
		break;
	
	case 'reserva-editar-procesar':
	
		$id_reserva = $_POST['id_reserva'];
		$id_cliente = $_POST['id_cliente'];
		$id_viaje = $_POST['id_viaje'];
		$fecha_reserva = $_POST['fecha_reserva'];
		$numero_personas = $_POST['numero_personas'];
		$fecha_salida = $_POST['fecha_salida'];
		$fecha_regreso = $_POST['fecha_regreso'];
		$estado_reserva = $_POST['estado_reserva'];
		$precio_total = $_POST['precio_total'];
	
		$objRes = new ReservaModel();
		$resultado = $objRes->actualizarReserva($id_reserva, $fecha_reserva, $numero_personas, $fecha_salida, $fecha_regreso, $estado_reserva, $precio_total);
	
		if ($resultado == 1) {
			$msg = "La reserva fue actualizada correctamente.";
			header("Location: agenciaControl.php?opcion=reserva-listado&msg=$msg");
		} else {
			echo "Error al actualizar la reserva.";
		}
		break;
	
}