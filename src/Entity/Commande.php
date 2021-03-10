<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="FK_commande_client", columns={"cli_id"})})
 * @ORM\Entity
 */
class Commande
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
     * @ORM\Column(name="com_num", type="string", length=255, nullable=false)
     */
    private $comNum;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="com_date", type="datetime", nullable=false)
     */
    private $comDate;

    /**
     * @var string
     *
     * @ORM\Column(name="com_etat", type="string", length=50, nullable=false)
     */
    private $comEtat;

    /**
     * @var string
     *
     * @ORM\Column(name="com_total_ht", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $comTotalHt;

    /**
     * @var string
     *
     * @ORM\Column(name="com_type_paiement", type="string", length=50, nullable=false)
     */
    private $comTypePaiement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="com_reduc_commerciale", type="decimal", precision=2, scale=2, nullable=true)
     */
    private $comReducCommerciale;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cli_id", referencedColumnName="id")
     * })
     */
    private $cli;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComNum(): ?string
    {
        return $this->comNum;
    }

    public function setComNum(string $comNum): self
    {
        $this->comNum = $comNum;

        return $this;
    }

    public function getComDate(): ?\DateTimeInterface
    {
        return $this->comDate;
    }

    public function setComDate(\DateTimeInterface $comDate): self
    {
        $this->comDate = $comDate;

        return $this;
    }

    public function getComEtat(): ?string
    {
        return $this->comEtat;
    }

    public function setComEtat(string $comEtat): self
    {
        $this->comEtat = $comEtat;

        return $this;
    }

    public function getComTotalHt(): ?string
    {
        return $this->comTotalHt;
    }

    public function setComTotalHt(string $comTotalHt): self
    {
        $this->comTotalHt = $comTotalHt;

        return $this;
    }

    public function getComTypePaiement(): ?string
    {
        return $this->comTypePaiement;
    }

    public function setComTypePaiement(string $comTypePaiement): self
    {
        $this->comTypePaiement = $comTypePaiement;

        return $this;
    }

    public function getComReducCommerciale(): ?string
    {
        return $this->comReducCommerciale;
    }

    public function setComReducCommerciale(?string $comReducCommerciale): self
    {
        $this->comReducCommerciale = $comReducCommerciale;

        return $this;
    }

    public function getCli(): ?Client
    {
        return $this->cli;
    }

    public function setCli(?Client $cli): self
    {
        $this->cli = $cli;

        return $this;
    }


}
