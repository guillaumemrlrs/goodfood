<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier", uniqueConstraints={@ORM\UniqueConstraint(name="Panier_Utilisateur0_AK", columns={"id_utilisateur"})}, indexes={@ORM\Index(name="Panier_Reduction1_FK", columns={"id_reduction"})})
 * @ORM\Entity
 */
class Panier
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_panier", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPanier;

    /**
     * @var \Reduction
     *
     * @ORM\ManyToOne(targetEntity="Reduction")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_reduction", referencedColumnName="id_reduction")
     * })
     */
    private $idReduction;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur")
     * })
     */
    private $idUtilisateur;

    public function getIdPanier(): ?int
    {
        return $this->idPanier;
    }

    public function getIdReduction(): ?Reduction
    {
        return $this->idReduction;
    }

    public function setIdReduction(?Reduction $idReduction): self
    {
        $this->idReduction = $idReduction;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }


}
