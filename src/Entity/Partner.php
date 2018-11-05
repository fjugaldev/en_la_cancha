<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartnerRepository")
 */
class Partner extends User
{
    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=150)
     */
    protected $lastname;

    /**
     * @ORM\Column(type="string", length=15)
     */
    protected $nif;

    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $phone;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partner", inversedBy="partners")
     */
    protected $owner;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Partner", mappedBy="owner")
     */
    protected $managers;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Subscription", inversedBy="partner")
     */
    protected $subscription;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Business", mappedBy="partner")
     */
    protected $business;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Address", mappedBy="partner")
     */
    private $addresses;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\License", mappedBy="partner", cascade={"persist", "remove"})
     */
    private $license;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\License", mappedBy="partner")
     */
    private $licenses;

    public function __construct()
    {
        parent::__construct();
        $this->managers = new ArrayCollection();
        $this->roles = ["ROLE_ADMIN"];
        $this->business = new ArrayCollection();
        $this->addresses = new ArrayCollection();
        $this->licenses = new ArrayCollection();
    }

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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getNif(): ?string
    {
        return $this->nif;
    }

    public function setNif(string $nif): self
    {
        $this->nif = $nif;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getOwner(): ?self
    {
        return $this->owner;
    }

    public function setOwner(?self $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getManagers(): Collection
    {
        return $this->managers;
    }

    public function addManager(self $manager): self
    {
        if (!$this->managers->contains($manager)) {
            $this->managers[] = $manager;
            $manager->setOwner($this);
        }

        return $this;
    }

    public function removeManager(self $manager): self
    {
        if ($this->managers->contains($manager)) {
            $this->managers->removeElement($manager);
            // set the owning side to null (unless already changed)
            if ($manager->getOwner() === $this) {
                $manager->setOwner(null);
            }
        }

        return $this;
    }

    public function getSubscription(): ?Subscription
    {
        return $this->subscription;
    }

    public function setSubscription(?Subscription $subscription): self
    {
        $this->subscription = $subscription;

        return $this;
    }

    /**
     * @return Collection|Business[]
     */
    public function getBusiness(): Collection
    {
        return $this->business;
    }

    public function addBusiness(Business $business): self
    {
        if (!$this->business->contains($business)) {
            $this->business[] = $business;
            $business->setPartner($this);
        }

        return $this;
    }

    public function removeBusiness(Business $business): self
    {
        if ($this->business->contains($business)) {
            $this->business->removeElement($business);
            // set the owning side to null (unless already changed)
            if ($business->getPartner() === $this) {
                $business->setPartner(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Address[]
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function addAddress(Address $address): self
    {
        if (!$this->addresses->contains($address)) {
            $this->addresses[] = $address;
            $address->setPartner($this);
        }

        return $this;
    }

    public function removeAddress(Address $address): self
    {
        if ($this->addresses->contains($address)) {
            $this->addresses->removeElement($address);
            // set the owning side to null (unless already changed)
            if ($address->getPartner() === $this) {
                $address->setPartner(null);
            }
        }

        return $this;
    }

    public function getLicense(): ?License
    {
        return $this->license;
    }

    public function setLicense(License $license): self
    {
        $this->license = $license;

        // set the owning side of the relation if necessary
        if ($this !== $license->getPartner()) {
            $license->setPartner($this);
        }

        return $this;
    }

    /**
     * @return Collection|License[]
     */
    public function getLicenses(): Collection
    {
        return $this->licenses;
    }

    public function addLicense(License $license): self
    {
        if (!$this->licenses->contains($license)) {
            $this->licenses[] = $license;
            $license->setPartner($this);
        }

        return $this;
    }

    public function removeLicense(License $license): self
    {
        if ($this->licenses->contains($license)) {
            $this->licenses->removeElement($license);
            // set the owning side to null (unless already changed)
            if ($license->getPartner() === $this) {
                $license->setPartner(null);
            }
        }

        return $this;
    }
}
