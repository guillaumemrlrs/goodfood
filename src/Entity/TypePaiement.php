<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TypePaiement
 *
 * @ORM\Table(name="type_paiement")
 * @ORM\Entity
 */
class TypePaiement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_type_paiement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypePaiement;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_type_paiement", type="string", length=50, nullable=false)
     */
    private $libelleTypePaiement;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Cb", mappedBy="idTypePaiement")
     */
    private $idCb;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CommandeClient", inversedBy="idTypePaiement")
     * @ORM\JoinTable(name="relier",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_type_paiement", referencedColumnName="id_type_paiement")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_commande", referencedColumnName="id_commande")
     *   }
     * )
     */
    private $idCommande;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCb = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idCommande = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdTypePaiement(): ?int
    {
        return $this->idTypePaiement;
    }

    public function getLibelleTypePaiement(): ?string
    {
        return $this->libelleTypePaiement;
    }

    public function setLibelleTypePaiement(string $libelleTypePaiement): self
    {
        $this->libelleTypePaiement = $libelleTypePaiement;

        return $this;
    }

    /**
     * @return Collection|Cb[]
     */
    public function getIdCb(): Collection
    {
        return $this->idCb;
    }

    public function addIdCb(Cb $idCb): self
    {
        if (!$this->idCb->contains($idCb)) {
            $this->idCb[] = $idCb;
            $idCb->addIdTypePaiement($this);
        }

        return $this;
    }

    public function removeIdCb(Cb $idCb): self
    {
        if ($this->idCb->removeElement($idCb)) {
            $idCb->removeIdTypePaiement($this);
        }

        return $this;
    }

    /**
     * @return Collection|CommandeClient[]
     */
    public function getIdCommande(): Collection
    {
        return $this->idCommande;
    }

    public function addIdCommande(CommandeClient $idCommande): self
    {
        if (!$this->idCommande->contains($idCommande)) {
            $this->idCommande[] = $idCommande;
        }

        return $this;
    }

    public function removeIdCommande(CommandeClient $idCommande): self
    {
        $this->idCommande->removeElement($idCommande);

        return $this;
    }

}
