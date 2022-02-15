<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ingredient
 *
 * @ORM\Table(name="ingredient")
 * @ORM\Entity
 */
class Ingredient
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_ingredient", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idIngredient;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_ingredient", type="string", length=50, nullable=false)
     */
    private $nomIngredient;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CommandeFournisseur", mappedBy="idIngredient")
     */
    private $idCommande;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Menu", inversedBy="idIngredient")
     * @ORM\JoinTable(name="contenir",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_ingredient", referencedColumnName="id_ingredient")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_menu", referencedColumnName="id_menu")
     *   }
     * )
     */
    private $idMenu;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCommande = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idMenu = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdIngredient(): ?int
    {
        return $this->idIngredient;
    }

    public function getNomIngredient(): ?string
    {
        return $this->nomIngredient;
    }

    public function setNomIngredient(string $nomIngredient): self
    {
        $this->nomIngredient = $nomIngredient;

        return $this;
    }

    /**
     * @return Collection|CommandeFournisseur[]
     */
    public function getIdCommande(): Collection
    {
        return $this->idCommande;
    }

    public function addIdCommande(CommandeFournisseur $idCommande): self
    {
        if (!$this->idCommande->contains($idCommande)) {
            $this->idCommande[] = $idCommande;
            $idCommande->addIdIngredient($this);
        }

        return $this;
    }

    public function removeIdCommande(CommandeFournisseur $idCommande): self
    {
        if ($this->idCommande->removeElement($idCommande)) {
            $idCommande->removeIdIngredient($this);
        }

        return $this;
    }

    /**
     * @return Collection|Menu[]
     */
    public function getIdMenu(): Collection
    {
        return $this->idMenu;
    }

    public function addIdMenu(Menu $idMenu): self
    {
        if (!$this->idMenu->contains($idMenu)) {
            $this->idMenu[] = $idMenu;
        }

        return $this;
    }

    public function removeIdMenu(Menu $idMenu): self
    {
        $this->idMenu->removeElement($idMenu);

        return $this;
    }

}
