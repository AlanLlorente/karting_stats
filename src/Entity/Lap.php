<?php

namespace App\Entity;

use App\Repository\LapRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LapRepository::class)]
class Lap
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'lap_time')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Session $session = null;

    #[ORM\Column]
    private ?float $lap_time = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSession(): ?Session
    {
        return $this->session;
    }

    public function setSession(?Session $session): self
    {
        $this->session = $session;

        return $this;
    }

    public function getLapTime(): ?float
    {
        return $this->lap_time;
    }

    public function setLapTime(float $lap_time): self
    {
        $this->lap_time = $lap_time;

        return $this;
    }
}
