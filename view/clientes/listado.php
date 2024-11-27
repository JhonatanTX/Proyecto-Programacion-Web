<div class="container-fluid text-center">    
    <div class="row content">
        
        <div class="col-sm-2 sidenav">
            <!-- Icono de nuevo cliente -->
            <p><a href="agenciaControl.php?opcion=cliente-nuevo"><i class="fas fa-user-plus"></i> Nuevo Cliente</a></p>
        </div>
        
        <div class="col-sm-8 text-left"> 
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
                            <td>
                                <!-- Icono de editar -->
                                <a href="agenciaControl.php?opcion=cliente-editar&id_cliente=<?php echo $value['id_cliente'] ?>">
                                    <i class="fas fa-edit"></i>
                                </a> - 
                                <!-- Icono de eliminar -->
                                <a href="agenciaControl.php?opcion=cliente-eliminar&id_cliente=<?php echo $value['id_cliente'] ?>" 
                                   onclick="return confirm('¿Estás seguro de eliminar este cliente?')">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
        <div class="col-sm-2 sidenav">
        <br><br><br><br>
            <div class="well d-flex justify-content-center align-items-center" style="height: 200px;">
                <img src="https://i.pinimg.com/originals/2b/a0/4d/2ba04d6c906caedd0d291a2f10578681.jpg" alt="Metodo Pago" class="img-fluid">
            </div>
        </div>
    </div>
</div>

