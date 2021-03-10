<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Coordonnee
 *
 * @ORM\Table(name="coordonnee")
 * @ORM\Entity
 */
class Coordonnee
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
     * @ORM\Column(name="coo_adresse", type="string", length=255, nullable=false)
     */
    private $cooAdresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="coo_adresse_suite", type="string", length=255, nullable=true)
     */
    private $cooAdresseSuite;

    /**
     * @var string
     *
     * @ORM\Column(name="coo_ville", type="string", length=50, nullable=false)
     */
    private $cooVille;

    /**
     * @var string
     *
     * @ORM\Column(name="coo_cp", type="string", length=20, nullable=false)
     */
    private $cooCp;

    /**
     * @var string
     *
     * @ORM\Column(name="coo_type", type="string", length=50, nullable=false)
     */
    private $cooType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCooAdresse(): ?string
    {
        return $this->cooAdresse;
    }

    public function setCooAdresse(string $cooAdresse): self
    {
        $this->cooAdresse = $cooAdresse;

        return $this;
    }

    public function getCooAdresseSuite(): ?string
    {
        return $this->cooAdresseSuite;
    }

    public function setCooAdresseSuite(?string $cooAdresseSuite): self
    {
        $this->cooAdresseSuite = $cooAdresseSuite;

        return $this;
    }

    public function getCooVille(): ?string
    {
        return $this->cooVille;
    }

    public function setCooVille(string $cooVille): self
    {
        $this->cooVille = $cooVille;

        return $this;
    }

    public function getCooCp(): ?string
    {
        return $this->cooCp;
    }

    public function setCooCp(string $cooCp): self
    {
        $this->cooCp = $cooCp;

        return $this;
    }

    public function getCooType(): ?string
    {
        return $this->cooType;
    }

    public function setCooType(string $cooType): self
    {
        $this->cooType = $cooType;

        return $this;
    }


}
