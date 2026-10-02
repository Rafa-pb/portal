<!--Site Footer Here-->
<footer id="site-footer" class=" bgdark padding_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer_panel padding_bottom_half bottom20">
                    <a href="index.php" class="footer_logo-lg bottom25"><img src="<?= BASE_URL ?>assets/img/logo-transparent.png" alt="MegaOne"></a> <p><p/>
                    <p class="whitecolor bottom25">A Fundação Parque Tecnológico da Paraíba atua como Fundação de Apoio as ICTs, conectando Academia, Empresas e Governo, promovendo o Desenvolvimento Tecnológico e a Inovação.</p>
                    <div class="d-table w-100 address-item whitecolor bottom25">
                        <span class="d-table-cell align-middle"><i class="fas fa-mobile-alt"></i></span>
                        <p class="d-table-cell align-middle bottom0">
                            +55 - 83 - 2101-9020 <a class="d-block" href="mailto:paqtc@paqtc.org.br">paqtc@paqtc.org.br</a>
                        </p>
                    </div>
                    <ul class="social-icons white wow fadeInUp" data-wow-delay="300ms">
                        <li><a href="javascript:void(0)" class="facebook"><i class="fab fa-facebook-f"></i> </a> </li>
                        <li><a href="javascript:void(0)" class="twitter"><i class="fab fa-twitter"></i> </a> </li>
                        <li><a href="javascript:void(0)" class="linkedin"><i class="fab fa-linkedin-in"></i> </a> </li>
                        <li><a href="javascript:void(0)" class="insta"><i class="fab fa-instagram"></i> </a> </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer_panel padding_bottom_half bottom20">
                    <h3 class="whitecolor bottom25">Últimas Notícias</h3>
                    <ul class="latest_news whitecolor">
                        <?php
                        global $conn;
                        $sqlFooter = "SELECT idNoticia, titulo, datacadastro FROM tbnoticias ORDER BY idNoticia DESC LIMIT 3";
                        $resultFooter = mysqli_query($conn, $sqlFooter);

                        while ($noticiaFooter = mysqli_fetch_assoc($resultFooter)) {
                            $ano = date('Y', strtotime($noticiaFooter['datacadastro']));
                            $tituloLimpo = strip_tags(html_entity_decode($noticiaFooter['titulo']));
                        ?>
                        <li>
                            <a href="<?= BASE_URL ?>noticia?id=<?= $noticiaFooter['idNoticia']; ?>">
                                <?= htmlspecialchars($tituloLimpo); ?>
                            </a>
                            <span class="date defaultcolor"><?= $ano; ?></span>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer_panel padding_bottom_half bottom20 ps-0 ps-lg-5">
                    <h3 class="whitecolor bottom25">Nossos Serviços Services</h3>
                    <ul class="links">
                        <li><a href="#">Início</a></li>
                        <li><a href="#">Inteveniência</a></li>
                        <li><a href="#">Incubadoras</a></li>
                        <li><a href="#">Parque Tecnológico</a></li>
                        <li><a href="#">Contato</a></li>
                        <li><a href="#">Perguntas</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer_panel padding_bottom_half bottom20">
                    <h3 class="whitecolor bottom25">Business hours</h3>
                    <p class="whitecolor bottom25">Estamos funcionando Home-Office e presencial</p>
                    <ul class="hours_links whitecolor">
                        <li><span>Segunda-Feira:</span> <span>7:30-17:00</span></li>
                        <li><span>Terça-Feira:</span> <span>7:30-17:00</span></li>
                        <li><span>Quarta-Feira:</span> <span>7:30-17:00</span></li>
                        <li><span>Quinta-Feira:</span> <span>7:30-17:00</span></li>
                        <li><span>Sexta-Feira:</span> <span>7:30-17:00</span></li>
                        
                    </ul>
                </div>
            </div>
        </div>
</footer>

<div class="container-fluid" style="background-color: #025294;" id="rodape-2">
            <div class="container" >
                <div class="row">      
                    <div class="col-14 text-center align-self-center" id="copyright">
                        <br/>
                        <span  style="color:#ffffff; font-size:14px;" >© 2018 - <?php echo  date('Y');?> - Fundação Parque Tecnológico da Paraíba - PaqTcPB - Todos os Direitos Reservados</span>
                        <br/>
                    </div>                   

                </div>
            </div>
        </div>
<!--Footer ends-->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= BASE_URL ?>assets/js/jquery-3.6.0.min.js"></script>
<!--Bootstrap Core-->
<script src="<?= BASE_URL ?>assets/js/propper.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/bootstrap.min.js"></script>
<!--to view items on reach-->
<script src="<?= BASE_URL ?>assets/js/jquery.appear.js"></script>
<!--Owl Slider-->
<script src="<?= BASE_URL ?>assets/js/owl.carousel.min.js"></script>
<!--number counters-->
<script src="<?= BASE_URL ?>assets/js/jquery-countTo.js"></script>
<!--Parallax Background-->
<script src="<?= BASE_URL ?>assets/js/parallaxie.js"></script>
<!--Cubefolio Gallery-->
<script src="<?= BASE_URL ?>assets/js/jquery.cubeportfolio.min.js"></script>
<!--Fancybox js-->
<script src="<?= BASE_URL ?>assets/js/jquery.fancybox.min.js"></script>
<!--tooltip js-->
<script src="<?= BASE_URL ?>assets/js/tooltipster.min.js"></script>
<!--wow js-->
<script src="<?= BASE_URL ?>assets/js/wow.js"></script>
<!--Revolution SLider-->
<script src="<?= BASE_URL ?>assets/js/revolution/jquery.themepunch.tools.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/revolution/jquery.themepunch.revolution.min.js"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
<script src="<?= BASE_URL ?>assets/js/revolution/extensions/revolution.extension.actions.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/revolution/extensions/revolution.extension.carousel.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/revolution/extensions/revolution.extension.kenburn.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/revolution/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/revolution/extensions/revolution.extension.migration.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/revolution/extensions/revolution.extension.navigation.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/revolution/extensions/revolution.extension.parallax.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/revolution/extensions/revolution.extension.slideanims.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/revolution/extensions/revolution.extension.video.min.js"></script>
<!--custom functions and script-->
<script src="<?= BASE_URL ?>assets/js/functions.js"></script>
</body>
</div>
</html>