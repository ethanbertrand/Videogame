<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenreRepository::class)]
class Genre
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
    #[ORM\OneToMany(targetEntity: JV::class, mappedBy: 'id_genre')]
    private Collection $jVs;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

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
            $jV->setIdGenre($this);
        }

        return $this;
    }

    public function removeJV(JV $jV): static
    {
        if ($this->jVs->removeElement($jV)) {
            // set the owning side to null (unless already changed)
            if ($jV->getIdGenre() === $this) {
                $jV->setIdGenre(null);
            }
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }
}
