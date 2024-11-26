<div class="container-fluid text-center">    
    <div class="row content">
        <!-- Columna Izquierda -->
        <div class="col-sm-2 ">
            <br><br><br><br>
            <p><a href="agenciaControl.php?opcion=empleado-nuevo">Nuevo empleado</a></p>

        </div>

        <div class="col-sm-10">
            <h2>Listado de Empleados</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Puesto</th>
                        <th>DNI</th>
                        <th>Acciones</th>
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
                                    <a href="agenciaControl.php?opcion=empleado-editar&id_empleado=<?php echo $empleado['id_empleado']; ?>">Editar</a> | 
                                    <a href="agenciaControl.php?opcion=empleado-eliminar&id_empleado=<?php echo $empleado['id_empleado']; ?>" onclick="return confirm('¿Seguro que quieres eliminar este empleado?')">Eliminar</a>
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
    </div>
</div>