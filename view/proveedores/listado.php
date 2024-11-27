<div class="container-fluid text-center">    
    <div class="row content">
        
        <div class="col-sm-2 sidenav">
            <p><a href="agenciaControl.php?opcion=proveedor-nuevo"><i class="fas fa-user-plus"></i>Nuevo Proveedor</a></p>
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
                        <th>Servicio</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Tarifas</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <?php if(!empty($resultProveedores)) { ?>
                    <?php foreach ($resultProveedores as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id_proveedor'] ?></td>
                            <td><?php echo $value['nombre_empresa'] ?></td>
                            <td><?php echo $value['tipo_servicio'] ?></td>
                            <td><?php echo $value['direccion'] ?></td>
                            <td><?php echo $value['telefono'] ?></td>
                            <td><?php echo $value['correo_electronico'] ?></td>
                            <td><?php echo $value['tarifas'] ?></td>
                            <td><a href="agenciaControl.php?opcion=proveedor-editar&id_proveedor=<?php echo $value['id_proveedor'] ?>"><i class="fas fa-edit"></i></a> - 
                                <a href="agenciaControl.php?opcion=proveedor-eliminar&id_proveedor=<?php echo $value['id_proveedor'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
        <div class="col-sm-2 sidenav">
        <br><br><br>
            <div class="well d-flex justify-content-center align-items-center" style="height: 200px;">
                <img src="https://image.jimcdn.com/app/cms/image/transf/dimension=1920x10000:format=jpg/path/s47a22299ed8c63ff/image/i949d5d51b7a285cf/version/1477773747/image.jpg" alt="Metodo Pago" class="img-fluid">
            </div>
        </div>
    </div>
</div>
