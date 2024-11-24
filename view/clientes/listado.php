<div class="container-fluid text-center">    
    <div class="row content">
        
        <div class="col-sm-2 sidenav">
            <p><a href="TiendaControl.php?opcion=cliente-nuevo">Nuevo Cliente</a></p>
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
                        <th>DNI</th>
                        <th>Correo</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <?php if(!empty($resultClientes)) { ?>
                    <?php foreach ($resultClientes as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id_cliente'] ?></td>
                            <td><?php echo $value['nombre'] ?></td>
                            <td><?php echo $value['apellido'] ?></td>
                            <td><?php echo $value['dni'] ?></td>
                            <td><?php echo $value['correo'] ?></td>
                            <td><a href="TiendaControl.php?opcion=cliente-editar&id_cliente=<?php echo $value['id_cliente'] ?>">Editar</a> - 
                                <a href="TiendaControl.php?opcion=cliente-eliminar&id_cliente=<?php echo $value['id_cliente'] ?>">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
