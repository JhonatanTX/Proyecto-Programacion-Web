<div class="container-fluid text-center">    
    <div class="row content">
        
        <div class="col-sm-2 sidenav">
            <p><a href="TiendaControl.php?opcion=pago-nuevo">Nuevo Pago</a></p>
        </div>
        
        <div class="col-sm-8 text-left"> 
            <h1>LISTADO DE PAGOS</h1>
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
                        <th>Monto Pagado</th>
                        <th>Fecha de Pago</th>
                        <th>Método de Pago</th>
                        <th>Reserva</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <?php if(!empty($resultPagos)) { ?>
                    <?php foreach ($resultPagos as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id_pago'] ?></td>
                            <td><?php echo $value['monto_pagado'] ?></td>
                            <td><?php echo $value['fecha_pago'] ?></td>
                            <td><?php echo $value['metodo_pago'] ?></td>
                            <td><?php echo $value['id_reserva'] ?></td>
                            <td><a href="TiendaControl.php?opcion=pago-editar&id_pago=<?php echo $value['id_pago'] ?>">Editar</a> - 
                                <a href="TiendaControl.php?opcion=pago-eliminar&id_pago=<?php echo $value['id_pago'] ?>">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
