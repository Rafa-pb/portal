<?php 
  include __DIR__ . '/../partials/header.php'; 
  include __DIR__ . '/../partials/menu.php'; 
?>

<!-- Page Header -->
<section id="main-banner-page" class="position-relative page-header section-nav-smooth parallax blog-detail-header">
    <div class="overlay overlay-dark opacity-8 z-index-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-bold">Identidade Visual</h2>
                    <h3 class="font-light pt-2">A marca da Fundação e seus elementos gráficos oficiais</h3>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 whitecolor">
                    <h3 class="float-start">Identidade Visual</h3>
                    <ul class="breadcrumb top10 bottom10 float-end">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
                        <li class="breadcrumb-item">Identidade Visual</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Conteúdo -->
<section class="padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h4 class="mb-4">Material oficial da identidade visual da Fundação PaqTcPB:</h4>

                <div class="mb-4">
                    <p>Baixe o manual da marca com orientações sobre uso correto da logomarca:</p>
                    <a class="btn btn-outline-primary mb-2" href="#" target="_blank">
                        Baixar Manual da Identidade Visual
                    </a>
                </div>

                <div class="mb-4">
                    <p>Logomarcas para uso em materiais:</p>
                    <a class="btn btn-outline-secondary me-2 mb-2" href="#" target="_blank">Logo PNG</a>
                    <a class="btn btn-outline-secondary me-2 mb-2" href="#" target="_blank">Logo SVG</a>
                    <a class="btn btn-outline-secondary me-2 mb-2" href="#" target="_blank">Logo PDF</a>
                </div>

                <div class="mb-3">
                    <img src="<?= BASE_URL ?>assets/img/logo/logo-horizontal.png" alt="Logomarca PaqTcPB" class="img-fluid" style="max-width: 300px;">
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../partials/footer.php'; ?>
