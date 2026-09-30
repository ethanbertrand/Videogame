<?php

namespace App\Entity;

use App\Repository\PlateformeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlateformeRepository::class)]
class Plateforme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, JV>
     */
    #[ORM\ManyToMany(targetEntity: JV::class, mappedBy: 'id_plateforme')]
    private Collection $jVs;

    public function __construct()
    {
        $this->jVs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, JV>
     */
    public function getJVs(): Collection
    {
        return $this->jVs;
    }

    public function addJV(JV $jV): static
    {
        if (!$this->jVs->contains($jV)) {
            $this->jVs->add($jV);
            $jV->addIdPlateforme($this);
        }

        return $this;
    }

    public function removeJV(JV $jV): static
    {
        if ($this->jVs->removeElement($jV)) {
            $jV->removeIdPlateforme($this);
        }

        return $this;
    }
}
