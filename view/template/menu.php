<?php
// Obtener la opción actual desde la URL
$current_option = isset($_GET['opcion']) ? $_GET['opcion'] : '';

// Función para agregar la clase 'active' al elemento activo
function isActive($option, $current_option) {
    return ($option === $current_option) ? 'active' : '';
}
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #48027f">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#myNavbar" aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="https://gd-hbimg.huaban.com/7c6e28b8fa619fcc7ee92d721d707721a1a515fe8828-RQlulO_fw658" alt="Logo Agencia" style="width: 30px; margin-right: 10px;">
                Logo
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Empleados -->
                <li class="nav-item <?php echo isActive('empleado-listado', $current_option); ?>">
                    <a class="nav-link" href="agenciaControl.php?opcion=empleado-listado">EMPLEADOS</a>
                </li>
                <!-- Clientes -->
                <li class="nav-item <?php echo isActive('cliente-listado', $current_option); ?>">
                    <a class="nav-link" href="agenciaControl.php?opcion=cliente-listado">CLIENTES</a>
                </li>
                <!-- Reservas -->
                <li class="nav-item <?php echo isActive('reserva-listado', $current_option); ?>">
                    <a class="nav-link" href="agenciaControl.php?opcion=reserva-listado">RESERVAS</a>
                </li>
                <!-- Pagos -->
                <li class="nav-item <?php echo isActive('pago-listado', $current_option); ?>">
                    <a class="nav-link" href="agenciaControl.php?opcion=pago-listado">PAGOS</a>
                </li>
                <!-- Proveedores -->
                <li class="nav-item <?php echo isActive('proveedor-listado', $current_option); ?>">
                    <a class="nav-link" href="agenciaControl.php?opcion=proveedor-listado">PROVEEDORES</a>
                </li>
                <!-- Transportes -->
                <li class="nav-item <?php echo isActive('transporte-listado', $current_option); ?>">
                    <a class="nav-link" href="agenciaControl.php?opcion=transporte-listado">TRANSPORTES</a>
                </li>
                <!-- Hoteles -->
                <li class="nav-item <?php echo isActive('hotel-listado', $current_option); ?>">
                    <a class="nav-link" href="agenciaControl.php?opcion=hotel-listado">HOTELES</a>
                </li>
                <!-- Viajes -->
                <li class="nav-item <?php echo isActive('viaje-listado', $current_option); ?>">
                    <a class="nav-link" href="agenciaControl.php?opcion=viaje-listado">VIAJES</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="agenciaControl.php?opcion=login-form-admin">
                        <i class="fas fa-sign-out-alt"></i> SALIR
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-nav > .nav-item.active > .nav-link,
    .navbar-nav > .nav-item.active > .nav-link:hover,
    .navbar-nav > .nav-item.active > .nav-link:focus {
        background-color: skyblue !important;
        color: black !important;
    }
</style>

