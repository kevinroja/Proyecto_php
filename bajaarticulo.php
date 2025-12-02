<?php
$mysql = new mysqli("localhost", "root", "", "base1");

if ($mysql->connect_error)
    die("Problemas con la conexión a la base de datos");

// Obtener y sanitizar el código
$codigo = intval($_REQUEST['codigo']);

// Ejecutar eliminación
$mysql->query("DELETE FROM articulos WHERE codigo = $codigo") or
    die($mysql->error);

$mysql->close();

// Redirigir
header('Location: mantenimientoarticulos.php');
exit;
?>

