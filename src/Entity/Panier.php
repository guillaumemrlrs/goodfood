<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToMany(mappedBy: 'panier', targetEntity: ContenirQuantite::class)]
    private $contenirQuantites;

    #[ORM\OneToOne(inversedBy: 'panier', targetEntity: Utilisateur::class, cascade: ['persist', 'remove'])]
    private $utilisateur;

    public function __construct()
    {
        $this->contenirQuantites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|ContenirQuantite[]
     */
    public function getContenirQuantites(): Collection
    {
        return $this->contenirQuantites;
    }

    public function addContenirQuantite(ContenirQuantite $contenirQuantite): self
    {
        if (!$this->contenirQuantites->contains($contenirQuantite)) {
            $this->contenirQuantites[] = $contenirQuantite;
            $contenirQuantite->setPanier($this);
        }

        return $this;
    }

    public function removeContenirQuantite(ContenirQuantite $contenirQuantite): self
    {
        if ($this->contenirQuantites->removeElement($contenirQuantite)) {
            // set the owning side to null (unless already changed)
            if ($contenirQuantite->getPanier() === $this) {
                $contenirQuantite->setPanier(null);
            }
        }

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
