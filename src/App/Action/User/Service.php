<?php

namespace App\Action\User;

use Doctrine\ORM\EntityManager;
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
        $users = $this->gateway->getUsers();
        $userArray = [];

        if (count($users) === 0) {
            return new JsonResponse($userArray);
        }

        foreach ($users as $user) {
            $userArray[] = $user->toArray();
        }

        return new JsonResponse($userArray);
    }
}
