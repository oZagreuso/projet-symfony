<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SessionVoteRepository;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionVoteRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection()
    ])]
class SessionVote
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbTours = null;

    #[ORM\Column]
    private ?int $nbRepresentants = null;

    #[ORM\Column(length: 10)]
    private ?string $statut = null;

    #[ORM\OneToMany(targetEntity: Vote::class, mappedBy: 'session')]
    private Collection $votes;

    #[ORM\OneToMany(targetEntity: SessionCandidat::class, mappedBy: 'session')]
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

    public function getNbTours(): ?int
    {
        return $this->nbTours;
    }

    public function setNbTours(int $nbTours): static
    {
        $this->nbTours = $nbTours;

        return $this;
    }

    public function getNbRepresentants(): ?int
    {
        return $this->nbRepresentants;
    }

    public function setNbRepresentants(int $nbRepresentants): static
    {
        $this->nbRepresentants = $nbRepresentants;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

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
            $vote->setSession($this);
        }

        return $this;
    }

    public function removeVote(Vote $vote): static
    {
        if ($this->votes->removeElement($vote)) {
            // set the owning side to null (unless already changed)
            if ($vote->getSession() === $this) {
                $vote->setSession(null);
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
            $sessionCandidat->setSession($this);
        }

        return $this;
    }

    public function removeSessionCandidat(SessionCandidat $sessionCandidat): static
    {
        if ($this->sessionCandidats->removeElement($sessionCandidat)) {
            // set the owning side to null (unless already changed)
            if ($sessionCandidat->getSession() === $this) {
                $sessionCandidat->setSession(null);
            }
        }

        return $this;
    }    
    
}
