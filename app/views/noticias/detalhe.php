<?php
include __DIR__ . '/../../partials/header.php';
include __DIR__ . '/../../partials/menu.php';
global $conn;

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    echo "<div class='container mt-5'><div class='alert alert-warning text-center'>Notícia não encontrada.</div></div>";
    include __DIR__ . '/../../partials/footer.php';
    return;
}

$sql = "SELECT * FROM tbnoticias WHERE idNoticia = $id LIMIT 1";
$res = mysqli_query($conn, $sql);
$noticia = mysqli_fetch_assoc($res);

if (!$noticia) {
    echo "<div class='container mt-5'><div class='alert alert-warning text-center'>Notícia não encontrada.</div></div>";
    include __DIR__ . '/../../partials/footer.php';
    return;
}
?>

<!-- Cabeçalho da Notícia -->
<section class="page-header parallax position-relative blog-detail-header">
    <div class="overlay overlay-dark opacity-8 z-index-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-xlight">Fundação Parque Tecnológico</h2>
                    <h2 class="font-bold">PaqTcPB</h2>
                    <h2 class="font-xlight">Notícia</h2>
                    <h3 class="font-light pt-2">Informativo Institucional</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Detalhe da Notícia -->
<section class="padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <article class="blog-single">
                    <?php if (!empty($noticia['imagemdestaque'])): ?>
                        <img src="<?= BASE_URL . $noticia['imagemdestaque'] ?>" class="img-fluid mb-4" alt="Imagem da notícia">
                    <?php endif; ?>

                    <h2 class="mb-3 text-center"> <?= strip_tags($noticia['titulo']) ?> </h2>
                    <?php if (!empty($noticia['subtitulo'])): ?>
                        <h4 class="mb-3 text-center"> <?= strip_tags($noticia['subtitulo']) ?> </h4>
                    <?php endif; ?>

                    <ul class="meta-tags small mb-4 d-flex justify-content-center list-unstyled">
                        <li class="me-3"><i class="fas fa-calendar-alt me-1"></i> <?= $noticia['datacadastro'] ?></li>
                        <li><i class="fas fa-user me-1"></i> <?= $noticia['autor'] ?></li>
                    </ul>

                    <?php if (!empty($noticia['resumodestaque'])): ?>
                        <div class="alert alert-primary">
                            <strong><?= strip_tags($noticia['resumodestaque']) ?></strong>
                        </div>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <?php $par = $noticia['paragrafo' . $i] ?? ''; ?>
                        <?php if (!empty(trim($par))): ?>
                            <p class="mb-3"> <?= strip_tags($par, '<a><strong><em><br><b>') ?> </p>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if (!empty($noticia['textodestaque'])): ?>
                        <div class="alert alert-warning mt-4">
                            <?= strip_tags($noticia['textodestaque']) ?>
                        </div>
                    <?php endif; ?>

                    <div class="mt-4 text-center">
                        <a href="<?= BASE_URL ?>noticiasgerais" class="btn btn-outline-primary">← Voltar às Notícias</a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../../partials/footer.php'; ?>
