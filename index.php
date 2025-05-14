<?php 
include 'includes/config.php';
include 'includes/contador-visitas.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fotografía y video profesional en 4K para tus eventos especiales. Capturamos momentos únicos con la más alta calidad.">
    <title>Fotografía 4K - Capturando Momentos Únicos en Alta Definición</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/modo-oscuro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="aparecer">
    <?php include 'includes/header.php'; ?>

    <!-- Sección Principal -->
    <section class="seccion-principal">
        <div class="contenedor">
            <div class="fila alinear-centro min-vh-100">
                <div class="col-lg-6">
                    <h1 class="titulo-principal fw-bold mb-4">Capturamos tus momentos más especiales en 4K</h1>
                    <p class="descripcion-principal mb-4">Transformamos cada instante en recuerdos inolvidables con la más alta calidad de imagen y video profesional.</p>
                    <div class="botones-principales">
                        <a href="servicios.php" class="boton boton-primario">Explorar Servicios</a>
                        <a href="portfolio.php" class="boton boton-secundario">Ver Portfolio</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contenedor-imagen-principal">
                        <img src="assets/img/hero-image.jpg" alt="Fotografía profesional" class="imagen-destacada">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Servicios Destacados -->
    <section class="servicios-destacados">
        <div class="contenedor">
            <h2 class="titulo-seccion texto-centro">Nuestros Servicios Destacados</h2>
            <div class="fila espaciado-4">
                <div class="col-md-4">
                    <div class="tarjeta-servicio texto-centro">
                        <i class="fas fa-camera icono-servicio"></i>
                        <h3 class="titulo-servicio">Fotografía de Eventos</h3>
                        <p class="descripcion-servicio">Capturamos la esencia de tus celebraciones con un enfoque artístico y profesional.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tarjeta-servicio texto-centro">
                        <i class="fas fa-video icono-servicio"></i>
                        <h3 class="titulo-servicio">Videografía 4K</h3>
                        <p class="descripcion-servicio">Videos en ultra alta definición para que revivas cada momento con claridad excepcional.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tarjeta-servicio texto-centro">
                        <i class="fas fa-images icono-servicio"></i>
                        <h3 class="titulo-servicio">Sesiones Personalizadas</h3>
                        <p class="descripcion-servicio">Sesiones fotográficas adaptadas a tus necesidades y preferencias específicas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Contacto -->
    <section class="seccion-contacto">
        <div class="contenedor texto-centro">
            <h2 class="titulo-contacto">¿Listo para crear recuerdos inolvidables?</h2>
            <p class="descripcion-contacto">Contáctanos hoy mismo y descubre cómo podemos hacer de tu evento algo extraordinario</p>
            <a href="contacto.php" class="boton boton-claro">Contactar Ahora</a>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/modo-oscuro.js"></script>
    <script src="assets/js/animaciones.js"></script>
</body>
</html>