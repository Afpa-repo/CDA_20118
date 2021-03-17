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
     * @ORM\Column(name="pay_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $payId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pay_libelle", type="string", length=50, nullable=true)
     */
    private $payLibelle;

    public function getPayId(): ?int
    {
        return $this->payId;
    }

    public function getPayLibelle(): ?string
    {
        return $this->payLibelle;
    }

    public function setPayLibelle(?string $payLibelle): self
    {
        $this->payLibelle = $payLibelle;

        return $this;
    }

    public function __toString()
    {
        return $this->payLibelle;
    }

}
