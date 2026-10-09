<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
include __DIR__ . '/../config/config.php';

$id = isset($_POST['idNoticia']) ? (int)$_POST['idNoticia'] : 0;

try {
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

    if (empty($titulo) || empty($paragrafo1)) {
        throw new Exception("Título e Parágrafo 1 são obrigatórios.");
    }

    if ($id <= 0) {
        throw new Exception("ID de notícia inválido para alteração.");
    }

    // Busca a imagem atual no banco de dados antes de processar qualquer alteração
    $stmtOld = mysqli_prepare($conn, "SELECT imagemdestaque FROM tbnoticias WHERE idNoticia = ?");
    mysqli_stmt_bind_param($stmtOld, "i", $id);
    mysqli_stmt_execute($stmtOld);
    $resOld = mysqli_stmt_get_result($stmtOld);
    $rowOld = mysqli_fetch_assoc($resOld);
    mysqli_stmt_close($stmtOld);
    
    $imagemAntiga = $rowOld['imagemdestaque'] ?? '';

    // ==========================================
    // UPLOAD DA NOVA IMAGEM
    // ==========================================
    $imagem_path = null;
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['imagem']['tmp_name'];
        $name_original = basename($_FILES['imagem']['name']);
        $tamanho = $_FILES['imagem']['size'];

        if ($tamanho > 2 * 1024 * 1024) {
            throw new Exception("O arquivo de imagem é muito grande. O limite é 2MB.");
        }

        $extensao = strtolower(pathinfo($name_original, PATHINFO_EXTENSION));
        $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (!in_array($extensao, $extensoes_permitidas)) {
            throw new Exception("Formato inválido. Apenas imagens JPG, PNG, GIF e WEBP são permitidas.");
        }

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $tmp_name);
        finfo_close($finfo);
        $mimes_permitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        
        if (!in_array($mime_type, $mimes_permitidos)) {
            throw new Exception("Arquivo malicioso detectado. O conteúdo não é uma imagem válida.");
        }

        $novo_nome = uniqid('noticia_') . '_' . bin2hex(random_bytes(4)) . '.' . $extensao;
        $dir = __DIR__ . '/../public/assets/img/noticias/';
        
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $destino = $dir . $novo_nome;

        if (move_uploaded_file($tmp_name, $destino)) {
            $imagem_path = 'assets/img/noticias/' . $novo_nome;

            // NOVA REGRA: Apaga a imagem antiga do servidor caso a nova tenha sido enviada com sucesso
            if (!empty($imagemAntiga)) {
                $caminho_antigo = __DIR__ . '/../public/' . $imagemAntiga;
                if (file_exists($caminho_antigo)) {
                    unlink($caminho_antigo);
                }
            }
        } else {
            throw new Exception("Falha ao mover o arquivo para a pasta de destino.");
        }
    }

    // ==========================================
    // ATUALIZAÇÃO NO BANCO DE DADOS
    // ==========================================
    if ($imagem_path !== null) {
        // Query COM atualização de imagem
        $sql = "UPDATE tbnoticias SET 
            titulo = ?, subtitulo = ?, resumodestaque = ?, 
            paragrafo1 = ?, paragrafo2 = ?, paragrafo3 = ?, 
            paragrafo4 = ?, paragrafo5 = ?, textodestaque = ?, 
            datacadastro = ?, categoria = ?, status = ?, imagemdestaque = ? 
            WHERE idNoticia = ?";
        
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) { throw new Exception("Erro na preparação da consulta."); }

        mysqli_stmt_bind_param(
            $stmt,
            "sssssssssssssi",
            $titulo, $subtitulo, $resumodestaque,
            $paragrafo1, $paragrafo2, $paragrafo3,
            $paragrafo4, $paragrafo5, $textodestaque,
            $datacadastro, $categoria, $status, $imagem_path,
            $id
        );
    } else {
        // Query SEM atualização de imagem
        $sql = "UPDATE tbnoticias SET 
            titulo = ?, subtitulo = ?, resumodestaque = ?, 
            paragrafo1 = ?, paragrafo2 = ?, paragrafo3 = ?, 
            paragrafo4 = ?, paragrafo5 = ?, textodestaque = ?, 
            datacadastro = ?, categoria = ?, status = ? 
            WHERE idNoticia = ?";
        
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) { throw new Exception("Erro na preparação da consulta."); }

        mysqli_stmt_bind_param(
            $stmt,
            "ssssssssssssi",
            $titulo, $subtitulo, $resumodestaque,
            $paragrafo1, $paragrafo2, $paragrafo3,
            $paragrafo4, $paragrafo5, $textodestaque,
            $datacadastro, $categoria, $status,
            $id
        );
    }

    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Erro ao atualizar a notícia no banco de dados.");
    }
    mysqli_stmt_close($stmt);

    header("Location: noticias_listar.php");
    exit;

} catch (Exception $e) {
    echo "<p class='text-danger text-center mt-5'>" . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p class='text-center'><a href='noticias_listar.php' class='btn btn-outline-secondary mt-3'>Voltar</a></p>";
}