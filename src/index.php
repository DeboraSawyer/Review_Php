<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\UserController;

$userController = new UserController();

echo "\n<h1>Perfis de Usuários</h1>\n";

$userController->showUser(1);

echo "\n<hr>\n";

$userController->showUser(2);

echo "\n<hr>\n";

echo "\n\n";
$userController->showUser(-1);

echo "\n<hr>\n";

echo "\n\n";
$userController->showUser(15);

echo "\n<hr>\n";

echo "\n\n";
$userController->showUser(0);

echo "\n<hr>\n";
$userController->showUser(999);

echo "\n<hr>\n";