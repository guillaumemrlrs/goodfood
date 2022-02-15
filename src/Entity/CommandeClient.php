<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * CommandeClient
 *
 * @ORM\Table(name="commande_client", indexes={@ORM\Index(name="Commande_client_Type_commande0_FK", columns={"id_type_commande"}), @ORM\Index(name="Commande_client_Statut_commande1_FK", columns={"id_statut_commande"})})
 * @ORM\Entity
 */
class CommandeClient
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_commande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime", nullable=false)
     */
    private $dateCreation;

    /**
     * @var \StatutCommande
     *
     * @ORM\ManyToOne(targetEntity="StatutCommande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_statut_commande", referencedColumnName="id_statut_commande")
     * })
     */
    private $idStatutCommande;

    /**
     * @var \TypeCommande
     *
     * @ORM\ManyToOne(targetEntity="TypeCommande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_commande", referencedColumnName="id_type_commande")
     * })
     */
    private $idTypeCommande;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="TypePaiement", mappedBy="idCommande")
     */
    private $idTypePaiement;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idTypePaiement = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdCommande(): ?int
    {
        return $this->idCommande;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getIdStatutCommande(): ?StatutCommande
    {
        return $this->idStatutCommande;
    }

    public function setIdStatutCommande(?StatutCommande $idStatutCommande): self
    {
        $this->idStatutCommande = $idStatutCommande;

        return $this;
    }

    public function getIdTypeCommande(): ?TypeCommande
    {
        return $this->idTypeCommande;
    }

    public function setIdTypeCommande(?TypeCommande $idTypeCommande): self
    {
        $this->idTypeCommande = $idTypeCommande;

        return $this;
    }

    /**
     * @return Collection|TypePaiement[]
     */
    public function getIdTypePaiement(): Collection
    {
        return $this->idTypePaiement;
    }

    public function addIdTypePaiement(TypePaiement $idTypePaiement): self
    {
        if (!$this->idTypePaiement->contains($idTypePaiement)) {
            $this->idTypePaiement[] = $idTypePaiement;
            $idTypePaiement->addIdCommande($this);
        }

        return $this;
    }

    public function removeIdTypePaiement(TypePaiement $idTypePaiement): self
    {
        if ($this->idTypePaiement->removeElement($idTypePaiement)) {
            $idTypePaiement->removeIdCommande($this);
        }

        return $this;
    }

}
