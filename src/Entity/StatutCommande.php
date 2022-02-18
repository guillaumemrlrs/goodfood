<?php

namespace App\Entity;

use App\Repository\StatutCommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatutCommandeRepository::class)]
class StatutCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $libelle;

    #[ORM\OneToMany(mappedBy: 'statutCommande', targetEntity: CommandeClient::class)]
    private $commandes_client;

    public function __construct()
    {
        $this->commandes_client = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|CommandeClient[]
     */
    public function getCommandesClient(): Collection
    {
        return $this->commandes_client;
    }

    public function addCommandesClient(CommandeClient $commandesClient): self
    {
        if (!$this->commandes_client->contains($commandesClient)) {
            $this->commandes_client[] = $commandesClient;
            $commandesClient->setStatutCommande($this);
        }

        return $this;
    }

    public function removeCommandesClient(CommandeClient $commandesClient): self
    {
        if ($this->commandes_client->removeElement($commandesClient)) {
            // set the owning side to null (unless already changed)
            if ($commandesClient->getStatutCommande() === $this) {
                $commandesClient->setStatutCommande(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getLibelle();
    }
}
