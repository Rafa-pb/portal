<?php 
session_start(); 
if (!isset($_SESSION['usuario_id'])) {     
    header("Location: login.php");     
    exit; 
}
include __DIR__ . '/../config/config.php'; 
?>
<!DOCTYPE html> 
<html lang="pt-PT"> 
<head>     
    <meta charset="UTF-8">     
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     
    <title>Painel Administrativo</title>     
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">     
    <style>         
        body { background-color: #f9f9f9; }         
        .painel-box { max-width: 800px; margin: 50px auto; background: #fff; padding: 30px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }     
    </style> 
</head> 
<body>     
    <?php include 'navbar_admin.php'; ?>     
    <div class="painel-box">         
        <h3 class="mb-4">Bem-vindo, <?= htmlspecialchars($_SESSION['usuario_nome']) ?>!</h3>         
        <p><strong>E-mail:</strong> <?= htmlspecialchars($_SESSION['usuario_email']) ?></p>         
        <p><strong>Categoria:</strong> <?= htmlspecialchars($_SESSION['usuario_categoria']) ?></p>         
        <hr>         
        <div class="mt-4">             
            <a href="noticias_criar.php" class="btn btn-success">Nova Notícia</a>             
            <a href="noticias_listar.php" class="btn btn-primary">Gerir Notícias</a>             
            <a href="logout.php" class="btn btn-danger float-end">Sair</a>         
        </div>     
    </div> 

    <!-- Script do Bootstrap necessário para o funcionamento do Menu Dropdown -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body> 
</html>