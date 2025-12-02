<?php
$mysql = new mysqli("localhost", "root", "", "base1");

if ($mysql->connect_error)
    die("Problemas con la conexión a la base de datos");

// Sanitizar entradas
$descripcion = $mysql->real_escape_string($_REQUEST['descripcion']);
$precio = floatval($_REQUEST['precio']);
$codigorubro = intval($_REQUEST['codigorubro']);

// Insertar registro
$mysql->query("
    INSERT INTO articulos (descripcion, precio, codigorubro)
    VALUES ('$descripcion', $precio, $codigorubro)
") or die($mysql->error);

$mysql->close();

// Redirección
header('Location: mantenimientoarticulos.php');
exit;
?>
