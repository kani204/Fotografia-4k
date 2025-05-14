<?php
$archivo = 'contador.txt';
// si el archivo no existe se crea
if (!file_exists($archivo)) {
    file_put_contents($archivo, '0');
}
// lee el numero actual de visitas
$contador = file_get_contents($archivo);
// incrementa el contador
$contador++;
// se guarda el nuevo numero de visitas
file_put_contents($archivo, $contador);
?>