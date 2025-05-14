<?php 
include 'includes/config.php';
include 'includes/contador-visitas.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros - Fotografía 4K</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/modo-oscuro.css" id="modoOscuro">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="container mt-4">
        <h1>sobre nosotros</h1>
        <p>somos un equipo apasionado por capturar momentos inolvidables con la más alta calidad en imagen y sonido.</p>
        <div class="row mt-5">
            <div class="col-md-6">
                <img src="assets/img/equipo.jpg" class="img-fluid rounded" alt="Nuestro equipo">
            </div>
            <div class="col-md-6">
                <p>con más de 7 años de experiencia en fotografía y video profesional, ofrecemos un servicio completo y personalizado para cada cliente. nuestra misión es inmortalizar tus recuerdos con estilo y calidad.</p>
                <ul>
                    <li>fotografía de eventos</li>
                    <li>producción de video</li>
                    <li>edición profesional</li>
                    <li>servicios personalizados</li>
                </ul>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/modo-oscuro.js"></script>
</body>
</html>
