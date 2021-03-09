<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $cli_nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $cli_prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cli_identifiant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cli_mdp;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cli_sexe;

    /**
     * @ORM\Column(type="date")
     */
    private $cli_date_naissance;

    /**
     * @ORM\Column(type="decimal", precision=2, scale=2, nullable=true)
     */
    private $cli_coef;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cli_client_pro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cli_email;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $cli_tel;

    /**
     * @ORM\ManyToOne(targetEntity=Coordonnee::class, inversedBy="clients")
     */
    private $coo_id;

    /**
     * @ORM\ManyToOne(targetEntity=Employe::class, inversedBy="clients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $emp_id;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="clients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pay_id;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="cli_id")
     */
    private $commandes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCliNom(): ?string
    {
        return $this->cli_nom;
    }

    public function setCliNom(string $cli_nom): self
    {
        $this->cli_nom = $cli_nom;

        return $this;
    }

    public function getCliPrenom(): ?string
    {
        return $this->cli_prenom;
    }

    public function setCliPrenom(string $cli_prenom): self
    {
        $this->cli_prenom = $cli_prenom;

        return $this;
    }

    public function getCliIdentifiant(): ?string
    {
        return $this->cli_identifiant;
    }

    public function setCliIdentifiant(string $cli_identifiant): self
    {
        $this->cli_identifiant = $cli_identifiant;

        return $this;
    }

    public function getCliMdp(): ?string
    {
        return $this->cli_mdp;
    }

    public function setCliMdp(string $cli_mdp): self
    {
        $this->cli_mdp = $cli_mdp;

        return $this;
    }

    public function getCliSexe(): ?bool
    {
        return $this->cli_sexe;
    }

    public function setCliSexe(bool $cli_sexe): self
    {
        $this->cli_sexe = $cli_sexe;

        return $this;
    }

    public function getCliDateNaissance(): ?\DateTimeInterface
    {
        return $this->cli_date_naissance;
    }

    public function setCliDateNaissance(\DateTimeInterface $cli_date_naissance): self
    {
        $this->cli_date_naissance = $cli_date_naissance;

        return $this;
    }

    public function getCliCoef(): ?string
    {
        return $this->cli_coef;
    }

    public function setCliCoef(?string $cli_coef): self
    {
        $this->cli_coef = $cli_coef;

        return $this;
    }

    public function getCliClientPro(): ?bool
    {
        return $this->cli_client_pro;
    }

    public function setCliClientPro(bool $cli_client_pro): self
    {
        $this->cli_client_pro = $cli_client_pro;

        return $this;
    }

    public function getCliEmail(): ?string
    {
        return $this->cli_email;
    }

    public function setCliEmail(string $cli_email): self
    {
        $this->cli_email = $cli_email;

        return $this;
    }

    public function getCliTel(): ?string
    {
        return $this->cli_tel;
    }

    public function setCliTel(string $cli_tel): self
    {
        $this->cli_tel = $cli_tel;

        return $this;
    }

    public function getCooId(): ?Coordonnee
    {
        return $this->coo_id;
    }

    public function setCooId(?Coordonnee $coo_id): self
    {
        $this->coo_id = $coo_id;

        return $this;
    }

    public function getEmpId(): ?Employe
    {
        return $this->emp_id;
    }

    public function setEmpId(?Employe $emp_id): self
    {
        $this->emp_id = $emp_id;

        return $this;
    }

    public function getPayId(): ?Pays
    {
        return $this->pay_id;
    }

    public function setPayId(?Pays $pay_id): self
    {
        $this->pay_id = $pay_id;

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setCliId($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getCliId() === $this) {
                $commande->setCliId(null);
            }
        }

        return $this;
    }
}
