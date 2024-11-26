<div class="container-fluid text-center">    
    <div class="row content">
        
        <div class="col-sm-2 sidenav">
            <p><a href="agenciaControl.php?opcion=reserva-nueva">Nueva Reserva</a></p>
        </div>
        
        <div class="col-sm-10 text-left"> 
            <h1>LISTADO DE RESERVAS</h1>
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
                        <th>Nombre Cliente</th>
                        <th>Destino</th>
                        <th>Fecha Reserva</th>
                        <th>Numero de Personas</th>
                        <th>Fecha Salida</th>
                        <th>Fecha Regreso</th>
                        <th>Estado de Reserva</th>
                        <th>Precio Total</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <?php if(!empty($resultReservas)) { ?>
                    <?php foreach ($resultReservas as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id_reserva'] ?></td>
                            <td><?php echo $value['nombre'] ?></td>
                            <td><?php echo $value['destinos'] ?></td>
                            <td><?php echo $value['fecha_reserva'] ?></td>
                            <td><?php echo $value['numero_personas'] ?></td>
                            <td><?php echo $value['fecha_salida'] ?></td>
                            <td><?php echo $value['fecha_regreso'] ?></td>
                            <td><?php echo $value['estado_reserva'] ?></td>
                            <td><?php echo $value['precio_total'] ?></td>
                            <td><a href="agenciaControl.php?opcion=reserva-editar&id_reserva=<?php echo $value['id_reserva'] ?>">Editar</a> - 
                                <a href="agenciaControl.php?opcion=reserva-eliminar&id_reserva=<?php echo $value['id_reserva'] ?>">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
