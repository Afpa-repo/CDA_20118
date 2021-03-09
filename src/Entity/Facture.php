<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FactureRepository::class)
 */
class Facture
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
    private $fact_num;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $fact_prix_ht;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fact_date;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $fact_prix_ttc;

    /**
     * @ORM\OneToOne(targetEntity=Commande::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $com_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFactNum(): ?string
    {
        return $this->fact_num;
    }

    public function setFactNum(string $fact_num): self
    {
        $this->fact_num = $fact_num;

        return $this;
    }

    public function getFactPrixHt(): ?string
    {
        return $this->fact_prix_ht;
    }

    public function setFactPrixHt(string $fact_prix_ht): self
    {
        $this->fact_prix_ht = $fact_prix_ht;

        return $this;
    }

    public function getFactDate(): ?\DateTimeInterface
    {
        return $this->fact_date;
    }

    public function setFactDate(\DateTimeInterface $fact_date): self
    {
        $this->fact_date = $fact_date;

        return $this;
    }

    public function getFactPrixTtc(): ?string
    {
        return $this->fact_prix_ttc;
    }

    public function setFactPrixTtc(string $fact_prix_ttc): self
    {
        $this->fact_prix_ttc = $fact_prix_ttc;

        return $this;
    }

    public function getComId(): ?Commande
    {
        return $this->com_id;
    }

    public function setComId(Commande $com_id): self
    {
        $this->com_id = $com_id;

        return $this;
    }
}
