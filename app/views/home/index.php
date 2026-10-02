<?php include __DIR__ . '/../partials/header.php'; ?>

<?php include __DIR__ . '/../partials/menu.php'; ?>

<?php include __DIR__ . '/../partials/headtop.php'; ?>
<!-- Banner -->
<section class="hero-banner"> </section>

<!-- Seção de notícias -->
<section id="noticias"> 
  <?php include __DIR__ . '/../noticias/index.php'; ?>
</section>
<!-- Seção de instituições -->
<section id="instituicoes"> 
  <?php include __DIR__ . '/../instituicao/index.php'; ?>
</section>

<!-- Seção de laboratórios -->
<section id="laboratorios"> 
  <?php include __DIR__ . '/../laboratorios/index.php'; ?>
</section>

<?php include __DIR__ . '/../partials/footer.php'; ?>
<?php #echo 'Passou footer<br>'; ?>
