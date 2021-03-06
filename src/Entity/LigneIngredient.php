<?php

namespace App\Entity;

use App\Repository\LigneIngredientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneIngredientRepository::class)]
class LigneIngredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $quantite;

    #[ORM\Column(type: 'float')]
    private $prix;

    #[ORM\OneToOne(targetEntity: Ingredient::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $ingredient;

    #[ORM\ManyToOne(targetEntity: CommandeFournisseur::class, inversedBy: 'ligneIngredients')]
    #[ORM\JoinColumn(nullable: false)]
    private $commandeFournisseur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getIngredient(): ?Ingredient
    {
        return $this->ingredient;
    }

    public function setIngredient(Ingredient $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getCommandeFournisseur(): ?CommandeFournisseur
    {
        return $this->commandeFournisseur;
    }

    public function setCommandeFournisseur(?CommandeFournisseur $commandeFournisseur): self
    {
        $this->commandeFournisseur = $commandeFournisseur;

        return $this;
    }
}
