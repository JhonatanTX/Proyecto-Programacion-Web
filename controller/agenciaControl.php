<?php
include("../models/adminModel.php");
include("../models/empleadoModel.php");
include("../models/HotelModel.php");
include("../models/viajeModel.php");
include("../models/clienteModel.php");
include("../models/TransporteModel.php");
include("../models/proveedorModel.php");
include("../models/pagoModel.php");
include("../models/reservaModel.php");

$opcion = $_GET['opcion'];
switch ($opcion) {

	// LOGIN ADMIN
	case 'login-form-admin':

		include("../views/viewLoginAdmin/loginAdmin.php");
		break;
	case 'login-procesar': //VERIFICAR ADMINISTRADOR
		// code...

		$nombre = $_POST['nombre'];
		$correo_electronico = sha1($_POST['correo_electronico']);


		$objModel = new adminModel();
		$result = $objModel->verUsuario($nombre,$correo_electronico);

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

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/empleados/listado.php");
		include("../views/template/footer.php");
		break;

	case 'empleado-eliminar':

		$objEmp = new EmpleadoModel();
		$id_empleado = $_GET['id_empleado'];
		$resultEmpleados = $objEmp->borrarEmpleado($id_empleado);

		if ($resultEmpleados == 1) {
			$msg = "El registro se borro correctamente";

			header("Location: agenciaControll.php?opcion=empleado-listado&msg=$msg");
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
				$correo_electronico = ''; // Deja el campo de correo_electronico vacío
				include("../views/template/header.php");
				include("../views/template/menu.php");
				include("../views/empleados/editar.php");
				include("../views/template/footer.php");
			} else {
				echo "Empleado no encontrado.";
			}
			break;
	
	case 'empleado-editar-procesar':
			$id_empleado = $_POST['id_empleado'];
			$nombre = $_POST['nombre'];
			$puesto = $_POST['puesto'];
			$dni = $_POST['dni'];
			$correo_electronico = sha1($_POST['correo_electronico']);
	
			$objEmp = new EmpleadoModel();
			$resultEmpleados = $objEmp->actualizarEmpleado($id_empleado, $nombre, $puesto, $dni, $correo_electronico);
	
			if ($resultEmpleados == 1) {
				$msg = "El empleado se actualizó correctamente.";
				header("Location: agenciaControll.php?opcion=empleado-listado&msg=$msg");
			} else {
				echo "Error al actualizar el empleado.";
			}
			break;


	case 'empleado-nuevo':

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/empleados/nuevo.php");
		include("../views/template/footer.php");

		break;

	case 'empleado-nuevo-procesar':

		$nombre = $_POST['nombre'];
		$puesto = $_POST['puesto'];
		$dni = $_POST['dni'];
		$correo_electronico = sha1($_POST['correo_electronico']);

		$objEmp = new EmpleadoModel();
		$resultEmpleados = $objEmp->crearEmpleado($nombre,$puesto,$dni,$correo_electronico);

		if ($resultEmpleados == 1) {
			$msg = "Se creo un nuevo empleado";

			header("Location: agenciaControll.php?opcion=empleado-listado&msg=$msg");
		}

		break;
	
	// CASOS PARA CATEGORIAS
	
	case 'hotel-listado':

		$objetoHotel = new HotelModel();
		$resultCategorias = $objetoHotel->listarHoteles();

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/hoteles/listado.php");
		include("../views/template/footer.php");
		break;
	
	case 'hotel-nuevo':

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/hoteles/nuevo.php");
		include("../views/template/footer.php");
	
		break;
	
	case 'hotel-nuevo-procesar':
	
		$nombre_hotel = $_POST['nombre_hotel'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$correo_electronico = $_POST['correo_electronico'];
		$lugar = $_POST['lugar'];
	
		$objetoHotel = new HotelModel();
		$resultCategorias = $objetoHotel->crearHotel($nombre_hotel,$direccion,$telefono,$correo_electronico,$lugar);
	
		if ($resultCategorias == 1) {
			$msg = "Se creo una nueva hotel";
	
			header("Location: agenciaControll.php?opcion=hotel-listado&msg=$msg");
		}
	
		break;
	
	case 'hotel-eliminar':

		$objetoHotel = new HotelModel();
		$id_hotel = $_GET['id_hotel'];
		$resultCategorias = $objetoHotel->borrarHotel($id_hotel);
	
		if ($resultCategorias == 1) {
			$msg = "La hotel se borro correctamente";
	
			header("Location: agenciaControll.php?opcion=hotel-listado&msg=$msg");
		}
	
		break;	
	
	case 'hotel-editar':
			$id_hotel = $_GET['id_hotel'];
			$objetoHotel = new HotelModel();
			$hoteles = $objetoHotel->obtenerHotel($id_hotel);
	
			if ($hoteles) {
				// Almacena los datos del empleado para mostrarlos en el formulario
				$nombre_hotel = $hoteles['nombre'];
				$direccion = $hoteles['direccion'];
				$telefono = $hoteles['telefono'];
				$correo_electronico = $hoteles['correo_electronico'];
				$lugar = $hoteles['lugar'];
				include("../views/template/header.php");
				include("../views/template/menu.php");
				include("../views/hoteles/editar.php");
				include("../views/template/footer.php");
			} else {
				echo "hoteles no encontrado.";
			}
			break;
	
	case 'hotel-editar-procesar':
			$id_hotel = $_POST['id_hotel'];
			$nombre_hotel = $_POST['nombre_hotel'];
			$direccion = $_POST['direccion'];
			$telefono = $_POST['telefono'];
			$correo_electronico = $_POST['correo_electronico'];
			$lugar = $_POST['lugar'];

			$objetoHotel = new HotelModel();
			$resultCategorias = $objetoHotel->actualizarHotel($id_hotel, $hotel);
	
			if ($resultCategorias == 1) {
				$msg = "La hotel se actualizó correctamente.";
				header("Location: agenciaControll.php?opcion=hotel-listado&msg=$msg");
			} else {
				echo "Error al actualizar la hotel.";
			}
			break;	

	// CASO PARA CLIENTES

	case 'cliente-listado':

		$objCli = new clienteModel();
		$resultClientes = $objCli->listarCliente();

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/clientes/listado.php");
		include("../views/template/footer.php");
		break;
	
	case 'cliente-nuevo':

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/clientes/nuevo.php");
		include("../views/template/footer.php");

		break;

	case 'cliente-nuevo-procesar':

		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$correo_electronico = sha1($_POST['correo_electronico']);
		$telefono = $_POST['telefono'];
		$direccion = $_POST['direccion'];

		$objCli = new clienteModel();
		$resultClientes = $objCli->crearCliente($nombre,$apellido,$correo_electronico,$telefono,$direccion);

		if ($resultClientes == 1) {
			$msg = "Se creo un nuevo cliente";

			header("Location: agenciaControll.php?opcion=cliente-listado&msg=$msg");
		}

		break;
	
	case 'cliente-eliminar':

		$objCli = new clienteModel();
		$id_cliente = $_GET['id_cliente'];
		$resultClientes = $objCli->borrarCliente($id_cliente);

		if ($resultClientes == 1) {
			$msg = "El cliente se borro correctamente";

			header("Location: agenciaControll.php?opcion=cliente-listado&msg=$msg");
		}

		break;
	
		case 'cliente-editar':
			$id_cliente = $_GET['id_cliente'];
			$objCli = new clienteModel();
			$cliente = $objCli->obtenerCliente($id_cliente);
	
			if ($cliente) {
				// Almacena los datos del empleado para mostrarlos en el formulario
				$nombre = $cliente['nombre'];
				$apellido = $cliente['apellido'];
				$correo_electronico = 'correo_electronico'; 
				$telefono = $cliente['telefono'];
				$direccion = $cliente['direccion']; 
				include("../views/template/header.php");
				include("../views/template/menu.php");
				include("../views/clientes/editar.php");
				include("../views/template/footer.php");
			} else {
				echo "Cliente no encontrado.";
			}
			break;
	
	case 'cliente-editar-procesar':
			$id_cliente = $_POST['id_cliente'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$correo_electronico = sha1($_POST['correo_electronico']);
			$telefono = $_POST['telefono'];
			$direccion = $_POST['direccion'];
	
			$objCli = new clienteModel();
			$resultClientes = $objCli->actualizarCliente($id_cliente, $nombre, $apellido, $correo_electronico, $telefono, $direccion);
	
			if ($resultClientes == 1) {
				$msg = "El cliente se actualizó correctamente.";
				header("Location: agenciaControll.php?opcion=cliente-listado&msg=$msg");
			} else {
				echo "Error al actualizar el cliente.";
			}
			break;

	// CASOS PARA PRODUCTOS
	
	case 'viaje-listado':

		$objVia = new ViajelModel();
		$resultProductos = $objVia->listarViaje();

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/viajes/listado.php");
		include("../views/template/footer.php");

		break;

	case 'viaje-nuevo':

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/viajes/nuevo.php");
		include("../views/template/footer.php");
		
		break;

	case 'viaje-nuevo-procesar':

			$nombre_paquete = $_POST['nombre_paquete'];
			$descripcion = $_POST['descripcion'];
			$transporte = $_POST['transporte'];
			$precio = $_POST['precio'];
			$fechas_disponibles = $_POST['fechas_disponibles'];
			$duracion = $_POST['duracion'];
			$transporte = $_POST['transporte'];
		
			$objVia = new ViajeModel();
			$resultProductos = $objVia->crearProducto($nombre_paquete, $descripcion, $transporte, $precio, $fechas_disponibles, $duracion, $transporte);
		
			if ($resultProductos == 1) {
				$msg = "Se ingreso un nuevo viaje";
		
				header("Location: agenciaControll.php?opcion=viaje-listado&msg=$msg");
			}
		
			break;

	case 'viaje-eliminar':

			$objVia = new ViajeModel();
			$id_viaje = $_GET['id_viaje'];
			$resultProductos = $objVia->borrarProducto($id_viaje);
		
			if ($resultProductos == 1) {
				$msg = "El viaje se borro correctamente";
		
				header("Location: agenciaControll.php?opcion=viaje-listado&msg=$msg");
			}
		
			break;

	case 'viaje-editar':
		
		$id_viaje = $_GET['id_viaje'];
		$objVia = new ViajeModel();
		$viajes = $objVia->obtenerProducto($id_viaje);
	
	
		if ($viajes) {
			
			$nombre_paquete = $viajes['nombre_paquete'];
			$descripcion = $viajes['descripcion'];
			$transporte = $viajes['transporte'];
			$precio = $viajes['precio'];
			$fechas_disponibles = $viajes['fechas_disponibles'];
			$duracion = $viajes['duracion'];
			$transporte = $viajes['transporte'];
	
			include("../views/template/header.php");
			include("../views/template/menu.php");
			include("../views/viajes/editar.php");
			include("../views/template/footer.php");
		} else {
			echo "Producto no encontrado.";
		}
		break;
	
	case 'viaje-editar-procesar':
		
		$id_viaje = $_POST['id_viaje'];
		$nombre_paquete = $_POST['nombre_paquete'];
		$descripcion = $_POST['descripcion'];
		$transporte = $_POST['transporte'];
		$precio = $_POST['precio'];
		$fechas_disponibles = $_POST['fechas_disponibles'];
		$duracion = $_POST['duracion'];
		$transporte = $_POST['transporte'];

		$objVia = new HotelModel();
		$resultProductos = $objVia->actualizarProducto($id_viaje, $nombre_paquete, $descripcion, $transporte, $precio, $fechas_disponibles, $duracion, $transporte);
		
		if ($resultProductos == 1) {
			$msg = "El viaje se actualizó correctamente.";
			header("Location: agenciaControll.php?opcion=viaje-listado&msg=$msg");
		} else {
			echo "Error al actualizar el viaje.";
		}
		break;

	// CASOS PARA PROVEEDORES
	
	case 'transporte-listado':

		$objTra = new TransporteModel();
		$resultTransportes = $objTra->listarTransporte();

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/proveedores/listado.php");
		include("../views/template/footer.php");

		break;
		
	case 'transporte-nuevo':

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/proveedores/nuevo.php");
		include("../views/template/footer.php");

		break;

	case 'transporte-nuevo-procesar':

		$tipo_transporte = $_POST['tipo_transporte'];
		$numero_servicio = $_POST['numero_servicio'];
		$precio = $_POST['precio'];
		$fecha_salida = $_POST['fecha_salida'];
		$destino = $_POST['destino'];

		$objTra = new TransporteModel();
		$resultTransportes = $objTra->crearTransporte($tipo_transporte,$numero_servicio,$precio,$fecha_salida,$destino);

		if ($resultTransportes == 1) {
			$msg = "Se creo un nuevo transporte";

			header("Location: agenciaControll.php?opcion=transporte-listado&msg=$msg");
		}

		break;
	
	case 'transporte-eliminar':

		$objTra = new TransporteModel();
		$id_transporte = $_GET['id_transporte'];
		$resultTransportes = $objTra->borrarTransporte($id_transporte);

		if ($resultTransportes == 1) {
			$msg = "El transporte se borro correctamente";

			header("Location: agenciaControll.php?opcion=transporte-listado&msg=$msg");
		}

		break;

	case 'transporte-editar':
			$id_transporte = $_GET['id_transporte'];
			$objTra = new TransporteModel();
			$transportes = $objTra->obtenerTransporte($id_transporte);
	
			if ($transportes) {
				
				$tipo_transporte = $transportes['tipo_transporte'];
				$numero_servicio = $transportes['numero_servicio'];
				$precio = $transportes['precio'];
				$fecha_salida = $transportes['fecha_salida'];
				$destino = $transportes['destino'];
				
				include("../views/template/header.php");
				include("../views/template/menu.php");
				include("../views/proveedores/editar.php");
				include("../views/template/footer.php");
			} else {
				echo "transporte no encontrado.";
			}
			break;
	
	case 'transporte-editar-procesar':

			$id_transporte = $_POST['id_transporte'];
			$tipo_transporte = $_POST['tipo_transporte'];
			$numero_servicio = $_POST['numero_servicio'];
			$precio = $_POST['precio'];
			$fecha_salida = $_POST['fecha_salida'];
			$destino = $_POST['destino'];
	
			$objVia = new TransporteModel();
			$resultTransportes = $objVia->actualizarTransporte($id_transporte,$tipo_transporte,$numero_servicio,$precio,$fecha_salida,$destino);
	
			if ($resultTransportes == 1) {
				$msg = "El transporte se actualizó correctamente.";
				header("Location: agenciaControll.php?opcion=transporte-listado&msg=$msg");
			} else {
				echo "Error al actualizar el transporte.";
			}
			break;
	
	// CASOS PARA DISTRIBUIDORES

	case 'proveedor-listado':

		$objPro = new ProveedorModel();
		$resultProveedores = $objPro->listarProveedor();

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/distribuidores/listado.php");
		include("../views/template/footer.php");

		break;
		
	case 'proveedor-nuevo':

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/distribuidores/nuevo.php");
		include("../views/template/footer.php");

		break;

	case 'proveedor-nuevo-procesar':

		$nombre_empresa = $_POST['nombre_empresa'];
		$tipo_servicio = $_POST['tipo_servicio'];
		$contacto = $_POST['contacto'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$correo_electronico = $_POST['correo_electronico'];
		$tarifas = $_POST['tarifas'];

		$objPro = new ProveedorModel();
		$resultProveedores = $objPro->crearProveedor($nombre_empresa,$tipo_servicio,$contacto,$direccion,$telefono,$correo_electronico,$tarifas);

		if ($resultProveedores == 1) {
			$msg = "Se creo un nuevo proveedor";

			header("Location: agenciaControll.php?opcion=proveedor-listado&msg=$msg");
		}

		break;
	
	case 'proveedor-eliminar':

		$objPro = new ProveedorModel();
		$id_proveedor = $_GET['id_proveedor'];
		$resultProveedores = $objPro->borrarProveedor($id_proveedor);

		if ($resultProveedores == 1) {
			$msg = "El proveedor se borro correctamente";

			header("Location: agenciaControll.php?opcion=proveedor-listado&msg=$msg");
		}

		break;

	case 'proveedor-editar':
			$id_proveedor = $_GET['id_proveedor'];
			$objPro = new ProveedorModel();
			$proveedores = $objPro->obtenerProveedor($id_proveedor);
	
			if ($proveedores) {
				
				$nombre_empresa = $proveedores['nombre_empresa'];
				$tipo_servicio = $proveedores['tipo_servicio'];
				$contacto = $proveedores['contacto'];
				$direccion = $proveedores['direccion'];
				$telefono = $proveedores['telefono'];
				$correo_electronico = $proveedores['correo_electronico'];
				$tarifas = $proveedores['tarifas'];
				
				include("../views/template/header.php");
				include("../views/template/menu.php");
				include("../views/distribuidores/editar.php");
				include("../views/template/footer.php");
			} else {
				echo "proveedor no encontrado.";
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
	
			$objPro = new ProveedorModel();
			$resultProveedores = $objPro->actualizarDistribuidor($id_proveedor,$nombre_empresa,$tipo_servicio,$contacto,$direccion,$telefono,$correo_electronico,$tarifas);
	
			if ($resultProveedores == 1) {
				$msg = "El proveedor se actualizó correctamente.";
				header("Location: agenciaControll.php?opcion=proveedor-listado&msg=$msg");
			} else {
				echo "Error al actualizar el proveedor.";
			}
			break;

	// CASOS PARA PRODUCTOS PARA COMPRAR
	
	case 'pago-listado':

		$objCom = new CompraModel();
		$resultCompras = $objCom->listarCompra();

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/detalles de pedidos/listado.php");
		include("../views/template/footer.php");
		break;
	
	case 'pago-nuevo':

		$objPro = new TransporteModel();
    	$resultProveedores = $objPro->listarDistribuidor();

		$objEmp = new EmpleadoModel();
		$resultEmpleados = $objEmp->listarEmpleado();

		$objCli = new clienteModel();
		$resultClientes = $objCli->listarCliente();

		$objVia = new HotelModel();
		$resultProductos = $objVia->listarProducto();

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/detalles de pedidos/nuevo.php");
		include("../views/template/footer.php");
		
		break;

	case 'pago-nuevo-procesar':

			$cliente = $_POST['cliente'];
			$empleado = $_POST['empleado'];
			$viaje = $_POST['viaje'];
			$cantidad = $_POST['cantidad'];
			$proveedor = $_POST['proveedor'];
		
			$objCom = new CompraModel();
			$resultCompras = $objCom->crearCompra($cliente, $empleado, $viaje, $cantidad, $proveedor);
		
			if ($resultCompras == 1) {
				$msg = "Se ingreso una pago";
		
				header("Location: agenciaControll.php?opcion=pago-listado&msg=$msg");
			}
		
			break;
	
	case 'pago-eliminar':

		$objCom = new CompraModel();
		$idCompra = $_GET['idCom'];
		$resultCompras = $objCom->borrarCompra($idCompra);

		if ($resultCompras == 1) {
			$msg = "La pago se borro correctamente";

			header("Location: agenciaControll.php?opcion=pago-listado&msg=$msg");
		}

		break;

	case 'pago-editar':
		
		$idCompra = $_GET['idCom'];
		$objCom = new CompraModel();
		$compras = $objCom->obtenerCompra($idCompra);
	
		$objPro = new TransporteModel();
    	$resultProveedores = $objPro->listarDistribuidor();

		$objEmp = new EmpleadoModel();
		$resultEmpleados = $objEmp->listarEmpleado();

		$objCli = new clienteModel();
		$resultClientes = $objCli->listarCliente();

		$objVia = new HotelModel();
		$resultProductos = $objVia->listarProducto();

	
		if ($compras) {
			
			$cliente = $compras['cliente'];
			$empleado = $compras['empleado'];
			$viaje = $compras['viaje'];
			$cantidad = $compras['cantidad'];
			$proveedor = $compras['proveedor'];
	
			include("../views/template/header.php");
			include("../views/template/menu.php");
			include("../views/detalles de pedidos/editar.php");
			include("../views/template/footer.php");
		} else {
			echo "pago no encontrado.";
		}
		break;
	
	case 'pago-editar-procesar':
		
		$idCom = $_POST['idCom'];
		$cliente = $_POST['cliente'];
		$empleado = $_POST['empleado'];
		$viaje = $_POST['viaje'];
		$cantidad = $_POST['cantidad'];
		$proveedor = $_POST['proveedor'];

		$objCom = new CompraModel();
		$resultCompras = $objCom->actualizarCompra($idCom, $cliente, $empleado, $viaje, $cantidad, $proveedor);
		
		if ($resultCompras == 1) {
			$msg = "La pago se actualizó correctamente.";
			header("Location: agenciaControll.php?opcion=pago-listado&msg=$msg");
		} else {
			echo "Error al actualizar pago.";
		}
		break;

	// PEDIDOS

	case 'compra1-listado':

		$objCom = new CompraModel();
		$resultCompras = $objCom->listarCompra();

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/pedidos/listado.php");
		include("../views/template/footer.php");
		break;
}