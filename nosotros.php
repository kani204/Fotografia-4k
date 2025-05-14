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
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/modo-oscuro.css" id="modoOscuro">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <script src="assets/js/modo-oscuro.js"></script>
</body>
</html>