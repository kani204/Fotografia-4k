<?php
session_start();
require_once 'includes/config.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

// Función para validar email
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'])) {
        switch ($_POST['accion']) {
            case 'actualizar_datos':
                $nombre = trim($_POST['nombre']);
                $email = trim($_POST['email']);
                $id = $_SESSION['usuario']['id'];

                // Validaciones
                if (empty($nombre) || !validarEmail($email)) {
                    setMensaje("Por favor, completa todos los campos correctamente");
                    header('Location: perfil.php');
                    exit();
                }

                // Verificar si el email ya existe para otro usuario
                $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ? AND id != ?");
                $stmt->bind_param("si", $email, $id);
                $stmt->execute();
                if ($stmt->get_result()->num_rows > 0) {
                    setMensaje("El email ya está en uso por otro usuario");
                    header('Location: perfil.php');
                    exit();
                }

                // Actualizar datos
                $stmt = $conn->prepare("UPDATE usuarios SET nombre = ?, email = ? WHERE id = ?");
                $stmt->bind_param("ssi", $nombre, $email, $id);
                
                if ($stmt->execute()) {
                    // Actualizar datos de sesión
                    $_SESSION['usuario']['nombre'] = $nombre;
                    $_SESSION['usuario']['email'] = $email;
                    
                    setMensaje("Datos actualizados correctamente", "success");
                } else {
                    setMensaje("Error al actualizar los datos");
                }
                break;

            case 'cambiar_password':
                $password_actual = $_POST['password_actual'];
                $password_nuevo = $_POST['password_nuevo'];
                $confirmar_password = $_POST['confirmar_password'];
                $id = $_SESSION['usuario']['id'];

                // Validaciones
                if (empty($password_actual) || empty($password_nuevo) || empty($confirmar_password)) {
                    setMensaje("Por favor, completa todos los campos");
                    header('Location: perfil.php');
                    exit();
                }

                if ($password_nuevo !== $confirmar_password) {
                    setMensaje("Las contraseñas nuevas no coinciden");
                    header('Location: perfil.php');
                    exit();
                }

                if (strlen($password_nuevo) < 8) {
                    setMensaje("La contraseña debe tener al menos 8 caracteres");
                    header('Location: perfil.php');
                    exit();
                }

                // Verificar contraseña actual
                $stmt = $conn->prepare("SELECT password FROM usuarios WHERE id = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $usuario = $stmt->get_result()->fetch_assoc();

                if (!password_verify($password_actual, $usuario['password'])) {
                    setMensaje("La contraseña actual es incorrecta");
                    header('Location: perfil.php');
                    exit();
                }

                // Actualizar contraseña
                $password_hash = password_hash($password_nuevo, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("UPDATE usuarios SET password = ? WHERE id = ?");
                $stmt->bind_param("si", $password_hash, $id);
                
                if ($stmt->execute()) {
                    setMensaje("Contraseña actualizada correctamente", "success");
                } else {
                    setMensaje("Error al actualizar la contraseña");
                }
                break;

            default:
                setMensaje("Acción no válida");
                break;
        }
    }
}

header('Location: perfil.php');
exit(); 