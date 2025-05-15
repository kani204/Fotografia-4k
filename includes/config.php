<?php
// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'fotografia_4k');

// Primero conectar sin seleccionar base de datos
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Crear la base de datos si no existe
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
if ($conn->query($sql) === FALSE) {
    die("Error al crear la base de datos: " . $conn->error);
}

// Seleccionar la base de datos
$conn->select_db(DB_NAME);

// Establecer charset
$conn->set_charset("utf8mb4");

// Crear las tablas si no existen
$sql = file_get_contents(__DIR__ . '/../db/fotografia_4k.sql');

if (!empty($sql)) {
    // Dividir el archivo SQL en consultas individuales
    $queries = array_filter(explode(';', $sql), 'trim');
    
    foreach ($queries as $query) {
        if (!empty(trim($query))) {
            if ($conn->query($query) === FALSE) {
                die("Error al ejecutar la consulta: " . $conn->error . "<br>Query: " . $query);
            }
        }
    }
}

// Configuración de zona horaria
date_default_timezone_set('America/Mexico_City');

// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Función para sanitizar datos
function sanitizar($dato) {
    return htmlspecialchars(trim($dato), ENT_QUOTES, 'UTF-8');
}

// Función para generar mensajes de error/éxito
function setMensaje($mensaje, $tipo = 'danger') {
    $_SESSION['mensaje'] = $mensaje;
    $_SESSION['mensaje_tipo'] = $tipo;
}

define('TITULO_SITIO', 'Fotografía 4K');
define('EMAIL_CONTACTO', 'franco.fernanezdevicdenzi.204@gmail.com'); 
?>