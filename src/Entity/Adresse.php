<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $nom;

    #[ORM\Column(type: 'string', length: 100)]
    private $ligne1;

    #[ORM\Column(type: 'string', length: 100)]
    private $ligne2;

    #[ORM\Column(type: 'string', length: 50)]
    private $ville;

    #[ORM\Column(type: 'string', length: 50)]
    private $codepostal;

    #[ORM\OneToMany(mappedBy: 'adresse', targetEntity: CommandeClient::class)]
    private $commandesClient;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'adresses')]
    private $utilisateur;

    public function __construct()
    {
        $this->commandesClient = new ArrayCollection();
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

    public function getCodepostal(): ?string
    {
        return $this->codepostal;
    }

    public function setCodepostal(string $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    /**
     * @return Collection|CommandeClient[]
     */
    public function getCommandesClient(): Collection
    {
        return $this->commandesClient;
    }

    public function addCommandesClient(CommandeClient $commandesClient): self
    {
        if (!$this->commandesClient->contains($commandesClient)) {
            $this->commandesClient[] = $commandesClient;
            $commandesClient->setAdresse($this);
        }

        return $this;
    }

    public function removeCommandesClient(CommandeClient $commandesClient): self
    {
        if ($this->commandesClient->removeElement($commandesClient)) {
            // set the owning side to null (unless already changed)
            if ($commandesClient->getAdresse() === $this) {
                $commandesClient->setAdresse(null);
            }
        }

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

    public function __toString(): string
    {
        return $this->getNom();
    }
}
