<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = htmlspecialchars($_POST['correo']);
    $contrasena = htmlspecialchars($_POST['contrasena']);
    $confirmar_contrasena = htmlspecialchars($_POST['confirmar_contrasena']);

    // Validación de contraseñas
    if ($contrasena == $confirmar_contrasena) {
        // Guardar datos (en este caso solo se simula)
        echo "<script>alert('Cuenta registrada correctamente. Puedes iniciar sesión ahora.'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Las contraseñas no coinciden.'); window.location.href='registro.php';</script>";
    }
} else {
    header("Location: registro.php");
    exit();
}