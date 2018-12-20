<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EvenementsRepository")
 */
class Evenements
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $hour;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\StartUp", inversedBy="evenements")
     */
    private $startups;

    public function __construct()
    {
        $this->startups = new ArrayCollection();
        $this->attributions = new ArrayCollection();
        $this->formulaires = new ArrayCollection();
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHour(): ?\DateTimeInterface
    {
        return $this->hour;
    }

    public function setHour(\DateTimeInterface $hour): self
    {
        $this->hour = $hour;

        return $this;
    }

    /**
     * @return Collection|StartUp[]
     */
    public function getStartups(): Collection
    {
        return $this->startups;
    }

    public function addStartup(StartUp $startup): self
    {
        if (!$this->startups->contains($startup)) {
            $this->startups[] = $startup;
        }

        return $this;
    }

    public function removeStartup(StartUp $startup): self
    {
        if ($this->startups->contains($startup)) {
            $this->startups->removeElement($startup);
        }

        return $this;
    }

}
