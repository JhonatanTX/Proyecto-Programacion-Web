<div class="container-fluid text-center">    
    <div class="row content">
        
        <div class="col-sm-2 sidenav">
            <p><a href="agenciaControl.php?opcion=cliente-nuevo">Nuevo Cliente</a></p>
        </div>
        
        <div class="col-sm-10 text-left"> 
            <h1>LISTADO DE CLIENTES</h1>
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
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <?php if(!empty($resultClientes)) { ?>
                    <?php foreach ($resultClientes as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id_cliente'] ?></td>
                            <td><?php echo $value['nombre'] ?></td>
                            <td><?php echo $value['apellido'] ?></td>
                            <td><?php echo $value['correo_electronico'] ?></td>
                            <td><?php echo $value['telefono'] ?></td>
                            <td><?php echo $value['direccion'] ?></td>
                            <td><a href="agenciaControl.php?opcion=cliente-editar&id_cliente=<?php echo $value['id_cliente'] ?>">Editar</a> - 
                                <a href="agenciaControl.php?opcion=cliente-eliminar&id_cliente=<?php echo $value['id_cliente'] ?>">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
