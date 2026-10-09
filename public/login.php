<?php
session_start();
include __DIR__ . '/../config/config.php';
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Utilizando Prepared Statement para evitar SQL Injection no login
    $stmt = mysqli_prepare($conn, "SELECT * FROM tbusuario WHERE Email = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $usuario = mysqli_fetch_assoc($res);
    mysqli_stmt_close($stmt);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Proteção contra Session Fixation
        session_regenerate_id(true);

        $_SESSION['usuario_id'] = $usuario['idUsuario'];
        $_SESSION['usuario_nome'] = $usuario['NmUsuario'];
        $_SESSION['usuario_email'] = $usuario['Email'];
        $_SESSION['usuario_categoria'] = $usuario['categoria'];
        
        header("Location: painel.php");
        exit;
    } else {
        $erro = "E-mail ou senha inválidos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login - PaqTcPB</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">
  <style>
    body { background-color: #f4f6f8; }
    .login-box { max-width: 400px; margin: 100px auto; padding: 30px; background: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
  </style>
</head>
<body>
  <div class="login-box">
    <h4 class="mb-3 text-center">Acesso Administrativo</h4>
    <?php if ($erro): ?>
      <div class="alert alert-danger"> <?= htmlspecialchars($erro) ?> </div>
    <?php endif; ?>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Senha</label>
        <input type="password" name="senha" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
  </div>
</body>
</html>