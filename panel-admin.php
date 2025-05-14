<?php 
session_start();
include 'includes/config.php';
include 'includes/contador-visitas.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de administración - Fotografia 4K</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/modo-oscuro.css" id="modoOscuro">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="container mt-4">
        <h1 class="text-center">Bienvenido al Panel de Administración</h1>
        <p class="text-center">Hola, <?php echo $_SESSION['usuario']; ?>. Desde aquí podrás gestionar tus datos y el sitio.</p>

        <div class="text-center mt-5">
            <a href="servicios.php" class="btn btn-primary">Gestionar Servicios</a>
            <a href="portfolio.php" class="btn btn-secondary">Gestionar Portafolio</a>
            <a href="contacto.php" class="btn btn-info">Ver Contactos</a>
            <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/modo-oscuro.js"></script>
</body>
</html>