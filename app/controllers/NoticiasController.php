<?php
class NoticiasController {
  public function index() {
   include __DIR__ . '/../views/home/index.php';
  }

   public function detalhe() {
     global $conn;
    include __DIR__ . '/../views/noticias/noticiasgerais.php';
  }

  public function geral() {
    global $conn;
    include __DIR__ . '/../views/noticias/noticiasgerais.php';
  }
}
