<?php

namespace App\Action\SignUp;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * @author Jhon Mike <developer@jhonmike.com.br>
 */
class Service 
{
    private $gateway;

    public function __construct($gateway)
    {
        $this->gateway = $gateway;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ) : JsonResponse
    {
        $email = $request->getAttribute('email');
        $password = $request->getAttribute('password');
        $entity = $this->gateway->getUserByEmailAndPassword($email, $password);

        if ($entity) {
            return new JsonResponse(['error' => 'Falha o tentar logar!']);
        }

        return new JsonResponse($entity);
    }
}
