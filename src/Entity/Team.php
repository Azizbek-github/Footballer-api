<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
#[ApiResource]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToOne(inversedBy: 'team', cascade: ['persist', 'remove'])]
    private ?Footballer $capitan = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Country $country = null;

    #[ORM\ManyToMany(targetEntity: Footballer::class, inversedBy: 'teams')]
    private Collection $footballer;

    public function __construct()
    {
        $this->footballer = new ArrayCollection();
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

    public function getCapitan(): ?Footballer
    {
        return $this->capitan;
    }

    public function setCapitan(?Footballer $capitan): self
    {
        $this->capitan = $capitan;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection<int, Footballer>
     */
    public function getFootballer(): Collection
    {
        return $this->footballer;
    }

    public function addFootballer(Footballer $footballer): self
    {
        if (!$this->footballer->contains($footballer)) {
            $this->footballer->add($footballer);
        }

        return $this;
    }

    public function removeFootballer(Footballer $footballer): self
    {
        $this->footballer->removeElement($footballer);

        return $this;
    }
}
