<?php
// incluye el archivo de conexion
require_once __DIR__ . '/../db/conexion.php';

// registra la visita en la base de datos
function registrarVisita() {
    global $conn;
    $sql = "INSERT INTO contador_visitas (fecha) VALUES (NOW())";
    mysqli_query($conn, $sql);
}

// obtiene el total de visitas
function obtenerTotalVisitas() {
    global $conn;
    $sql = "SELECT COUNT(*) as total FROM contador_visitas";
    $resultado = mysqli_query($conn, $sql);
    $fila = mysqli_fetch_assoc($resultado);
    return $fila['total'];
}

// obtiene visitas de hoy
function obtenerVisitasHoy() {
    global $conn;
    $sql = "SELECT COUNT(*) as total FROM contador_visitas WHERE DATE(fecha) = CURDATE()";
    $resultado = mysqli_query($conn, $sql);
    $fila = mysqli_fetch_assoc($resultado);
    return $fila['total'];
}

// registra la visita actual
registrarVisita();

// obtiene las estadisticas
$totalVisitas = obtenerTotalVisitas();
$visitasHoy = obtenerVisitasHoy();
?>