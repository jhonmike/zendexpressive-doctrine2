<?php

namespace App\Container;

use Doctrine\Common\Cache\ArrayCache;
use Interop\Container\ContainerInterface;

/**
 * @author Jhon Mike <developer@jhonmike.com.br>
 */
class DoctrineArrayCacheFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new ArrayCache();
    }
}
