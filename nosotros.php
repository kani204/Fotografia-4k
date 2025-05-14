<?php 
include 'includes/config.php';
include 'includes/contador-visitas.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros - Fotografia 4K</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/modo-oscuro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="container mt-4">
        <h1 class="text-center">Sobre nosotros</h1>
        <p class="text-center">Somos un equipo profesional dedicado a capturar momentos únicos en la mejor calidad 4K.</p>
        <div class="row mt-5">
            <div class="col-md-6">
                <p>Nuestra misión es inmortalizar los eventos más importantes de tu vida. Desde bodas, cumpleaños, eventos empresariales y más.</p>
                <p>Contamos con años de experiencia en fotografía y producción audiovisual.</p>
            </div>
            <div class="col-md-6">
                <img src="assets/img/nosotros.jpg" class="img-fluid rounded" alt="Nuestro equipo">
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/modo-oscuro.js"></script>
    <script src="assets/js/navegacion.js"></script>
</body>
</html>