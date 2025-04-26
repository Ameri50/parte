<?php
// conexion.php

$host = "localhost";
$dbname = "nombre_de_tu_base_de_datos";
$username = "tu_usuario";
$password = "tu_contraseña";

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
