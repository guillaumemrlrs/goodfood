<?php

namespace App\Entity;

use App\Repository\PlatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlatRepository::class)]
class Plat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\Column(type: 'float')]
    private $prix;

    #[ORM\Column(type: 'blob')]
    private $image;

    #[ORM\Column(type: 'boolean')]
    private $disponible;

    #[ORM\ManyToOne(targetEntity: Categorie::class, inversedBy: 'plats')]
    #[ORM\JoinColumn(nullable: false)]
    private $categorie;

    #[ORM\OneToMany(mappedBy: 'plat', targetEntity: PlatComposeIngredient::class, orphanRemoval: true)]
    private $platComposeIngredients;

    public function __construct()
    {
        $this->platComposeIngredients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDisponible(): ?bool
    {
        return $this->disponible;
    }

    public function setDisponible(bool $disponible): self
    {
        $this->disponible = $disponible;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|PlatComposeIngredient[]
     */
    public function getPlatComposeIngredients(): Collection
    {
        return $this->platComposeIngredients;
    }

    public function addPlatComposeIngredient(PlatComposeIngredient $platComposeIngredient): self
    {
        if (!$this->platComposeIngredients->contains($platComposeIngredient)) {
            $this->platComposeIngredients[] = $platComposeIngredient;
            $platComposeIngredient->setPlat($this);
        }

        return $this;
    }

    public function removePlatComposeIngredient(PlatComposeIngredient $platComposeIngredient): self
    {
        if ($this->platComposeIngredients->removeElement($platComposeIngredient)) {
            // set the owning side to null (unless already changed)
            if ($platComposeIngredient->getPlat() === $this) {
                $platComposeIngredient->setPlat(null);
            }
        }

        return $this;
    }
}
