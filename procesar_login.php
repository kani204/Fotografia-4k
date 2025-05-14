<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos del formulario
    $correo = htmlspecialchars($_POST['correo']);
    $contrasena = htmlspecialchars($_POST['contrasena']);

    // Validación simple (esto debería ser reemplazado con consulta a base de datos)
    if ($correo == 'usuario@ejemplo.com' && $contrasena == '12345') {
        $_SESSION['usuario'] = $correo;
        header("Location: panel-admin.php");
    } else {
        echo "<script>alert('Correo o contraseña incorrectos.'); window.location.href='login.php';</script>";
    }
} else {
    header("Location: login.php");
    exit();
}