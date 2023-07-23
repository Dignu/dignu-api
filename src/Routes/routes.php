<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

use Src\Controllers\{
    UserController
};


return function (App $app) {
    $app->get('/', function (Request $request, Response $response, $args) {
        $response->getBody()->write("Welcome to DignuAPI, more information in: github.com/Dignu");
        return $response;
    });
    $app->group('/v1', function (RouteCollectorProxy $group) {
        $group->get('/', function ($request, $response, array $args) {
            $response->getBody()->write("Welcome to DignuAPI v1, more information in: github.com/Dignu");
            return $response;
        });
        $group->get('/auth', function ($request, $response, array $args) {
            $response->getBody()->write("Welcome to DignuAPI auth, more information in: github.com/Dignu");

            return $response;
        });
        $group->get('/user', UserController::class . ':algo');
    });
};
