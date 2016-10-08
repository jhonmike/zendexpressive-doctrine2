<?php

namespace App\Action\User;

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

    public function getUsers() : array
    {
        $userRepository = $this->em->getRepository(\App\Entity\User::class);
        return $userRepository->findAll();
    }
}
