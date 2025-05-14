<?php 
include 'includes/config.php';
include 'includes/contador-visitas.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio - Fotografía 4K</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/modo-oscuro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="contenedor seccion-portfolio">
        <h1 class="titulo-seccion texto-centro">Nuestro Portafolio</h1>
        <div class="galeria-portfolio">
            <?php
            // Obtener imágenes de la galería
            $sql = "SELECT * FROM galeria ORDER BY fecha DESC";
            $resultado = mysqli_query($conn, $sql);
            
            while($imagen = mysqli_fetch_assoc($resultado)) {
                echo '<div class="item-portfolio">';
                echo '<div class="imagen-portfolio">';
                echo '<img src="' . $imagen['imagen'] . '" alt="' . $imagen['titulo'] . '" class="imagen-destacada">';
                echo '</div>';
                echo '<div class="info-portfolio">';
                echo '<h3 class="titulo-portfolio">' . $imagen['titulo'] . '</h3>';
                echo '<p class="descripcion-portfolio">' . $imagen['descripcion'] . '</p>';
                echo '</div>';
                echo '</div>';
            }
            ?>
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