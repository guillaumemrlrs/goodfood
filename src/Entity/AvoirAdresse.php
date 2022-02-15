<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AvoirAdresse
 *
 * @ORM\Table(name="avoir_adresse", indexes={@ORM\Index(name="Avoir_adresse_Utilisateur1_FK", columns={"id_utilisateur"}), @ORM\Index(name="Avoir_adresse_Commande_client2_FK", columns={"id_commande"}), @ORM\Index(name="IDX_F5D8F1581DC2A166", columns={"id_adresse"})})
 * @ORM\Entity
 */
class AvoirAdresse
{
    /**
     * @var \Adresse
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Adresse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_adresse", referencedColumnName="id_adresse")
     * })
     */
    private $idAdresse;

    /**
     * @var \Utilisateur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur")
     * })
     */
    private $idUtilisateur;

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

    public function getIdAdresse(): ?Adresse
    {
        return $this->idAdresse;
    }

    public function setIdAdresse(?Adresse $idAdresse): self
    {
        $this->idAdresse = $idAdresse;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

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


}
