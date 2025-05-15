<?php
session_start();
require_once '../includes/config.php';

// Verificar si el usuario está autenticado y es administrador
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol_id'] != 1) {
    header('Location: ../login.php');
    exit();
}

// Función para validar email
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Procesar acciones
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
    if ($_POST['accion'] === 'editar') {
        $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
        $nombre = trim($_POST['nombre']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // Validaciones
        if (!$id || empty($nombre) || !validarEmail($email)) {
            $_SESSION['mensaje'] = "Datos inválidos";
            $_SESSION['mensaje_tipo'] = "danger";
            header('Location: usuarios.php');
            exit();
        }

        // Verificar si el email ya existe para otro usuario
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ? AND id != ?");
        $stmt->bind_param("si", $email, $id);
        $stmt->execute();
        if ($stmt->get_result()->num_rows > 0) {
            $_SESSION['mensaje'] = "El email ya está en uso por otro usuario";
            $_SESSION['mensaje_tipo'] = "danger";
            header('Location: usuarios.php');
            exit();
        }

        // Actualizar usuario
        if (empty($password)) {
            // Actualizar sin cambiar la contraseña
            $stmt = $conn->prepare("UPDATE usuarios SET nombre = ?, email = ? WHERE id = ?");
            $stmt->bind_param("ssi", $nombre, $email, $id);
        } else {
            // Actualizar incluyendo nueva contraseña
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE usuarios SET nombre = ?, email = ?, password = ? WHERE id = ?");
            $stmt->bind_param("sssi", $nombre, $email, $password_hash, $id);
        }

        if ($stmt->execute()) {
            $_SESSION['mensaje'] = "Usuario actualizado correctamente";
            $_SESSION['mensaje_tipo'] = "success";
        } else {
            $_SESSION['mensaje'] = "Error al actualizar el usuario";
            $_SESSION['mensaje_tipo'] = "danger";
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['accion'])) {
    if ($_GET['accion'] === 'eliminar') {
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

        if ($id) {
            $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ? AND rol_id = 2");
            $stmt->bind_param("i", $id);

            if ($stmt->execute() && $stmt->affected_rows > 0) {
                $_SESSION['mensaje'] = "Usuario eliminado correctamente";
                $_SESSION['mensaje_tipo'] = "success";
            } else {
                $_SESSION['mensaje'] = "Error al eliminar el usuario";
                $_SESSION['mensaje_tipo'] = "danger";
            }
        } else {
            $_SESSION['mensaje'] = "ID de usuario inválido";
            $_SESSION['mensaje_tipo'] = "danger";
        }
    }
}

header('Location: usuarios.php');
exit(); 