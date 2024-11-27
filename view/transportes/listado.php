<div class="container-fluid text-center">    
    <div class="row content">
        
        <div class="col-sm-2 sidenav">
            <p><a href="agenciaControl.php?opcion=transporte-nuevo"><i class="fas fa-user-plus"></i>Nuevo Transporte</a></p>
        </div>
        
        <div class="col-sm-10 text-left"> 
            <h1>LISTADO DE TRANSPORTES</h1>
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
                        <th>Tipo de Transporte</th>
                        <th>Nombre Empresa</th>
                        <th>Numero servicio</th>
                        <th>Precio</th>
                        <th>Fecha Salida</th>
                        <th>Destino</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <?php if(!empty($resultTransportes)) { ?>
                    <?php foreach ($resultTransportes as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id_transporte'] ?></td>
                            <td><?php echo $value['tipo_transporte'] ?></td>
                            <td><?php echo $value['nombre_empresa'] ?></td>
                            <td><?php echo $value['numero_servicio'] ?></td>
                            <td><?php echo $value['precio'] ?></td>
                            <td><?php echo $value['fecha_salida'] ?></td>
                            <td><?php echo $value['destino'] ?></td>
                            <td><a href="agenciaControl.php?opcion=transporte-editar&id_transporte=<?php echo $value['id_transporte'] ?>"><i class="fas fa-edit"></i></a> - 
                                <a href="agenciaControl.php?opcion=transporte-eliminar&id_transporte=<?php echo $value['id_transporte'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
