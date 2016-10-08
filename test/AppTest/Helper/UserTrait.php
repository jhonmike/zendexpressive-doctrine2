<?php

namespace AppTest\Helper;

use App\Entity\User;

/**
 * @author Jhon Mike <developer@jhonmike.com.br>
 */
trait UserTrait
{
    private $defaultData = [
        'name' => 'Jhon Mike'
    ];

    private function buildUser(array $data = []) : User
    {
        $data = array_merge($this->defaultData, $data);

        $user = new User();
        $user->setName($data['name']);

        return $user;
    }
}
