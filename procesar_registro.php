<?php
session_start();
require_once 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmar_password = $_POST['confirmar_password'];
    
    // Validaciones
    $errores = [];
    
    // Validar nombre
    if (empty($nombre) || strlen($nombre) < 2) {
        $errores[] = "El nombre debe tener al menos 2 caracteres";
    }
    
    // Validar email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo electrónico no es válido";
    }
    
    // Verificar si el email ya existe
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        $errores[] = "Este correo electrónico ya está registrado";
    }
    
    // Validar contraseña
    if (strlen($password) < 8) {
        $errores[] = "La contraseña debe tener al menos 8 caracteres";
    }
    
    if (!preg_match("/[A-Za-z]/", $password) || !preg_match("/[0-9]/", $password)) {
        $errores[] = "La contraseña debe contener al menos una letra y un número";
    }
    
    if ($password !== $confirmar_password) {
        $errores[] = "Las contraseñas no coinciden";
    }
    
    // Si no hay errores, proceder con el registro
    if (empty($errores)) {
        // Hashear la contraseña
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        // Insertar usuario
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password, rol_id) VALUES (?, ?, ?, 2)");
        $stmt->bind_param("sss", $nombre, $email, $password_hash);
        
        if ($stmt->execute()) {
            $_SESSION['exito'] = "Registro exitoso. Ya puedes iniciar sesión.";
            header("Location: login.php");
            exit();
        } else {
            $_SESSION['error'] = "Error al registrar el usuario. Por favor, intenta nuevamente.";
            header("Location: registro.php");
            exit();
        }
    } else {
        $_SESSION['error'] = implode("<br>", $errores);
        header("Location: registro.php");
        exit();
    }
} else {
    header("Location: registro.php");
    exit();
}