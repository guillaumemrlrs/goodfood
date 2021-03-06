<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
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

    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: PlatDansMenu::class, orphanRemoval: true)]
    private $platDansMenus;

    public function __construct()
    {
        $this->platDansMenus = new ArrayCollection();
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

    /**
     * @return Collection|PlatDansMenu[]
     */
    public function getPlatDansMenus(): Collection
    {
        return $this->platDansMenus;
    }

    public function addPlatDansMenu(PlatDansMenu $platDansMenu): self
    {
        if (!$this->platDansMenus->contains($platDansMenu)) {
            $this->platDansMenus[] = $platDansMenu;
            $platDansMenu->setMenu($this);
        }

        return $this;
    }

    public function removePlatDansMenu(PlatDansMenu $platDansMenu): self
    {
        if ($this->platDansMenus->removeElement($platDansMenu)) {
            // set the owning side to null (unless already changed)
            if ($platDansMenu->getMenu() === $this) {
                $platDansMenu->setMenu(null);
            }
        }

        return $this;
    }
}
