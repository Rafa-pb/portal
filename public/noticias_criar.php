<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: admin/login.php");
    exit;
}

include __DIR__ . '/../config/config.php';

$mensagem = '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Nova Notícia</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
</head>
<body>
<?php include 'navbar_admin.php'; ?>
<div class="container bg-white p-4 rounded shadow">
    <div class="form-box">
        <h3 class="mb-4">Cadastrar Nova Notícia</h3>
        <?php if ($mensagem): ?>
            <div class="alert alert-info"> <?= $mensagem ?> </div>
        <?php endif; ?>

        <form method="POST" action="noticia_nova_salvar.php" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Categoria</label>
                    <select name="categoria" class="form-select" required>
                        <option value="">-- Selecione --</option>
                        <option value="Noticias">Notícias</option>
                        <option value="Noticias-ITCG">Notícias - ITCG</option>
                        <option value="Noticias-IACOC">Notícias - IACOC</option>
                        <option value="Noticias-TVPARQUE">Notícias - TVParque</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Data</label>
                    <input type="date" name="datacadastro" class="form-control" value="<?= date('Y-m-d') ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Destaque</label>
                    <select name="destaquepublicacao" class="form-select">
                        <option value="">--</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>

                <?php
                $campos = [
                    'titulo' => 'Título',
                    'subtitulo' => 'Subtítulo',
                    'resumodestaque' => 'Resumo',
                    'paragrafo1' => 'Parágrafo 1',
                    'paragrafo2' => 'Parágrafo 2',
                    'paragrafo3' => 'Parágrafo 3',
                    'paragrafo4' => 'Parágrafo 4',
                    'paragrafo5' => 'Parágrafo 5',
                    'textodestaque' => 'Texto de Destaque'
                ];
                foreach ($campos as $name => $label): ?>
                    <div class="col-12">
                        <label class="form-label"><?= $label ?></label>
                        <textarea name="<?= $name ?>" class="form-control<?= $name === 'paragrafo1' || $name === 'titulo' ? ' required' : '' ?>"></textarea>
                    </div>
                <?php endforeach; ?>

                <div class="col-12">
                    <label class="form-label">Imagem de Destaque</label>
                    <input type="file" name="imagem" class="form-control">
                </div>

                <div class="col-12">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="publica">Publicar</option>
                        <option value="rascunho">Rascunho</option>
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-success w-100">Salvar Notícia</button>
                </div>
            </div>
        </form>

        <div class="text-end mt-3">
            <a href="painel.php" class="btn btn-outline-secondary">Voltar ao Painel</a>
        </div>
    </div>
</div>

<!-- Inicializa o CKEditor em todos os textareas -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('textarea').forEach(function (el) {
            ClassicEditor.create(el).catch(error => console.error(error));
        });
    });
</script>
</body>
</html>
