<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_categoria'] !== 'Administrador') {
    header("Location: painel.php");
    exit;
}
include __DIR__ . '/../config/config.php';
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senhaRaw = $_POST['senha'] ?? '';
    $categoria = $_POST['categoria'] ?? '';

    if (!empty($nome) && !empty($email) && !empty($senhaRaw) && !empty($categoria)) {
        $senhaHash = password_hash($senhaRaw, PASSWORD_DEFAULT);

        $stmt = mysqli_prepare($conn, "INSERT INTO tbusuario (NmUsuario, Email, senha, categoria) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $nome, $email, $senhaHash, $categoria);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                header("Location: usuarios_listar.php");
                exit;
            } else {
                $mensagem = 'Erro ao cadastrar usuário.';
            }
            mysqli_stmt_close($stmt);
        } else {
            $mensagem = 'Erro na preparação da consulta.';
        }
    } else {
        $mensagem = 'Todos os campos são obrigatórios.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Criar Novo Usuário</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">
  <style>
    body { background-color: #f9f9f9; }
    .form-box { max-width: 600px; margin: 50px auto; background: #fff; padding: 30px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
  </style>
</head>
<body>
<?php include 'navbar_admin.php'; ?>
<div class="form-box">
  <h4 class="mb-4">Cadastrar Novo Usuário</h4>
  <?php if ($mensagem): ?>
    <div class="alert alert-danger"> <?= htmlspecialchars($mensagem) ?> </div>
  <?php endif; ?>
  <form method="POST">
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Senha</label>
      <input type="password" name="senha" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Categoria</label>
      <select name="categoria" class="form-select" required>
        <option value="">-- Selecione --</option>
        <option value="Administrador">Administrador</option>
        <option value="Editor">Editor</option>
      </select>
    </div>
    <button type="submit" class="btn btn-success w-100">Salvar</button>
  </form>
  <div class="text-end mt-3">
    <a href="usuarios_listar.php" class="btn btn-outline-secondary">Voltar</a>
  </div>
</div>
</body>
</html>