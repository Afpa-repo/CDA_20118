<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FournisseurRepository::class)
 */
class Fournisseur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $four_nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $four_adresse;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $four_ville;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $four_cp;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $four_tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $four_email;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="fournisseurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pay_id;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="four_id")
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

    public function getFourNom(): ?string
    {
        return $this->four_nom;
    }

    public function setFourNom(string $four_nom): self
    {
        $this->four_nom = $four_nom;

        return $this;
    }

    public function getFourAdresse(): ?string
    {
        return $this->four_adresse;
    }

    public function setFourAdresse(string $four_adresse): self
    {
        $this->four_adresse = $four_adresse;

        return $this;
    }

    public function getFourVille(): ?string
    {
        return $this->four_ville;
    }

    public function setFourVille(string $four_ville): self
    {
        $this->four_ville = $four_ville;

        return $this;
    }

    public function getFourCp(): ?string
    {
        return $this->four_cp;
    }

    public function setFourCp(string $four_cp): self
    {
        $this->four_cp = $four_cp;

        return $this;
    }

    public function getFourTel(): ?string
    {
        return $this->four_tel;
    }

    public function setFourTel(string $four_tel): self
    {
        $this->four_tel = $four_tel;

        return $this;
    }

    public function getFourEmail(): ?string
    {
        return $this->four_email;
    }

    public function setFourEmail(string $four_email): self
    {
        $this->four_email = $four_email;

        return $this;
    }

    public function getPayId(): ?Pays
    {
        return $this->pay_id;
    }

    public function setPayId(?Pays $pay_id): self
    {
        $this->pay_id = $pay_id;

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
            $article->setFourId($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getFourId() === $this) {
                $article->setFourId(null);
            }
        }

        return $this;
    }
}
