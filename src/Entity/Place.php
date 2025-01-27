<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: PlaceRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Place
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "datetime_immutable")]
    #[Gedmo\Timestampable(on: 'create')]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: "datetime_immutable")]
    #[Gedmo\Timestampable(on: 'update')]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, EventSlot>
     */
    #[ORM\OneToMany(targetEntity: EventSlot::class, mappedBy: 'place')]
    private Collection $eventSlots;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    #[Assert\Regex(
        pattern : '/^(?:0[1-9]|[1-8]\d|9[0-8])\d{3}$/' ,
        match : true,
        message : 'Veuillez entrer un code postal valide',
    )]
    private ?string $zipCode = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $place = null;

    public function __construct()
    {
        $this->eventSlots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[ORM\PrePersist]
    public function setCreatedAt(): static
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    #[ORM\PreUpdate]
    public function setUpdatedAt(): static
    {
        $this->updatedAt = new \DateTimeImmutable();

        return $this;
    }

    public function __toString(): string
    {
        $formattedAddress = $this->adresseComplete();
        $place = $this->place;
        return $formattedAddress . '(' . $place .')';
    }

    private function adresseComplete(): string
    {
        return $this->address . ', ' . $this->zipCode . ' ' . $this->city . ' ';
    }

    /**
     * @return Collection<int, EventSlot>
     */
    public function getEventSlots(): Collection
    {
        return $this->eventSlots;
    }

    public function addEventSlot(EventSlot $eventSlot): static
    {
        if (!$this->eventSlots->contains($eventSlot)) {
            $this->eventSlots->add($eventSlot);
            $eventSlot->setPlace($this);
        }

        return $this;
    }

    public function removeEventSlot(EventSlot $eventSlot): static
    {
        if ($this->eventSlots->removeElement($eventSlot)) {
            // set the owning side to null (unless already changed)
            if ($eventSlot->getPlace() === $this) {
                $eventSlot->setPlace(null);
            }
        }

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): static
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): static
    {
        $this->place = $place;

        return $this;
    }
}
