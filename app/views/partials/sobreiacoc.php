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
                    <h2 class="font-bold">IACOC</h2>
                    <h3 class="font-light pt-2">Incubadora Acadêmica de Cooperativas e Organizações Comunitárias</h3>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 whitecolor">
                    <h3 class="float-start">IACOC</h3>
                    <ul class="breadcrumb top10 bottom10 float-end">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
                        <li class="breadcrumb-item">IACOC</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Conteúdo IACOC -->
<section id="our-feature" class="single-feature padding">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 col-md-7 col-sm-7 text-sm-start text-center wow fadeInLeft" data-wow-delay="300ms">
                <div class="heading-title mb-4">
                    <h2 class="darkcolor font-normal bottom30">Sobre a <span class="defaultcolor">Incubadora</span> IACOC</h2>
                </div>
                <p class="bottom35">A Incubadora Acadêmica de Cooperativas e Organizações Comunitárias de Campina Grande – IACOC visa estimular e apoiar empreendimentos coletivos, promovendo a inclusão produtiva e o desenvolvimento local sustentável. Atua em territórios de vulnerabilidade social com foco em economia solidária e cooperativismo.</p>
                <a href="#" class="button btnsecondary gradient-btn pagescroll mb-sm-0 mb-4">Conheça nossos projetos</a>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-5 col-sm-5 wow fadeInRight" data-wow-delay="300ms">
                <div class="image">
                    <img alt="SEO" src="<?= BASE_URL ?>assets/img/awesome-featureitcg.png">
                    
                </div>
            </div>
        </div>

        <div class="row d-flex align-items-center">
            <div class="col-lg-6 col-md-7 col-sm-7 text-sm-start text-center wow fadeInLeft" data-wow-delay="300ms">
                <div class="heading-title mb-4">
                    <h2 class="darkcolor font-normal bottom30">Serviços para <span class="defaultcolor">Empreendimentos Solidários</span></h2>
                </div>
                <p class="bottom35">
                    1) Capacitação em gestão de cooperativas e associações;<br/>
                    2) Apoio técnico e assessoria contábil e jurídica;<br/>
                    3) Criação de identidade visual e marketing solidário;<br/>
                    4) Promoção de feiras, eventos e intercâmbios entre grupos;<br/>
                    5) Fomento à comercialização justa e inclusiva;<br/>
                    6) Articulação em redes de economia solidária regionais e nacionais.
                </p>
                <a href="#" class="button btnsecondary gradient-btn pagescroll mb-sm-0 mb-4">Acesse aqui...</a>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-5 col-sm-5 wow fadeInRight" data-wow-delay="300ms">
                <div class="image">
                    <div class="image"><img alt="SEO" src="<?= BASE_URL ?>assets/img/awesome-featureitcg1.png"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../partials/footer.php'; ?>
