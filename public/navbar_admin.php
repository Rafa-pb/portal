<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="<?= BASE_URL ?>/painel.php">
      <i data-lucide="home" class="me-2"></i> Home
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i data-lucide="user" class="me-1"></i> Conta
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item d-flex align-items-center" href="usuarios_listar.php"><i data-lucide="users" class="me-1"></i> Lista de Usuários</a></li>
          
          </ul>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="btn btn-danger btn-sm ms-3 d-flex align-items-center"><i data-lucide="log-out" class="me-1"></i> Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
  lucide.createIcons();
</script>
