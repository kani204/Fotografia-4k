<?php
$host = 'localhost';
$usuario = 'root'; 
$contraseña = '';  
$nombre_base_datos = 'fotografia4k'; 

// Conexion a la base de datos
$conexion = new mysqli($host, $usuario, $contraseña, $nombre_base_datos);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>