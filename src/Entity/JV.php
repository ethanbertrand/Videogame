<?php

namespace App\Entity;

use App\Repository\JVRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JVRepository::class)]
class JV
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column]
    private ?\DateTime $Date_Sortie = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $Detail = null;

    #[ORM\ManyToOne(inversedBy: 'jVs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Genre $id_genre = null;

    /**
     * @var Collection<int, Plateforme>
     */
    #[ORM\ManyToMany(targetEntity: Plateforme::class, inversedBy: 'jVs')]
    private Collection $id_plateforme;

    /**
     * @var Collection<int, Utilisateur>
     */
    #[ORM\ManyToMany(targetEntity: Utilisateur::class, inversedBy: 'jvs')]
    private Collection $Note;

    public function __construct()
    {
        $this->id_plateforme = new ArrayCollection();
        $this->Note = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDateSortie(): ?\DateTime
    {
        return $this->Date_Sortie;
    }

    public function setDateSortie(\DateTime $Date_Sortie): static
    {
        $this->Date_Sortie = $Date_Sortie;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->Detail;
    }

    public function setDetail(string $Detail): static
    {
        $this->Detail = $Detail;

        return $this;
    }

    public function getIdGenre(): ?Genre
    {
        return $this->id_genre;
    }

    public function setIdGenre(?Genre $id_genre): static
    {
        $this->id_genre = $id_genre;

        return $this;
    }

    /**
     * @return Collection<int, Plateforme>
     */
    public function getIdPlateforme(): Collection
    {
        return $this->id_plateforme;
    }

    public function addIdPlateforme(Plateforme $idPlateforme): static
    {
        if (!$this->id_plateforme->contains($idPlateforme)) {
            $this->id_plateforme->add($idPlateforme);
        }

        return $this;
    }

    public function removeIdPlateforme(Plateforme $idPlateforme): static
    {
        $this->id_plateforme->removeElement($idPlateforme);

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getNote(): Collection
    {
        return $this->Note;
    }

    public function addNote(Utilisateur $note): static
    {
        if (!$this->Note->contains($note)) {
            $this->Note->add($note);
        }

        return $this;
    }

    public function removeNote(Utilisateur $note): static
    {
        $this->Note->removeElement($note);

        return $this;
    }
}
