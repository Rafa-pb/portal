<?php
class NoticiaController
{
    public function listar()
    {
        include __DIR__ . '/../views/noticias/index.php';
    }

    public function gerais()
    {
        include __DIR__ . '/../views/noticias/noticiasgerais.php';
    }

    public function criar()
    {
        include __DIR__ . '/../views/noticias/noticias_criar.php';
    }

    public function editar()
    {
        include __DIR__ . '/../views/noticias/noticia_editar.php';
    }

    public function detalhe()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $partes = explode('/', trim($uri, '/'));
        $id = (int)end($partes);

        $_GET['id'] = $id; // necessário para o detalhe.php funcionar com base em ID
        include __DIR__ . '/../views/noticias/detalhe.php';
    }
}
