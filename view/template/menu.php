<?php
// Obtener la opción actual desde la URL
$current_option = isset($_GET['opcion']) ? $_GET['opcion'] : '';

// Función para agregar la clase 'active' al elemento activo
function isActive($option, $current_option) {
    return ($option === $current_option) ? 'active' : '';
}
?>

<nav class="navbar navbar-inverse" style="background-color: #d32f2f; border-color: #d32f2f;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="color: white;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Escudo_del_Peru.png/521px-Escudo_del_Peru.png" alt="Logo Perú" style="width: 30px; margin-right: 10px;">Logo
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <!-- Empleados -->
                <li class="<?php echo isActive('empleado-listado', $current_option); ?>">
                    <a href="agenciaControl.php?opcion=empleado-listado" style="color: white;">EMPLEADOS</a>
                </li>
                <!-- Clientes -->
                <li class="<?php echo isActive('cliente-listado', $current_option); ?>">
                    <a href="agenciaControl.php?opcion=cliente-listado" style="color: white;">CLIENTES</a>
                </li>
                <!-- Reservas -->
                <li class="<?php echo isActive('reserva-listado', $current_option); ?>">
                    <a href="agenciaControl.php?opcion=reserva-listado" style="color: white;">RESERVAS</a>
                </li>
                <!-- Pagos -->
                <li class="<?php echo isActive('pago-listado', $current_option); ?>">
                    <a href="agenciaControl.php?opcion=pago-listado" style="color: white;">PAGOS</a>
                </li>
                <!-- Proveedores -->
                <li class="<?php echo isActive('proveedor-listado', $current_option); ?>">
                    <a href="agenciaControl.php?opcion=proveedor-listado" style="color: white;">PROVEEDORES</a>
                </li>
                <!-- Transportes -->
                <li class="<?php echo isActive('transporte-listado', $current_option); ?>">
                    <a href="agenciaControl.php?opcion=transporte-listado" style="color: white;">TRANSPORTES</a>
                </li>
                <!-- Hoteles -->
                <li class="<?php echo isActive('hotel-listado', $current_option); ?>">
                    <a href="agenciaControl.php?opcion=hotel-listado" style="color: white;">HOTELES</a>
                </li>
                <!-- Viajes -->
                <li class="<?php echo isActive('viaje-listado', $current_option); ?>">
                    <a href="agenciaControl.php?opcion=viaje-listado" style="color: white;">VIAJES</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="agenciaControl.php?opcion=login-form-admin" style="color: white;">
                    <span class="glyphicon glyphicon-log-in"></span> SALIR</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-nav > li.active > a,
    .navbar-nav > li.active > a:hover,
    .navbar-nav > li.active > a:focus {
        background-color: yellow !important;
        color: black !important;
    }
</style>
