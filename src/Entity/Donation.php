<?php

namespace App\Entity;

use App\Repository\DonationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonationRepository::class)]
class Donation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Type = null;

    #[ORM\Column(nullable: true)]
    private ?int $Amount = null;

    #[ORM\ManyToOne(inversedBy: 'donations')]
    private ?Ressource $Ressources = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): static
    {
        $this->Type = $Type;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->Amount;
    }

    public function setAmount(?int $Amount): static
    {
        $this->Amount = $Amount;

        return $this;
    }

    public function getRessources(): ?Ressource
    {
        return $this->Ressources;
    }

    public function setRessources(?Ressource $Ressources): static
    {
        $this->Ressources = $Ressources;

        return $this;
    }
}
