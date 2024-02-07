<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SessionCandidatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionCandidatRepository::class)]
#[ApiResource]
class SessionCandidat
{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null; 


    #[ORM\ManyToOne(inversedBy: 'sessionCandidats')]
    #[ORM\JoinColumn(nullable: false)]   
    private ?Candidat $candidat = null;

    #[ORM\ManyToOne(inversedBy: 'sessionCandidats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SessionVote $session = null;

    public function getCandidat(): ?Candidat
    {
        return $this->candidat;
    }

    public function setCandidat(?Candidat $candidat): static
    {
        $this->candidat = $candidat;

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

    public function getId(): ?int
    {
        return $this->id;
    }
}
