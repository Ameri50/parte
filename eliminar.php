<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM persona WHERE idpersona = ?");
    $stmt->execute([$id]);

    header('Location: listar.php');
    exit();
}
?>
