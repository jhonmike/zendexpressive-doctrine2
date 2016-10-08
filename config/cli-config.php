<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\EntityManager;

require 'vendor/autoload.php';

$container = require 'config/container.php';

$em = $container->get(EntityManager::class);

return ConsoleRunner::createHelperSet($em);
