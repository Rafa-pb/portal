<?php 
  include __DIR__ . '/../partials/header.php'; 
  include __DIR__ . '/../partials/menu.php'; 
?>

<!-- Cabeçalho da página Missão -->
<section id="main-banner-page" class="position-relative page-header section-nav-smooth parallax">
    <div class="overlay overlay-dark opacity-8 z-index-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-xlight">Conheça a nossa</h2>
                    <h2 class="font-bold">Missão Institucional</h2>
                    <h3 class="font-light pt-2">Fundação Parque Tecnológico da Paraíba</h3>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-start">Missão</h3>
                    <ul class="breadcrumb top10 bottom10 float-end">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
                        <li class="breadcrumb-item">Missão</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Conteúdo principal da Missão -->
<section class="missao-conteudo padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Nossa Missão</h3>
                <p>
                    A missão da Fundação Parque Tecnológico da Paraíba é promover o desenvolvimento científico, tecnológico e inovador, através da articulação entre empresas, instituições acadêmicas e setores da sociedade, visando o fortalecimento econômico e social do estado da Paraíba e região.
                </p>
                <h3>Visão</h3>
                <p>
                    Ser reconhecida como instituição referência em inovação tecnológica e no fomento ao empreendedorismo inovador, contribuindo diretamente para o crescimento sustentável da região.
                </p>
                <h3>Valores</h3>
                <ul>
                    <li>Inovação e Excelência</li>
                    <li>Transparência e Ética</li>
                    <li>Sustentabilidade e Responsabilidade Social</li>
                    <li>Compromisso com o Desenvolvimento Regional</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../partials/footer.php'; ?>
