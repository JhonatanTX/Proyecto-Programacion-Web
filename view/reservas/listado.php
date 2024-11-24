<div class="container-fluid text-center">    
    <div class="row content">
        
        <div class="col-sm-2 sidenav">
            <p><a href="TiendaControl.php?opcion=reserva-nueva">Nueva Reserva</a></p>
        </div>
        
        <div class="col-sm-8 text-left"> 
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
                        <th>Cliente</th>
                        <th>Hotel</th>
                        <th>Fecha Ingreso</th>
                        <th>Fecha Salida</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <?php if(!empty($resultReservas)) { ?>
                    <?php foreach ($resultReservas as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id_reserva'] ?></td>
                            <td><?php echo $value['cliente'] ?></td>
                            <td><?php echo $value['hotel'] ?></td>
                            <td><?php echo $value['fecha_ingreso'] ?></td>
                            <td><?php echo $value['fecha_salida'] ?></td>
                            <td><a href="TiendaControl.php?opcion=reserva-editar&id_reserva=<?php echo $value['id_reserva'] ?>">Editar</a> - 
                                <a href="TiendaControl.php?opcion=reserva-eliminar&id_reserva=<?php echo $value['id_reserva'] ?>">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
