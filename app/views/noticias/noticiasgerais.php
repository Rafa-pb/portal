<?php 
include __DIR__ . '/../partials/header.php'; 
include __DIR__ . '/../partials/menu.php'; 
global $conn;

$id = isset($_GET['noticia']) ? (int)$_GET['noticia'] : 0;
if ($id > 0) {
    $sql = "SELECT * FROM tbnoticias WHERE idNoticia = $id LIMIT 1";
    $res = mysqli_query($conn, $sql) or die("Erro ao buscar notícia: " . mysqli_error($conn));
    $noticia = mysqli_fetch_assoc($res);
    if (!$noticia) {
        echo "<p class='text-center'>Notícia não encontrada.</p>";
        return;
    }
} else {
    $sql = "SELECT * FROM tbnoticias ORDER BY idNoticia DESC LIMIT 50";
    $res = mysqli_query($conn, $sql) or die("Erro ao buscar notícias: " . mysqli_error($conn));
}
?>

<!--Page Header-->
<section id="main-banner-page" class="position-relative page-header section-nav-smooth parallax blog-detail-header">
    <div class="overlay overlay-dark opacity-8 z-index-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-xlight">Fundação</h2>
                    <h2 class="font-bold">Parque Tecnológico da Paraíba</h2>
                    <h2 class="font-xlight">PaqTcpB</h2>
                    <h3 class="font-light pt-2">Promovendo o Desenvolvimento Tecnológico e a Inovação.</h3>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-start">NOTÍCIAS</h3>
                    <ul class="breadcrumb top10 bottom10 float-end">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL ?>noticias">Home</a></li>
                        <li class="breadcrumb-item">Notícias</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Page Header ends -->

<?php if ($id > 0 && isset($noticia)): ?>
<!-- Notícia individual -->
<section id="our-blog" class="bglight padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div class="news_item shadow">
                    <div class="image">
                        <img src="<?php echo $noticia["imagemdestaque"]; ?>" alt="" class="img-responsive">
                    </div>
                    <div class="news_desc text-center text-md-start">
                        <h3 class="text-center font-normal darkcolor"> <a href="#"> <?= $noticia["titulo"] ?> </a></h3>
                        <ul class="meta-tags top20 bottom20">
                            <?php $data_0 = $noticia['Ndia'].'/'.$noticia['Nmes'].'/'.$noticia['Nano']; ?>
                            <li><a href="#."><i class="fas fa-calendar-alt"></i> <?= $data_0 ?> </a></li>
                            <li><a href="#."> <i class="far fa-user"></i> <?= $noticia['autor'] ?></a></li>                            
                        </ul>
                        <?php for ($i = 1; $i <= 5; $i++): if (!empty($noticia['paragrafo'.$i])): ?>
                            <p class="bottom35"> <?= $noticia['paragrafo'.$i] ?> </p>
                        <?php endif; endfor; ?>
                        <?php if (!empty($noticia['textodestaque'])): ?>
                            <blockquote class="blockquote darkcolor bottom35"> <?= $noticia['textodestaque'] ?> </blockquote>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <aside class="sidebar whitebox mt-5 mt-md-0">
                    <div class="widget shadow heading_space text-center text-md-start">
                        <h4 class="text-center darkcolor bottom20">Pesquisar</h4>
                        <form class="widget_search">
                            <div class="input-group">
                                <label for="searchInput" class="d-none"></label>
                                <input type="search" class="form-control" placeholder="search..." required id="searchInput">
                                <button type="submit" class="input-group-addon"><i class="fa fa-search"></i> </button>
                            </div>
                        </form>
                    </div>
                     
                    <div class="widget heading_space shadow wow fadeIn" data-wow-delay="350ms">
                    <h4 class="text-center darkcolor bottom20 text-md-start">Notícias Recentes</h4>
                    <?php 
                    $strSQL_01 = "SELECT * FROM tbnoticias ORDER BY idNoticia DESC LIMIT 6";
                    $objRs = mysqli_query($conn, $strSQL_01);
                    while ($objRow_01 = mysqli_fetch_array($objRs)) { 
                        // Limpar título removendo tags HTML
                        $tituloLimpo = strip_tags(html_entity_decode($objRow_01["titulo"]));
                    ?>
                    <div class="single_post d-flex align-items-center bottom15">
                        <a href="noticia?noticia=<?php echo $objRow_01["idNoticia"]; ?>" class="post-img">
                            <img src="<?php echo $objRow_01["imagemdestaque"]; ?>" alt="post image">
                        </a>
                        <div class="text ps-4">
                            <a href="noticia?noticia=<?php echo $objRow_01["idNoticia"]; ?>" class="post-title" style="font-size: 16px;">
                                <?php echo htmlspecialchars($tituloLimpo); ?>
                            </a>
                            <span class="post-date"><?php echo $objRow_01["Ndia"].', '.$objRow_01["Nmes"].', '.$objRow_01["Nano"]; ?></span>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                    <div class="widget shadow heading_space text-center text-md-start">
                        <h4 class="text-center darkcolor bottom20">Categorias</h4>
                        <ul class="webcats">
                            <?php 
                        $strSQL_02 = "SELECT categoria AS 'categorianome', COUNT(*) AS 'categorianumero' FROM tbnoticias GROUP BY categoria ORDER BY COUNT(*) DESC";

                            $objRs_02 = mysqli_query($conn, $strSQL_02);
                            $i=1;
                            while ($objRow_02= mysqli_fetch_array($objRs_02))
                            { ?>
                            <li><a href="noticia.php?noticiacategoria=<?php echo $objRow_02["categorianome"]; ?>"><?php echo $objRow_02["categorianome"]; ?> <span>(<?php echo $objRow_02["categorianumero"]; ?>)</span></a></li>
                            <?php } ?>
                        </ul>
                    </div>                    
                </aside>
            </div>
<?php else: ?>
<!-- Listagem de notícias -->
<section id="our-blog" class="bglight padding">
    <div class="container">
        <div id="blog-measonry" class="cbp">
            <?php 
              $i = 1;
              while ($objRow_01 = mysqli_fetch_array($res)) {
                $tituloLimpo = strip_tags(html_entity_decode($objRow_01["titulo"]));
                $paragrafoLimpo = strip_tags(html_entity_decode($objRow_01["paragrafo1"]));
            ?>
            <div class="cbp-item">
                <div class="news_item shadow text-center text-md-start">
                    <a class="image" href="noticia?noticia=<?= $objRow_01["idNoticia"] ?>">
                        <img src="<?= $objRow_01["imagemdestaque"] ?>" alt="" class="img-responsive">
                    </a>
                    <div class="news_desc">
                        <h3 class="text-center font-normal darkcolor">
                          <a href="noticia?noticia=<?= $objRow_01["idNoticia"] ?>">
                            <?= htmlspecialchars($tituloLimpo) ?>
                          </a>
                        </h3>
                        <ul class="meta-tags top20 bottom20">
                            <li><a href="#."><i class="fas fa-calendar-alt"></i> <?= $objRow_01["datacadastro"] ?></a></li>
                            <li><a href="#."><i class="far fa-user"></i> <?= $objRow_01["autor"] ?></a></li>
                        </ul>
                        <p class="bottom35"> <?= htmlspecialchars($paragrafoLimpo) ?> </p>
                        <a href="noticia?noticia=<?= $objRow_01['idNoticia'] ?>" class="button gradient-btn">LEIA MAIS</a>
                    </div>
                </div>
            </div>
            <?php $i++; } ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php include __DIR__ . '/../partials/footer.php'; ?>
