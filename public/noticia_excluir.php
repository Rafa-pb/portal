<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

include __DIR__ . '/../config/config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id > 0) {
    $sql = "DELETE FROM tbnoticias WHERE idNoticia = $id LIMIT 1";
    mysqli_query($conn, $sql);
}

header("Location: noticias_listar.php");
exit;
