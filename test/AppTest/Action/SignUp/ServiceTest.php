<?php

namespace AppTest\Action\SignUp;

use App\Action\SignUp\Gateway;
use App\Action\SignUp\Service;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;

/**
 * @author Jhon Mike <developer@jhonmike.com.br>
 */
class ServiceTest extends \PHPUnit_Framework_TestCase
{
    use \AppTest\Helper\UserTrait;

    public function testSignUp()
    {
        $user = $this->buildUser();
        $gateway = $this->prophesize(Gateway::class);
        $gateway->getUserByEmailAndPassword(\Prophecy\Argument::type('string'), \Prophecy\Argument::type('string'))->willReturn([$user]);

        $request = new ServerRequest(['/signup']);
        $request = $request->withQueryParams(['email' => 'maka']);

        $service = new Service($gateway->reveal());
        $response = $service($request, new Response(), function () {});
        static::assertTrue($response instanceof Response);
    }
}
