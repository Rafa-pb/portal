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
                    <h2 class="font-bold">Estrutura Administrativa</h2>
                    <h3 class="font-light pt-2">Organograma e composição da gestão</h3>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 whitecolor">
                    <h3 class="float-start">Organograma</h3>
                    <ul class="breadcrumb top10 bottom10 float-end">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
                        <li class="breadcrumb-item">Estrutura Administrativa</li>
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
            <div class="col-lg-12 text-center">
                <h4 class="mb-4">Confira a estrutura administrativa da Fundação PaqTcPB</h4>
                <h3 class="text-center font-normal darkcolor"><a href="#"><strong>Fundação Parque Tecnológico da Paraíba – Fundação PaqTcPB</strong></a></h3> <BR/>

                        <p class="bottom35">Criada em 1984, entre os quatro primeiros parques tecnológicos do país, a Fundação Parque Tecnológico da Paraíba – Fundação PaqTcPB é uma instituição sem fins lucrativos voltada para o avanço científico e tecnológico do Estado.</p>
                        <p class="heading_space mt-n3 mt-sm-0 text-center text-md-start">Ao longo dos anos, a instituição tem sido uma espécie de pilar, para dar suporte a projetos e programas do setor de Ciência, Tecnologia e Inovação. Grande parte da sua história de prestígio é fruto dos resultados alcançados na sua atuação e das parcerias firmadas com várias instituições. Suas ações têm se pautado no desenvolvimento de atividades dentro das normas e objetivos propostos, sendo inquestionável sua reputação política e profissional. </p>
                        
                <p class="mb-5">Abaixo está disponível o organograma atualizado com os cargos, funções e fluxos de gestão da instituição.</p>

                <a class="btn btn-outline-primary" href="<?= BASE_URL ?>assets/img/Organograma_PaqTcPB.jpg" target="_blank">
                    Baixar Organograma em PDF
                </a>

                <div class="mt-5">
                    <img src="<?= BASE_URL ?>assets/img/Organograma_PaqTcPB.jpg" alt="Organograma da Fundação PaqTcPB" class="img-fluid shadow">
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../partials/footer.php'; ?>
