<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PromotionRepository::class)
 */
class Promotion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=2, scale=2)
     */
    private $pro_coef;

    /**
     * @ORM\Column(type="datetime")
     */
    private $pro_date_debut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $pro_date_fin;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="pro_id")
     */
    private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProCoef(): ?string
    {
        return $this->pro_coef;
    }

    public function setProCoef(string $pro_coef): self
    {
        $this->pro_coef = $pro_coef;

        return $this;
    }

    public function getProDateDebut(): ?\DateTimeInterface
    {
        return $this->pro_date_debut;
    }

    public function setProDateDebut(\DateTimeInterface $pro_date_debut): self
    {
        $this->pro_date_debut = $pro_date_debut;

        return $this;
    }

    public function getProDateFin(): ?\DateTimeInterface
    {
        return $this->pro_date_fin;
    }

    public function setProDateFin(\DateTimeInterface $pro_date_fin): self
    {
        $this->pro_date_fin = $pro_date_fin;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setProId($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getProId() === $this) {
                $article->setProId(null);
            }
        }

        return $this;
    }
}
