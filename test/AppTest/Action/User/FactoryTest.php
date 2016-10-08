<?php

namespace AppTest\Action\User;

use App\Action\User\Factory;
use App\Action\User\Service;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

/**
 * @author Jhon Mike <developer@jhonmike.com.br>
 */
class FactoryTest extends \PHPUnit_Framework_TestCase
{
    private $container;

    protected function setUp()
    {
        $this->container = $this->prophesize(ContainerInterface::class);
        $em = $this->prophesize(EntityManager::class);
        $this->container->get(EntityManager::class)->willReturn($em);
    }

    public function testFactory()
    {
        $factory = new Factory();
        static::assertTrue($factory instanceof Factory);
        $service = $factory($this->container->reveal());
        static::assertTrue($service instanceof Service);
    }
}
