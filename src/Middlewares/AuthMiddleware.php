<?php

namespace Src\Middlewares;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

use Psr\Http\Message\ResponseInterface as Response;
use Src\DAO\TokenDAO;

final class AuthMiddleware
{
    private TokenDAO $tokenDAO;

    public function __construct(TokenDAO $tokenDAO)
    {
        $this->tokenDAO = $tokenDAO;
    }

    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        // Obter o cabeçalho Authorization
        $authorizationHeader = $request->getHeaderLine('Authorization');

        // Obter o e-mail do cabeçalho
        $emailHeader = $request->getHeaderLine('email');

        // Verificar se o cabeçalho Authorization existe e possui o formato correto
        if (empty($authorizationHeader) || !preg_match('/Bearer\s+(.*)$/i', $authorizationHeader, $matches)) {
            throw new \Exception("Invalid authorization header.");
        }

        // Obter o token do cabeçalho
        $accessToken = $matches[1];

        // Verificar se o token é válido
        $this->tokenDAO->checkIfAccessTokenIsValid($emailHeader, $accessToken);

        // Se o token for válido, prosseguir para o próximo middleware
        return $handler->handle($request);
    }
}
