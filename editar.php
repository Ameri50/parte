<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM persona WHERE idpersona = ?");
    $stmt->execute([$id]);
    $persona = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $celular = $_POST['celular'];

    $stmt = $pdo->prepare("UPDATE persona SET documento=?, nombre=?, apellido=?, direccion=?, celular=? WHERE idpersona=?");
    $stmt->execute([$documento, $nombre, $apellido, $direccion, $celular, $id]);

    header('Location: listar.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Persona</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<h2>Editar Persona</h2>

<form method="POST">
    Documento: <input type="text" name="documento" value="<?= htmlspecialchars($persona['documento']) ?>"><br><br>
    Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($persona['nombre']) ?>"><br><br>
    Apellido: <input type="text" name="apellido" value="<?= htmlspecialchars($persona['apellido']) ?>"><br><br>
    Dirección: <input type="text" name="direccion" value="<?= htmlspecialchars($persona['direccion']) ?>"><br><br>
    Celular: <input type="text" name="celular" value="<?= htmlspecialchars($persona['celular']) ?>"><br><br>
    <button type="submit">Guardar Cambios</button>
</form>

</body>
</html>
