<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use App\Repository\VoteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoteRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new Post()
    ])]
class Vote
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $tour = null;

    #[ORM\ManyToOne(inversedBy: 'votes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SessionVote $session = null;

    #[ORM\ManyToOne(inversedBy: 'votes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Candidat $candidat = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTour(): ?int
    {
        return $this->tour;
    }

    public function setTour(int $tour): static
    {
        $this->tour = $tour;

        return $this;
    }

    public function getSession(): ?SessionVote
    {
        return $this->session;
    }

    public function setSession(?SessionVote $session): static
    {
        $this->session = $session;

        return $this;
    }

    public function getCandidat(): ?Candidat
    {
        return $this->candidat;
    }

    public function setCandidat(?Candidat $candidat): static
    {
        $this->candidat = $candidat;

        return $this;
    }

}
