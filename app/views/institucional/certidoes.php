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
                    <h2 class="font-xlight">Fundação</h2>
                    <h2 class="font-bold">Parque Tecnológico da Paraíba</h2>
                    <h2 class="font-xlight">PaqTcPB</h2>
                    <h3 class="font-light pt-2">Promovendo o Desenvolvimento Tecnológico e a Inovação.</h3>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 whitecolor">
                    <h3 class="float-start">Certidões</h3>
                    <ul class="breadcrumb top10 bottom10 float-end">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">Home</a></li>
                        <li class="breadcrumb-item">Certidões</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<br /> <br />
<!-- Certidões Listadas -->
<?php
$certidoes = [
  ["title" => "CERTIFICADO DE REGULARIDADE DO FGTS", "url" => "https://drive.google.com/file/d/1wxrvXduEutpn-K5Xpu_Li_6bd9LX2MnE/view"],
  ["title" => "CERTIDÃO NEGATIVA DE DÉBITOS TRABALHISTAS", "url" => "https://drive.google.com/file/d/1JkxmifSwdyiPIy0K5F42YPhpE8hzO65F/view"],
  ["title" => "CERTIDÃO NEGATIVA DE DÉBITOS RECEITA FEDERAL", "url" => "https://drive.google.com/file/d/1aqQcvEseZGMXvdXTsGacjLWXoiwiO7pb/view"],
  ["title" => "CERTIDÃO NEGATIVA DE DÉBITOS ESTADUAL", "url" => "https://drive.google.com/file/d/1nx4npEFHndp_op756MCHfDdGwu7YIJMg/view"],
  ["title" => "CERTIDÃO NEGATIVA DE DÉBITOS MUNICIPAL", "url" => "https://drive.google.com/file/d/15WmdruR_esk44ydYcTx0ZuuFJnxLSnuG/view"],
];
?>

<?php foreach ($certidoes as $certidao): ?>
<section id="our-feature" class="single-feature padding_bottom padding_top_half mt-1 mt-lg-n4 mt-md-n3">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-2 col-md-4 col-sm-4 text-sm-start text-center wow fadeInLeft" data-wow-delay="300ms">
                <div class="heading-title mb-2">
                    <h4 class="darkcolor font-normal bottom30"><?= $certidao['title'] ?></h4>
                </div>
                <a href="<?= $certidao['url'] ?>" target="_blank" class="button gradient-btn w-100">Download</a>
            </div>
            <div class="col-lg-2 offset-lg-1 col-md-2 col-sm-2 wow fadeInRight" data-wow-delay="300ms">
                <div class="image">
                    <a href="<?= $certidao['url'] ?>" target="_blank">
                        <img alt="PDF" src="<?= BASE_URL ?>assets/img/config/pdf.png">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endforeach; ?>

<?php include __DIR__ . '/../partials/footer.php'; ?>
