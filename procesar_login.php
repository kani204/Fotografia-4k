<?php
session_start();
require_once 'db/conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = htmlspecialchars(trim($_POST['correo']));
    $contrasena = htmlspecialchars(trim($_POST['contrasena']));

    // buscar el usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        // comparar la contraseña ingresada con la almacenada
        if (password_verify($contrasena, $usuario['contraseña'])) {
            $_SESSION['usuario'] = $usuario['nombre'];
            $_SESSION['email'] = $usuario['email'];
            header("Location: panel-admin.php");
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta.'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Correo no registrado.'); window.location.href='login.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: login.php");
    exit();
}