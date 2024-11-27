<?php
// Obtener la opción actual desde la URL
$current_option = isset($_GET['opcion']) ? $_GET['opcion'] : '';

// Función para agregar la clase 'active' al elemento activo
function isActive($option, $current_option) {
    return ($option === $current_option) ? 'active' : '';
}
?>

<nav class="navbar navbar-expand-lg navbar-dark shadow" style="background-color: #48027f;">
    <div class="container-fluid">
        <!-- Logo y nombre de la agencia -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="https://gd-hbimg.huaban.com/7c6e28b8fa619fcc7ee92d721d707721a1a515fe8828-RQlulO_fw658" 
                alt="Logo Agencia" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;">
            <span style="font-size: 1.2rem; font-weight: bold;">Travel Expert</span>
        </a>
        <!-- Botón de colapso -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links del menú -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item mx-2 <?php echo isActive('empleado-listado', $current_option); ?>">
                    <a class="nav-link" href="agenciaControl.php?opcion=empleado-listado">Empleados</a>
                </li>
                <li class="nav-item mx-2 <?php echo isActive('cliente-listado', $current_option); ?>">
                    <a class="nav-link" href="agenciaControl.php?opcion=cliente-listado">Clientes</a>
                </li>
                <li class="nav-item mx-2 <?php echo isActive('proveedor-listado', $current_option); ?>">
                    <a class="nav-link" href="agenciaControl.php?opcion=proveedor-listado">Proveedores</a>
                </li>
                <li class="nav-item mx-2 <?php echo isActive('viaje-listado', $current_option); ?>">
                    <a class="nav-link" href="agenciaControl.php?opcion=viaje-listado">Viajes</a>
                </li>
                <li class="nav-item mx-2 <?php echo isActive('hotel-listado', $current_option); ?>">
                    <a class="nav-link" href="agenciaControl.php?opcion=hotel-listado">Hoteles</a>
                </li>
                <li class="nav-item mx-2 <?php echo isActive('transporte-listado', $current_option); ?>">
                    <a class="nav-link" href="agenciaControl.php?opcion=transporte-listado">Transportes</a>
                </li>
                <li class="nav-item mx-2 <?php echo isActive('reserva-listado', $current_option); ?>">
                    <a class="nav-link" href="agenciaControl.php?opcion=reserva-listado">Reservas</a>
                </li>
                <li class="nav-item mx-2 <?php echo isActive('pago-listado', $current_option); ?>">
                    <a class="nav-link" href="agenciaControl.php?opcion=pago-listado">Pagos</a>
                </li>
            </ul>
            <!-- Botón de cierre de sesión -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-outline-light px-3 nav-link" href="agenciaControl.php?opcion=login-form-admin">
                        <i class="fas fa-sign-out-alt"></i> Salir
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-brand span {
        font-family: 'Arial', sans-serif;
    }
    .nav-link {
        transition: all 0.3s ease;
        padding: 0.5rem 1rem;
    }
    .nav-item {
        margin-right: 10px; /* Espaciado entre ítems */
    }
    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
    }
    .nav-item.active .nav-link,
    .nav-item.active .nav-link:hover {
        background-color: skyblue !important;
        color: black !important;
        font-weight: bold;
        border-radius: 5px;
    }
    .btn-outline-light:hover {
        background-color: white;
        color: #48027f;
    }
    @media (max-width: 768px) {
        .nav-item {
            margin-bottom: 10px; /* Espaciado para pantallas pequeñas */
        }
    }
</style>



