<div class="container my-5">
    <h2>Listado de Empleados</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Puesto</th>
                <th>DNI</th>
                <th>Correo Electrónico</th>
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
                        <td><?php echo $empleado['correo_electronico']; ?></td>
                        <td>
                            <a href="agenciaControll.php?opcion=empleado-editar&id_empleado=<?php echo $empleado['id_empleado']; ?>">Editar</a> | 
                            <a href="agenciaControll.php?opcion=empleado-eliminar&id_empleado=<?php echo $empleado['id_empleado']; ?>" onclick="return confirm('¿Seguro que quieres eliminar este empleado?')">Eliminar</a>
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
