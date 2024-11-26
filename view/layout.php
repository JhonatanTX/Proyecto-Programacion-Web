<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Expert - Your Gateway to Adventure</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .hero {
            background: url('https://via.placeholder.com/1920x800') center/cover no-repeat;
            height: 80vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        }
        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }
        .hero p {
            font-size: 1.25rem;
        }

        .carousel-item img {
            height: 80vh; /* Ajusta la altura del carrusel */
            object-fit: cover; /* Asegura que las imágenes cubran el contenedor */
            width: 100%; /* Asegura que las imágenes cubran todo el ancho */
        }
        .card img {
            height: 200px;
            object-fit: cover;
        }
        .section-title {
            font-size: 2rem;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 2rem;
            color: #003366;
        }
        .bg-light-blue {
            background-color: #eaf6ff;
        }
        footer {
            background: #003366;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container ">
            <a class="navbar-brand fw-bold" href="#">Travel Expert</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#destinations">Destinos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#packages">Paquetes</a></li>
                    <li class="nav-item"><a class="nav-link" href="#promotions">Promociones</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <!-- Carousel Items -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/machupicchu.jpg" class="d-block w-100" alt="Imagen 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Descubre el Mundo</h1>
                        <p>Tu próxima aventura comienza aquí</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/manu.png" class="d-block w-100" alt="Imagen 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Viajes Inolvidables</h1>
                        <p>Explora nuevos destinos con nosotros</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/chavinDeHuantar.jpeg" class="d-block w-100" alt="Imagen 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Aventuras Épicas</h1>
                        <p>Crea recuerdos únicos para toda la vida</p>
                    </div>
                </div>
            </div>
            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </section>

    <!-- Destinations Section -->
    <section id="destinations" class="py-5">
        <div class="container">
            <h2 class="section-title text-center">Destinos Populares</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Destino 1">
                        <div class="card-body">
                            <h5 class="card-title">Machu Picchu</h5>
                            <p class="card-text">Explora la maravilla del mundo en el corazón de los Andes.</p>
                            <a href="#" class="btn btn-primary">Más Información</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Destino 2">
                        <div class="card-body">
                            <h5 class="card-title">París</h5>
                            <p class="card-text">Sumérgete en el romance de la Ciudad de la Luz.</p>
                            <a href="#" class="btn btn-primary">Más Información</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Destino 3">
                        <div class="card-body">
                            <h5 class="card-title">Bali</h5>
                            <p class="card-text">Descubre playas paradisíacas y cultura vibrante.</p>
                            <a href="#" class="btn btn-primary">Más Información</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section id="packages" class="bg-light-blue py-5">
        <div class="container">
            <h2 class="section-title text-center">Paquetes Turísticos</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="p-4 bg-white shadow-sm rounded">
                        <h5>Aventura</h5>
                        <p>Incluye trekking, escalada y hospedaje en zonas rurales.</p>
                        <p><strong>Desde $799</strong></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="p-4 bg-white shadow-sm rounded">
                        <h5>Luna de Miel</h5>
                        <p>Disfruta de resorts exclusivos en destinos románticos.</p>
                        <p><strong>Desde $1,499</strong></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="p-4 bg-white shadow-sm rounded">
                        <h5>Familiar</h5>
                        <p>Explora parques temáticos y actividades para todas las edades.</p>
                        <p><strong>Desde $999</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Promotions Section -->
    <section id="promotions" class="py-5">
        <div class="container">
            <h2 class="section-title text-center">Promociones</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <img src="https://via.placeholder.com/600x400" class="img-fluid rounded" alt="Promoción 1">
                </div>
                <div class="col-md-6">
                    <h5>Oferta Especial: 20% Descuento</h5>
                    <p>Reserva un viaje a cualquier destino de Europa antes del 31 de diciembre y obtén un 20% de descuento.</p>
                    <a href="#" class="btn btn-primary">Reserva Ahora</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="bg-light py-5">
        <div class="container">
            <h2 class="section-title text-center">Contáctanos</h2>
            <form>
                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Tu Nombre" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" placeholder="Tu Correo" required>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" rows="5" placeholder="Tu Mensaje" required></textarea>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Enviar Mensaje</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 text-center">
        <div class="container">
            <p>&copy; 2024 Travel Expert. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
