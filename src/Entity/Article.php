<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="cat_id", columns={"cat_id"}), @ORM\Index(name="pro_id", columns={"pro_id"}), @ORM\Index(name="four_id", columns={"four_id"})})
 * @ORM\Entity
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="art_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $artId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="art_photo", type="string", length=50, nullable=true)
     */
    private $artPhoto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="art_nom", type="string", length=30, nullable=true)
     */
    private $artNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="art_libelle", type="string", length=30, nullable=true)
     */
    private $artLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="art_prix_ht", type="decimal", precision=15, scale=2, nullable=false)
     */
    private $artPrixHt;

    /**
     * @var int
     *
     * @ORM\Column(name="art_min_stock", type="smallint", nullable=false)
     */
    private $artMinStock;

    /**
     * @var int
     *
     * @ORM\Column(name="art_stock", type="smallint", nullable=false)
     */
    private $artStock;

    /**
     * @var bool
     *
     * @ORM\Column(name="art_promo", type="boolean", nullable=false)
     */
    private $artPromo;

    /**
     * @var \Promotion
     *
     * @ORM\ManyToOne(targetEntity="Promotion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_id", referencedColumnName="pro_id")
     * })
     */
    private $pro;

    /**
     * @var \Fournisseur
     *
     * @ORM\ManyToOne(targetEntity="Fournisseur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="four_id", referencedColumnName="four_id")
     * })
     */
    private $four;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cat_id", referencedColumnName="cat_id")
     * })
     */
    private $cat;

    public function getArtId(): ?int
    {
        return $this->artId;
    }

    public function getArtPhoto(): ?string
    {
        return $this->artPhoto;
    }

    public function setArtPhoto(?string $artPhoto): self
    {
        $this->artPhoto = $artPhoto;

        return $this;
    }

    public function getArtNom(): ?string
    {
        return $this->artNom;
    }

    public function setArtNom(?string $artNom): self
    {
        $this->artNom = $artNom;

        return $this;
    }

    public function getArtLibelle(): ?string
    {
        return $this->artLibelle;
    }

    public function setArtLibelle(?string $artLibelle): self
    {
        $this->artLibelle = $artLibelle;

        return $this;
    }

    public function getArtPrixHt(): ?string
    {
        return $this->artPrixHt;
    }

    public function setArtPrixHt(string $artPrixHt): self
    {
        $this->artPrixHt = $artPrixHt;

        return $this;
    }

    public function getArtMinStock(): ?int
    {
        return $this->artMinStock;
    }

    public function setArtMinStock(int $artMinStock): self
    {
        $this->artMinStock = $artMinStock;

        return $this;
    }

    public function getArtStock(): ?int
    {
        return $this->artStock;
    }

    public function setArtStock(int $artStock): self
    {
        $this->artStock = $artStock;

        return $this;
    }

    public function getArtPromo(): ?bool
    {
        return $this->artPromo;
    }

    public function setArtPromo(bool $artPromo): self
    {
        $this->artPromo = $artPromo;

        return $this;
    }

    public function getPro(): ?Promotion
    {
        return $this->pro;
    }

    public function setPro(?Promotion $pro): self
    {
        $this->pro = $pro;

        return $this;
    }

    public function getFour(): ?Fournisseur
    {
        return $this->four;
    }

    public function setFour(?Fournisseur $four): self
    {
        $this->four = $four;

        return $this;
    }

    public function getCat(): ?Categorie
    {
        return $this->cat;
    }

    public function setCat(?Categorie $cat): self
    {
        $this->cat = $cat;

        return $this;
    }


}
