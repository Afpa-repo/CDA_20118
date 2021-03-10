<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facture
 *
 * @ORM\Table(name="facture", indexes={@ORM\Index(name="FK_facture_commande", columns={"com_id"})})
 * @ORM\Entity
 */
class Facture
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
     * @ORM\Column(name="fact_num", type="string", length=255, nullable=false)
     */
    private $factNum;

    /**
     * @var string
     *
     * @ORM\Column(name="fact_prix_ht", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $factPrixHt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fact_date", type="datetime", nullable=false)
     */
    private $factDate;

    /**
     * @var string
     *
     * @ORM\Column(name="fact_prix_ttc", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $factPrixTtc;

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

    public function getFactNum(): ?string
    {
        return $this->factNum;
    }

    public function setFactNum(string $factNum): self
    {
        $this->factNum = $factNum;

        return $this;
    }

    public function getFactPrixHt(): ?string
    {
        return $this->factPrixHt;
    }

    public function setFactPrixHt(string $factPrixHt): self
    {
        $this->factPrixHt = $factPrixHt;

        return $this;
    }

    public function getFactDate(): ?\DateTimeInterface
    {
        return $this->factDate;
    }

    public function setFactDate(\DateTimeInterface $factDate): self
    {
        $this->factDate = $factDate;

        return $this;
    }

    public function getFactPrixTtc(): ?string
    {
        return $this->factPrixTtc;
    }

    public function setFactPrixTtc(string $factPrixTtc): self
    {
        $this->factPrixTtc = $factPrixTtc;

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
