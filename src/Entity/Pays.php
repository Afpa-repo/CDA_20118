<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table(name="pays")
 * @ORM\Entity
 */
class Pays
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
     * @ORM\Column(name="pay_libelle", type="string", length=50, nullable=false)
     */
    private $payLibelle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPayLibelle(): ?string
    {
        return $this->payLibelle;
    }

    public function setPayLibelle(string $payLibelle): self
    {
        $this->payLibelle = $payLibelle;

        return $this;
    }


}
