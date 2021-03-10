<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="FK_article_promotion", columns={"pro_id"}), @ORM\Index(name="FK_article_fournisseur", columns={"four_id"}), @ORM\Index(name="FK_article_categorie", columns={"cat_id"})})
 * @ORM\Entity
 */
class Article
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
     * @ORM\Column(name="art_photo", type="string", length=255, nullable=false)
     */
    private $artPhoto;

    /**
     * @var string
     *
     * @ORM\Column(name="art_nom", type="string", length=50, nullable=false)
     */
    private $artNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="art_libelle", type="string", length=255, nullable=true)
     */
    private $artLibelle;

    /**
     * @var string
     *
     * @ORM\Column(name="art_prix_ht", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $artPrixHt;

    /**
     * @var int
     *
     * @ORM\Column(name="art_min_stock", type="integer", nullable=false)
     */
    private $artMinStock;

    /**
     * @var int
     *
     * @ORM\Column(name="art_stock", type="integer", nullable=false)
     */
    private $artStock;

    /**
     * @var bool
     *
     * @ORM\Column(name="art_promo", type="boolean", nullable=false)
     */
    private $artPromo;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cat_id", referencedColumnName="id")
     * })
     */
    private $cat;

    /**
     * @var \Fournisseur
     *
     * @ORM\ManyToOne(targetEntity="Fournisseur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="four_id", referencedColumnName="id")
     * })
     */
    private $four;

    /**
     * @var \Promotion
     *
     * @ORM\ManyToOne(targetEntity="Promotion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_id", referencedColumnName="id")
     * })
     */
    private $pro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtPhoto(): ?string
    {
        return $this->artPhoto;
    }

    public function setArtPhoto(string $artPhoto): self
    {
        $this->artPhoto = $artPhoto;

        return $this;
    }

    public function getArtNom(): ?string
    {
        return $this->artNom;
    }

    public function setArtNom(string $artNom): self
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

    public function getCat(): ?Categorie
    {
        return $this->cat;
    }

    public function setCat(?Categorie $cat): self
    {
        $this->cat = $cat;

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

    public function getPro(): ?Promotion
    {
        return $this->pro;
    }

    public function setPro(?Promotion $pro): self
    {
        $this->pro = $pro;

        return $this;
    }


}
