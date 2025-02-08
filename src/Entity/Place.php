<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use App\Entity\Event;

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
    private ?string $placeName = null;

    /**
     * @var Collection<int, Event>
     */
    #[ORM\OneToMany(mappedBy: 'place', targetEntity: Event::class)]
    private Collection $events;

    public function __construct()
    {
        $this->events = new ArrayCollection();
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
        $placeName = $this->placeName;
        return $formattedAddress . '(' . $placeName .')';
    }

    private function adresseComplete(): string
    {
        return $this->address . ', ' . $this->zipCode . ' ' . $this->city . ' ';
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

    public function getPlaceName(): ?string
    {
        return $this->placeName;
    }

    public function setPlaceName(string $placeName): static
    {
        $this->placeName = $placeName;

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    // public function addEvent(Event $event): static
    // {
    //     if (!$this->events->contains($event)) {
    //         $this->events->add($event);
    //         $event->setPlace($this);
    //     }

    //     return $this;
    // }

    // public function removeEvent(Event $event): static
    // {
    //     if ($this->events->removeElement($event)) {
    //         // set the owning side to null (unless already changed)
    //         if ($event->getPlace() === $this) {
    //             $event->setPlace(null);
    //         }
    //     }

    //     return $this;
    // }
}
