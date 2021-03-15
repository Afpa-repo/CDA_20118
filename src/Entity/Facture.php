<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facture
 *
 * @ORM\Table(name="facture", uniqueConstraints={@ORM\UniqueConstraint(name="com_id", columns={"com_id"})})
 * @ORM\Entity
 */
class Facture
{
    /**
     * @var int
     *
     * @ORM\Column(name="fact_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $factId;

    /**
     * @var string
     *
     * @ORM\Column(name="fact_num", type="string", length=255, nullable=false)
     */
    private $factNum;

    /**
     * @var string
     *
     * @ORM\Column(name="fact_prix_ht", type="decimal", precision=15, scale=2, nullable=false)
     */
    private $factPrixHt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fact_date", type="date", nullable=true)
     */
    private $factDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fact_prix_ttc", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $factPrixTtc;

    /**
     * @var \Commande
     *
     * @ORM\ManyToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="com_id", referencedColumnName="com_id")
     * })
     */
    private $com;

    public function getFactId(): ?int
    {
        return $this->factId;
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

    public function setFactDate(?\DateTimeInterface $factDate): self
    {
        $this->factDate = $factDate;

        return $this;
    }

    public function getFactPrixTtc(): ?string
    {
        return $this->factPrixTtc;
    }

    public function setFactPrixTtc(?string $factPrixTtc): self
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
