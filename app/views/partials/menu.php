<!-- header -->
<header class="site-header" id="header">
    <nav class="navbar navbar-expand-lg transparent-bg static-nav">
        <div class="container">
            <a class="navbar-brand-lg" href="<?= BASE_URL ?>../public">
                <img src="<?= BASE_URL ?>assets/img/logo-transparent.png" alt="logo" class="logo-default">
                <img src="<?= BASE_URL ?>assets/img/logo.png" alt="logo" class="logo-scrolled">
                 <br/>
            </a>
            <br/>
    <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
    <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL ?>">INÍCIO</a>
    </li>
    <li class="nav-item dropdown static">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">FUNDAÇÃO</a>
        <ul class="dropdown-menu megamenu">
            <li>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <h5 class="dropdown-title bottom10">INSTITUCIONAL</h5>
                            <a class="dropdown-item" href="<?= BASE_URL ?>missao">Missão</a>
                            <a class="dropdown-item" href="<?= BASE_URL ?>nossotime">Quem Somos</a>
                            <a class="dropdown-item" href="<?= BASE_URL ?>historico">Histórico</a>
                            <a class="dropdown-item" href="<?= BASE_URL ?>estatuto"  target="_blank">Estatuto</a>
                            <a class="dropdown-item" href="<?= BASE_URL ?>regimento" target="_blank">Regimento</a>
                            <a class="dropdown-item" href="<?= BASE_URL ?>certidoes">Certidões</a>
                            <a class="dropdown-item" href="<?= BASE_URL ?>atosnormativos">Atos Normativos</a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <h5 class="dropdown-title opacity-10">INFORMAÇÕES</h5>
                            <a class="dropdown-item" href="<?= BASE_URL ?>assets/pages/download/FUNDACAO_PATCPB_2023.pdf" target="_blank">Apresentação Institucional</a>
                            <a class="dropdown-item" href="<?= BASE_URL ?>assets/pages/download/GESTAO_AREA_TEC_2023_EMPRESAS_STARTUPS_01.pdf" target="_blank">Área Técnica</a>
                            <a class="dropdown-item" href="<?= BASE_URL ?>organograma">Estrutura Administrativa</a>
                            <a class="dropdown-item" href="<?= BASE_URL ?>credenciadas">Instituições Credenciadas</a>
                            <a class="dropdown-item" href="<?= BASE_URL ?>legislacao">Legislação</a>
                            <a class="dropdown-item" href="<?= BASE_URL ?>credenciamento">Credenciamento</a>
                            <a class="dropdown-item" href="<?= BASE_URL ?>identidadevisual">Logomarca e Identidade Visual</a>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <h5 class="dropdown-title bottom10">SERVIÇOS</h5>
                            <a class="dropdown-item" href="<?= BASE_URL ?>contratosconvenios">Contratos e Convênios</a>
                            <a class="dropdown-item" href="<?= BASE_URL ?>interveniencia">Interveniência de Projetos</a>                            
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <h5 class="dropdown-title bottom10">EDITAIS</h5>
                            <a class="dropdown-item" href="<?= BASE_URL ?>noticiasgerais">Acessar Editais</a>                           
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <h5 class="dropdown-title bottom10">RELATÓRIOS</h5>
                            <a class="dropdown-item" href="<?= BASE_URL ?>relatorios">Relatórios</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">INCUBADORAS</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="<?= BASE_URL ?>itcg">ITCG</a>
            <a class="dropdown-item" href="<?= BASE_URL ?>iacoc">IACOC</a>
        </div>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">TVPARQUE</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="https://www.youtube.com/channel/UCRTE5pPRkGvSEZfQr4LXXDg" target="_blank">TVParque</a>
            <a class="dropdown-item" href="https://www.youtube.com/channel/UCRTE5pPRkGvSEZfQr4LXXDg" target="_blank">Canal Youtube</a>
        </div>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">SISTEMAS</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="https://sgi.paqtc.org.br" target="_blank">SGI - Coordenador</a>
            <a class="dropdown-item" href="https://sgi.paqtc.org.br/Portal_Transparencia/" target="_blank">Portal da Transparência - SGI</a>
            <a class="dropdown-item" href="https://paqtcpb.conveniar.com.br/portaltransparencia/" target="_blank">Portal da Transparência - Conveniar</a>
            <a class="dropdown-item" href="<?= BASE_URL ?>redemetro">Rede Metro CG</a>
        </div>
    </li>
</ul>

</div>
<!--side menu open button-->
        <a href="javascript:void(0)" class="d-inline-block sidemenu_btn" id="sidemenu_toggle">
            <span></span> <span></span> <span></span>
        </a>
    </nav>
   <!-- Side menu mobile -->
