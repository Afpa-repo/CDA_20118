<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Mapping\ClassMetadata;



/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_1D1C63B374C1F655", columns={"uti_identifiant", "uti_mail"})}, indexes={@ORM\Index(name="pay_id", columns={"pay_id"}), @ORM\Index(name="uti_id_1", columns={"uti_id_1"})})
 * @ORM\Entity
 * @UniqueEntity(
 *     fields={"utiIdentifiant"},
 *     message="L'identifiant indiquer existe deja !")
 * @UniqueEntity(
 *     fields={"utiMail"},
 *     message="L'email indiquer existe deja !")
 */

class Utilisateur implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="uti_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $utiId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uti_adresse", type="string", length=50, nullable=true)
     */
    private $utiAdresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uti_adresse2", type="string", length=50, nullable=true)
     */
    private $utiAdresse2;

    /**
     * @var string|null
     * @ORM\Column(name="uti_ville", type="string", length=50, nullable=true)
     */
    private $utiVille;

    /**
     * @var string|null
     * @ORM\Column(name="uti_codepostal", type="string", length=10, nullable=true)
     */
    private $utiCodepostal;

    /**
     * @var string
     * @ORM\Column(name="uti_nom", type="string", length=50, nullable=false)
     */
    private $utiNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uti_role", type="string", length=20, nullable=true)
     */
    private $utiRole;

    /**
     * @var string
     * @ORM\Column(name="uti_prenom", type="string", length=50, nullable=false)
     */
    private $utiPrenom;

    /**
     * @var string
     * @ORM\Column(name="uti_sexe", type="string", length=1, nullable=false)
     */
    private $utiSexe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="uti_date_de_naissance", type="date", nullable=false)
     */
    private $utiDateDeNaissance;

    /**
     * @var string
     * @ORM\Column(name="uti_mail", type="string", length=255, nullable=false)
     */
    protected $utiMail;

    /**
     * @var string
     * @ORM\Column(name="uti_tel", type="string", length=10, nullable=false)
     */
    private $utiTel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="uti_id_1", type="integer", nullable=true)
     */
    private $utiId1;

    /**
     * @var \Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pay_id", referencedColumnName="pay_id")
     * })
     */
    private $pay;

    /**
     * @var string
     *
     * @ORM\Column(name="uti_identifiant", type="string", length=180, unique=true)
     */
    protected $utiIdentifiant;

    /**
     * @var string
     * @ORM\Column(name="uti_mdp", type="string", length=255, nullable=false)
     */
    private $utiMdp;

    /**
     * @var string

     * @Assert\EqualTo(propertyPath="uti_Mdp", message="Vous n'avez pas tapé la meme mot de passe")
     */
    public $confirm_utiMdp;

    public function getUtiId(): ?int
    {
        return $this->utiId;
    }

    public function getUtiAdresse(): ?string
    {
        return $this->utiAdresse;
    }

    public function setUtiAdresse(?string $utiAdresse): self
    {
        $this->utiAdresse = $utiAdresse;

        return $this;
    }

    public function getUtiAdresse2(): ?string
    {
        return $this->utiAdresse2;
    }

    public function setUtiAdresse2(?string $utiAdresse2): self
    {
        $this->utiAdresse2 = $utiAdresse2;

        return $this;
    }

    public function getUtiVille(): ?string
    {
        return $this->utiVille;
    }

    public function setUtiVille(?string $utiVille): self
    {
        $this->utiVille = $utiVille;

        return $this;
    }

    public function getUtiCodepostal(): ?string
    {
        return $this->utiCodepostal;
    }

    public function setUtiCodepostal(?string $utiCodepostal): self
    {
        $this->utiCodepostal = $utiCodepostal;

        return $this;
    }

    public function getUtiNom(): ?string
    {
        return $this->utiNom;
    }

    public function setUtiNom(string $utiNom): self
    {
        $this->utiNom = $utiNom;

        return $this;
    }

    public function getUtiRole(): ?string
    {
        return $this->utiRole;
    }

    public function setUtiRole(?string $utiRole): self
    {
        $this->utiRole = $utiRole;

        return $this;
    }

    public function getUtiPrenom(): ?string
    {
        return $this->utiPrenom;
    }

    public function setUtiPrenom(string $utiPrenom): self
    {
        $this->utiPrenom = $utiPrenom;

        return $this;
    }

    public function getUtiSexe(): ?string
    {
        return $this->utiSexe;
    }

    public function setUtiSexe(string $utiSexe): self
    {
        $this->utiSexe = $utiSexe;

        return $this;
    }

    public function getUtiDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->utiDateDeNaissance;
    }

    public function setUtiDateDeNaissance(\DateTimeInterface $utiDateDeNaissance): self
    {
        $this->utiDateDeNaissance = $utiDateDeNaissance;

        return $this;
    }

    public function getUtiMail(): ?string
    {
        return $this->utiMail;
    }

    public function setUtiMail(string $utiMail): self
    {
        $this->utiMail = $utiMail;

        return $this;
    }

    public function getUtiTel(): ?string
    {
        return $this->utiTel;
    }

    public function setUtiTel(string $utiTel): self
    {
        $this->utiTel = $utiTel;

        return $this;
    }

    public function getUtiId1(): ?int
    {
        return $this->utiId1;
    }

    public function setUtiId1(?int $utiId1): self
    {
        $this->utiId1 = $utiId1;

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

    public function getUtiIdentifiant(): ?string
    {
        return $this->utiIdentifiant;
    }

    public function setUtiIdentifiant(string $utiIdentifiant): self
    {
        $this->utiIdentifiant = $utiIdentifiant;

        return $this;
    }

    public function getUtiMdp(): ?string
    {
        return $this->utiMdp;
    }

    public function setUtiMdp(string $utiMdp): self
    {
        $this->utiMdp = $utiMdp;

        return $this;
    }

    public function __toString()
    {
        return $this->utiNom;
    }

    public function eraseCredentials()
    {
    }

    public function getSalt()
    {

    }

    public function getRoles() {
        return ['ROLE_USER'];
    }

    public function getPassword() :string
    {
        return $this->utiMdp;
    }

    public function getUsername() :string
    {
        return $this->utiIdentifiant;
    }

}
