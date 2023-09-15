<?php

namespace App\Entity;

use App\Repository\TravaillerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TravaillerRepository::class)]
class Travailler
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CIN = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $role = null;

    #[ORM\ManyToOne(inversedBy: 'travaillers')]
    private ?Camp $CampID = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCIN(): ?string
    {
        return $this->CIN;
    }

    public function setCIN(?string $CIN): static
    {
        $this->CIN = $CIN;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getCampID(): ?Camp
    {
        return $this->CampID;
    }

    public function setCampID(?Camp $CampID): static
    {
        $this->CampID = $CampID;

        return $this;
    }
}
