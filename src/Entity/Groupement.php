<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupement
 *
 * @ORM\Table(name="groupement")
 * @ORM\Entity
 */
class Groupement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_groupement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idGroupement;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_groupement", type="string", length=50, nullable=false)
     */
    private $nomGroupement;

    public function getIdGroupement(): ?int
    {
        return $this->idGroupement;
    }

    public function getNomGroupement(): ?string
    {
        return $this->nomGroupement;
    }

    public function setNomGroupement(string $nomGroupement): self
    {
        $this->nomGroupement = $nomGroupement;

        return $this;
    }

    public function __toString(): string
    {
        return $this->nomGroupement;
    }


}
