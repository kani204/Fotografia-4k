<?php
session_start();
require_once 'includes/config.php';
require_once 'includes/contador-visitas.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

// Obtener datos actualizados del usuario
$stmt = $conn->prepare("SELECT nombre, email, fecha_registro, ultimo_acceso FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $_SESSION['usuario']['id']);
$stmt->execute();
$usuario = $stmt->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - Fotografía 4K</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/modo-oscuro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="contenedor py-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-user-circle fa-5x text-primary"></i>
                        </div>
                        <h5 class="card-title"><?php echo htmlspecialchars($usuario['nombre']); ?></h5>
                        <p class="text-muted"><?php echo htmlspecialchars($usuario['email']); ?></p>
                        <p class="small text-muted">
                            Miembro desde: <?php echo date('d/m/Y', strtotime($usuario['fecha_registro'])); ?>
                        </p>
                        <p class="small text-muted">
                            Último acceso: 
                            <?php 
                            echo $usuario['ultimo_acceso'] 
                                ? date('d/m/Y H:i', strtotime($usuario['ultimo_acceso']))
                                : 'Primera sesión';
                            ?>
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Acciones Rápidas</h5>
                        <div class="list-group list-group-flush">
                            <button class="list-group-item list-group-item-action" onclick="mostrarFormulario('datos')">
                                <i class="fas fa-user-edit me-2"></i>
                                Editar Datos Personales
                            </button>
                            <button class="list-group-item list-group-item-action" onclick="mostrarFormulario('password')">
                                <i class="fas fa-key me-2"></i>
                                Cambiar Contraseña
                            </button>
                            <a href="logout.php" class="list-group-item list-group-item-action text-danger">
                                <i class="fas fa-sign-out-alt me-2"></i>
                                Cerrar Sesión
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <?php if (isset($_SESSION['mensaje'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['mensaje_tipo']; ?> alert-dismissible fade show" role="alert">
                        <?php 
                        echo $_SESSION['mensaje'];
                        unset($_SESSION['mensaje']);
                        unset($_SESSION['mensaje_tipo']);
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Formulario de Datos Personales -->
                <div class="card mb-4" id="formDatos">
                    <div class="card-body">
                        <h5 class="card-title">Editar Datos Personales</h5>
                        <form action="procesar_perfil.php" method="POST" class="mt-4">
                            <input type="hidden" name="accion" value="actualizar_datos">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" 
                                       value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>
                                Guardar Cambios
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Formulario de Cambio de Contraseña -->
                <div class="card" id="formPassword" style="display: none;">
                    <div class="card-body">
                        <h5 class="card-title">Cambiar Contraseña</h5>
                        <form action="procesar_perfil.php" method="POST" class="mt-4">
                            <input type="hidden" name="accion" value="cambiar_password">
                            <div class="mb-3">
                                <label for="password_actual" class="form-label">Contraseña Actual</label>
                                <input type="password" class="form-control" id="password_actual" name="password_actual" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_nuevo" class="form-label">Nueva Contraseña</label>
                                <input type="password" class="form-control" id="password_nuevo" name="password_nuevo" 
                                       pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
                                       title="Mínimo 8 caracteres, al menos una letra y un número" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmar_password" class="form-label">Confirmar Nueva Contraseña</label>
                                <input type="password" class="form-control" id="confirmar_password" name="confirmar_password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-key me-2"></i>
                                Cambiar Contraseña
                            </button>
                        </form>
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
    <script>
        function mostrarFormulario(tipo) {
            if (tipo === 'datos') {
                document.getElementById('formDatos').style.display = 'block';
                document.getElementById('formPassword').style.display = 'none';
            } else {
                document.getElementById('formDatos').style.display = 'none';
                document.getElementById('formPassword').style.display = 'block';
            }
        }

        // Validación de contraseñas
        document.addEventListener('DOMContentLoaded', function() {
            const formPassword = document.querySelector('form[action="procesar_perfil.php"]');
            if (formPassword) {
                formPassword.addEventListener('submit', function(e) {
                    const password = document.getElementById('password_nuevo');
                    const confirmar = document.getElementById('confirmar_password');
                    
                    if (password.value !== confirmar.value) {
                        e.preventDefault();
                        alert('Las contraseñas no coinciden');
                    }
                });
            }
        });
    </script>
</body>
</html> 