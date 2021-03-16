<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lignedecommande
 *
 * @ORM\Table(name="lignedecommande", indexes={@ORM\Index(name="com_id", columns={"com_id"}), @ORM\Index(name="art_id", columns={"art_id"})})
 * @ORM\Entity
 */
class LigneDeCommande
{
    /**
     * @var int
     *
     * @ORM\Column(name="ligne_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ligneId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ligne_prix", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $lignePrix;

    /**
     * @var int
     *
     * @ORM\Column(name="ligne_quantite", type="integer", nullable=false)
     */
    private $ligneQuantite;

    /**
     * @var \Commande
     *
     * @ORM\ManyToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="com_id", referencedColumnName="com_id")
     * })
     */
    private $com;

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="art_id", referencedColumnName="art_id")
     * })
     */
    private $art;

    public function getLigneId(): ?int
    {
        return $this->ligneId;
    }

    public function getLignePrix(): ?string
    {
        return $this->lignePrix;
    }

    public function setLignePrix(?string $lignePrix): self
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

    public function getCom(): ?Commande
    {
        return $this->com;
    }

    public function setCom(?Commande $com): self
    {
        $this->com = $com;

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


}
