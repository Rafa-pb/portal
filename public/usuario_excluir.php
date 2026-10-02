<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_categoria'] !== 'Administrador') {
    header("Location: painel.php");
    exit;
}

include __DIR__ . '/../config/config.php';

$id = (int) ($_GET['id'] ?? 0);

if ($id > 0) {
    // Proteção: não permitir que o administrador apague a si próprio
    if ($id == $_SESSION['usuario_id']) {
        echo "<div class='alert alert-danger text-center mt-5'>Você não pode excluir sua própria conta.</div>";
        echo "<p class='text-center'><a href='usuarios_listar.php' class='btn btn-secondary mt-3'>Voltar</a></p>";
        exit;
    }

    $sql = "DELETE FROM tbusuario WHERE idUsuario = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: usuarios_listar.php");
        exit;
    } else {
        echo "<div class='alert alert-danger text-center mt-5'>Erro ao excluir: " . mysqli_error($conn) . "</div>";
        echo "<p class='text-center'><a href='usuarios_listar.php' class='btn btn-secondary mt-3'>Voltar</a></p>";
        exit;
    }
} else {
    header("Location: usuarios_listar.php");
    exit;
}
?>
