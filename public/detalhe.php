<?php 
include __DIR__ . '/../partials/header.php'; 
include __DIR__ . '/../partials/menu.php'; 
global $conn; 

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0; 
if ($id <= 0) {     
    echo "<div class='container mt-5'><div class='alert alert-warning text-center'>Notícia não encontrada.</div></div>";     
    include __DIR__ . '/../partials/footer.php';     
    return; 
}

// Prepared statement na view pública (Segurança extra)
$stmt = mysqli_prepare($conn, "SELECT * FROM tbnoticias WHERE idNoticia = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$noticia = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$noticia) {     
    echo "<div class='container mt-5'><div class='alert alert-warning text-center'>Notícia não encontrada.</div></div>";     
    include __DIR__ . '/../partials/footer.php';     
    return; 
}

// Função nativa básica para limpar atributos de eventos e scripts do CKEditor
function limparHTMLBasico($html) {
    // Remove atributos on... (ex: onclick, onmouseover)
    $html = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $html);
    // Remove links javascript:
    $html = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $html);
    return $html;
}
?>
<!-- Cabeçalho da Notícia --> 
<section class="page-header parallax position-relative blog-detail-header">     
    <div class="overlay overlay-dark opacity-8 z-index-1"></div>     
    <div class="container">         
        <div class="row">             
            <div class="col-lg-8 offset-lg-2">                 
                <div class="page-titles whitecolor text-center padding_top padding_bottom">                     
                    <h2 class="font-xlight">Fundação Parque Tecnológico</h2>                     
                    <h2 class="font-bold">PaqTcPB</h2>                     
                    <h2 class="font-xlight">Notícia</h2>                     
                    <h3 class="font-light pt-2">Informativo Institucional</h3>                 
                </div>             
            </div>         
        </div>     
    </div> 
</section> 

<!-- Detalhe da Notícia --> 
<section class="padding">     
    <div class="container">         
        <div class="row">             
            <div class="col-lg-10 offset-lg-1">                 
                <article class="blog-single">                     
                    <?php if (!empty($noticia['imagemdestaque'])): ?>                         
                        <!-- Prevenção de XSS no src da imagem -->
                        <img src="<?= BASE_URL . htmlspecialchars($noticia['imagemdestaque'], ENT_QUOTES, 'UTF-8') ?>" class="img-fluid mb-4" alt="Imagem da notícia">                     
                    <?php endif; ?>                     
                    
                    <h2 class="mb-3 text-center"> <?= htmlspecialchars($noticia['titulo'], ENT_QUOTES, 'UTF-8') ?> </h2>                     
                    
                    <?php if (!empty($noticia['subtitulo'])): ?>                         
                        <h4 class="mb-3 text-center"> <?= htmlspecialchars($noticia['subtitulo'], ENT_QUOTES, 'UTF-8') ?> </h4>                     
                    <?php endif; ?>                     
                    
                    <ul class="meta-tags small mb-4 d-flex justify-content-center list-unstyled">                         
                        <li class="me-3"><i class="fas fa-calendar-alt me-1"></i> <?= htmlspecialchars($noticia['datacadastro'], ENT_QUOTES, 'UTF-8') ?></li>                         
                        <!-- Correção Crítica: Proteção contra Stored XSS vindo do Nome do Autor -->
                        <li><i class="fas fa-user me-1"></i> <?= htmlspecialchars($noticia['autor'], ENT_QUOTES, 'UTF-8') ?></li>                     
                    </ul>                     
                    
                    <?php if (!empty($noticia['resumodestaque'])): ?>                         
                        <div class="alert alert-primary">                             
                            <strong><?= limparHTMLBasico($noticia['resumodestaque']) ?></strong>                         
                        </div>                     
                    <?php endif; ?>                     
                    
                    <?php for ($i = 1; $i <= 5; $i++): ?>                         
                        <?php $par = $noticia['paragrafo' . $i] ?? ''; ?>                         
                        <?php if (!empty(trim($par))): ?>                             
                            <!-- Renderização com higienização básica de HTML -->
                            <div class="mb-3"> <?= limparHTMLBasico($par) ?> </div>                         
                        <?php endif; ?>                     
                    <?php endfor; ?>                     
                    
                    <?php if (!empty($noticia['textodestaque'])): ?>                         
                        <div class="alert alert-warning mt-4">                             
                            <?= limparHTMLBasico($noticia['textodestaque']) ?>                         
                        </div>                     
                    <?php endif; ?>                 
                </article>             
            </div>         
        </div>     
    </div> 
</section> 
<?php include __DIR__ . '/../partials/footer.php'; ?>