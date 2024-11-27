<div class="container-fluid text-center">    
    <div class="row content">
        <!-- Columna Izquierda -->
        <div class="col-sm-2 sidenav">
            <p><a href="agenciaControl.php?opcion=empleado-nuevo"><i class="fas fa-user-plus"></i>Nuevo empleado</a></p>

        </div>

        <div class="col-sm-8 text-left">
            <h1>Listado de Empleados</h1>
            <h2>
                <span style="color:red">
                    <?php 
                    if(!empty($_GET['msg'])) { 
                        echo $_GET['msg']; 
                    } 
                    ?>
                </span>
            </h2>    
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Puesto</th>
                        <th>DNI</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($resultEmpleados)) { ?>
                        <?php foreach ($resultEmpleados as $empleado) { ?>
                            <tr>
                                <td><?php echo $empleado['id_empleado']; ?></td>
                                <td><?php echo $empleado['nombre']; ?></td>
                                <td><?php echo $empleado['puesto']; ?></td>
                                <td><?php echo $empleado['dni']; ?></td>
                                <td>
                                    <a href="agenciaControl.php?opcion=empleado-editar&id_empleado=<?php echo $empleado['id_empleado']; ?>"><i class="fas fa-edit"></i></a> | 
                                    <a href="agenciaControl.php?opcion=empleado-eliminar&id_empleado=<?php echo $empleado['id_empleado']; ?>" onclick="return confirm('¿Seguro que quieres eliminar este empleado?')"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="6">No hay empleados registrados</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-2 sidenav">
        <br><br><br><br>
            <div class="well d-flex justify-content-center align-items-center" style="height: 200px;">
                <img src="https://www.fullviajes.net/wp-content/uploads/2022/09/paquetes_de_viajes_todo_incluido.jpg" alt="Metodo Pago" class="img-fluid">
            </div>
        </div>
    </div>
</div>