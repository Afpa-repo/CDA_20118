<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur", indexes={@ORM\Index(name="pay_id", columns={"pay_id"}), @ORM\Index(name="uti_id_1", columns={"uti_id_1"})})
 * @ORM\Entity
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
     *
     * @ORM\Column(name="uti_ville", type="string", length=50, nullable=true)
     */
    private $utiVille;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uti_codepostal", type="string", length=10, nullable=true)
     */
    private $utiCodepostal;

    /**
     * @var string
     *
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
     *
     * @ORM\Column(name="uti_prenom", type="string", length=50, nullable=false)
     */
    private $utiPrenom;

    /**
     * @var string
     *
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
     *
     * @ORM\Column(name="uti_mail", type="string", length=255, nullable=false)
     */
    private $utiMail;

    /**
     * @var string
     *
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
     * @var int|null
     *
     * @ORM\Column(name="pay_id", type="integer", nullable=true)
     */
    private $payId;

        /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $uti_identifiant;

    /**
     * @ORM\Column(type="array")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

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

    public function getPayId(): ?int
    {
        return $this->payId;
    }

    public function setPayId(?int $payId): self
    {
        $this->payId = $payId;

        return $this;
    }

    public function getUtiIdentifiant(): ?string
    {
        return $this->uti_identifiant;
    }

    public function setUtiIdentifiant(string $uti_identifiant): self
    {
        $this->uti_identifiant = $uti_identifiant;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->uti_identifiant;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }


}
