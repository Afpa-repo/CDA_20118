<?php

namespace App\Entity;

use App\Repository\LigneDeCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LigneDeCommandeRepository::class)
 */
class LigneDeCommande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $ligne_prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $ligne_quantite;

    /**
     * @ORM\ManyToOne(targetEntity=Commande::class, inversedBy="ligneDeCommandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $com_id;

    /**
     * @ORM\OneToOne(targetEntity=Article::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $art_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLignePrix(): ?string
    {
        return $this->ligne_prix;
    }

    public function setLignePrix(string $ligne_prix): self
    {
        $this->ligne_prix = $ligne_prix;

        return $this;
    }

    public function getLigneQuantite(): ?int
    {
        return $this->ligne_quantite;
    }

    public function setLigneQuantite(int $ligne_quantite): self
    {
        $this->ligne_quantite = $ligne_quantite;

        return $this;
    }

    public function getComId(): ?Commande
    {
        return $this->com_id;
    }

    public function setComId(?Commande $com_id): self
    {
        $this->com_id = $com_id;

        return $this;
    }

    public function getArtId(): ?Article
    {
        return $this->art_id;
    }

    public function setArtId(Article $art_id): self
    {
        $this->art_id = $art_id;

        return $this;
    }
}
