<?php

namespace App\Entity;

use App\Repository\CommandeFournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeFournisseurRepository::class)]
class CommandeFournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $dateCreation;

    #[ORM\ManyToOne(targetEntity: Restaurant::class, inversedBy: 'commandeFournisseurs')]
    private $restaurant;

    #[ORM\ManyToOne(targetEntity: Fournisseur::class, inversedBy: 'commandeFournisseurs')]
    #[ORM\JoinColumn(nullable: false)]
    private $fournisseur;

    #[ORM\OneToMany(mappedBy: 'commandeFournisseur', targetEntity: LigneIngredient::class, orphanRemoval: true)]
    private $ligneIngredients;

    public function __construct()
    {
        $this->ligneIngredients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * @return Collection|LigneIngredient[]
     */
    public function getLigneIngredients(): Collection
    {
        return $this->ligneIngredients;
    }

    public function addLigneIngredient(LigneIngredient $ligneIngredient): self
    {
        if (!$this->ligneIngredients->contains($ligneIngredient)) {
            $this->ligneIngredients[] = $ligneIngredient;
            $ligneIngredient->setCommandeFournisseur($this);
        }

        return $this;
    }

    public function removeLigneIngredient(LigneIngredient $ligneIngredient): self
    {
        if ($this->ligneIngredients->removeElement($ligneIngredient)) {
            // set the owning side to null (unless already changed)
            if ($ligneIngredient->getCommandeFournisseur() === $this) {
                $ligneIngredient->setCommandeFournisseur(null);
            }
        }

        return $this;
    }
}
