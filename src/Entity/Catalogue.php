<?php

namespace App\Entity;

use App\Repository\CatalogueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CatalogueRepository::class)]
class Catalogue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToMany(targetEntity: Plat::class)]
    private $plat;

    #[ORM\ManyToMany(targetEntity: Menu::class)]
    private $menu;

    #[ORM\OneToOne(mappedBy: 'catalogue', targetEntity: Restaurant::class, cascade: ['persist', 'remove'])]
    private $restaurant;

    public function __construct()
    {
        $this->plat = new ArrayCollection();
        $this->menu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Plat[]
     */
    public function getPlat(): Collection
    {
        return $this->plat;
    }

    public function addPlat(Plat $plat): self
    {
        if (!$this->plat->contains($plat)) {
            $this->plat[] = $plat;
        }

        return $this;
    }

    public function removePlat(Plat $plat): self
    {
        $this->plat->removeElement($plat);

        return $this;
    }

    /**
     * @return Collection|Menu[]
     */
    public function getMenu(): Collection
    {
        return $this->menu;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menu->contains($menu)) {
            $this->menu[] = $menu;
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        $this->menu->removeElement($menu);

        return $this;
    }

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        // unset the owning side of the relation if necessary
        if ($restaurant === null && $this->restaurant !== null) {
            $this->restaurant->setCatalogue(null);
        }

        // set the owning side of the relation if necessary
        if ($restaurant !== null && $restaurant->getCatalogue() !== $this) {
            $restaurant->setCatalogue($this);
        }

        $this->restaurant = $restaurant;

        return $this;
    }
}
