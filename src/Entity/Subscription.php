<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubscriptionRepository")
 */
class Subscription
{
    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Partner", mappedBy="plan")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    protected $partner;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Plan")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $plan;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BillingFrecuency")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $billingFrecuency;

    /**
     * @ORM\Column(type="date")
     */
    protected $nextBill;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isActive;

    public function __construct()
    {
        $this->partner = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Partner[]
     */
    public function getPartner(): Collection
    {
        return $this->partner;
    }

    public function addPartner(Partner $partner): self
    {
        if (!$this->partner->contains($partner)) {
            $this->partner[] = $partner;
            $partner->setPlan($this);
        }

        return $this;
    }

    public function removePartner(Partner $partner): self
    {
        if ($this->partner->contains($partner)) {
            $this->partner->removeElement($partner);
            // set the owning side to null (unless already changed)
            if ($partner->getPlan() === $this) {
                $partner->setPlan(null);
            }
        }

        return $this;
    }

    public function getPlan(): ?Plan
    {
        return $this->plan;
    }

    public function setPlan(?Plan $plan): self
    {
        $this->plan = $plan;

        return $this;
    }

    public function getBillingFrecuency(): ?BillingFrecuency
    {
        return $this->billingFrecuency;
    }

    public function setBillingFrecuency(?BillingFrecuency $billingFrecuency): self
    {
        $this->billingFrecuency = $billingFrecuency;

        return $this;
    }

    public function getNextBill(): ?\DateTimeInterface
    {
        return $this->nextBill;
    }

    public function setNextBill(\DateTimeInterface $nextBill): self
    {
        $this->nextBill = $nextBill;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }
}
