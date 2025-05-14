<?php
// registra la visita en la base de datos
function registrarVisita() {
    global $conexion;
    $sql = "INSERT INTO contador_visitas (fecha) VALUES (NOW())";
    mysqli_query($conexion, $sql);
}

// obtiene el total de visitas
function obtenerTotalVisitas() {
    global $conexion;
    $sql = "SELECT COUNT(*) as total FROM contador_visitas";
    $resultado = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_assoc($resultado);
    return $fila['total'];
}

// obtiene visitas de hoy
function obtenerVisitasHoy() {
    global $conexion;
    $sql = "SELECT COUNT(*) as total FROM contador_visitas WHERE DATE(fecha) = CURDATE()";
    $resultado = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_assoc($resultado);
    return $fila['total'];
}

// registrar la visita actual
registrarVisita();

// obtener las estadisticas
$totalVisitas = obtenerTotalVisitas();
$visitasHoy = obtenerVisitasHoy();
?>