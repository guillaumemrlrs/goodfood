<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatutCommande
 *
 * @ORM\Table(name="statut_commande")
 * @ORM\Entity
 */
class StatutCommande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_statut_commande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStatutCommande;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_statut_commande", type="string", length=50, nullable=false)
     */
    private $libelleStatutCommande;

    public function getIdStatutCommande(): ?int
    {
        return $this->idStatutCommande;
    }

    public function getLibelleStatutCommande(): ?string
    {
        return $this->libelleStatutCommande;
    }

    public function setLibelleStatutCommande(string $libelleStatutCommande): self
    {
        $this->libelleStatutCommande = $libelleStatutCommande;

        return $this;
    }


}
