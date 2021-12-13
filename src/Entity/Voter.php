<?php

namespace App\Entity;

use App\Repository\VoterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoterRepository::class)
 */
class Voter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="voters")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=VeilleInfo::class, inversedBy="voters")
     */
    private $veille;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getVeille(): ?VeilleInfo
    {
        return $this->veille;
    }

    public function setVeille(?VeilleInfo $veille): self
    {
        $this->veille = $veille;

        return $this;
    }
}
