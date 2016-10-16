<?php

namespace App\Action\SignUp;

use Doctrine\ORM\EntityManager;

/**
 * @author Jhon Mike <developer@jhonmike.com.br>
 */
class Gateway
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getUserByEmailAndPassword(string $email, string $password) : array
    {
        return [];
    }
}
