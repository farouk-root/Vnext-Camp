<?php

namespace App\Entity;

use App\Repository\RefugeeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RefugeeRepository::class)]
class Refugee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $nationalCardID = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $age = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nationality = null;

    #[ORM\Column(nullable: true)]
    private ?int $tentNum = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNationalCardID(): ?int
    {
        return $this->nationalCardID;
    }

    public function setNationalCardID(?int $nationalCardID): static
    {
        $this->nationalCardID = $nationalCardID;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(?string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(?string $nationality): static
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getTentNum(): ?int
    {
        return $this->tentNum;
    }

    public function setTentNum(?int $tentNum): static
    {
        $this->tentNum = $tentNum;

        return $this;
    }
}
