<?php
// listar.php

// 1. Conexión a la base de datos
$host = "localhost";
$dbname = "nombre_de_tu_base_de_datos";
$username = "tu_usuario";
$password = "tu_contraseña";

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Consulta a la tabla persona
    $stmt = $pdo->query("SELECT * FROM persona");
    $personas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Personas</title>
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Listado de Personas</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>Celular</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($personas as $persona): ?>
        <tr>
            <td><?= htmlspecialchars($persona['idpersona']) ?></td>
            <td><?= htmlspecialchars($persona['documento']) ?></td>
            <td><?= htmlspecialchars($persona['nombre']) ?></td>
            <td><?= htmlspecialchars($persona['apellido']) ?></td>
            <td><?= htmlspecialchars($persona['direccion']) ?></td>
            <td><?= htmlspecialchars($persona['celular']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
