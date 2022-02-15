<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeCommande
 *
 * @ORM\Table(name="type_commande")
 * @ORM\Entity
 */
class TypeCommande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_type_commande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypeCommande;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_type_commande", type="string", length=50, nullable=false)
     */
    private $nomTypeCommande;

    public function getIdTypeCommande(): ?int
    {
        return $this->idTypeCommande;
    }

    public function getNomTypeCommande(): ?string
    {
        return $this->nomTypeCommande;
    }

    public function setNomTypeCommande(string $nomTypeCommande): self
    {
        $this->nomTypeCommande = $nomTypeCommande;

        return $this;
    }


}
