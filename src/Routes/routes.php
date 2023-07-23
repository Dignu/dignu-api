<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
        $app->get('/', function (Request $request, Response $response, $args) {
            $response->getBody()->write("Welcome to DignuAPI, more information in: github.com/Dignu");
            return $response;
        });

        


    
};