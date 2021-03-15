<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="uti_id", columns={"uti_id"})})
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="com_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $comId;

    /**
     * @var string
     *
     * @ORM\Column(name="com_num", type="string", length=50, nullable=false)
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
     * @ORM\Column(name="com_etat", type="string", length=30, nullable=false)
     */
    private $comEtat;

    /**
     * @var string
     *
     * @ORM\Column(name="com_total_ht", type="decimal", precision=15, scale=0, nullable=false)
     */
    private $comTotalHt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="com_type_de_paiement", type="string", length=50, nullable=true)
     */
    private $comTypeDePaiement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="com_reduc_commercial", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $comReducCommercial;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uti_id", referencedColumnName="uti_id")
     * })
     */
    private $uti;

    public function getComId(): ?int
    {
        return $this->comId;
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

    public function getComTypeDePaiement(): ?string
    {
        return $this->comTypeDePaiement;
    }

    public function setComTypeDePaiement(?string $comTypeDePaiement): self
    {
        $this->comTypeDePaiement = $comTypeDePaiement;

        return $this;
    }

    public function getComReducCommercial(): ?string
    {
        return $this->comReducCommercial;
    }

    public function setComReducCommercial(?string $comReducCommercial): self
    {
        $this->comReducCommercial = $comReducCommercial;

        return $this;
    }

    public function getUti(): ?Utilisateur
    {
        return $this->uti;
    }

    public function setUti(?Utilisateur $uti): self
    {
        $this->uti = $uti;

        return $this;
    }

    public function __toString()
    {
        return $this->comNum;
    }

}
