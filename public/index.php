<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/core/Security.php';
require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../config/routes.php';

Security::applyHeaders();

$router = new Router($routes);
$router->dispatch($_SERVER['REQUEST_URI']);
