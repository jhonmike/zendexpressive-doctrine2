<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\ZendRouter::class,
            App\Action\Home\Service::class => App\Action\Home\Service::class
        ],
        'factories' => [
            App\Action\User\Service::class => App\Action\User\Factory::class,
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => App\Action\Home\Service::class,
            'allowed_methods' => ['GET'],
        ],
        [
             'name' => 'user',
             'path' => '/user',
             'middleware' => App\Action\User\Service::class,
             'allowed_methods' => ['GET'],
         ],
    ],
];
