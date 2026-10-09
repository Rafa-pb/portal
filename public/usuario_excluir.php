<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_categoria'] !== 'Administrador') {
    header("Location: painel.php");
    exit;
}
include __DIR__ . '/../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) ($_POST['id'] ?? 0);

    if ($id > 0) {
        if ($id == $_SESSION['usuario_id']) {
            echo "<div class='alert alert-danger text-center mt-5'>Você não pode excluir sua própria conta.</div>";
            echo "<p class='text-center'><a href='usuarios_listar.php' class='btn btn-secondary mt-3'>Voltar</a></p>";
            exit;
        }

        $stmt = mysqli_prepare($conn, "DELETE FROM tbusuario WHERE idUsuario = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            header("Location: usuarios_listar.php");
            exit;
        } else {
            echo "<div class='alert alert-danger text-center mt-5'>Erro ao excluir usuário.</div>";
            echo "<p class='text-center'><a href='usuarios_listar.php' class='btn btn-secondary mt-3'>Voltar</a></p>";
            exit;
        }
    }
}

header("Location: usuarios_listar.php");
exit;