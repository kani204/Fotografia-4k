<?php
session_start();
require_once 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    // Validaciones básicas
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Por favor, completa todos los campos";
        header("Location: login.php");
        exit();
    }
    
    // Buscar usuario por email
    $stmt = $conn->prepare("SELECT id, nombre, email, password, rol_id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        
        // Verificar contraseña
        if (password_verify($password, $usuario['password'])) {
            // Actualizar último acceso
            $stmt = $conn->prepare("UPDATE usuarios SET ultimo_acceso = CURRENT_TIMESTAMP WHERE id = ?");
            $stmt->bind_param("i", $usuario['id']);
            $stmt->execute();
            
            // Guardar datos en sesión
            $_SESSION['usuario'] = [
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'email' => $usuario['email'],
                'rol_id' => $usuario['rol_id']
            ];
            
            // Redirigir según el rol
            if ($usuario['rol_id'] == 1) {
                header("Location: panel-admin.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            $_SESSION['error'] = "Credenciales incorrectas";
        }
    } else {
        $_SESSION['error'] = "Credenciales incorrectas";
    }
    
    header("Location: login.php");
    exit();
} else {
    header("Location: login.php");
    exit();
}