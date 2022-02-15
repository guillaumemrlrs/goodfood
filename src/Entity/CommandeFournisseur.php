<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * CommandeFournisseur
 *
 * @ORM\Table(name="commande_fournisseur", indexes={@ORM\Index(name="Commande_fournisseur_Restaurant0_FK", columns={"id_restaurant"})})
 * @ORM\Entity
 */
class CommandeFournisseur
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
     * @var \Restaurant
     *
     * @ORM\ManyToOne(targetEntity="Restaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_restaurant", referencedColumnName="id_restaurant")
     * })
     */
    private $idRestaurant;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Ingredient", inversedBy="idCommande")
     * @ORM\JoinTable(name="constituer",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_commande", referencedColumnName="id_commande")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_ingredient", referencedColumnName="id_ingredient")
     *   }
     * )
     */
    private $idIngredient;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Fournisseur", inversedBy="idCommande")
     * @ORM\JoinTable(name="gerer",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_commande", referencedColumnName="id_commande")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_fournisseur", referencedColumnName="id_fournisseur")
     *   }
     * )
     */
    private $idFournisseur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idIngredient = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idFournisseur = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getIdRestaurant(): ?Restaurant
    {
        return $this->idRestaurant;
    }

    public function setIdRestaurant(?Restaurant $idRestaurant): self
    {
        $this->idRestaurant = $idRestaurant;

        return $this;
    }

    /**
     * @return Collection|Ingredient[]
     */
    public function getIdIngredient(): Collection
    {
        return $this->idIngredient;
    }

    public function addIdIngredient(Ingredient $idIngredient): self
    {
        if (!$this->idIngredient->contains($idIngredient)) {
            $this->idIngredient[] = $idIngredient;
        }

        return $this;
    }

    public function removeIdIngredient(Ingredient $idIngredient): self
    {
        $this->idIngredient->removeElement($idIngredient);

        return $this;
    }

    /**
     * @return Collection|Fournisseur[]
     */
    public function getIdFournisseur(): Collection
    {
        return $this->idFournisseur;
    }

    public function addIdFournisseur(Fournisseur $idFournisseur): self
    {
        if (!$this->idFournisseur->contains($idFournisseur)) {
            $this->idFournisseur[] = $idFournisseur;
        }

        return $this;
    }

    public function removeIdFournisseur(Fournisseur $idFournisseur): self
    {
        $this->idFournisseur->removeElement($idFournisseur);

        return $this;
    }

}
