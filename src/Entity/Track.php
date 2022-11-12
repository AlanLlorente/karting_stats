<?php

namespace App\Entity;

use App\Repository\TrackRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrackRepository::class)]
class Track
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Location = null;

    #[ORM\Column(length: 255)]
    private ?string $Length = null;

    #[ORM\Column]
    private ?int $Turns = null;

    #[ORM\OneToMany(mappedBy: 'Track', targetEntity: Session::class)]
    private Collection $Date;

    public function __construct()
    {
        $this->Date = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->Location;
    }

    public function setLocation(string $Location): self
    {
        $this->Location = $Location;

        return $this;
    }

    public function getLength(): ?string
    {
        return $this->Length;
    }

    public function setLength(string $Length): self
    {
        $this->Length = $Length;

        return $this;
    }

    public function getTurns(): ?int
    {
        return $this->Turns;
    }

    public function setTurns(int $Turns): self
    {
        $this->Turns = $Turns;

        return $this;
    }

    /**
     * @return Collection<int, Session>
     */
    public function getDate(): Collection
    {
        return $this->Date;
    }

    public function addDate(Session $date): self
    {
        if (!$this->Date->contains($date)) {
            $this->Date->add($date);
            $date->setTrack($this);
        }

        return $this;
    }

    public function removeDate(Session $date): self
    {
        if ($this->Date->removeElement($date)) {
            // set the owning side to null (unless already changed)
            if ($date->getTrack() === $this) {
                $date->setTrack(null);
            }
        }

        return $this;
    }
}
