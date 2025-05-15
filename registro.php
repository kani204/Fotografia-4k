<?php 
include 'includes/config.php';
include 'includes/contador-visitas.php';

// Verificar si ya hay una sesión iniciada
if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Fotografía 4K</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/modo-oscuro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="contenedor py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="tarjeta-formulario">
                    <h1 class="titulo-seccion texto-centro mb-4">Crear Cuenta</h1>
                    
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alerta alerta-error mb-4">
                            <?php 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            ?>
                        </div>
                    <?php endif; ?>

                    <form action="procesar_registro.php" method="POST" class="formulario-auth" id="formularioRegistro">
                        <div class="campo-formulario">
                            <label for="nombre">
                                <i class="fas fa-user"></i>
                                Nombre completo
                            </label>
                            <input type="text" id="nombre" name="nombre" required 
                                   pattern="[A-Za-zÁáÉéÍíÓóÚúÑñ\s]{2,100}"
                                   title="Solo letras y espacios, mínimo 2 caracteres">
                        </div>

                        <div class="campo-formulario">
                            <label for="email">
                                <i class="fas fa-envelope"></i>
                                Correo electrónico
                            </label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="campo-formulario">
                            <label for="password">
                                <i class="fas fa-lock"></i>
                                Contraseña
                            </label>
                            <div class="contenedor-password">
                                <input type="password" id="password" name="password" required
                                       pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
                                       title="Mínimo 8 caracteres, al menos una letra y un número">
                                <button type="button" class="toggle-password" onclick="togglePassword('password')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="campo-formulario">
                            <label for="confirmar_password">
                                <i class="fas fa-lock"></i>
                                Confirmar contraseña
                            </label>
                            <div class="contenedor-password">
                                <input type="password" id="confirmar_password" name="confirmar_password" required>
                                <button type="button" class="toggle-password" onclick="togglePassword('confirmar_password')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="boton boton-primario w-100">
                            <i class="fas fa-user-plus"></i>
                            Registrarse
                        </button>

                        <div class="texto-centro mt-4">
                            ¿Ya tienes una cuenta? 
                            <a href="login.php" class="enlace-auth">Iniciar sesión</a>
                        </div>
                    </form>
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
    <script src="assets/js/validacion.js"></script>
</body>
</html>