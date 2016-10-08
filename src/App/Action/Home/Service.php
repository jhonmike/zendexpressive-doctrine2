<?php

namespace App\Action\Home;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * @author Jhon Mike <developer@jhonmike.com.br>
 */
class Service
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ) : JsonResponse
    {
        return new JsonResponse([
            'welcome' => 'Congratulations! You have installed the zend-expressive skeleton application.',
            'docsUrl' => 'zend-expressive.readthedocs.org',
        ]);
    }
}