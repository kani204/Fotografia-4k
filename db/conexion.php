<?php
$conn = new mysqli("localhost", "root", "", "fotografia_4k");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>