<!doctype html>
<html lang="en">
    <head>
        <title>Administrador</title>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
        <script src="https://kit.fontawesome.com/744b78811a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <?php $url = 'http://'.$_SERVER['HTTP_HOST'].'/SITIOWEB';?>
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link active pr-5" href="#">Administrador <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="<?php echo $url;?>/Admin/Seccion/inicio.php">Inicio</a>
                <a class="nav-item nav-link" href="<?php echo $url;?>/Admin/Seccion/proceso_clasif.php">Proceso de Clasificaciones</a>
                <a class="nav-item nav-link" href="<?php echo $url;?>/Admin/Seccion/equipos.php">Equipos Invitados</a>
                <a class="nav-item nav-link" href="<?php echo $url;?>/index.php">Ver pagina web</a>
                <a class="nav-item nav-link" href="<?php echo $url;?>/Admin/login.php">Salir</a>
            </div>
        </nav>
                