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
                    <h2 class="font-bold">Atos Normativos</h2>
                    <h3 class="font-light pt-2">Documentos que regem diretrizes e procedimentos internos</h3>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 whitecolor">
                    <h3 class="float-start">Normativos Internos</h3>
                    <ul class="breadcrumb top10 bottom10 float-end">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
                        <li class="breadcrumb-item">Atos Normativos</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Conteúdo -->
<section class="padding">
    <div class="container">
        <div class="row">

            <div class="col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Ato Normativo 01-DG-2023</h5>
                        <p class="card-text">INOVA-CEEI – Vinculado à coordenação de projetos nacionais de inovação aberta.</p>
                        <a href="<?= BASE_URL ?>assets/pages/download/Ato_Normativo_n_01_DG_2023_VMDNacional _ INOVA CEEI.pdf" target="_blank" class="btn btn-outline-primary">
                            Baixar PDF
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Ato Normativo 02-DG-2022</h5>
                        <p class="card-text">Diretrizes para execução de projetos com interveniência via Fundação PaqTcPB.</p>
                        <a href="<?= BASE_URL ?>assets/pages/download/Ato_Normativo_n_02_DG_2022_VMDNacional _ INOVA CEEI.pdf" target="_blank" class="btn btn-outline-primary">
                            Baixar PDF
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include __DIR__ . '/../partials/footer.php'; ?>
