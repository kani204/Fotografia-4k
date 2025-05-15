<?php
require_once 'includes/config.php';

$sql = "CREATE TABLE IF NOT EXISTS galeria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    imagen VARCHAR(255) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    categoria VARCHAR(50),
    tags VARCHAR(255)
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla galeria creada exitosamente";
    
    // Insertar algunos datos de ejemplo
    $datos_ejemplo = "INSERT INTO galeria (titulo, descripcion, imagen) VALUES
    ('Paisaje montañoso', 'Hermosa vista de montañas al atardecer', 'assets/img/portfolio/paisaje1.jpg'),
    ('Retrato urbano', 'Fotografía callejera en la ciudad', 'assets/img/portfolio/retrato1.jpg'),
    ('Naturaleza salvaje', 'Vida silvestre en su hábitat natural', 'assets/img/portfolio/naturaleza1.jpg')";
    
    if ($conn->query($datos_ejemplo) === TRUE) {
        echo "<br>Datos de ejemplo insertados correctamente";
    } else {
        echo "<br>Error al insertar datos de ejemplo: " . $conn->error;
    }
} else {
    echo "Error al crear la tabla: " . $conn->error;
}

$conn->close();
?> 