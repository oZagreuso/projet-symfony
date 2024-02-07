<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CandidatRepository;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection()])]
class Candidat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $slogan = null;

    #[ORM\OneToMany(targetEntity: Vote::class, mappedBy: 'candidat')]
    private Collection $votes;

    #[ORM\OneToMany(targetEntity: SessionCandidat::class, mappedBy: 'candidat')]
    private Collection $sessionCandidats;

    public function __construct()
    {
        $this->votes = new ArrayCollection();
        $this->sessionCandidats = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSlogan(): ?string
    {
        return $this->slogan;
    }

    public function setSlogan(string $slogan): static
    {
        $this->slogan = $slogan;

        return $this;
    }

    /**
     * @return Collection<int, Vote>
     */
    public function getVotes(): Collection
    {
        return $this->votes;
    }

    public function addVote(Vote $vote): static
    {
        if (!$this->votes->contains($vote)) {
            $this->votes->add($vote);
            $vote->setCandidat($this);
        }

        return $this;
    }

    public function removeVote(Vote $vote): static
    {
        if ($this->votes->removeElement($vote)) {
            // set the owning side to null (unless already changed)
            if ($vote->getCandidat() === $this) {
                $vote->setCandidat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SessionCandidat>
     */
    public function getSessionCandidats(): Collection
    {
        return $this->sessionCandidats;
    }

    public function addSessionCandidat(SessionCandidat $sessionCandidat): static
    {
        if (!$this->sessionCandidats->contains($sessionCandidat)) {
            $this->sessionCandidats->add($sessionCandidat);
            $sessionCandidat->setCandidat($this);
        }

        return $this;
    }

    public function removeSessionCandidat(SessionCandidat $sessionCandidat): static
    {
        if ($this->sessionCandidats->removeElement($sessionCandidat)) {
            // set the owning side to null (unless already changed)
            if ($sessionCandidat->getCandidat() === $this) {
                $sessionCandidat->setCandidat(null);
            }
        }

        return $this;
    }
}
