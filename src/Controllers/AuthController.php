<?php

namespace Src\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Src\DAO\AuthDAO;
use Src\DAO\TokenDAO;
use Src\Middlewares\JwtGenerator;

final class AuthController
{
    private AuthDAO $authDAO;
    private TokenDAO $tokenDAO;
    private JwtGenerator $jwtGenerator;

    public function __construct(AuthDAO $authDAO, TokenDAO $tokenDAO, JwtGenerator $jwtGenerator)
    {
        $this->authDAO = $authDAO;

        $this->tokenDAO = $tokenDAO;

        $this->jwtGenerator = $jwtGenerator;

    }


    public function login(Request $request, Response $response, array $args): Response
    {
        try {
            $params = json_decode($request->getBody(), true);

            if (!isset($params['email']) || !isset($params['password'])) {
                $response = $response->withStatus(400);
                return $response;
            }
            $user = $this->authDAO->auth($params['email'], $params['password']);
            $token = $this->jwtGenerator->generateTokenModel($user->getEmail());  
            $this->tokenDAO->saveOrUpdate($token);
            $response->getBody()->write(json_encode(['accessToken' => $token->getAccessToken(), 'refreshToken' => $token->getRefreshToken()]));
            return $response
                      ->withHeader('Content-Type', 'application/json');
        } catch (\Throwable $th) {
            $response = $response->withStatus(400);
            return $response;
        }
    }

}
