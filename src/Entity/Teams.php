<?php

namespace App\Entity;

use App\Repository\TeamsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamsRepository::class)]
class Teams
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $memberCount = null;

    #[ORM\ManyToOne]
    private ?Travailler $travaillerID = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMemberCount(): ?int
    {
        return $this->memberCount;
    }

    public function setMemberCount(?int $memberCount): static
    {
        $this->memberCount = $memberCount;

        return $this;
    }

    public function getTravaillerID(): ?Travailler
    {
        return $this->travaillerID;
    }

    public function setTravaillerID(?Travailler $travaillerID): static
    {
        $this->travaillerID = $travaillerID;

        return $this;
    }
}
