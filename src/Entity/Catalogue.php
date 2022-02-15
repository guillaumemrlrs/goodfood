<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Catalogue
 *
 * @ORM\Table(name="catalogue", indexes={@ORM\Index(name="Catalogue_Menu1_FK", columns={"id_menu"}), @ORM\Index(name="Catalogue_Plat2_FK", columns={"id_plat"}), @ORM\Index(name="IDX_59A699F54E1F92E8", columns={"id_restaurant"})})
 * @ORM\Entity
 */
class Catalogue
{
    /**
     * @var \Menu
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Menu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_menu", referencedColumnName="id_menu")
     * })
     */
    private $idMenu;

    /**
     * @var \Restaurant
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Restaurant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_restaurant", referencedColumnName="id_restaurant")
     * })
     */
    private $idRestaurant;

    /**
     * @var \Plat
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Plat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_plat", referencedColumnName="id_plat")
     * })
     */
    private $idPlat;

    public function getIdMenu(): ?Menu
    {
        return $this->idMenu;
    }

    public function setIdMenu(?Menu $idMenu): self
    {
        $this->idMenu = $idMenu;

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

    public function getIdPlat(): ?Plat
    {
        return $this->idPlat;
    }

    public function setIdPlat(?Plat $idPlat): self
    {
        $this->idPlat = $idPlat;

        return $this;
    }




}
