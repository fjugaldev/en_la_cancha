<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BillingFrecuencyRepository")
 */
class BillingFrecuency
{
    use TimestampableEntity;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $frecuency;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PartnerPlan", inversedBy="billingFrecuency")
     */
    private $partnerPlan;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFrecuency(): ?int
    {
        return $this->frecuency;
    }

    public function setFrecuency(int $frecuency): self
    {
        $this->frecuency = $frecuency;

        return $this;
    }

    public function getPartnerPlan(): ?PartnerPlan
    {
        return $this->partnerPlan;
    }

    public function setPartnerPlan(?PartnerPlan $partnerPlan): self
    {
        $this->partnerPlan = $partnerPlan;

        return $this;
    }
}
