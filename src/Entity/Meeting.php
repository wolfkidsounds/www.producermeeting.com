<?php // src/Entity/Meeting.php

namespace App\Entity;

use DateTimeImmutable;
use App\Config\PostStatus;
use App\Config\MeetingStatus;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\MeetingRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: MeetingRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity('Slug')]
class Meeting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $editedAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $publishedAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $scheduledAt = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $Location = null;

    #[ORM\ManyToMany(targetEntity: Host::class)]
    private Collection $Host;

    #[ORM\OneToMany(mappedBy: 'Meeting', targetEntity: Enrollment::class)]
    private Collection $Enrollments;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\Column(nullable: true, enumType: MeetingStatus::class)]
    private ?MeetingStatus $MeetingStatus = MeetingStatus::UPCOMING;

    #[ORM\Column(nullable: true, enumType: PostStatus::class)]
    private ?PostStatus $PostStatus = PostStatus::DRAFT;

    #[ORM\Column(length: 255)]
    private ?string $Slug = null;

    #[ORM\Column(type: 'easy_media_type', nullable: true)]
    private ?string $Image = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Speaker $Speaker = null;

    public function __construct()
    {
        $this->Host = new ArrayCollection();
        $this->Enrollments = new ArrayCollection();
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function updatedTimestamps(): void
    {
        $dateTimeNow = new DateTimeImmutable('now');
        $this->setEditedAt($dateTimeNow);

        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt($dateTimeNow);
        }

        if($this->getPublishedAt() === null && $this->getPostStatus() === PostStatus::PUBLIC) {
            $this->setPublishedAt($dateTimeNow);
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getEditedAt(): ?\DateTimeImmutable
    {
        return $this->editedAt;
    }

    public function setEditedAt(?\DateTimeImmutable $editedAt): static
    {
        $this->editedAt = $editedAt;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?\DateTimeImmutable $publishedAt): static
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getScheduledAt(): ?\DateTimeImmutable
    {
        return $this->scheduledAt;
    }

    public function setScheduledAt(\DateTimeImmutable $scheduledAt): static
    {
        $this->scheduledAt = $scheduledAt;

        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->Location;
    }

    public function setLocation(?Location $Location): static
    {
        $this->Location = $Location;

        return $this;
    }

    /**
     * @return Collection<int, Host>
     */
    public function getHost(): Collection
    {
        return $this->Host;
    }

    public function addHost(Host $host): static
    {
        if (!$this->Host->contains($host)) {
            $this->Host->add($host);
        }

        return $this;
    }

    public function removeHost(Host $host): static
    {
        $this->Host->removeElement($host);

        return $this;
    }

    /**
     * @return Collection<int, Enrollment>
     */
    public function getEnrollments(): Collection
    {
        return $this->Enrollments;
    }

    public function addEnrollment(Enrollment $enrollment): static
    {
        if (!$this->Enrollments->contains($enrollment)) {
            $this->Enrollments->add($enrollment);
            $enrollment->setMeeting($this);
        }

        return $this;
    }

    public function removeEnrollment(Enrollment $enrollment): static
    {
        if ($this->Enrollments->removeElement($enrollment)) {
            // set the owning side to null (unless already changed)
            if ($enrollment->getMeeting() === $this) {
                $enrollment->setMeeting(null);
            }
        }

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): static
    {
        $this->Date = $Date;

        return $this;
    }

    public function getMeetingStatus(): ?MeetingStatus
    {
        return $this->MeetingStatus;
    }

    public function setMeetingStatus(MeetingStatus $MeetingStatus): static
    {
        $this->MeetingStatus = $MeetingStatus;

        return $this;
    }

    public function getPostStatus(): ?PostStatus
    {
        return $this->PostStatus;
    }

    public function setPostStatus(PostStatus $PostStatus): static
    {
        $this->PostStatus = $PostStatus;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->Slug;
    }

    public function setSlug(string $Slug): static
    {
        $this->Slug = $Slug;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(?string $Image): static
    {
        $this->Image = $Image;

        return $this;
    }

    public function getSpeaker(): ?Speaker
    {
        return $this->Speaker;
    }

    public function setSpeaker(?Speaker $Speaker): static
    {
        $this->Speaker = $Speaker;

        return $this;
    }
}
