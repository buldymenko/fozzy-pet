<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="kind_pets")
 * @ORM\Entity(repositoryClass="App\Repository\KindPetRepository")
 */

class KindPet
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * @ORM\Column(type="string", name="kind_pet_name", unique=true)
     */
    protected $kindOfPet;
    /**
     * @ORM\Column(type="string", name="voice")
     */
    protected $voice;

    public function getId()
    {
        return $this->id;
    }

    public function getKindOfPet()
    {
        return $this->kindOfPet;
    }

    public function setKindOfPet($kindOfPet)
    {
        $this->kindOfPet = $kindOfPet;
    }

    public function getVoice()
    {
        return $this->voice;
    }

    public function setVoice($voice)
    {
        $this->voice = $voice;
    }

}