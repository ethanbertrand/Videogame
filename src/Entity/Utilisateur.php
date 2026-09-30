<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    private ?string $mdp = null;

    #[ORM\Column(length: 255)]
    private ?string $pseudo = null;

    /**
     * @var Collection<int, Jv>
     */
    #[ORM\ManyToMany(targetEntity: Jv::class, mappedBy: 'Note')]
    private Collection $jvs;

    public function __construct()
    {
        $this->jvs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * @return Collection<int, Jv>
     */
    public function getJvs(): Collection
    {
        return $this->jvs;
    }

    public function addJv(Jv $jv): static
    {
        if (!$this->jvs->contains($jv)) {
            $this->jvs->add($jv);
            $jv->addNote($this);
        }

        return $this;
    }

    public function removeJv(Jv $jv): static
    {
        if ($this->jvs->removeElement($jv)) {
            $jv->removeNote($this);
        }

        return $this;
    }
}
