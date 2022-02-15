<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="menu")
 * @ORM\Entity
 */
class Menu
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_menu", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMenu;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=50, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="blob", length=65535, nullable=false)
     */
    private $image;

    /**
     * @var bool
     *
     * @ORM\Column(name="disponible", type="boolean", nullable=false)
     */
    private $disponible;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Ingredient", mappedBy="idMenu")
     */
    private $idIngredient;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Plat", mappedBy="idMenu")
     */
    private $idPlat;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idIngredient = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idPlat = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdMenu(): ?int
    {
        return $this->idMenu;
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
            $idIngredient->addIdMenu($this);
        }

        return $this;
    }

    public function removeIdIngredient(Ingredient $idIngredient): self
    {
        if ($this->idIngredient->removeElement($idIngredient)) {
            $idIngredient->removeIdMenu($this);
        }

        return $this;
    }

    /**
     * @return Collection|Plat[]
     */
    public function getIdPlat(): Collection
    {
        return $this->idPlat;
    }

    public function addIdPlat(Plat $idPlat): self
    {
        if (!$this->idPlat->contains($idPlat)) {
            $this->idPlat[] = $idPlat;
            $idPlat->addIdMenu($this);
        }

        return $this;
    }

    public function removeIdPlat(Plat $idPlat): self
    {
        if ($this->idPlat->removeElement($idPlat)) {
            $idPlat->removeIdMenu($this);
        }

        return $this;
    }

}
