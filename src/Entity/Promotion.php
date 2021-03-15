<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promotion
 *
 * @ORM\Table(name="promotion")
 * @ORM\Entity
 */
class Promotion
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
     * @ORM\Column(name="pro_coef", type="decimal", precision=2, scale=2, nullable=false)
     */
    private $proCoef;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pro_date_debut", type="datetime", nullable=false)
     */
    private $proDateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pro_date_fin", type="datetime", nullable=false)
     */
    private $proDateFin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProCoef(): ?string
    {
        return $this->proCoef;
    }

    public function setProCoef(string $proCoef): self
    {
        $this->proCoef = $proCoef;

        return $this;
    }

    public function getProDateDebut(): ?\DateTimeInterface
    {
        return $this->proDateDebut;
    }

    public function setProDateDebut(\DateTimeInterface $proDateDebut): self
    {
        $this->proDateDebut = $proDateDebut;

        return $this;
    }

    public function getProDateFin(): ?\DateTimeInterface
    {
        return $this->proDateFin;
    }

    public function setProDateFin(\DateTimeInterface $proDateFin): self
    {
        $this->proDateFin = $proDateFin;

        return $this;
    }
    public function __toString()
    {
        return $this->proCoef;
    }

}
