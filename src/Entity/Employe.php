<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employe
 *
 * @ORM\Table(name="employe", indexes={@ORM\Index(name="FK_employe_poste", columns={"pos_id"}), @ORM\Index(name="FK_employe_employe", columns={"emp_pos_id"}), @ORM\Index(name="FK_employe_coordonnee", columns={"coo_id"})})
 * @ORM\Entity
 */
class Employe
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
     * @var \DateTime
     *
     * @ORM\Column(name="emp_date_entree", type="datetime", nullable=false)
     */
    private $empDateEntree;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="emp_date_sortie", type="datetime", nullable=true)
     */
    private $empDateSortie;

    /**
     * @var int
     *
     * @ORM\Column(name="emp_num_secu_social", type="integer", nullable=false)
     */
    private $empNumSecuSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="emp_email", type="string", length=255, nullable=false)
     */
    private $empEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="emp_tel", type="string", length=20, nullable=false)
     */
    private $empTel;

    /**
     * @var string
     *
     * @ORM\Column(name="emp_mdp", type="string", length=255, nullable=false)
     */
    private $empMdp;

    /**
     * @var string
     *
     * @ORM\Column(name="emp_sexe", type="string", length=1, nullable=false)
     */
    private $empSexe;

    /**
     * @var string
     *
     * @ORM\Column(name="emp_nom", type="string", length=50, nullable=false)
     */
    private $empNom;

    /**
     * @var string
     *
     * @ORM\Column(name="emp_prenom", type="string", length=50, nullable=false)
     */
    private $empPrenom;

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
     *   @ORM\JoinColumn(name="emp_pos_id", referencedColumnName="id")
     * })
     */
    private $empPos;

    /**
     * @var \Poste
     *
     * @ORM\ManyToOne(targetEntity="Poste")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pos_id", referencedColumnName="id")
     * })
     */
    private $pos;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmpDateEntree(): ?\DateTimeInterface
    {
        return $this->empDateEntree;
    }

    public function setEmpDateEntree(\DateTimeInterface $empDateEntree): self
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

    public function setEmpNumSecuSocial(int $empNumSecuSocial): self
    {
        $this->empNumSecuSocial = $empNumSecuSocial;

        return $this;
    }

    public function getEmpEmail(): ?string
    {
        return $this->empEmail;
    }

    public function setEmpEmail(string $empEmail): self
    {
        $this->empEmail = $empEmail;

        return $this;
    }

    public function getEmpTel(): ?string
    {
        return $this->empTel;
    }

    public function setEmpTel(string $empTel): self
    {
        $this->empTel = $empTel;

        return $this;
    }

    public function getEmpMdp(): ?string
    {
        return $this->empMdp;
    }

    public function setEmpMdp(string $empMdp): self
    {
        $this->empMdp = $empMdp;

        return $this;
    }

    public function getEmpSexe(): ?string
    {
        return $this->empSexe;
    }

    public function setEmpSexe(string $empSexe): self
    {
        $this->empSexe = $empSexe;

        return $this;
    }

    public function getEmpNom(): ?string
    {
        return $this->empNom;
    }

    public function setEmpNom(string $empNom): self
    {
        $this->empNom = $empNom;

        return $this;
    }

    public function getEmpPrenom(): ?string
    {
        return $this->empPrenom;
    }

    public function setEmpPrenom(string $empPrenom): self
    {
        $this->empPrenom = $empPrenom;

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

    public function getEmpPos(): ?self
    {
        return $this->empPos;
    }

    public function setEmpPos(?self $empPos): self
    {
        $this->empPos = $empPos;

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
