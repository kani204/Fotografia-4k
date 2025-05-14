<?php
$conn = new mysqli("localhost", "root", "", "fotografia4k");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>