<?php
// Incluir el archivo de configuración
require_once __DIR__ . '/config.php';

// Registra o actualiza la visita en la base de datos
function registrarVisita() {
    global $conn;
    $fecha_actual = date('Y-m-d');
    
    $sql = "INSERT INTO contador_visitas (fecha, visitas) 
            VALUES (?, 1) 
            ON DUPLICATE KEY UPDATE visitas = visitas + 1";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $fecha_actual);
    $stmt->execute();
}

// Obtiene el total de visitas
function obtenerTotalVisitas() {
    global $conn;
    $sql = "SELECT SUM(visitas) as total FROM contador_visitas";
    $resultado = $conn->query($sql);
    $fila = $resultado->fetch_assoc();
    return $fila['total'] ?? 0;
}

// Obtiene visitas de hoy
function obtenerVisitasHoy() {
    global $conn;
    $fecha_actual = date('Y-m-d');
    
    $sql = "SELECT visitas FROM contador_visitas WHERE fecha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $fecha_actual);
    $stmt->execute();
    
    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();
    return $fila['visitas'] ?? 0;
}

// Registra la visita actual
try {
    registrarVisita();
} catch (Exception $e) {
    // Log el error pero no interrumpir la ejecución
    error_log("Error en contador de visitas: " . $e->getMessage());
}

// Obtiene las estadísticas
$totalVisitas = obtenerTotalVisitas();
$visitasHoy = obtenerVisitasHoy();
?>