<div class="container-fluid text-center">    
    <div class="row content">
        
        <div class="col-sm-2 sidenav">
            <p><a href="agenciaControl.php?opcion=hotel-nuevo">Nuevo Hotel</a></p>
        </div>
        
        <div class="col-sm-8 text-left"> 
            <h1>LISTADO DE HOTELES</h1>
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
                        <th>Nombre Empresa</th>
                        <th>Nombre Hotel</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Lugar</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <?php if(!empty($resultHoteles)) { ?>
                    <?php foreach ($resultHoteles as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id_hotel'] ?></td>
                            <td><?php echo $value['nombre_empresa'] ?></td>
                            <td><?php echo $value['nombre_hotel'] ?></td>
                            <td><?php echo $value['direccion'] ?></td>
                            <td><?php echo $value['telefono'] ?></td>
                            <td><?php echo $value['correo_electronico'] ?></td>
                            <td><?php echo $value['lugar'] ?></td>
                            <td><a href="agenciaControl.php?opcion=hotel-editar&id_hotel=<?php echo $value['id_hotel'] ?>">Editar</a> - 
                                <a href="agenciaControl.php?opcion=hotel-eliminar&id_hotel=<?php echo $value['id_hotel'] ?>">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
