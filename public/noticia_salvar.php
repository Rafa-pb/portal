<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

include __DIR__ . '/../config/config.php';

$id = $_POST['idNoticia'] ?? 0;
try {
    $campos = [
        'titulo', 'subtitulo', 'resumodestaque', 'paragrafo1', 'paragrafo2', 'paragrafo3', 'paragrafo4', 'paragrafo5',
        'textodestaque', 'datacadastro', 'categoria', 'status'
    ];

    $dados = [];
    foreach ($campos as $campo) {
        $dados[$campo] = mysqli_real_escape_string($conn, $_POST[$campo] ?? '');
    }

    if ($id > 0) {
        $set = [];
        foreach ($dados as $col => $val) {
            $set[] = "$col = '$val'";
        }
        $sql = "UPDATE tbnoticias SET " . implode(', ', $set) . " WHERE idNoticia = $id";
    } else {
        $colunas = implode(', ', array_keys($dados));
        $valores = "'" . implode("', '", $dados) . "'";
        $sql = "INSERT INTO tbnoticias ($colunas) VALUES ($valores)";
    }

    if (!mysqli_query($conn, $sql)) {
        throw new Exception('Erro ao salvar notícia: ' . mysqli_error($conn));
    }

    header("Location: noticias_listar.php");
    exit;

} catch (Exception $e) {
    echo "<p class='text-danger text-center mt-5'>" . $e->getMessage() . "</p>";
    echo "<p class='text-center'><a href='noticias_listar.php' class='btn btn-outline-secondary mt-3'>Voltar</a></p>";
}
