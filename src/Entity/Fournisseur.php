<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fournisseur
 *
 * @ORM\Table(name="fournisseur", indexes={@ORM\Index(name="pay_id", columns={"pay_id"})})
 * @ORM\Entity
 */
class Fournisseur
{
    /**
     * @var int
     *
     * @ORM\Column(name="four_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $fourId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="four_nom", type="string", length=30, nullable=true)
     */
    private $fourNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="four_adresse", type="string", length=50, nullable=true)
     */
    private $fourAdresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="four_ville", type="string", length=20, nullable=true)
     */
    private $fourVille;

    /**
     * @var string|null
     *
     * @ORM\Column(name="four_cp", type="string", length=5, nullable=true)
     */
    private $fourCp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="four_tel", type="string", length=10, nullable=true)
     */
    private $fourTel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="four_courriel", type="string", length=50, nullable=true)
     */
    private $fourCourriel;

    /**
     * @var \Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pay_id", referencedColumnName="pay_id")
     * })
     */
    private $pay;

    public function getFourId(): ?int
    {
        return $this->fourId;
    }

    public function getFourNom(): ?string
    {
        return $this->fourNom;
    }

    public function setFourNom(?string $fourNom): self
    {
        $this->fourNom = $fourNom;

        return $this;
    }

    public function getFourAdresse(): ?string
    {
        return $this->fourAdresse;
    }

    public function setFourAdresse(?string $fourAdresse): self
    {
        $this->fourAdresse = $fourAdresse;

        return $this;
    }

    public function getFourVille(): ?string
    {
        return $this->fourVille;
    }

    public function setFourVille(?string $fourVille): self
    {
        $this->fourVille = $fourVille;

        return $this;
    }

    public function getFourCp(): ?string
    {
        return $this->fourCp;
    }

    public function setFourCp(?string $fourCp): self
    {
        $this->fourCp = $fourCp;

        return $this;
    }

    public function getFourTel(): ?string
    {
        return $this->fourTel;
    }

    public function setFourTel(?string $fourTel): self
    {
        $this->fourTel = $fourTel;

        return $this;
    }

    public function getFourCourriel(): ?string
    {
        return $this->fourCourriel;
    }

    public function setFourCourriel(?string $fourCourriel): self
    {
        $this->fourCourriel = $fourCourriel;

        return $this;
    }

    public function getPay(): ?Pays
    {
        return $this->pay;
    }

    public function setPay(?Pays $pay): self
    {
        $this->pay = $pay;

        return $this;
    }


    public function __toString()
    {
        return $this->fourNom;
    }

}
