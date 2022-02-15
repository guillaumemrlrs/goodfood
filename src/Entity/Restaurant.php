<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restaurant
 *
 * @ORM\Table(name="restaurant", indexes={@ORM\Index(name="Restaurant_Groupement0_FK", columns={"id_groupement"})})
 * @ORM\Entity
 */
class Restaurant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_restaurant", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRestaurant;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_restaurant", type="string", length=50, nullable=false)
     */
    private $nomRestaurant;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=50, nullable=false)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="ligne1", type="string", length=50, nullable=false)
     */
    private $ligne1;

    /**
     * @var string
     *
     * @ORM\Column(name="ligne2", type="string", length=50, nullable=false)
     */
    private $ligne2;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=50, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postal", type="string", length=50, nullable=false)
     */
    private $codePostal;

    /**
     * @var \Groupement
     *
     * @ORM\ManyToOne(targetEntity="Groupement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_groupement", referencedColumnName="id_groupement")
     * })
     */
    private $idGroupement;

    public function getIdRestaurant(): ?int
    {
        return $this->idRestaurant;
    }

    public function getNomRestaurant(): ?string
    {
        return $this->nomRestaurant;
    }

    public function setNomRestaurant(string $nomRestaurant): self
    {
        $this->nomRestaurant = $nomRestaurant;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getLigne1(): ?string
    {
        return $this->ligne1;
    }

    public function setLigne1(string $ligne1): self
    {
        $this->ligne1 = $ligne1;

        return $this;
    }

    public function getLigne2(): ?string
    {
        return $this->ligne2;
    }

    public function setLigne2(string $ligne2): self
    {
        $this->ligne2 = $ligne2;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getIdGroupement(): ?Groupement
    {
        return $this->idGroupement;
    }

    public function setIdGroupement(?Groupement $idGroupement): self
    {
        $this->idGroupement = $idGroupement;

        return $this;
    }

    public function __toString(): string
    {
        return $this->nomRestaurant;
    }


}
