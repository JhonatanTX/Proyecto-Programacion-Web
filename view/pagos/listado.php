<div class="container-fluid text-center">    
    <div class="row content">
        
        <div class="col-sm-2 sidenav">
            <p><a href="agenciaControl.php?opcion=pago-nuevo"><i class="fas fa-user-plus"></i>Nuevo Pago</a></p>
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
                        <th>Id_Reserva</th>
                        <th>Monto Pagado</th>
                        <th>Fecha de Pago</th>
                        <th>Método de Pago</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
                <?php if(!empty($resultPagos)) { ?>
                    <?php foreach ($resultPagos as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['id_pago'] ?></td>
                            <td><?php echo $value['id_reserva'] ?></td>
                            <td><?php echo $value['monto_pagado'] ?></td>
                            <td><?php echo $value['fecha_pago'] ?></td>
                            <td><?php echo $value['metodo_pago'] ?></td>
                            <td><a href="agenciaControl.php?opcion=pago-editar&id_pago=<?php echo $value['id_pago'] ?>"><i class="fas fa-edit"></i></a> - 
                                <a href="agenciaControl.php?opcion=pago-eliminar&id_pago=<?php echo $value['id_pago'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </div>
        <div class="col-sm-2 sidenav">
        <br><br><br>
            <div class="well d-flex justify-content-center align-items-center" style="height: 200px;">
                <img src="https://suplementosags.com/wp-content/uploads/2019/08/O-Formas-de-Pago-1024x589.png" alt="Metodo Pago" class="img-fluid">
            </div>
        </div>

    </div>
</div>
