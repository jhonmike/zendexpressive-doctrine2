<?php

namespace AppTest\Action\User;

use App\Action\User\Gateway;
use App\Action\User\Service;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;

/**
 * @author Jhon Mike <developer@jhonmike.com.br>
 */
class ServiceTest extends \PHPUnit_Framework_TestCase
{
    use \AppTest\Helper\UserTrait;

    private $gateway;

    protected function setUp()
    {
        $user = $this->buildUser();
        $this->gateway = $this->prophesize(Gateway::class);
        $this->gateway->getUsers()->willReturn([$user]);
    }

    public function testResponse()
    {
        $service = new Service($this->gateway->reveal());
        $response = $service(new ServerRequest(['/user']), new Response(), function () {});
        static::assertTrue($response instanceof Response);
    }
}
