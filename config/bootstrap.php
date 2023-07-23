<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Carregue o container a partir do arquivo container.php
$container = require __DIR__ . '/../config/container.php';

// Crie a instância do aplicativo Slim com o container configurado
AppFactory::setContainer($container);
$app = AppFactory::create();

// Injete o container nas suas rotas e middlewares, conforme necessário
$routes = require __DIR__ . '/../src/Routes/routes.php';
$routes($app);

$app->run();