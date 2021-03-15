<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fournisseur
 *
 * @ORM\Table(name="fournisseur", indexes={@ORM\Index(name="FK_fournisseur_pays", columns={"pay_id"})})
 * @ORM\Entity
 */
class Fournisseur
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
     * @ORM\Column(name="four_nom", type="string", length=50, nullable=false)
     */
    private $fourNom;

    /**
     * @var string
     *
     * @ORM\Column(name="four_adresse", type="string", length=255, nullable=false)
     */
    private $fourAdresse;

    /**
     * @var string
     *
     * @ORM\Column(name="four_ville", type="string", length=50, nullable=false)
     */
    private $fourVille;

    /**
     * @var string
     *
     * @ORM\Column(name="four_cp", type="string", length=20, nullable=false)
     */
    private $fourCp;

    /**
     * @var string
     *
     * @ORM\Column(name="four_tel", type="string", length=20, nullable=false)
     */
    private $fourTel;

    /**
     * @var string
     *
     * @ORM\Column(name="four_email", type="string", length=255, nullable=false)
     */
    private $fourEmail;

    /**
     * @var \Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pay_id", referencedColumnName="id")
     * })
     */
    private $pay;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFourNom(): ?string
    {
        return $this->fourNom;
    }

    public function setFourNom(string $fourNom): self
    {
        $this->fourNom = $fourNom;

        return $this;
    }

    public function getFourAdresse(): ?string
    {
        return $this->fourAdresse;
    }

    public function setFourAdresse(string $fourAdresse): self
    {
        $this->fourAdresse = $fourAdresse;

        return $this;
    }

    public function getFourVille(): ?string
    {
        return $this->fourVille;
    }

    public function setFourVille(string $fourVille): self
    {
        $this->fourVille = $fourVille;

        return $this;
    }

    public function getFourCp(): ?string
    {
        return $this->fourCp;
    }

    public function setFourCp(string $fourCp): self
    {
        $this->fourCp = $fourCp;

        return $this;
    }

    public function getFourTel(): ?string
    {
        return $this->fourTel;
    }

    public function setFourTel(string $fourTel): self
    {
        $this->fourTel = $fourTel;

        return $this;
    }

    public function getFourEmail(): ?string
    {
        return $this->fourEmail;
    }

    public function setFourEmail(string $fourEmail): self
    {
        $this->fourEmail = $fourEmail;

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
