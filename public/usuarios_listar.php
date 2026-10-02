<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
  header("Location: login.php");
  exit;
}

include __DIR__ . '/../config/config.php';

$query = "SELECT * FROM tbusuario ORDER BY NmUsuario ASC";
$res = mysqli_query($conn, $query);

$usuarioLogadoId = $_SESSION['usuario_id'];
$usuarioLogadoCategoria = $_SESSION['usuario_categoria'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Usuários Cadastrados</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    lucide.createIcons();
  </script>
  <style>
    body { background-color: #f4f4f4; }
    .container { max-width: 900px; margin-top: 50px; }
  </style>
</head>
<body>
	 <?php include 'navbar_admin.php'; ?>
<div class="container bg-white p-4 rounded shadow">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Gestão de Usuários</h4>
    <?php if ($usuarioLogadoCategoria === 'Administrador'): ?>
      <a href="usuario_criar.php" class="btn btn-sm btn-success d-flex align-items-center"><i data-lucide="plus-circle" class="me-1"></i> Novo Usuário</a>
    <?php endif; ?>
  </div>

  <table class="table table-bordered table-hover">
    <thead class="table-light">
      <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Categoria</th>
        <th class="text-center">Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($u = mysqli_fetch_assoc($res)): ?>
      <tr>
        <td><?= $u['idUsuario'] ?></td>
        <td><?= htmlspecialchars($u['NmUsuario']) ?></td>
        <td><?= htmlspecialchars($u['Email']) ?></td>
        <td><?= htmlspecialchars($u['categoria']) ?></td>
        <td class="text-center">
          <?php if ($usuarioLogadoCategoria === 'Administrador'): ?>
            <?php if ($usuarioLogadoId == $u['idUsuario']): ?>
              <a href="usuario_editar.php?id=<?= $u['idUsuario'] ?>" class="btn btn-sm btn-warning">Editar</a>
            <?php else: ?>
              <button class="btn btn-sm btn-secondary" disabled>Editar</button>
              <button class="btn btn-sm btn-secondary" disabled>Excluir</button>
            <?php endif; ?>
          <?php else: ?>
            <a href="usuario_editar.php?id=<?= $usuarioLogadoId ?>" class="btn btn-sm btn-warning">Editar</a>
          <?php endif; ?>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>
