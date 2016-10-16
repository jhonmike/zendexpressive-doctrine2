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

    public function testResponse()
    {
        $user = $this->buildUser();
        $gateway = $this->prophesize(Gateway::class);
        $gateway->getUsers()->willReturn([$user]);

        $service = new Service($gateway->reveal());
        $response = $service(new ServerRequest(['/user']), new Response(), function () {});
        static::assertTrue($response instanceof Response);
    }

    public function testResult()
    {
        $user = $this->buildUser([
            'name' => 'Teste'
        ]);
        $gateway = $this->prophesize(Gateway::class);
        $gateway->getUsers()->willReturn([$user]);

        $service = new Service($gateway->reveal());
        $response = $service(new ServerRequest(['/user']), new Response(), function () {});

        $json = json_decode((string) $response->getBody());
        static::assertCount(1, $json);
        static::assertSame($json[0]->name, $user->getName());
    }
}
