<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employe
 *
 * @ORM\Table(name="employe", indexes={@ORM\Index(name="uti_id", columns={"uti_id"}), @ORM\Index(name="pos_id", columns={"pos_id"})})
 * @ORM\Entity
 */
class Employe
{
    /**
     * @var int
     *
     * @ORM\Column(name="emp_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $empId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="emp_date_entree", type="datetime", nullable=true)
     */
    private $empDateEntree;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="emp_date_sortie", type="datetime", nullable=true)
     */
    private $empDateSortie;

    /**
     * @var int|null
     *
     * @ORM\Column(name="emp_num_secu_social", type="integer", nullable=true)
     */
    private $empNumSecuSocial;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uti_id", referencedColumnName="uti_id")
     * })
     */
    private $uti;

    /**
     * @var \Poste
     *
     * @ORM\ManyToOne(targetEntity="Poste")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pos_id", referencedColumnName="pos_id")
     * })
     */
    private $pos;

    public function getEmpId(): ?int
    {
        return $this->empId;
    }

    public function getEmpDateEntree(): ?\DateTimeInterface
    {
        return $this->empDateEntree;
    }

    public function setEmpDateEntree(?\DateTimeInterface $empDateEntree): self
    {
        $this->empDateEntree = $empDateEntree;

        return $this;
    }

    public function getEmpDateSortie(): ?\DateTimeInterface
    {
        return $this->empDateSortie;
    }

    public function setEmpDateSortie(?\DateTimeInterface $empDateSortie): self
    {
        $this->empDateSortie = $empDateSortie;

        return $this;
    }

    public function getEmpNumSecuSocial(): ?int
    {
        return $this->empNumSecuSocial;
    }

    public function setEmpNumSecuSocial(?int $empNumSecuSocial): self
    {
        $this->empNumSecuSocial = $empNumSecuSocial;

        return $this;
    }

    public function getUti(): ?Utilisateur
    {
        return $this->uti;
    }

    public function setUti(?Utilisateur $uti): self
    {
        $this->uti = $uti;

        return $this;
    }

    public function getPos(): ?Poste
    {
        return $this->pos;
    }

    public function setPos(?Poste $pos): self
    {
        $this->pos = $pos;

        return $this;
    }


}
