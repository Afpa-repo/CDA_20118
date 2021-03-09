<?php

namespace App\Entity;

use App\Repository\PosteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PosteRepository::class)
 */
class Poste
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
    private $pos_libelle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pos_description;

    /**
     * @ORM\OneToMany(targetEntity=Employe::class, mappedBy="pos_id", orphanRemoval=true)
     */
    private $employes;

    public function __construct()
    {
        $this->employes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosLibelle(): ?string
    {
        return $this->pos_libelle;
    }

    public function setPosLibelle(string $pos_libelle): self
    {
        $this->pos_libelle = $pos_libelle;

        return $this;
    }

    public function getPosDescription(): ?string
    {
        return $this->pos_description;
    }

    public function setPosDescription(?string $pos_description): self
    {
        $this->pos_description = $pos_description;

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
            $employe->setPosId($this);
        }

        return $this;
    }

    public function removeEmploye(Employe $employe): self
    {
        if ($this->employes->removeElement($employe)) {
            // set the owning side to null (unless already changed)
            if ($employe->getPosId() === $this) {
                $employe->setPosId(null);
            }
        }

        return $this;
    }
}
