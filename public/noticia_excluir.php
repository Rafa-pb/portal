<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

include __DIR__ . '/../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

    if ($id > 0) {
        // Busca os dados da notícia antes de apagar para checar o autor (IDOR) e pegar a imagem
        $stmtCheck = mysqli_prepare($conn, "SELECT autor, imagemdestaque FROM tbnoticias WHERE idNoticia = ?");
        mysqli_stmt_bind_param($stmtCheck, "i", $id);
        mysqli_stmt_execute($stmtCheck);
        $resCheck = mysqli_stmt_get_result($stmtCheck);
        $rowCheck = mysqli_fetch_assoc($resCheck);
        mysqli_stmt_close($stmtCheck);

        if ($rowCheck) {
            // Proteção IDOR: Bloqueia se o usuário for Editor e estiver tentando apagar a notícia de outro
            if ($_SESSION['usuario_categoria'] !== 'Administrador' && $rowCheck['autor'] !== $_SESSION['usuario_nome']) {
                header("Location: noticias_listar.php");
                exit;
            }

            // ==========================================
            // APAGAR A IMAGEM FÍSICA DO SERVIDOR
            // ==========================================
            if (!empty($rowCheck['imagemdestaque'])) {
                // Monta o caminho completo até a pasta public
                $caminho_arquivo = __DIR__ . '/../public/' . $rowCheck['imagemdestaque'];
                
                // Se o arquivo existir no HD, apaga-o
                if (file_exists($caminho_arquivo)) {
                    unlink($caminho_arquivo);
                }
            }

            // Exclui o registro do banco de dados
            $stmt = mysqli_prepare($conn, "DELETE FROM tbnoticias WHERE idNoticia = ? LIMIT 1");
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
}

header("Location: noticias_listar.php");
exit;