<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'Date')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Track $Track = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\Column]
    private ?float $Temperature = null;

    #[ORM\Column]
    private ?int $Pos_between_friends = null;

    #[ORM\Column]
    private ?int $Pos_global = null;

    #[ORM\OneToMany(mappedBy: 'session', targetEntity: Lap::class)]
    private Collection $lap_time;

    public function __construct()
    {
        $this->lap_time = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrack(): ?Track
    {
        return $this->Track;
    }

    public function setTrack(?Track $Track): self
    {
        $this->Track = $Track;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->Temperature;
    }

    public function setTemperature(float $Temperature): self
    {
        $this->Temperature = $Temperature;

        return $this;
    }

    public function getPosBetweenFriends(): ?int
    {
        return $this->Pos_between_friends;
    }

    public function setPosBetweenFriends(int $Pos_between_friends): self
    {
        $this->Pos_between_friends = $Pos_between_friends;

        return $this;
    }

    public function getPosGlobal(): ?int
    {
        return $this->Pos_global;
    }

    public function setPosGlobal(int $Pos_global): self
    {
        $this->Pos_global = $Pos_global;

        return $this;
    }

    /**
     * @return Collection<int, Lap>
     */
    public function getLapTime(): Collection
    {
        return $this->lap_time;
    }

    public function addLapTime(Lap $lapTime): self
    {
        if (!$this->lap_time->contains($lapTime)) {
            $this->lap_time->add($lapTime);
            $lapTime->setSession($this);
        }

        return $this;
    }

    public function removeLapTime(Lap $lapTime): self
    {
        if ($this->lap_time->removeElement($lapTime)) {
            // set the owning side to null (unless already changed)
            if ($lapTime->getSession() === $this) {
                $lapTime->setSession(null);
            }
        }

        return $this;
    }
}