<div class="side-menu opacity-0 gradient-bg">
    <div class="overlay"></div>
    <div class="inner-wrapper">
        <span class="btn-close btn-close-no-padding" id="btn_sideNavClose"><i></i><i></i></span>
        <nav class="side-nav w-100">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsePagesSideMenu" data-bs-toggle="collapse" href="#sideNavFundacao">
                        Fundação <i class="fas fa-chevron-down"></i>
                    </a>
                    <div id="sideNavFundacao" class="collapse">
                        <ul class="navbar-nav mt-2">
                            <li><a class="nav-link" href="<?= BASE_URL ?>missao">Missão</a></li>
                            <li><a class="nav-link" href="<?= BASE_URL ?>nossotime">Quem Somos</a></li>
                            <li><a class="nav-link" href="<?= BASE_URL ?>historico">Histórico</a></li>
                            <li><a class="nav-link" href="<?= BASE_URL ?>estatuto"  target="_blank">Estatuto</a></li>
                            <li><a class="nav-link" href="<?= BASE_URL ?>regimento"  target="_blank">Regimento</a></li>
                            <li><a class="nav-link" href="<?= BASE_URL ?>certidoes">Certidões</a></li>
                            <a class="nav-link" href="<?= BASE_URL ?>atosnormativos">Atos Normativos</a>
                            <li><a class="nav-link" href="<?= BASE_URL ?>organograma">Estrutura Administrativa</a></li>
                            <li><a class="nav-link" href="<?= BASE_URL ?>credenciadas">Instituições Credenciadas</a></li>
                            <li><a class="nav-link" href="<?= BASE_URL ?>legislacao">Legislação</a></li>
                            <li><a class="nav-link" href="<?= BASE_URL ?>credenciamento">Credenciamento</a></li>
                            <li><a class="nav-link" href="<?= BASE_URL ?>identidadevisual">Logomarca e Identidade Visual</a></li>
                            <li><a class="nav-link" href="<?= BASE_URL ?>contratosconvenios">Contratos e Convênios</a></li>
                            <li><a class="nav-link" href="<?= BASE_URL ?>interveniencia">Interveniência de Projetos</a></li>
                            <li><a class="nav-link" href="<?= BASE_URL ?>noticiasgerais">Editais</a></li>
                            <a class="nav-link" href="<?= BASE_URL ?>relatorios">Relatórios</a>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sideNavIncubadoras">Incubadoras <i class="fas fa-chevron-down"></i></a>
                    <div id="sideNavIncubadoras" class="collapse">
                        <ul class="navbar-nav mt-2">
                            <li><a class="nav-link" href="<?= BASE_URL ?>itcg">ITCG</a></li>
                            <li><a class="nav-link" href="<?= BASE_URL ?>iacoc">IACOC</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sideNavTVParque">
                        TVParque <i class="fas fa-chevron-down"></i>
                    </a>
                    <div id="sideNavTVParque" class="collapse">
                        <ul class="navbar-nav mt-2">
                            <li><a class="nav-link" href="https://www.youtube.com/channel/UCRTE5pPRkGvSEZfQr4LXXDg" target="_blank">Sobre a TVParque</a></li>
                            <li><a class="nav-link" href="https://www.youtube.com/channel/UCRTE5pPRkGvSEZfQr4LXXDg" target="_blank">Serviços</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sideNavSistemas">
                        Sistemas <i class="fas fa-chevron-down"></i>
                    </a>
                    <div id="sideNavSistemas" class="collapse">
                        <ul class="navbar-nav mt-2">
                            <li><a class="nav-link" href="https://sgi.paqtc.org.br" target="_blank">SGI-Coordenador</a></li>
                            <li><a class="nav-link" href="https://sgi.paqtc.org.br/Portal_Transparencia/" target="_blank">Portal da Transparência - SGI</a></li>
                            <li><a class="nav-link" href="https://paqtcpb.conveniar.com.br/portaltransparencia/" target="_blank">Portal da Transparência - Conveniar</a></li>
                            <li><a class="nav-link" href="<?= BASE_URL ?>redemetro">Rede Metro CG</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="side-footer w-100">
            <ul class="social-icons-simple white top40">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
            <p class="whitecolor">&copy; <span id="year"></span> PaqTcPB</p>
        </div>
    </div>
</div>
<!-- End Side menu mobile -->
    <div id="close_side_menu" class="tooltip"></div>
    <!-- End side menu -->
</header>
<!-- header -->