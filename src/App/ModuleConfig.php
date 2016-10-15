<?php

namespace App;

class ModuleConfig
{
    public function __invoke()
    {
        return [
            'dependencies' => [
                'invokables' => [
                    \App\Action\Home\Service::class => \App\Action\Home\Service::class
                ],
                'factories' => [
                    \App\Action\User\Service::class => \App\Action\User\Factory::class,
                ],
            ],
            'routes' => [
                [
                    'name' => 'home',
                    'path' => '/',
                    'middleware' => \App\Action\Home\Service::class,
                    'allowed_methods' => ['GET'],
                ],
                [
                     'name' => 'user',
                     'path' => '/api/user',
                     'middleware' => \App\Action\User\Service::class,
                     'allowed_methods' => ['GET'],
                 ],
            ],
        ];
    }
}