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
                    <h2 class="font-bold">Relatórios</h2>
                    <h3 class="font-light pt-2">Transparência das atividades da Fundação PaqTcPB</h3>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 whitecolor">
                    <h3 class="float-start">Relatórios Institucionais</h3>
                    <ul class="breadcrumb top10 bottom10 float-end">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
                        <li class="breadcrumb-item">Relatórios</li>
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
            <?php
              $relatorios = [
                ["nome" => "Relatório Anual 2023", "arquivo" => "Relatorio_anual_2023_PaqTcPB.pdf"],
                ["nome" => "Relatório de Gestão 2018-2022", "arquivo" => "Relatorio_de_Gestao_2018_2022_V5_Final.pdf"],
                ["nome" => "Relatório Anual 2020", "arquivo" => "Relatorio_anual_2020_PaqTcPB.pdf"],
                ["nome" => "Relatório Anual 2019", "arquivo" => "Relatorio_anual_2019_PaqTcPB.pdf"],
                ["nome" => "Relatório Anual 2018", "arquivo" => "Relatorio_anual_2018_PaqTcPB.pdf"],
                ["nome" => "Relatório Anual 2017", "arquivo" => "Relatorio_anual_2017_PaqTcPB.pdf"],
              ];
            ?>

            <?php foreach ($relatorios as $rel): ?>
              <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow text-center">
                  <div class="card-body">
                    <h5 class="card-title"><?= $rel["nome"] ?></h5>
                    <a href="<?= BASE_URL ?>assets/pages/download/<?= $rel["arquivo"] ?>" class="btn btn-outline-primary" target="_blank">Visualizar PDF</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../partials/footer.php'; ?>
