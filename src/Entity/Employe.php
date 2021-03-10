<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeRepository::class)
 */
class Employe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $emp_date_entree;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $emp_date_sortie;

    /**
     * @ORM\Column(type="integer")
     */
    private $emp_num_secu_social;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emp_email;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $emp_tel;

    /**
     * @ORM\ManyToOne(targetEntity=Poste::class, inversedBy="employes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pos_id;

    /**
     * @ORM\ManyToOne(targetEntity=Employe::class, inversedBy="employes")
     */
    private $emp_pos_id;

    /**
     * @ORM\OneToMany(targetEntity=Employe::class, mappedBy="emp_pos_id")
     */
    private $employes;

    /**
     * @ORM\ManyToOne(targetEntity=Coordonnee::class, inversedBy="employes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $coo_id;

    /**
     * @ORM\OneToMany(targetEntity=Client::class, mappedBy="emp_id")
     */
    private $clients;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emp_mdp;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $emp_sexe;

    public function __construct()
    {
        $this->emp_sup_id = new ArrayCollection();
        $this->employes = new ArrayCollection();
        $this->clients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmpDateEntree(): ?\DateTimeInterface
    {
        return $this->emp_date_entree;
    }

    public function setEmpDateEntree(\DateTimeInterface $emp_date_entree): self
    {
        $this->emp_date_entree = $emp_date_entree;

        return $this;
    }

    public function getEmpDateSortie(): ?\DateTimeInterface
    {
        return $this->emp_date_sortie;
    }

    public function setEmpDateSortie(?\DateTimeInterface $emp_date_sortie): self
    {
        $this->emp_date_sortie = $emp_date_sortie;

        return $this;
    }

    public function getEmpNumSecuSocial(): ?int
    {
        return $this->emp_num_secu_social;
    }

    public function setEmpNumSecuSocial(int $emp_num_secu_social): self
    {
        $this->emp_num_secu_social = $emp_num_secu_social;

        return $this;
    }

    public function getEmpEmail(): ?string
    {
        return $this->emp_email;
    }

    public function setEmpEmail(string $emp_email): self
    {
        $this->emp_email = $emp_email;

        return $this;
    }

    public function getEmpTel(): ?string
    {
        return $this->emp_tel;
    }

    public function setEmpTel(string $emp_tel): self
    {
        $this->emp_tel = $emp_tel;

        return $this;
    }

    public function getPosId(): ?Poste
    {
        return $this->pos_id;
    }

    public function setPosId(?Poste $pos_id): self
    {
        $this->pos_id = $pos_id;

        return $this;
    }

    public function getEmploye(): ?self
    {
        return $this->employe;
    }

    public function setEmploye(?self $employe): self
    {
        $this->employe = $employe;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getEmpSupId(): Collection
    {
        return $this->emp_sup_id;
    }

    public function addEmpSupId(self $empSupId): self
    {
        if (!$this->emp_sup_id->contains($empSupId)) {
            $this->emp_sup_id[] = $empSupId;
            $empSupId->setEmploye($this);
        }

        return $this;
    }

    public function removeEmpSupId(self $empSupId): self
    {
        if ($this->emp_sup_id->removeElement($empSupId)) {
            // set the owning side to null (unless already changed)
            if ($empSupId->getEmploye() === $this) {
                $empSupId->setEmploye(null);
            }
        }

        return $this;
    }

    public function getEmpPosId(): ?self
    {
        return $this->emp_pos_id;
    }

    public function setEmpPosId(?self $emp_pos_id): self
    {
        $this->emp_pos_id = $emp_pos_id;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmploye(self $employe): self
    {
        if (!$this->employes->contains($employe)) {
            $this->employes[] = $employe;
            $employe->setEmpPosId($this);
        }

        return $this;
    }

    public function removeEmploye(self $employe): self
    {
        if ($this->employes->removeElement($employe)) {
            // set the owning side to null (unless already changed)
            if ($employe->getEmpPosId() === $this) {
                $employe->setEmpPosId(null);
            }
        }

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

    /**
     * @return Collection|Client[]
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
            $client->setEmpId($this);
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getEmpId() === $this) {
                $client->setEmpId(null);
            }
        }

        return $this;
    }

    public function getEmpMdp(): ?string
    {
        return $this->emp_mdp;
    }

    public function setEmpMdp(string $emp_mdp): self
    {
        $this->emp_mdp = $emp_mdp;

        return $this;
    }

    public function getCliSexe(): ?string
    {
        return $this->cli_sexe;
    }

    public function setCliSexe(string $cli_sexe): self
    {
        $this->cli_sexe = $cli_sexe;

        return $this;
    }

    public function getEmpSexe(): ?string
    {
        return $this->emp_sexe;
    }

    public function setEmpSexe(string $emp_sexe): self
    {
        $this->emp_sexe = $emp_sexe;

        return $this;
    }
}
