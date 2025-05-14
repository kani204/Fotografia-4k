<?php 
include 'includes/config.php';
include 'includes/contador-visitas.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios - Fotografía 4K</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/modo-oscuro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="contenedor seccion-servicios">
        <h1 class="titulo-seccion texto-centro">Nuestros Servicios</h1>
        <div class="fila espaciado-4">
            <div class="col-md-4">
                <div class="tarjeta-servicio">
                    <div class="imagen-servicio">
                        <img src="assets/img/evento1.jpg" alt="Cobertura de eventos" class="imagen-destacada">
                    </div>
                    <div class="contenido-servicio">
                        <i class="fas fa-camera-retro icono-servicio"></i>
                        <h3 class="titulo-servicio">Cobertura de Eventos</h3>
                        <p class="descripcion-servicio">Hacemos fotos y videos de cumpleaños, bodas, eventos empresariales y más</p>
                        <a href="contacto.php" class="boton boton-primario">Solicitar Servicio</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tarjeta-servicio">
                    <div class="imagen-servicio">
                        <img src="assets/img/edicion.jpg" alt="Edición profesional" class="imagen-destacada">
                    </div>
                    <div class="contenido-servicio">
                        <i class="fas fa-film icono-servicio"></i>
                        <h3 class="titulo-servicio">Edición Profesional</h3>
                        <p class="descripcion-servicio">Editamos tus videos en 4K con música, títulos y efectos especiales</p>
                        <a href="contacto.php" class="boton boton-primario">Solicitar Servicio</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tarjeta-servicio">
                    <div class="imagen-servicio">
                        <img src="assets/img/dron.jpg" alt="Tomas con dron" class="imagen-destacada">
                    </div>
                    <div class="contenido-servicio">
                        <i class="fas fa-drone icono-servicio"></i>
                        <h3 class="titulo-servicio">Tomas con Dron</h3>
                        <p class="descripcion-servicio">Capturamos imágenes aéreas para que tu evento se vea épico</p>
                        <a href="contacto.php" class="boton boton-primario">Solicitar Servicio</a>
                    </div>
                </div>
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