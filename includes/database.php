<?php
$host = '181.174.123.120:8077'; // Por ejemplo, '192.168.1.100' o 'tudominio.com'
$usuario = 'userclient';
$contraseña = '@dministr@tor.AM2020#';
$nombre_bd = 'admin_ml';

// Crear conexión
//$db = new mysqli($host, $usuario, $contraseña, $nombre_bd);
$db = mysqli_connect($host, $usuario, $contraseña, $nombre_bd);
// Comprobar conexión
if ($db->connect_error) {
    die("Conexión fallida: " . $db->connect_error);
}
//echo "Conexión exitosa";

// Cierra la conexión
?>