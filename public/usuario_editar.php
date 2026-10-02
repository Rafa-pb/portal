<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

include __DIR__ . '/../config/config.php';

$id = (int) ($_GET['id'] ?? 0);
$usuarioLogadoId = $_SESSION['usuario_id'];
$categoriaLogado = $_SESSION['usuario_categoria'];

// Restrições:
// - Admins podem editar qualquer um
// - Outros só podem editar a si próprios
if ($categoriaLogado !== 'Administrador' && $usuarioLogadoId !== $id) {
    header("Location: painel.php");
    exit;
}

$res = mysqli_query($conn, "SELECT * FROM tbusuario WHERE idUsuario = $id LIMIT 1");
$usuario = mysqli_fetch_assoc($res);

if (!$usuario) {
    echo "Usuário não encontrado.";
    exit;
}

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senha = $_POST['senha'] ?? '';
    $nome = mysqli_real_escape_string($conn, $_POST['nome'] ?? $usuario['NmUsuario']);
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? $usuario['Email']);
    $categoria = mysqli_real_escape_string($conn, $_POST['categoria'] ?? $usuario['categoria']);

    $camposUpdate = [];
    if (!empty($senha)) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $camposUpdate[] = "senha = '$senhaHash'";
    }

    if ($categoriaLogado === 'Administrador') {
        $camposUpdate[] = "NmUsuario = '$nome'";
        $camposUpdate[] = "Email = '$email'";
        $camposUpdate[] = "categoria = '$categoria'";
    }

    if (!empty($camposUpdate)) {
        $sql = "UPDATE tbusuario SET " . implode(', ', $camposUpdate) . " WHERE idUsuario = $id";

        if (mysqli_query($conn, $sql)) {
            header("Location: usuarios_listar.php");
            exit;
        } else {
            $mensagem = 'Erro ao atualizar: ' . mysqli_error($conn);
        }
    } else {
        $mensagem = 'Nenhuma alteração feita.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Editar Usuário</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">
  <style>
    body { background-color: #f9f9f9; }
    .form-box { max-width: 600px; margin: 50px auto; background: #fff; padding: 30px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
  </style>
</head>
<body>
  <?php include 'navbar_admin.php'; ?>
<div class="form-box">
  <h4 class="mb-4">Editar Usuário</h4>

  <?php if ($mensagem): ?>
    <div class="alert alert-danger"> <?= $mensagem ?> </div>
  <?php endif; ?>

  <form method="POST">
    <?php if ($categoriaLogado === 'Administrador'): ?>
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($usuario['NmUsuario']) ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($usuario['Email']) ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Categoria</label>
      <select name="categoria" class="form-select">
        <option value="Administrador" <?= $usuario['categoria'] === 'Administrador' ? 'selected' : '' ?>>Administrador</option>
        <option value="Editor" <?= $usuario['categoria'] === 'Editor' ? 'selected' : '' ?>>Editor</option>
      </select>
    </div>
    <?php endif; ?>

    <div class="mb-3">
      <label class="form-label">Nova Senha (opcional)</label>
      <input type="password" name="senha" class="form-control" placeholder="Deixe em branco para manter">
    </div>

    <button type="submit" class="btn btn-primary w-100">Salvar Alterações</button>
  </form>

  <div class="text-end mt-3">
    <a href="usuarios_listar.php" class="btn btn-outline-secondary">Voltar</a>
  </div>
</div>
</body>
</html>
