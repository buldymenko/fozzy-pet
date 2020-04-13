<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use App\Entity\KindPet;

/**
 * @ORM\Entity
 * @ORM\Table(name="my_pets")
 * @ORM\Entity(repositoryClass="App\Repository\MyPetRepository")
 */
class MyPet
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="KindPet")
     * @JoinColumn(name="kind_pet_id", referencedColumnName="id", nullable=true)
     */
    protected $kindOfPet;
    /**
     * @ORM\Column(type="string", name="nickname")
     */
    protected $nickname;

    public function getId()
    {
        return $this->id;
    }

    public function getKindOfPet() :KindPet
    {
        return $this->kindOfPet;
    }

    public function setKindOfPet(KindPet $kindOfPet)
    {
        $this->kindOfPet = $kindOfPet;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }
}