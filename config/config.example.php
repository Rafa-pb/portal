<?php

if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 86400,
        'path' => '/',
        'domain' => '', 
        'secure' => isset($_SERVER['HTTPS']), // Só transmite cookies por HTTPS
        'httponly' => true, // Impede roubo de sessão via XSS (JavaScript)
        'samesite' => 'Strict' // Proteção contra ataques CSRF
    ]);
}

// Cabeçalhos de Segurança HTTP Globais
header('X-Frame-Options: SAMEORIGIN'); // Impede Clickjacking
header('X-Content-Type-Options: nosniff'); // Impede MIME Sniffing
header('X-XSS-Protection: 1; mode=block'); // Filtro XSS básico dos navegadores

ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../logs/php-error.log'); 
error_reporting(E_ALL);

date_default_timezone_set('America/Recife');

define('BASE_URL', '/caminho/do/seu/projeto/public/');

// ==========================================
// CONFIGURAÇÕES DE BANCO DE DADOS
// ==========================================
$host = "127.0.0.1:3306";
$usuario = "seu_usuario_aqui"; 
$senha = "sua_senha_aqui";       
$banco = "nome_do_banco_aqui";

$conn = mysqli_connect($host, $usuario, $senha, $banco);

if (!$conn) {
    error_log("Falha crítica de BD: " . mysqli_connect_error());
    die("Erro interno do servidor. Por favor, tente novamente mais tarde.");
}

$conn->set_charset("utf8");
$conn->query("SET NAMES 'utf8'");
$conn->query("SET character_set_connection=utf8");
$conn->query("SET character_set_client=utf8");
$conn->query("SET character_set_results=utf8");