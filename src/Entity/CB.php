<?php

namespace App\Entity;

use App\Repository\CBRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CBRepository::class)]
class CB
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 20)]
    private $numero;

    #[ORM\Column(type: 'string', length: 50)]
    private $titulaire;

    #[ORM\Column(type: 'string', length: 10)]
    private $dateValidite;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'cartesBancaires')]
    private $utilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getTitulaire(): ?string
    {
        return $this->titulaire;
    }

    public function setTitulaire(string $titulaire): self
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    public function getDateValidite(): ?string
    {
        return $this->dateValidite;
    }

    public function setDateValidite(string $dateValidite): self
    {
        $this->dateValidite = $dateValidite;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
