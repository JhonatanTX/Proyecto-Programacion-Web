<?php
include("../models/UsuarioModel.php");
include("../models/EmpleadoModel.php");
include("../models/ProductoModel.php");
include("../models/CategoriaModel.php");
include("../models/ClienteModel.php");
include("../models/DistribuidorModel.php");
include("../models/ProveedorModel.php");
include("../models/ComprarModel.php");

$opcion = $_GET['opcion'];
switch ($opcion) {

	// LOGIN ADMIN
	case 'login-form-admin':

		include("../views/login admin/LOGINF.php");
		break;
	case 'login-procesar': //VERIFICAR ADMINISTRADOR
		// code...

		$usuarioA = $_POST['usuarioA'];
		$contraseñaA = sha1($_POST['contraseñaA']);


		$objModel = new UsuarioModel();
		$result = $objModel->verUsuario($usuarioA,$contraseñaA);

		if($result == 1){
			header("Location: TiendaControl.php?opcion=empleado-listado");
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
		$idEmpleado = $_GET['idEmp'];
		$resultEmpleados = $objEmp->borrarEmpleado($idEmpleado);

		if ($resultEmpleados == 1) {
			$msg = "El registro se borro correctamente";

			header("Location: TiendaControl.php?opcion=empleado-listado&msg=$msg");
		}

		break;
	
	case 'empleado-editar':
			$idEmpleado = $_GET['idEmp'];
			$objEmp = new EmpleadoModel();
			$empleado = $objEmp->obtenerEmpleado($idEmpleado);
	
			if ($empleado) {
				// Almacena los datos del empleado para mostrarlos en el formulario
				$usuarioA = $empleado['usuario'];
				$contraseñaA = ''; // Deja el campo de contraseña vacío
				$dni = $empleado['dni'];
				include("../views/template/header.php");
				include("../views/template/menu.php");
				include("../views/empleados/editar.php");
				include("../views/template/footer.php");
			} else {
				echo "Empleado no encontrado.";
			}
			break;
	
	case 'empleado-editar-procesar':
			$idEmp = $_POST['idEmp'];
			$usuarioA = $_POST['usuarioA'];
			$contraseñaA = sha1($_POST['contraseñaA']);
			$dni = $_POST['dni'];
	
			$objEmp = new EmpleadoModel();
			$resultEmpleados = $objEmp->actualizarEmpleado($idEmp, $usuarioA, $contraseñaA, $dni);
	
			if ($resultEmpleados == 1) {
				$msg = "El empleado se actualizó correctamente.";
				header("Location: TiendaControl.php?opcion=empleado-listado&msg=$msg");
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

		$usuarioA = $_POST['usuarioA'];
		$contraseñaA = sha1($_POST['contraseñaA']);
		$dni = $_POST['dni'];

		$objEmp = new EmpleadoModel();
		$resultEmpleados = $objEmp->crearEmpleado($usuarioA,$contraseñaA,$dni);

		if ($resultEmpleados == 1) {
			$msg = "Se creo un nuevo empleado";

			header("Location: TiendaControl.php?opcion=empleado-listado&msg=$msg");
		}

		break;
	
	// CASOS PARA CATEGORIAS
	
	case 'categoria-listado':

		$objCat = new CategoriaModel();
		$resultCategorias = $objCat->listarCategoria();

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/categorias/listado.php");
		include("../views/template/footer.php");
		break;
	
	case 'categoria-nuevo':

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/categorias/nuevo.php");
		include("../views/template/footer.php");
	
		break;
	
	case 'categoria-nuevo-procesar':
	
		$categoria = $_POST['categoria'];
	
		$objCat = new CategoriaModel();
		$resultCategorias = $objCat->crearCategoria($categoria);
	
		if ($resultCategorias == 1) {
			$msg = "Se creo una nueva categoria";
	
			header("Location: TiendaControl.php?opcion=categoria-listado&msg=$msg");
		}
	
		break;
	
	case 'categoria-eliminar':

		$objCat = new CategoriaModel();
		$idCategoria = $_GET['idCat'];
		$resultCategorias = $objCat->borrarCategoria($idCategoria);
	
		if ($resultCategorias == 1) {
			$msg = "La categoria se borro correctamente";
	
			header("Location: TiendaControl.php?opcion=categoria-listado&msg=$msg");
		}
	
		break;	
	
	case 'categoria-editar':
			$idCategoria = $_GET['idCat'];
			$objCat = new CategoriaModel();
			$categorias = $objCat->obtenerCategoria($idCategoria);
	
			if ($categorias) {
				// Almacena los datos del empleado para mostrarlos en el formulario
				$categoria = $categorias['categorias'];
				include("../views/template/header.php");
				include("../views/template/menu.php");
				include("../views/categorias/editar.php");
				include("../views/template/footer.php");
			} else {
				echo "Categoria no encontrado.";
			}
			break;
	
	case 'categoria-editar-procesar':
			$idCat = $_POST['idCat'];
			$categoria = $_POST['categoria'];
	
			$objCat = new CategoriaModel();
			$resultCategorias = $objCat->actualizarCategoria($idCat, $categoria);
	
			if ($resultCategorias == 1) {
				$msg = "La categoria se actualizó correctamente.";
				header("Location: TiendaControl.php?opcion=categoria-listado&msg=$msg");
			} else {
				echo "Error al actualizar la categoria.";
			}
			break;	

	// CASO PARA CLIENTES

	case 'cliente-listado':

		$objCli = new ClienteModel();
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

		$usuario = $_POST['usuario'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$contraseña = sha1($_POST['contraseña']);
		$pregunta = $_POST['pregunta'];
		$respuesta = $_POST['respuesta'];

		$objCli = new ClienteModel();
		$resultClientes = $objCli->crearCliente($usuario,$nombre,$apellido,$contraseña,$pregunta,$respuesta);

		if ($resultClientes == 1) {
			$msg = "Se creo un nuevo cliente";

			header("Location: TiendaControl.php?opcion=cliente-listado&msg=$msg");
		}

		break;
	
	case 'cliente-eliminar':

		$objCli = new ClienteModel();
		$idCliente = $_GET['idCli'];
		$resultClientes = $objCli->borrarCliente($idCliente);

		if ($resultClientes == 1) {
			$msg = "El cliente se borro correctamente";

			header("Location: TiendaControl.php?opcion=cliente-listado&msg=$msg");
		}

		break;
	
		case 'cliente-editar':
			$idCliente = $_GET['idCli'];
			$objCli = new ClienteModel();
			$cliente = $objCli->obtenerCliente($idCliente);
	
			if ($cliente) {
				// Almacena los datos del empleado para mostrarlos en el formulario
				$usuario = $cliente['usuario'];
				$nombre = $cliente['nombre'];
				$apellido = $cliente['apellido'];
				$contraseña = ''; // Deja el campo de contraseña vacío
				$pregunta = $cliente['pregunta'];
				$respuesta = $cliente['respuesta']; 
				include("../views/template/header.php");
				include("../views/template/menu.php");
				include("../views/clientes/editar.php");
				include("../views/template/footer.php");
			} else {
				echo "Cliente no encontrado.";
			}
			break;
	
	case 'cliente-editar-procesar':
			$idCli = $_POST['idCli'];
			$usuario = $_POST['usuario'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$contraseña = sha1($_POST['contraseña']);
			$pregunta = $_POST['pregunta'];
			$respuesta = $_POST['respuesta'];
	
			$objCli = new ClienteModel();
			$resultClientes = $objCli->actualizarCliente($idCli, $usuario, $nombre, $apellido, $contraseña, $pregunta, $respuesta);
	
			if ($resultClientes == 1) {
				$msg = "El cliente se actualizó correctamente.";
				header("Location: TiendaControl.php?opcion=cliente-listado&msg=$msg");
			} else {
				echo "Error al actualizar el cliente.";
			}
			break;

	// CASOS PARA PRODUCTOS
	
	case 'producto-listado':

		$objPro = new ProductoModel();
		$resultProductos = $objPro->listarProducto();

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/productos/listado.php");
		include("../views/template/footer.php");

		break;

	case 'producto-nuevo':

		$objProv = new ProveedorModel();
    	$resultProveedores = $objProv->listarProveedor();

		$objCat = new CategoriaModel();
    	$resultCategorias = $objCat->listarCategoria();

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/productos/nuevo.php");
		include("../views/template/footer.php");
		
		break;

	case 'producto-nuevo-procesar':

			$codigo = $_POST['codigo'];
			$nombre = $_POST['nombre'];
			$descripcion = $_POST['descripcion'];
			$proveedor = $_POST['proveedor'];
			$categoria = $_POST['categoria'];
			$estado = $_POST['estado'];
			$stock = $_POST['stock'];
			$precio = $_POST['precio'];
			$imagen = $_POST['imagen'];
		
			$objPro = new ProductoModel();
			$resultProductos = $objPro->crearProducto($codigo, $nombre, $descripcion, $proveedor, $categoria, $estado, $stock, $precio, $imagen);
		
			if ($resultProductos == 1) {
				$msg = "Se ingreso un nuevo producto";
		
				header("Location: TiendaControl.php?opcion=producto-listado&msg=$msg");
			}
		
			break;

	case 'producto-eliminar':

			$objPro = new ProductoModel();
			$idProducto = $_GET['idPro'];
			$resultProductos = $objPro->borrarProducto($idProducto);
		
			if ($resultProductos == 1) {
				$msg = "El producto se borro correctamente";
		
				header("Location: TiendaControl.php?opcion=producto-listado&msg=$msg");
			}
		
			break;

	case 'producto-editar':
		
		$idProducto = $_GET['idPro'];
		$objPro = new ProductoModel();
		$productos = $objPro->obtenerProducto($idProducto);
	
		$objCat = new CategoriaModel();
		$resultCategorias = $objCat->listarCategoria();

		$objProv = new ProveedorModel();
    	$resultProveedores = $objProv->listarProveedor();
	
		if ($productos) {
			
			$codigo = $productos['codigo'];
			$nombre = $productos['nombre'];
			$descripcion = $productos['descripcion'];
			$proveedor = $productos['proveedor'];
			$categoria = $productos['categoria'];
			$estado = $productos['estado'];
			$stock = $productos['stock'];
			$precio = $productos['precio'];
			$imagen = $productos['imagen'];
	
			include("../views/template/header.php");
			include("../views/template/menu.php");
			include("../views/productos/editar.php");
			include("../views/template/footer.php");
		} else {
			echo "Producto no encontrado.";
		}
		break;
	
	case 'producto-editar-procesar':
		
		$idPro = $_POST['idPro'];
		$codigo = $_POST['codigo'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$proveedor = $_POST['proveedor'];
		$categoria = $_POST['categoria'];
		$estado = $_POST['estado'];
		$stock = $_POST['stock'];
		$precio = $_POST['precio'];
		$imagen = $_POST['imagen'];

		$objPro = new ProductoModel();
		$resultProductos = $objPro->actualizarProducto($idPro, $codigo, $nombre, $descripcion, $proveedor, $categoria, $estado, $stock, $precio, $imagen);
		
		if ($resultProductos == 1) {
			$msg = "El producto se actualizó correctamente.";
			header("Location: TiendaControl.php?opcion=producto-listado&msg=$msg");
		} else {
			echo "Error al actualizar el producto.";
		}
		break;

	// CASOS PARA PROVEEDORES
	
	case 'proveedor-listado':

		$objProv = new ProveedorModel();
		$resultProveedores = $objProv->listarProveedor();

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/proveedores/listado.php");
		include("../views/template/footer.php");

		break;
		
	case 'proveedor-nuevo':

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/proveedores/nuevo.php");
		include("../views/template/footer.php");

		break;

	case 'proveedor-nuevo-procesar':

		$proveedor = $_POST['proveedor'];
		$nombre = $_POST['nombre'];
		$direccion = $_POST['direccion'];
		$ciudad = $_POST['ciudad'];
		$codigopostal = $_POST['codigopostal'];
		$celular = $_POST['celular'];

		$objProv = new ProveedorModel();
		$resultProveedores = $objProv->crearProveedor($proveedor,$nombre,$direccion,$ciudad,$codigopostal,$celular);

		if ($resultProveedores == 1) {
			$msg = "Se creo un nuevo proveedor";

			header("Location: TiendaControl.php?opcion=proveedor-listado&msg=$msg");
		}

		break;
	
	case 'proveedor-eliminar':

		$objProv = new ProveedorModel();
		$idProveedor = $_GET['idProv'];
		$resultProveedores = $objProv->borrarProveedor($idProveedor);

		if ($resultProveedores == 1) {
			$msg = "El proveedor se borro correctamente";

			header("Location: TiendaControl.php?opcion=proveedor-listado&msg=$msg");
		}

		break;

	case 'proveedor-editar':
			$idProveedor = $_GET['idProv'];
			$objProv = new ProveedorModel();
			$proveedor1 = $objProv->obtenerProveedor($idProveedor);
	
			if ($proveedor1) {
				
				$proveedor = $proveedor1['proveedor'];
				$nombre = $proveedor1['nombre'];
				$direccion = $proveedor1['direccion'];
				$ciudad = $proveedor1['ciudad'];
				$codigopostal = $proveedor1['codigopostal'];
				$celular = $proveedor1['celular'];
				
				include("../views/template/header.php");
				include("../views/template/menu.php");
				include("../views/proveedores/editar.php");
				include("../views/template/footer.php");
			} else {
				echo "proveedor no encontrado.";
			}
			break;
	
	case 'proveedor-editar-procesar':

			$idProv = $_POST['idProv'];
			$proveedor = $_POST['proveedor'];
			$nombre = $_POST['nombre'];
			$direccion = $_POST['direccion'];
			$ciudad = $_POST['ciudad'];
			$codigopostal = $_POST['codigopostal'];
			$celular = $_POST['celular'];
	
			$objProv = new ProveedorModel();
			$resultProveedores = $objProv->actualizarProveedor($idProv,$proveedor,$nombre,$direccion,$ciudad,$codigopostal,$celular);
	
			if ($resultProveedores == 1) {
				$msg = "El proveedor se actualizó correctamente.";
				header("Location: TiendaControl.php?opcion=proveedor-listado&msg=$msg");
			} else {
				echo "Error al actualizar el proveedor.";
			}
			break;
	
	// CASOS PARA DISTRIBUIDORES

	case 'distribuidor-listado':

		$objDis = new DistribuidorModel();
		$resultDistribuidores = $objDis->listarDistribuidor();

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/distribuidores/listado.php");
		include("../views/template/footer.php");

		break;
		
	case 'distribuidor-nuevo':

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/distribuidores/nuevo.php");
		include("../views/template/footer.php");

		break;

	case 'distribuidor-nuevo-procesar':

		$distribuidor = $_POST['distribuidor'];
		$celular = $_POST['celular'];

		$objDis = new DistribuidorModel();
		$resultDistribuidores = $objDis->crearDistribuidor($distribuidor,$celular);

		if ($resultDistribuidores == 1) {
			$msg = "Se creo un nuevo distribuidor";

			header("Location: TiendaControl.php?opcion=distribuidor-listado&msg=$msg");
		}

		break;
	
	case 'distribuidor-eliminar':

		$objDis = new DistribuidorModel();
		$idDistribuidor = $_GET['idDis'];
		$resultDistribuidores = $objDis->borrarDistribuidor($idDistribuidor);

		if ($resultDistribuidores == 1) {
			$msg = "El distribuidor se borro correctamente";

			header("Location: TiendaControl.php?opcion=distribuidor-listado&msg=$msg");
		}

		break;

	case 'distribuidor-editar':
			$idDistribuidor = $_GET['idDis'];
			$objDis = new DistribuidorModel();
			$distribuidor1 = $objDis->obtenerDistribuidor($idDistribuidor);
	
			if ($distribuidor1) {
				
				$distribuidor = $distribuidor1['distribuidor'];
				$celular = $distribuidor1['celular'];
				
				include("../views/template/header.php");
				include("../views/template/menu.php");
				include("../views/distribuidores/editar.php");
				include("../views/template/footer.php");
			} else {
				echo "distribuidor no encontrado.";
			}
			break;
	
	case 'distribuidor-editar-procesar':

			$idDis = $_POST['idDis'];
			$distribuidor = $_POST['distribuidor'];
			$celular = $_POST['celular'];
	
			$objDis = new DistribuidorModel();
			$resultDistribuidores = $objDis->actualizarDistribuidor($idDis,$distribuidor,$celular);
	
			if ($resultDistribuidores == 1) {
				$msg = "El distribuidor se actualizó correctamente.";
				header("Location: TiendaControl.php?opcion=distribuidor-listado&msg=$msg");
			} else {
				echo "Error al actualizar el distribuidor.";
			}
			break;

	// CASOS PARA PRODUCTOS PARA COMPRAR
	
	case 'compra-listado':

		$objCom = new CompraModel();
		$resultCompras = $objCom->listarCompra();

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/detalles de pedidos/listado.php");
		include("../views/template/footer.php");
		break;
	
	case 'compra-nuevo':

		$objDis = new DistribuidorModel();
    	$resultDistribuidores = $objDis->listarDistribuidor();

		$objEmp = new EmpleadoModel();
		$resultEmpleados = $objEmp->listarEmpleado();

		$objCli = new ClienteModel();
		$resultClientes = $objCli->listarCliente();

		$objPro = new ProductoModel();
		$resultProductos = $objPro->listarProducto();

		include("../views/template/header.php");
		include("../views/template/menu.php");
		include("../views/detalles de pedidos/nuevo.php");
		include("../views/template/footer.php");
		
		break;

	case 'compra-nuevo-procesar':

			$cliente = $_POST['cliente'];
			$empleado = $_POST['empleado'];
			$producto = $_POST['producto'];
			$cantidad = $_POST['cantidad'];
			$distribuidor = $_POST['distribuidor'];
		
			$objCom = new CompraModel();
			$resultCompras = $objCom->crearCompra($cliente, $empleado, $producto, $cantidad, $distribuidor);
		
			if ($resultCompras == 1) {
				$msg = "Se ingreso una compra";
		
				header("Location: TiendaControl.php?opcion=compra-listado&msg=$msg");
			}
		
			break;
	
	case 'compra-eliminar':

		$objCom = new CompraModel();
		$idCompra = $_GET['idCom'];
		$resultCompras = $objCom->borrarCompra($idCompra);

		if ($resultCompras == 1) {
			$msg = "La compra se borro correctamente";

			header("Location: TiendaControl.php?opcion=compra-listado&msg=$msg");
		}

		break;

	case 'compra-editar':
		
		$idCompra = $_GET['idCom'];
		$objCom = new CompraModel();
		$compras = $objCom->obtenerCompra($idCompra);
	
		$objDis = new DistribuidorModel();
    	$resultDistribuidores = $objDis->listarDistribuidor();

		$objEmp = new EmpleadoModel();
		$resultEmpleados = $objEmp->listarEmpleado();

		$objCli = new ClienteModel();
		$resultClientes = $objCli->listarCliente();

		$objPro = new ProductoModel();
		$resultProductos = $objPro->listarProducto();

	
		if ($compras) {
			
			$cliente = $compras['cliente'];
			$empleado = $compras['empleado'];
			$producto = $compras['producto'];
			$cantidad = $compras['cantidad'];
			$distribuidor = $compras['distribuidor'];
	
			include("../views/template/header.php");
			include("../views/template/menu.php");
			include("../views/detalles de pedidos/editar.php");
			include("../views/template/footer.php");
		} else {
			echo "compra no encontrado.";
		}
		break;
	
	case 'compra-editar-procesar':
		
		$idCom = $_POST['idCom'];
		$cliente = $_POST['cliente'];
		$empleado = $_POST['empleado'];
		$producto = $_POST['producto'];
		$cantidad = $_POST['cantidad'];
		$distribuidor = $_POST['distribuidor'];

		$objCom = new CompraModel();
		$resultCompras = $objCom->actualizarCompra($idCom, $cliente, $empleado, $producto, $cantidad, $distribuidor);
		
		if ($resultCompras == 1) {
			$msg = "La compra se actualizó correctamente.";
			header("Location: TiendaControl.php?opcion=compra-listado&msg=$msg");
		} else {
			echo "Error al actualizar compra.";
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