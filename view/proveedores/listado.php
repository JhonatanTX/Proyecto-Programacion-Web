<div class="container-fluid text-center">    
    <div class="row content">
        
        <div class="col-sm-2 sidenav">
            <p><a href="TiendaControl.php?opcion=proveedor-nuevo">Nuevo Proveedor</a></p>
        </div>
        
        <div class="col-sm-8 text-left"> 
            <h1>LISTADO DE PROVEEDORES</h1>
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
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <?php if(!empty($resultProveedores)) { ?>
                    <?php foreach ($resultProveedores as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id_proveedor'] ?></td>
                            <td><?php echo $value['nombre'] ?></td>
                            <td><?php echo $value['telefono'] ?></td>
                            <td><?php echo $value['direccion'] ?></td>
                            <td><a href="TiendaControl.php?opcion=proveedor-editar&id_proveedor=<?php echo $value['id_proveedor'] ?>">Editar</a> - 
                                <a href="TiendaControl.php?opcion=proveedor-eliminar&id_proveedor=<?php echo $value['id_proveedor'] ?>">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
