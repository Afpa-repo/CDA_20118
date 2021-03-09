<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $art_photo;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $art_nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $art_libelle;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $art_prix_ht;

    /**
     * @ORM\Column(type="integer")
     */
    private $art_min_stock;

    /**
     * @ORM\Column(type="integer")
     */
    private $art_stock;

    /**
     * @ORM\Column(type="boolean")
     */
    private $art_promo;

    /**
     * @ORM\ManyToOne(targetEntity=Promotion::class, inversedBy="articles")
     */
    private $pro_id;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseur::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $four_id;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cat_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtPhoto(): ?string
    {
        return $this->art_photo;
    }

    public function setArtPhoto(string $art_photo): self
    {
        $this->art_photo = $art_photo;

        return $this;
    }

    public function getArtNom(): ?string
    {
        return $this->art_nom;
    }

    public function setArtNom(string $art_nom): self
    {
        $this->art_nom = $art_nom;

        return $this;
    }

    public function getArtLibelle(): ?string
    {
        return $this->art_libelle;
    }

    public function setArtLibelle(?string $art_libelle): self
    {
        $this->art_libelle = $art_libelle;

        return $this;
    }

    public function getArtPrixHt(): ?string
    {
        return $this->art_prix_ht;
    }

    public function setArtPrixHt(string $art_prix_ht): self
    {
        $this->art_prix_ht = $art_prix_ht;

        return $this;
    }

    public function getArtMinStock(): ?int
    {
        return $this->art_min_stock;
    }

    public function setArtMinStock(int $art_min_stock): self
    {
        $this->art_min_stock = $art_min_stock;

        return $this;
    }

    public function getArtStock(): ?int
    {
        return $this->art_stock;
    }

    public function setArtStock(int $art_stock): self
    {
        $this->art_stock = $art_stock;

        return $this;
    }

    public function getArtPromo(): ?bool
    {
        return $this->art_promo;
    }

    public function setArtPromo(bool $art_promo): self
    {
        $this->art_promo = $art_promo;

        return $this;
    }

    public function getProId(): ?Promotion
    {
        return $this->pro_id;
    }

    public function setProId(?Promotion $pro_id): self
    {
        $this->pro_id = $pro_id;

        return $this;
    }

    public function getFourId(): ?Fournisseur
    {
        return $this->four_id;
    }

    public function setFourId(?Fournisseur $four_id): self
    {
        $this->four_id = $four_id;

        return $this;
    }

    public function getCatId(): ?Categorie
    {
        return $this->cat_id;
    }

    public function setCatId(?Categorie $cat_id): self
    {
        $this->cat_id = $cat_id;

        return $this;
    }
}
