<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContenirQuantite
 *
 * @ORM\Table(name="contenir_quantite", indexes={@ORM\Index(name="Contenir_quantite_Plat3_FK", columns={"id_plat"}), @ORM\Index(name="Contenir_quantite_Menu1_FK", columns={"id_menu"}), @ORM\Index(name="Contenir_quantite_Commande_client2_FK", columns={"id_commande"}), @ORM\Index(name="IDX_4A1446B62FBB81F", columns={"id_panier"})})
 * @ORM\Entity
 */
class ContenirQuantite
{
    /**
     * @var int
     *
     * @ORM\Column(name="Quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var \CommandeClient
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="CommandeClient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_commande", referencedColumnName="id_commande")
     * })
     */
    private $idCommande;

    /**
     * @var \Panier
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Panier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_panier", referencedColumnName="id_panier")
     * })
     */
    private $idPanier;

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

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getIdCommande(): ?CommandeClient
    {
        return $this->idCommande;
    }

    public function setIdCommande(?CommandeClient $idCommande): self
    {
        $this->idCommande = $idCommande;

        return $this;
    }

    public function getIdPanier(): ?Panier
    {
        return $this->idPanier;
    }

    public function setIdPanier(?Panier $idPanier): self
    {
        $this->idPanier = $idPanier;

        return $this;
    }

    public function getIdMenu(): ?Menu
    {
        return $this->idMenu;
    }

    public function setIdMenu(?Menu $idMenu): self
    {
        $this->idMenu = $idMenu;

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
