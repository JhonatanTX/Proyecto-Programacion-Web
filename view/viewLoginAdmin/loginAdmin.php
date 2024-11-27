<!doctype html>
<html lang="en">
    <head>
        <title>Inicio de Sesion</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://kit.fontawesome.com/744b78811a.js" crossorigin="anonymous"></script>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            .bg{
                background-color: #16191c;
            }

            .form-control{
                min-height: 2.5rem;
            }

            .img-1 {
                background-image: url('https://perubellezas.com/wp-content/uploads/2023/01/lugares-turisticos-del-peru.jpg');
                background-size: cover;
                background-position: center;
                margin: 0;
                height: 100vh;  /* Ocupa toda la altura de la ventana */
            }

        </style>
    </head>
<body class="bg">
        <div class="container-fluid">
            
            <div class="row">
                
                <div class='col-lg-7 img-1 min-vh-100 min-vw-80'>
                </div>

                <div class="col-lg-5 text-light">
                    <br><br><br><br>
                    <div class="px-lg-5 pt-lg-4 pb-lg-3">
                        <h1 class="text-light font-weight-bold mb-3">¡Bienvenido Administrador!</h1>
                        <form method='POST' class="mb-5" enctype='multipart/form-data' action="agenciaControl.php?opcion=login-procesar">
                                <div class = "form-group  mb-4">
                                    <label class="font-weight-bold" for="nombre">Usuario</label>
                                    <input type="text" class="form-control bg-dark border-0" id="nombre" name='nombre' placeholder="Ingresa tu usuario">
                                </div>

                                <div class="form-group mb-4">
                                    <label class="font-weight-bold" for="contrasena">Contraseña</label>
                                    <input type="password" class="form-control bg-dark border-0 mb-2" id="contrasena" name = 'contrasena' placeholder="Ingresa tu contraseña">
                                    <a href="#" id="emailHelp" class="form-text text-muted text-decoration-none">¿Has olvidado tu contraseña?</a>
                                </div>

                                <button type="submit" name='btnLogin' value='Login' class="btn btn-primary w-100">Iniciar Sesion</button>
                        </form>
                        <p class="font-weight-bold text-center text-muted">O inicia sesion con</p>
                        <div class="d-flex justify-content-around ">
                            <button type="submit" name='btnLogin' value='Login' class="btn btn-outline-light flex-grow-1 mr-2"><i class="fa-brands fa-google mr-3"></i>Google</button>
                            <button type="submit" name='btnLogin' value='Login' class="btn btn-outline-light flex-grow-1 ml-2"><i class="fa-brands fa-facebook mr-3"></i>Facebook</button>
                        </div>
                        <br>
                        <!-- <div class="text-center">
                            <p class="d-inline-block mr-2">¿Todavia no tienes una cuenta?</p><a class="text-light text-decoration-none font-weight-bold" href="#">Crea una ahora</a>
                        </div> -->
                    </div>
                </div>
                
                
            </div>
        </div>

    </body>
</html>