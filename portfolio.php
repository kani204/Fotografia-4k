<?php 
include 'includes/config.php';
include 'includes/contador-visitas.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Fotografia 4K</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/modo-oscuro.css" id="modoOscuro">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="container mt-4">
        <h1 class="text-center">nuestro portfolio</h1>
        <p class="text-center">mira algunos de nuestros trabajos recientes</p>
        <div class="row mt-4" id="galeria">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="assets/img/portfolio1.jpg" class="card-img-top" alt="trabajo 1">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="assets/img/portfolio2.jpg" class="card-img-top" alt="trabajo 2">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="assets/img/portfolio3.jpg" class="card-img-top" alt="trabajo 3">
                </div>
            </div>
            <!-- se pueden duplicar mas si hacen falta por las dudas -->
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/galeria.js"></script>
    <script src="assets/js/modo-oscuro.js"></script>
</body>
</html>