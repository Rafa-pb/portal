<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
include __DIR__ . '/../config/config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header("Location: noticias_listar.php");
    exit;
}

// Busca usando Prepared Statement
$stmt = mysqli_prepare($conn, "SELECT * FROM tbnoticias WHERE idNoticia = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$noticia = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$noticia) {
    echo "<p class='text-danger text-center mt-5'>Notícia não encontrada.</p>";
    exit;
}

// Proteção IDOR: Verifica se o editor é o dono da notícia
if ($_SESSION['usuario_categoria'] !== 'Administrador' && $noticia['autor'] !== $_SESSION['usuario_nome']) {
    echo "<div class='container mt-5'><div class='alert alert-danger text-center'>Acesso negado: Você só pode editar as suas próprias notícias.</div></div>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Editar Notícia</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">
  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
</head>
<body>
<?php include 'navbar_admin.php'; ?>
<div class="container bg-white p-4 rounded shadow">
  <div class="form-box">
    <h4 class="mb-4">Editar Notícia #<?= $noticia['idNoticia'] ?></h4>
    <form action="noticia_salvar.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="idNoticia" value="<?= $noticia['idNoticia'] ?>">
      
      <?php
        $campos = [
          'titulo' => 'Título',
          'subtitulo' => 'Subtítulo',
          'resumodestaque' => 'Resumo destaque',
          'paragrafo1' => 'Parágrafo 1',
          'paragrafo2' => 'Parágrafo 2',
          'paragrafo3' => 'Parágrafo 3',
          'paragrafo4' => 'Parágrafo 4',
          'paragrafo5' => 'Parágrafo 5',
          'textodestaque' => 'Texto destaque'
        ];
        foreach ($campos as $campo => $label): ?>
          <div class="mb-3">
            <label class="form-label"><?= $label ?></label>
            <!-- Prevenção de XSS na renderização do texto -->
            <textarea name="<?= $campo ?>" class="form-control" rows="3"><?= htmlspecialchars($noticia[$campo], ENT_QUOTES, 'UTF-8') ?></textarea>
          </div>
      <?php endforeach; ?>

      <div class="row">
        <div class="col-md-4">
          <label class="form-label">Data</label>
          <input type="date" name="datacadastro" class="form-control" value="<?= htmlspecialchars($noticia['datacadastro'], ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <div class="col-md-4">
          <label class="form-label">Categoria</label>
          <input type="text" name="categoria" class="form-control" value="<?= htmlspecialchars($noticia['categoria'], ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <div class="col-md-4">
          <label class="form-label">Status</label>
          <select name="status" class="form-select">
            <option value="publica" <?= $noticia['status'] === 'publica' ? 'selected' : '' ?>>Publicada</option>
            <option value="rascunho" <?= $noticia['status'] === 'rascunho' ? 'selected' : '' ?>>Rascunho</option>
          </select>
        </div>
      </div>

      <?php if (!empty($noticia['imagemdestaque'])): ?>
        <div class="mt-4 mb-3 text-center">
          <label class="form-label d-block">Imagem Atual</label>
          <img src="<?= BASE_URL . htmlspecialchars($noticia['imagemdestaque'], ENT_QUOTES, 'UTF-8') ?>" class="img-thumbnail" style="max-height: 300px;">
        </div>
      <?php endif; ?>

      <div class="mb-3">
        <label class="form-label">Nova Imagem de Destaque</label>
        <input type="file" name="imagem" class="form-control">
        <small class="text-muted">Se enviar uma nova imagem, ela substituirá a atual.</small>
      </div>
      <div class="mt-4">
        <button type="submit" class="btn btn-primary w-100">Salvar Alterações</button>
      </div>
    </form>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('textarea').forEach(el => {
      ClassicEditor.create(el).catch(error => console.error(error));
    });
  });
</script>
</body>
</html>