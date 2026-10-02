<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

include __DIR__ . '/../config/config.php';

// Filtros
$filtroStatus = $_GET['status'] ?? '';
$filtroCategoria = $_GET['categoria'] ?? '';
$filtroTitulo = $_GET['titulo'] ?? '';
$filtroData = $_GET['data'] ?? '';

$where = [];
if ($filtroStatus) {
    $where[] = "status = '" . mysqli_real_escape_string($conn, $filtroStatus) . "'";
}
if ($filtroCategoria) {
    $where[] = "categoria = '" . mysqli_real_escape_string($conn, $filtroCategoria) . "'";
}
if ($filtroTitulo) {
    $where[] = "titulo LIKE '%" . mysqli_real_escape_string($conn, $filtroTitulo) . "%'";
}
if ($filtroData) {
    $where[] = "datacadastro = '" . mysqli_real_escape_string($conn, $filtroData) . "'";
}

$sqlFiltro = count($where) ? 'WHERE ' . implode(' AND ', $where) : '';

$query = "SELECT idNoticia, datacadastro, titulo, categoria, autor, status FROM tbnoticias $sqlFiltro ORDER BY idNoticia DESC";
$res = mysqli_query($conn, $query);

$categorias = mysqli_query($conn, "SELECT DISTINCT categoria FROM tbnoticias ORDER BY categoria ASC");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Listar Notícias</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">
  <style>
    body { background-color: #f9f9f9; }
    .container-box { max-width: 1000px; margin: 40px auto; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05); }
    table th, table td { vertical-align: middle; }
  </style>
</head>
<body>
  <?php include 'navbar_admin.php'; ?>
<div class="container-box">
  <h4 class="mb-4">Listagem de Notícias</h4>

  <form class="row g-2 mb-4" method="GET">
    <div class="col-md-3">
      <label class="form-label">Status</label>
      <select name="status" class="form-select">
        <option value="">Todos</option>
        <option value="publica" <?= $filtroStatus === 'publica' ? 'selected' : '' ?>>Publicadas</option>
        <option value="rascunho" <?= $filtroStatus === 'rascunho' ? 'selected' : '' ?>>Rascunhos</option>
      </select>
    </div>
    <div class="col-md-3">
      <label class="form-label">Categoria</label>
      <select name="categoria" class="form-select">
        <option value="">Todas</option>
        <?php while ($cat = mysqli_fetch_assoc($categorias)): ?>
          <option value="<?= $cat['categoria'] ?>" <?= $filtroCategoria === $cat['categoria'] ? 'selected' : '' ?>><?= $cat['categoria'] ?></option>
        <?php endwhile; ?>
      </select>
    </div>
    <div class="col-md-3">
      <label class="form-label">Título</label>
      <input type="text" name="titulo" value="<?= htmlspecialchars($filtroTitulo) ?>" class="form-control" placeholder="Buscar por título...">
    </div>
    <div class="col-md-3">
      <label class="form-label">Data</label>
      <input type="date" name="data" value="<?= htmlspecialchars($filtroData) ?>" class="form-control">
    </div>
    <div class="col-md-12 d-flex justify-content-end">
      <button type="submit" class="btn btn-primary mt-3">Filtrar</button>
    </div>
  </form>

  <a href="painel.php" class="btn btn-outline-secondary mb-3">← Voltar</a>
  <a href="noticias_criar.php" class="btn btn-success mb-3 float-end">+ Nova Notícia</a>

  <table class="table table-bordered table-hover">
    <thead class="table-light">
      <tr>
        <th>ID</th>
        <th>Data</th>
        <th>Título</th>
        <th>Categoria</th>
        <th>Autor</th>
        <th>Status</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($res)): ?>
      <tr>
        <td><?= $row['idNoticia'] ?></td>
        <td><?= $row['datacadastro'] ?></td>
        <td><?= strip_tags($row['titulo']) ?></td>
        <td><?= $row['categoria'] ?></td>
        <td><?= $row['autor'] ?></td>
        <td>
          <span class="badge bg-<?= $row['status'] === 'publica' ? 'success' : 'warning' ?>">
            <?= ucfirst($row['status']) ?>
          </span>
        </td>
        <td>
          <a href="noticia_editar.php?id=<?= $row['idNoticia'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
          <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalExcluir<?= $row['idNoticia'] ?>">Excluir</button>
        </td>
      </tr>

      <!-- Modal -->
      <div class="modal fade" id="modalExcluir<?= $row['idNoticia'] ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-danger text-white">
              <h5 class="modal-title">Confirmar Exclusão</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
              Tem certeza que deseja excluir a notícia <strong>#<?= $row['idNoticia'] ?></strong>?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <a href="noticia_excluir.php?id=<?= $row['idNoticia'] ?>" class="btn btn-danger">Excluir</a>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
    </tbody>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
