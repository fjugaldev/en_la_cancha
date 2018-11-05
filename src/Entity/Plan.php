<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlanRepository")
 */
class Plan
{
    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=80)
     */
    protected $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    protected $business;

    /**
     * @ORM\Column(type="integer")
     */
    protected $fields;

    /**
     * @ORM\Column(type="integer")
     */
    protected $managers;

    /**
     * @ORM\Column(type="integer")
     */
    protected $owners;

    /**
     * @ORM\Column(type="text")
     */
    protected $parameters;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getBusiness(): ?int
    {
        return $this->business;
    }

    public function setBusiness(int $business): self
    {
        $this->business = $business;

        return $this;
    }

    public function getFields(): ?int
    {
        return $this->fields;
    }

    public function setFields(int $fields): self
    {
        $this->fields = $fields;

        return $this;
    }

    public function getManagers(): ?int
    {
        return $this->managers;
    }

    public function setManagers(int $managers): self
    {
        $this->managers = $managers;

        return $this;
    }

    public function getOwners(): ?int
    {
        return $this->owners;
    }

    public function setOwners(int $owners): self
    {
        $this->owners = $owners;

        return $this;
    }

    public function getParameters(): ?string
    {
        return $this->parameters;
    }

    public function setParameters(string $parameters): self
    {
        $this->parameters = $parameters;

        return $this;
    }
}
