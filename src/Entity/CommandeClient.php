<?php

namespace App\Entity;

use App\Repository\CommandeClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeClientRepository::class)]
class CommandeClient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $datecreation;

    #[ORM\ManyToOne(targetEntity: StatutCommande::class, inversedBy: 'commandes_client')]
    private $statutCommande;

    #[ORM\ManyToOne(targetEntity: Adresse::class, inversedBy: 'commandesClient')]
    private $adresse;

    #[ORM\ManyToOne(targetEntity: TypePaiement::class, inversedBy: 'commandeClients')]
    #[ORM\JoinColumn(nullable: false)]
    private $typePaiement;

    #[ORM\OneToMany(mappedBy: 'commandeClient', targetEntity: ContenirQuantite::class)]
    private $contenirQuantites;

    public function __construct()
    {
        $this->contenirQuantites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setDatecreation(\DateTimeInterface $datecreation): self
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getStatutCommande(): ?StatutCommande
    {
        return $this->statutCommande;
    }

    public function setStatutCommande(?StatutCommande $statutCommande): self
    {
        $this->statutCommande = $statutCommande;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTypePaiement(): ?TypePaiement
    {
        return $this->typePaiement;
    }

    public function setTypePaiement(?TypePaiement $typePaiement): self
    {
        $this->typePaiement = $typePaiement;

        return $this;
    }

    /**
     * @return Collection|ContenirQuantite[]
     */
    public function getContenirQuantites(): Collection
    {
        return $this->contenirQuantites;
    }

    public function addContenirQuantite(ContenirQuantite $contenirQuantite): self
    {
        if (!$this->contenirQuantites->contains($contenirQuantite)) {
            $this->contenirQuantites[] = $contenirQuantite;
            $contenirQuantite->setCommandeClient($this);
        }

        return $this;
    }

    public function removeContenirQuantite(ContenirQuantite $contenirQuantite): self
    {
        if ($this->contenirQuantites->removeElement($contenirQuantite)) {
            // set the owning side to null (unless already changed)
            if ($contenirQuantite->getCommandeClient() === $this) {
                $contenirQuantite->setCommandeClient(null);
            }
        }

        return $this;
    }
}
