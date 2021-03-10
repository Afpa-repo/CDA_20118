<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LigneDeCommande
 *
 * @ORM\Table(name="ligne_de_commande", indexes={@ORM\Index(name="FK_ligne_de_commande_commande", columns={"com_id"}), @ORM\Index(name="FK_ligne_de_commande_article", columns={"art_id"})})
 * @ORM\Entity
 */
class LigneDeCommande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ligne_prix", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $lignePrix;

    /**
     * @var int
     *
     * @ORM\Column(name="ligne_quantite", type="integer", nullable=false)
     */
    private $ligneQuantite;

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="art_id", referencedColumnName="id")
     * })
     */
    private $art;

    /**
     * @var \Commande
     *
     * @ORM\ManyToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="com_id", referencedColumnName="id")
     * })
     */
    private $com;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLignePrix(): ?string
    {
        return $this->lignePrix;
    }

    public function setLignePrix(string $lignePrix): self
    {
        $this->lignePrix = $lignePrix;

        return $this;
    }

    public function getLigneQuantite(): ?int
    {
        return $this->ligneQuantite;
    }

    public function setLigneQuantite(int $ligneQuantite): self
    {
        $this->ligneQuantite = $ligneQuantite;

        return $this;
    }

    public function getArt(): ?Article
    {
        return $this->art;
    }

    public function setArt(?Article $art): self
    {
        $this->art = $art;

        return $this;
    }

    public function getCom(): ?Commande
    {
        return $this->com;
    }

    public function setCom(?Commande $com): self
    {
        $this->com = $com;

        return $this;
    }


}
