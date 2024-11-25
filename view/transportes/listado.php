<div class="container-fluid text-center">    
    <div class="row content">
        
        <div class="col-sm-2 sidenav">
            <p><a href="agenciaControl.php?opcion=transporte-nuevo">Nuevo Transporte</a></p>
        </div>
        
        <div class="col-sm-8 text-left"> 
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
                        <th>Tipo</th>
                        <th>Marca</th>
                        <th>Capacidad</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <?php if(!empty($resultTransportes)) { ?>
                    <?php foreach ($resultTransportes as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id_transporte'] ?></td>
                            <td><?php echo $value['tipo'] ?></td>
                            <td><?php echo $value['marca'] ?></td>
                            <td><?php echo $value['capacidad'] ?></td>
                            <td><a href="agenciaControl.php?opcion=transporte-editar&id_transporte=<?php echo $value['id_transporte'] ?>">Editar</a> - 
                                <a href="agenciaControl.php?opcion=transporte-eliminar&id_transporte=<?php echo $value['id_transporte'] ?>">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
