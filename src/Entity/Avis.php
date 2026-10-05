<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Avis = null;

    #[ORM\ManyToOne(inversedBy: 'avis')]
    private ?JV $avis_jeux = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getAvis(): ?string
    {
        return $this->Avis;
    }

    public function setAvis(string $Avis): static
    {
        $this->Avis = $Avis;

        return $this;
    }

    public function getAvisJeux(): ?JV
    {
        return $this->avis_jeux;
    }

    public function setAvisJeux(?JV $avis_jeux): static
    {
        $this->avis_jeux = $avis_jeux;

        return $this;
    }
}
