<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poste
 *
 * @ORM\Table(name="poste")
 * @ORM\Entity
 */
class Poste
{
    /**
     * @var int
     *
     * @ORM\Column(name="pos_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $posId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pos_libelle", type="string", length=50, nullable=true)
     */
    private $posLibelle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pos_description", type="string", length=50, nullable=true)
     */
    private $posDescription;

    public function getPosId(): ?int
    {
        return $this->posId;
    }

    public function getPosLibelle(): ?string
    {
        return $this->posLibelle;
    }

    public function setPosLibelle(?string $posLibelle): self
    {
        $this->posLibelle = $posLibelle;

        return $this;
    }

    public function getPosDescription(): ?string
    {
        return $this->posDescription;
    }

    public function setPosDescription(?string $posDescription): self
    {
        $this->posDescription = $posDescription;

        return $this;
    }


}
