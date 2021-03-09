<?php

namespace App\Entity;

use App\Repository\CoordonneeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoordonneeRepository::class)
 */
class Coordonnee
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coo_adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coo_adresse_suite;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $coo_ville;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $coo_cp;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $coo_type;

    /**
     * @ORM\OneToMany(targetEntity=Employe::class, mappedBy="coo_id")
     */
    private $employes;

    /**
     * @ORM\OneToMany(targetEntity=Client::class, mappedBy="coo_id")
     */
    private $clients;

    public function __construct()
    {
        $this->employes = new ArrayCollection();
        $this->clients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCooAdresse(): ?string
    {
        return $this->coo_adresse;
    }

    public function setCooAdresse(string $coo_adresse): self
    {
        $this->coo_adresse = $coo_adresse;

        return $this;
    }

    public function getCooAdresseSuite(): ?string
    {
        return $this->coo_adresse_suite;
    }

    public function setCooAdresseSuite(?string $coo_adresse_suite): self
    {
        $this->coo_adresse_suite = $coo_adresse_suite;

        return $this;
    }

    public function getCooVille(): ?string
    {
        return $this->coo_ville;
    }

    public function setCooVille(string $coo_ville): self
    {
        $this->coo_ville = $coo_ville;

        return $this;
    }

    public function getCooCp(): ?string
    {
        return $this->coo_cp;
    }

    public function setCooCp(string $coo_cp): self
    {
        $this->coo_cp = $coo_cp;

        return $this;
    }

    public function getCooType(): ?string
    {
        return $this->coo_type;
    }

    public function setCooType(?string $coo_type): self
    {
        $this->coo_type = $coo_type;

        return $this;
    }

    /**
     * @return Collection|Employe[]
     */
    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmploye(Employe $employe): self
    {
        if (!$this->employes->contains($employe)) {
            $this->employes[] = $employe;
            $employe->setCooId($this);
        }

        return $this;
    }

    public function removeEmploye(Employe $employe): self
    {
        if ($this->employes->removeElement($employe)) {
            // set the owning side to null (unless already changed)
            if ($employe->getCooId() === $this) {
                $employe->setCooId(null);
            }
        }

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
            $client->setCooId($this);
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getCooId() === $this) {
                $client->setCooId(null);
            }
        }

        return $this;
    }
}
