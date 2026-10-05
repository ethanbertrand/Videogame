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
    private ?string $Titre = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    #[ORM\Column]
    private ?int $Notes = null;

    #[ORM\ManyToOne(inversedBy: 'avis')]
    private ?Jv $Avis_JV = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): static
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getNotes(): ?int
    {
        return $this->Notes;
    }

    public function setNotes(int $Notes): static
    {
        $this->Notes = $Notes;

        return $this;
    }

    public function getAvisJV(): ?Jv
    {
        return $this->Avis_JV;
    }

    public function setAvisJV(?Jv $Avis_JV): static
    {
        $this->Avis_JV = $Avis_JV;

        return $this;
    }
}
