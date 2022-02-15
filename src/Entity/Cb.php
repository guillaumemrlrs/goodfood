<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cb
 *
 * @ORM\Table(name="cb")
 * @ORM\Entity
 */
class Cb
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_cb", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCb;

    /**
     * @var string
     *
     * @ORM\Column(name="num_cb", type="string", length=16, nullable=false)
     */
    private $numCb;

    /**
     * @var string
     *
     * @ORM\Column(name="titulaire_cb", type="string", length=50, nullable=false)
     */
    private $titulaireCb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_validite_cb", type="date", nullable=false)
     */
    private $dateValiditeCb;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="TypePaiement", inversedBy="idCb")
     * @ORM\JoinTable(name="etre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_cb", referencedColumnName="id_cb")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_type_paiement", referencedColumnName="id_type_paiement")
     *   }
     * )
     */
    private $idTypePaiement;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idTypePaiement = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdCb(): ?int
    {
        return $this->idCb;
    }

    public function getNumCb(): ?string
    {
        return $this->numCb;
    }

    public function setNumCb(string $numCb): self
    {
        $this->numCb = $numCb;

        return $this;
    }

    public function getTitulaireCb(): ?string
    {
        return $this->titulaireCb;
    }

    public function setTitulaireCb(string $titulaireCb): self
    {
        $this->titulaireCb = $titulaireCb;

        return $this;
    }

    public function getDateValiditeCb(): ?\DateTimeInterface
    {
        return $this->dateValiditeCb;
    }

    public function setDateValiditeCb(\DateTimeInterface $dateValiditeCb): self
    {
        $this->dateValiditeCb = $dateValiditeCb;

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
        }

        return $this;
    }

    public function removeIdTypePaiement(TypePaiement $idTypePaiement): self
    {
        $this->idTypePaiement->removeElement($idTypePaiement);

        return $this;
    }

}
