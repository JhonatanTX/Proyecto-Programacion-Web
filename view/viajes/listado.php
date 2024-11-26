<div class="container-fluid text-center">    
    <div class="row content">
        
        <div class="col-sm-2 sidenav">
            <p><a href="agenciaControl.php?opcion=viaje-nuevo">Nuevo Viaje</a></p>
        </div>
        
        <div class="col-sm-10 text-left"> 
            <h1>LISTADO DE VIAJES</h1>
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
                        <th>Nombre Paquete</th>
                        <th>Descripcion</th>
                        <th>Destino</th>
                        <th>Precio</th>
                        <th>Fecha Disponible</th>
                        <th>Duracion</th>
                        <th>Transporte</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <?php if(!empty($resultViajes)) { ?>
                    <?php foreach ($resultViajes as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id_viaje'] ?></td>
                            <td><?php echo $value['nombre_paquete'] ?></td>
                            <td><?php echo $value['descripcion'] ?></td>
                            <td><?php echo $value['destinos'] ?></td>
                            <td><?php echo $value['precio'] ?></td>
                            <td><?php echo $value['fechas_disponibles'] ?></td>
                            <td><?php echo $value['duracion']?> dias</td>
                            <td><?php echo $value['transporte'] ?></td>
                            <td><a href="agenciaControl.php?opcion=viaje-editar&id_viaje=<?php echo $value['id_viaje'] ?>">Editar</a> - 
                                <a href="agenciaControl.php?opcion=viaje-eliminar&id_viaje=<?php echo $value['id_viaje'] ?>">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
