<?php

namespace AppTest\Action\Home;

use App\Action\Home\Service;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;
use Zend\Expressive\Router\RouterInterface;

/**
 * @author Jhon Mike <developer@jhonmike.com.br>
 */
class ServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testResponse()
    {
        $service = new Service();
        $response = $service(new ServerRequest(['/']), new Response(), function () {});
        static::assertTrue($response instanceof Response);
    }
}
