<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
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
    private $com_num;

    /**
     * @ORM\Column(type="datetime")
     */
    private $com_date;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $com_etat;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $com_total_ht;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $com_type_paiement;

    /**
     * @ORM\Column(type="decimal", precision=2, scale=2, nullable=true)
     */
    private $com_reduc_commerciale;

    /**
     * @ORM\OneToMany(targetEntity=LigneDeCommande::class, mappedBy="com_id")
     */
    private $ligneDeCommandes;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cli_id;

    public function __construct()
    {
        $this->ligneDeCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComNum(): ?string
    {
        return $this->com_num;
    }

    public function setComNum(string $com_num): self
    {
        $this->com_num = $com_num;

        return $this;
    }

    public function getComDate(): ?\DateTimeInterface
    {
        return $this->com_date;
    }

    public function setComDate(\DateTimeInterface $com_date): self
    {
        $this->com_date = $com_date;

        return $this;
    }

    public function getComEtat(): ?string
    {
        return $this->com_etat;
    }

    public function setComEtat(string $com_etat): self
    {
        $this->com_etat = $com_etat;

        return $this;
    }

    public function getComTotalHt(): ?string
    {
        return $this->com_total_ht;
    }

    public function setComTotalHt(string $com_total_ht): self
    {
        $this->com_total_ht = $com_total_ht;

        return $this;
    }

    public function getComTypePaiement(): ?string
    {
        return $this->com_type_paiement;
    }

    public function setComTypePaiement(string $com_type_paiement): self
    {
        $this->com_type_paiement = $com_type_paiement;

        return $this;
    }

    public function getComReducCommerciale(): ?string
    {
        return $this->com_reduc_commerciale;
    }

    public function setComReducCommerciale(?string $com_reduc_commerciale): self
    {
        $this->com_reduc_commerciale = $com_reduc_commerciale;

        return $this;
    }

    /**
     * @return Collection|LigneDeCommande[]
     */
    public function getLigneDeCommandes(): Collection
    {
        return $this->ligneDeCommandes;
    }

    public function addLigneDeCommande(LigneDeCommande $ligneDeCommande): self
    {
        if (!$this->ligneDeCommandes->contains($ligneDeCommande)) {
            $this->ligneDeCommandes[] = $ligneDeCommande;
            $ligneDeCommande->setComId($this);
        }

        return $this;
    }

    public function removeLigneDeCommande(LigneDeCommande $ligneDeCommande): self
    {
        if ($this->ligneDeCommandes->removeElement($ligneDeCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneDeCommande->getComId() === $this) {
                $ligneDeCommande->setComId(null);
            }
        }

        return $this;
    }

    public function getCliId(): ?Client
    {
        return $this->cli_id;
    }

    public function setCliId(?Client $cli_id): self
    {
        $this->cli_id = $cli_id;

        return $this;
    }
}
