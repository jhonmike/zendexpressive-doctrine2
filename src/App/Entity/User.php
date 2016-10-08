<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Jhon Mike <developer@jhonmike.com.br>
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name) : User
    {
        $this->name = $name;
        return $this;
    }

    public function toArray() : array
    {
        return array(
            'id'   => $this->getId(),
            'name' => $this->getName(),
        );
    }
}
