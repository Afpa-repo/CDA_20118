<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client", indexes={@ORM\Index(name="FK_client_coordonnee", columns={"coo_id"}), @ORM\Index(name="FK_client_employe", columns={"emp_id"}), @ORM\Index(name="FK_client_pays", columns={"pay_id"})})
 * @ORM\Entity
 */
class Client
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
     * @ORM\Column(name="cli_nom", type="string", length=50, nullable=false)
     */
    private $cliNom;

    /**
     * @var string
     *
     * @ORM\Column(name="cli_prenom", type="string", length=50, nullable=false)
     */
    private $cliPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="cli_identifiant", type="string", length=255, nullable=false)
     */
    private $cliIdentifiant;

    /**
     * @var string
     *
     * @ORM\Column(name="cli_mdp", type="string", length=255, nullable=false)
     */
    private $cliMdp;

    /**
     * @var string
     *
     * @ORM\Column(name="cli_sexe", type="string", length=1, nullable=false)
     */
    private $cliSexe = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cli_date_naissance", type="date", nullable=false)
     */
    private $cliDateNaissance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cli_coef", type="decimal", precision=2, scale=2, nullable=true)
     */
    private $cliCoef;

    /**
     * @var bool
     *
     * @ORM\Column(name="cli_client_pro", type="boolean", nullable=false)
     */
    private $cliClientPro;

    /**
     * @var string
     *
     * @ORM\Column(name="cli_email", type="string", length=255, nullable=false)
     */
    private $cliEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="cli_tel", type="string", length=20, nullable=false)
     */
    private $cliTel;

    /**
     * @var \Coordonnee
     *
     * @ORM\ManyToOne(targetEntity="Coordonnee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="coo_id", referencedColumnName="id")
     * })
     */
    private $coo;

    /**
     * @var \Employe
     *
     * @ORM\ManyToOne(targetEntity="Employe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="emp_id", referencedColumnName="id")
     * })
     */
    private $emp;

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

    public function getCliNom(): ?string
    {
        return $this->cliNom;
    }

    public function setCliNom(string $cliNom): self
    {
        $this->cliNom = $cliNom;

        return $this;
    }

    public function getCliPrenom(): ?string
    {
        return $this->cliPrenom;
    }

    public function setCliPrenom(string $cliPrenom): self
    {
        $this->cliPrenom = $cliPrenom;

        return $this;
    }

    public function getCliIdentifiant(): ?string
    {
        return $this->cliIdentifiant;
    }

    public function setCliIdentifiant(string $cliIdentifiant): self
    {
        $this->cliIdentifiant = $cliIdentifiant;

        return $this;
    }

    public function getCliMdp(): ?string
    {
        return $this->cliMdp;
    }

    public function setCliMdp(string $cliMdp): self
    {
        $this->cliMdp = $cliMdp;

        return $this;
    }

    public function getCliSexe(): ?string
    {
        return $this->cliSexe;
    }

    public function setCliSexe(string $cliSexe): self
    {
        $this->cliSexe = $cliSexe;

        return $this;
    }

    public function getCliDateNaissance(): ?\DateTimeInterface
    {
        return $this->cliDateNaissance;
    }

    public function setCliDateNaissance(\DateTimeInterface $cliDateNaissance): self
    {
        $this->cliDateNaissance = $cliDateNaissance;

        return $this;
    }

    public function getCliCoef(): ?string
    {
        return $this->cliCoef;
    }

    public function setCliCoef(?string $cliCoef): self
    {
        $this->cliCoef = $cliCoef;

        return $this;
    }

    public function getCliClientPro(): ?bool
    {
        return $this->cliClientPro;
    }

    public function setCliClientPro(bool $cliClientPro): self
    {
        $this->cliClientPro = $cliClientPro;

        return $this;
    }

    public function getCliEmail(): ?string
    {
        return $this->cliEmail;
    }

    public function setCliEmail(string $cliEmail): self
    {
        $this->cliEmail = $cliEmail;

        return $this;
    }

    public function getCliTel(): ?string
    {
        return $this->cliTel;
    }

    public function setCliTel(string $cliTel): self
    {
        $this->cliTel = $cliTel;

        return $this;
    }

    public function getCoo(): ?Coordonnee
    {
        return $this->coo;
    }

    public function setCoo(?Coordonnee $coo): self
    {
        $this->coo = $coo;

        return $this;
    }

    public function getEmp(): ?Employe
    {
        return $this->emp;
    }

    public function setEmp(?Employe $emp): self
    {
        $this->emp = $emp;

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


}
