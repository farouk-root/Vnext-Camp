<?php

namespace App\Entity;

use App\Repository\CampRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CampRepository::class)]
class Camp
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Location = null;

    #[ORM\Column]
    private ?int $Capacity = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Description = null;

    #[ORM\OneToMany(mappedBy: 'CampID', targetEntity: Refugee::class)]
    private Collection $refugees;

    public function __construct()
    {
        $this->refugees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->Location;
    }

    public function setLocation(?string $Location): static
    {
        $this->Location = $Location;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->Capacity;
    }

    public function setCapacity(int $Capacity): static
    {
        $this->Capacity = $Capacity;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection<int, Refugee>
     */
    public function getRefugees(): Collection
    {
        return $this->refugees;
    }

    public function addRefugee(Refugee $refugee): static
    {
        if (!$this->refugees->contains($refugee)) {
            $this->refugees->add($refugee);
            $refugee->setCampID($this);
        }

        return $this;
    }

    public function removeRefugee(Refugee $refugee): static
    {
        if ($this->refugees->removeElement($refugee)) {
            // set the owning side to null (unless already changed)
            if ($refugee->getCampID() === $this) {
                $refugee->setCampID(null);
            }
        }

        return $this;
    }
}
