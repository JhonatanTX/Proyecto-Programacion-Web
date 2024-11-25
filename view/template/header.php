<head>
  <title>AGENCIA DE VIAJES</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Agregar los enlaces de Bootstrap desde CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Estilos personalizados -->
  <style>
    /* Eliminar el margen inferior y bordes redondeados de la navbar */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Definir altura para la grid con el fin de hacer que la barra lateral ocupe toda la pantalla */
    .row.content {
      height: 450px;
    }

    /* Definir el estilo de la barra lateral */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Estilos del footer */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* Adaptar el layout para pantallas pequeñas */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {
        height: auto;
      }
    }

    /* Personalización de botones para el proyecto */
    .btn-primary {
      background-color: #d32f2f;
      border-color: #d32f2f;
    }
    .btn-primary:hover {
      background-color: #c62828;
      border-color: #c62828;
    }

    /* Estilos para la barra de navegación */
    .navbar-nav > li.active > a,
    .navbar-nav > li.active > a:hover,
    .navbar-nav > li.active > a:focus {
      background-color: yellow !important;
      color: black !important;
    }
  </style>
</head>
