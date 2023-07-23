<?php

namespace Src\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Src\DAO\UserDAO;

final class UserController
{


    public function algo(Request $request, Response $response, array $args): Response
    {

        $response->getBody()->write("Controller teste");

        return $response;
    }
    public function getUsers(Request $request, Response $response, array $args): Response
    {

        $usersDAO = new UserDAO();
        $result = $usersDAO->getAll();
        $response = $response->withBody($result);

        return $response;
    }

}
