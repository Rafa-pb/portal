<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

include __DIR__ . '/../config/config.php';

try {
    $campos = [
        'titulo', 'subtitulo', 'resumodestaque', 'paragrafo1', 'paragrafo2', 'paragrafo3', 'paragrafo4', 'paragrafo5',
        'textodestaque', 'datacadastro', 'categoria', 'status', 'destaquepublicacao'
    ];

    $dados = [];
    foreach ($campos as $campo) {
        $dados[$campo] = mysqli_real_escape_string($conn, $_POST[$campo] ?? '');
    }

    // Verifica campos obrigatórios
    if (empty($dados['titulo']) || empty($dados['paragrafo1'])) {
        throw new Exception("Título e Parágrafo 1 são obrigatórios.");
    }

    // Calcular ano/mês/dia
    $data = new DateTime($dados['datacadastro'] ?: date('Y-m-d'));
    $Nano = $data->format('Y');
    $Nmes = (int) $data->format('m');
    $Ndia = (int) $data->format('d');

    // Autor da sessão
    $autor = mysqli_real_escape_string($conn, $_SESSION['usuario_nome']);

    // Upload da imagem (opcional)
    $imagem_path = '';
    if (!empty($_FILES['imagem']['name'])) {
        $dir = __DIR__ . '/../public/assets/img/noticias/';
        $file = basename($_FILES['imagem']['name']);
        $destino = $dir . $file;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
            $imagem_path = 'assets/img/noticias/' . $file;
        }
    }

    $sql = "INSERT INTO tbnoticias (
        Nano, Nmes, Ndia, categoria, datacadastro, destacarpublicacao,
        titulo, subtitulo, resumodestaque, paragrafo1, paragrafo2, paragrafo3, paragrafo4, paragrafo5,
        textodestaque, imagemdestaque, autor, status
    ) VALUES (
        '$Nano', '$Nmes', '$Ndia', 
        '{$dados['categoria']}', '{$dados['datacadastro']}', '{$dados['destaquepublicacao']}',
        '{$dados['titulo']}', '{$dados['subtitulo']}', '{$dados['resumodestaque']}',
        '{$dados['paragrafo1']}', '{$dados['paragrafo2']}', '{$dados['paragrafo3']}', 
        '{$dados['paragrafo4']}', '{$dados['paragrafo5']}', '{$dados['textodestaque']}',
        '$imagem_path', '$autor', '{$dados['status']}'
    )";

    if (!mysqli_query($conn, $sql)) {
        throw new Exception("Erro ao salvar notícia: " . mysqli_error($conn));
    }

    header("Location: noticias_listar.php");
    exit;

} catch (Exception $e) {
    echo "<p class='text-danger text-center mt-5'>" . $e->getMessage() . "</p>";
    echo "<p class='text-center'><a href='noticias_listar.php' class='btn btn-outline-secondary mt-3'>Voltar</a></p>";
}
