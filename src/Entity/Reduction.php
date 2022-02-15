<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reduction
 *
 * @ORM\Table(name="reduction")
 * @ORM\Entity
 */
class Reduction
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_reduction", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReduction;

    /**
     * @var string
     *
     * @ORM\Column(name="code_reduction", type="string", length=50, nullable=false)
     */
    private $codeReduction;

    /**
     * @var int
     *
     * @ORM\Column(name="pourcentage_reduction", type="integer", nullable=false)
     */
    private $pourcentageReduction;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_expiration_reduction", type="datetime", nullable=false)
     */
    private $dateExpirationReduction;

    public function getIdReduction(): ?int
    {
        return $this->idReduction;
    }

    public function getCodeReduction(): ?string
    {
        return $this->codeReduction;
    }

    public function setCodeReduction(string $codeReduction): self
    {
        $this->codeReduction = $codeReduction;

        return $this;
    }

    public function getPourcentageReduction(): ?int
    {
        return $this->pourcentageReduction;
    }

    public function setPourcentageReduction(int $pourcentageReduction): self
    {
        $this->pourcentageReduction = $pourcentageReduction;

        return $this;
    }

    public function getDateExpirationReduction(): ?\DateTimeInterface
    {
        return $this->dateExpirationReduction;
    }

    public function setDateExpirationReduction(\DateTimeInterface $dateExpirationReduction): self
    {
        $this->dateExpirationReduction = $dateExpirationReduction;

        return $this;
    }


}
