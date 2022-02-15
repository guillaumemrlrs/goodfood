<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adresse
 *
 * @ORM\Table(name="adresse")
 * @ORM\Entity
 */
class Adresse
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_adresse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAdresse;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_adresse", type="string", length=70, nullable=false)
     */
    private $nomAdresse;

    /**
     * @var string
     *
     * @ORM\Column(name="ligne1", type="string", length=70, nullable=false)
     */
    private $ligne1;

    /**
     * @var string
     *
     * @ORM\Column(name="ligne2", type="string", length=70, nullable=false)
     */
    private $ligne2;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=70, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postal", type="string", length=70, nullable=false)
     */
    private $codePostal;

    public function getIdAdresse(): ?int
    {
        return $this->idAdresse;
    }

    public function getNomAdresse(): ?string
    {
        return $this->nomAdresse;
    }

    public function setNomAdresse(string $nomAdresse): self
    {
        $this->nomAdresse = $nomAdresse;

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


}
