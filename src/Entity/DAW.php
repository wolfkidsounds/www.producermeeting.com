<?php

namespace App\Entity;

use App\Repository\DAWRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DAWRepository::class)]
class DAW
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
