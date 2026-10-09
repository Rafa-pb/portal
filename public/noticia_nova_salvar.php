<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

include __DIR__ . '/../config/config.php';

try {
    // Recolhe os dados do POST (sem necessidade de mysqli_real_escape_string usando Prepared Statements)
    $titulo = $_POST['titulo'] ?? '';
    $subtitulo = $_POST['subtitulo'] ?? '';
    $resumodestaque = $_POST['resumodestaque'] ?? '';
    $paragrafo1 = $_POST['paragrafo1'] ?? '';
    $paragrafo2 = $_POST['paragrafo2'] ?? '';
    $paragrafo3 = $_POST['paragrafo3'] ?? '';
    $paragrafo4 = $_POST['paragrafo4'] ?? '';
    $paragrafo5 = $_POST['paragrafo5'] ?? '';
    $textodestaque = $_POST['textodestaque'] ?? '';
    $datacadastro = $_POST['datacadastro'] ?? date('Y-m-d');
    $categoria = $_POST['categoria'] ?? '';
    $status = $_POST['status'] ?? '';
    $destaquepublicacao = $_POST['destaquepublicacao'] ?? '';

    // Verifica campos obrigatórios
    if (empty($titulo) || empty($paragrafo1)) {
        throw new Exception("Título e Parágrafo 1 são obrigatórios.");
    }

    // Calcular ano/mês/dia
    $data = new DateTime($datacadastro ?: date('Y-m-d'));
    $Nano = $data->format('Y');
    $Nmes = (int) $data->format('m');
    $Ndia = (int) $data->format('d');

    // Autor da sessão
    $autor = $_SESSION['usuario_nome'] ?? '';

    $imagem_path = '';
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['imagem']['tmp_name'];
        $name_original = basename($_FILES['imagem']['name']);
        $tamanho = $_FILES['imagem']['size'];

        // 1. Validação de Tamanho (Limite de 2MB para evitar sobrecarga)
        if ($tamanho > 2 * 1024 * 1024) {
            throw new Exception("O arquivo de imagem é muito grande. O limite é 2MB.");
        }

        // 2. Validação de Extensão
        $extensao = strtolower(pathinfo($name_original, PATHINFO_EXTENSION));
        $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (!in_array($extensao, $extensoes_permitidas)) {
            throw new Exception("Formato inválido. Apenas imagens JPG, PNG, GIF e WEBP são permitidas.");
        }

        // 3. Validação de MIME Type (Inspeciona o conteúdo real do arquivo)
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $tmp_name);
        finfo_close($finfo);
        $mimes_permitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        
        if (!in_array($mime_type, $mimes_permitidos)) {
            throw new Exception("Arquivo malicioso detectado. O conteúdo não é uma imagem válida.");
        }

        // 4. Renomear arquivo com string única
        $novo_nome = uniqid('noticia_') . '_' . bin2hex(random_bytes(4)) . '.' . $extensao;
        
        $dir = __DIR__ . '/../public/assets/img/noticias/';
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $destino = $dir . $novo_nome;

        if (move_uploaded_file($tmp_name, $destino)) {
            $imagem_path = 'assets/img/noticias/' . $novo_nome;
        } else {
            throw new Exception("Falha ao mover o arquivo para a pasta de destino.");
        }
    }

    // ==========================================
    // INSERÇÃO SEGURA COM PREPARED STATEMENT
    // ==========================================
    $sql = "INSERT INTO tbnoticias (
        Nano, Nmes, Ndia, categoria, datacadastro, destacarpublicacao,
        titulo, subtitulo, resumodestaque, paragrafo1, paragrafo2, paragrafo3, paragrafo4, paragrafo5,
        textodestaque, imagemdestaque, autor, status
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        throw new Exception("Erro na preparação da consulta ao banco de dados.");
    }

    // Tipos: s = string, i = integer
    // Ordem exata dos 18 parâmetros correspondentes às 18 interrogações (?) acima:
    mysqli_stmt_bind_param(
        $stmt,
        "siisssssssssssssss",
        $Nano,              // s
        $Nmes,              // i
        $Ndia,              // i
        $categoria,         // s
        $datacadastro,      // s
        $destaquepublicacao,// s
        $titulo,            // s
        $subtitulo,         // s
        $resumodestaque,    // s
        $paragrafo1,        // s
        $paragrafo2,        // s
        $paragrafo3,        // s
        $paragrafo4,        // s
        $paragrafo5,        // s
        $textodestaque,     // s
        $imagem_path,       // s
        $autor,             // s
        $status             // s
    );

    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Erro ao salvar notícia no banco de dados.");
    }

    mysqli_stmt_close($stmt);
    header("Location: noticias_listar.php");
    exit;

} catch (Exception $e) {
    echo "<p class='text-danger text-center mt-5'>" . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p class='text-center'><a href='noticias_listar.php' class='btn btn-outline-secondary mt-3'>Voltar</a></p>";
}