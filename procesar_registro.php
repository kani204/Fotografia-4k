<?php
require_once 'db/conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $correo = htmlspecialchars(trim($_POST['correo']));
    $contrasena = htmlspecialchars(trim($_POST['contrasena']));
    $confirmar_contrasena = htmlspecialchars(trim($_POST['confirmar_contrasena']));

    // verificar que las contraseñas coincidan
    if ($contrasena !== $confirmar_contrasena) {
        echo "<script>alert('Las contraseñas no coinciden.'); window.location.href='registro.php';</script>";
        exit();
    }

    // verificar que el correo no este registrado
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo "<script>alert('El correo ya está registrado.'); window.location.href='registro.php';</script>";
        $stmt->close();
        $conn->close();
        exit();
    }

    // encriptar la contraseña
    $hash = password_hash($contrasena, PASSWORD_DEFAULT);

    // insertar usuario nuevo
    $insert = "INSERT INTO usuarios (nombre, email, contraseña) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert);
    $stmt->bind_param("sss", $nombre, $correo, $hash);

    if ($stmt->execute()) {
        echo "<script>alert('Cuenta registrada correctamente. Puedes iniciar sesión ahora.'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Error al registrar.'); window.location.href='registro.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: registro.php");
    exit();
}