<?php
global $conn;

$strSQL_01 = "SELECT * FROM tbnoticias where categoria='Noticias-ITCG' ORDER BY idNoticia DESC LIMIT 3";
$objRs = mysqli_query($conn, $strSQL_01) or die("Erro SQL: " . mysqli_error($conn));
$total = mysqli_num_rows($objRs);

if ($total === 0) {
  echo "<p class='text-center'>Nenhuma notícia foi encontrada.</p>";
}
?>

<section id="main-banner-page" class="position-relative page-header blog-header parallax section-nav-smooth" style="background-image: url(assets/img/bg-blog-header.jpg); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center -44.7863px; margin-top: 0px;">
    <div class="overlay overlay-dark opacity-7 z-index-1"></div>
    <div class="container">
        
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-start">NOTÍCIAS</h3>
                    <ul class="breadcrumb top10 bottom10 float-end">
                        <li class="breadcrumb-item hover-light"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item hover-light">Notícias</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Blogs -->
<section id="our-blog" class="bglight padding">
    <div class="container">
        <div id="blog-measonry" class="cbp">          
            <?php             
              $i=1;
              while ($objRow_01 = mysqli_fetch_array($objRs)) {

                // Limpar título e parágrafo1
                $tituloLimpo = strip_tags(html_entity_decode($objRow_01["titulo"]));
                $paragrafoLimpo = strip_tags(html_entity_decode($objRow_01["paragrafo1"]));
            ?>

            <div class="cbp-item">
                <div class="news_item shadow text-center text-md-start">
                    <a class="image" href="noticia?noticia=<?php echo $objRow_01["idNoticia"]; ?>">
                        <img src="<?php echo $objRow_01["imagemdestaque"]; ?>" alt="" class="img-responsive">
                    </a>
                    <div class="news_desc">
                        <h3 class="text-center font-normal darkcolor">
                          <a href="noticia?noticia=<?php echo $objRow_01["idNoticia"]; ?>">
                            <?php echo htmlspecialchars($tituloLimpo); ?>
                          </a>
                        </h3>
                        <ul class="meta-tags top20 bottom20">
                            <li><a href="#."><i class="fas fa-calendar-alt"></i><?php echo $objRow_01["datacadastro"]; ?></a></li>
                            <li><a href="#."><i class="far fa-user"></i><?php echo $objRow_01["autor"]; ?></a></li>
                        </ul>
                        <p class="bottom35"><?php echo htmlspecialchars($paragrafoLimpo); ?></p>
                        <a href="noticia?noticia=<?php echo $objRow_01['idNoticia']; ?>" class="button gradient-btn">LEIA MAIS</a>
                    </div>
                </div>
            </div>
            <?php  
                $ixarr[$i] = $objRow_01['idNoticia'];
                $i++;             
            } ?>

        </div>
        <div class="row">
            <div class="col-sm-12">
                <!--Pagination-->
                <ul class="pagination justify-content-center mt-4">
                <li class="page-item"><a class="page-link" href="<?= BASE_URL ?>noticiasgerais"><i class="fa fa-angle-left"></i></a></li>
                <li class="page-item active"><a class="page-link" href="<?= BASE_URL ?>noticiasgerais">1</a></li>
                <li class="page-item"><a class="page-link" href="<?= BASE_URL ?>noticiasgerais?pagina=2">2</a></li>
                <li class="page-item"><a class="page-link" href="<?= BASE_URL ?>noticiasgerais?pagina=3">3</a></li>
                <li class="page-item"><a class="page-link" href="<?= BASE_URL ?>noticiasgerais?pagina=2"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div>
        </div>
    </div>
</section>
<!--Our Blogs Ends-->
