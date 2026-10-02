<?php 
  include __DIR__ . '/../partials/header.php'; 
  include __DIR__ . '/../partials/menu.php'; 
?>

<section id="main-banner-page" class="position-relative page-header section-nav-smooth parallax">
    <div class="overlay overlay-dark opacity-8 z-index-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-bold">Regimento Interno</h2>
                    <h3 class="font-light pt-2">Fundação Parque Tecnológico da Paraíba</h3>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 whitecolor">
                    <h3 class="float-start">Regimento</h3>
                    <ul class="breadcrumb top10 bottom10 float-end">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
                        <li class="breadcrumb-item">Regimento</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="padding">
    <div class="container text-center">
        <h4 class="mb-4">Clique abaixo para visualizar o Regimento Interno da Fundação PaqTcPB:</h4>
        <a class="btn btn-outline-primary" href="<?= BASE_URL ?>assets/pages/download/EstatutoPaqTc.pdf" target="_blank">
            Abrir Regimento em PDF
        </a>
    </div>
</section>

<?php include __DIR__ . '/../partials/footer.php'; ?>
