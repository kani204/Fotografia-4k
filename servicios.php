<?php 
include 'includes/config.php';
include 'includes/contador-visitas.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios - Fotografia 4K</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/modo-oscuro.css" id="modoOscuro">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="container mt-4">
        <h1>servicios que ofrecemos</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="assets/img/evento1.jpg" class="card-img-top" alt="evento">
                    <div class="card-body">
                        <h5 class="card-title">cobertura de eventos</h5>
                        <p class="card-text">hacemos fotos y videos de cumpleaños, bodas, empresariales y mas</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="assets/img/edicion.jpg" class="card-img-top" alt="edicion">
                    <div class="card-body">
                        <h5 class="card-title">edicion profesional</h5>
                        <p class="card-text">editamos tus videos en 4k con musica, titulos y efectos especiales</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="assets/img/dron.jpg" class="card-img-top" alt="dron">
                    <div class="card-body">
                        <h5 class="card-title">tomas con dron</h5>
                        <p class="card-text">capturamos imagenes aereas para que tu evento se vea epico</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/modo-oscuro.js"></script>
</body>
</html>