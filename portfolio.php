<?php 
include 'includes/config.php';
include 'includes/contador-visitas.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Fotografía 4K</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/modo-oscuro.css" id="modoOscuro">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="container mt-4">
        <h1>nuestros trabajos</h1>
        <p>esta es una galeria de los mejores trabajos que hicimos</p>

        <div class="row" id="galeria">
            <!-- las imagenes se agregan dinamicamente desde galeria.js -->
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/galeria.js"></script>
    <script src="assets/js/modo-oscuro.js"></script>
</body>
</html>