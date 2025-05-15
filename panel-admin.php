<?php 
session_start();
require_once 'includes/config.php';

// Verificar si el usuario está autenticado y es administrador
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol_id'] != 1) {
    header('Location: login.php');
    exit();
}

// Obtener estadísticas
$stmt = $conn->query("SELECT COUNT(*) as total_usuarios FROM usuarios WHERE rol_id = 2");
$total_usuarios = $stmt->fetch_assoc()['total_usuarios'];

$stmt = $conn->query("SELECT COUNT(*) as total_servicios FROM servicios");
$total_servicios = $stmt->fetch_assoc()['total_servicios'];

$stmt = $conn->query("SELECT COUNT(*) as total_portfolio FROM portfolio");
$total_portfolio = $stmt->fetch_assoc()['total_portfolio'];

$stmt = $conn->query("SELECT SUM(visitas) as total_visitas FROM contador_visitas");
$total_visitas = $stmt->fetch_assoc()['total_visitas'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Fotografía 4K</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/modo-oscuro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="contenedor py-5">
        <div class="row mb-4">
            <div class="col-md-12">
                <h1 class="titulo-seccion">Panel de Administración</h1>
                <p>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']['nombre']); ?></p>
            </div>
        </div>

        <!-- Tarjetas de estadísticas -->
        <div class="row mb-5">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x mb-3"></i>
                        <h5 class="card-title">Usuarios</h5>
                        <p class="card-text"><?php echo $total_usuarios; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-camera fa-3x mb-3"></i>
                        <h5 class="card-title">Servicios</h5>
                        <p class="card-text"><?php echo $total_servicios; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-image fa-3x mb-3"></i>
                        <h5 class="card-title">Portfolio</h5>
                        <p class="card-text"><?php echo $total_portfolio; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-eye fa-3x mb-3"></i>
                        <h5 class="card-title">Visitas</h5>
                        <p class="card-text"><?php echo $total_visitas; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menú de gestión -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestión de Usuarios</h5>
                        <p class="card-text">Administra los usuarios registrados en el sistema.</p>
                        <a href="admin/usuarios.php" class="btn btn-primary">
                            <i class="fas fa-users-cog"></i> Gestionar Usuarios
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestión de Servicios</h5>
                        <p class="card-text">Administra los servicios ofrecidos.</p>
                        <a href="admin/servicios.php" class="btn btn-primary">
                            <i class="fas fa-concierge-bell"></i> Gestionar Servicios
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestión de Portfolio</h5>
                        <p class="card-text">Administra las imágenes del portfolio.</p>
                        <a href="admin/portfolio.php" class="btn btn-primary">
                            <i class="fas fa-images"></i> Gestionar Portfolio
                        </a>
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
</body>
</html>