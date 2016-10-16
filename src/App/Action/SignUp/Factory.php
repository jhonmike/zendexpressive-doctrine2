<?php

namespace App\Action\SignUp;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

/**
 * @author Jhon Mike <developer@jhonmike.com.br>
 */
class Factory
{
    public function __invoke(ContainerInterface $container) : Service
    {
        $em = $container->get(EntityManager::class);
        $gateway = new Gateway($em);
        return new Service($gateway);
    }
}
