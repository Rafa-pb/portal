<?php

// Exibir todos os erros (desativar em produção)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Definir o fuso horário
date_default_timezone_set('America/Recife');

// Caminho base da aplicação
define('BASE_URL', '/portal/public/');

// Conexão com o banco de dados
$host = "localhost:3306";
$usuario = "root";
$senha = "coloqueSenha";
$banco = "db_portal22";

// Conectar ao banco
$conn = mysqli_connect($host, $usuario, $senha, $banco);

// Verificar se houve erro de conexão
if (!$conn) {
    die("Erro ao conectar com o banco de dados: " . mysqli_connect_error());
}

// Charset da conexão
$conn->set_charset("utf8");
$conn->query("SET NAMES 'utf8'");
$conn->query("SET character_set_connection=utf8");
$conn->query("SET character_set_client=utf8");
$conn->query("SET character_set_results=utf8");
