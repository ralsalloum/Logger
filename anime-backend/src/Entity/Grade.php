<?php

namespace App\Entity;

use App\Repository\GradeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GradeRepository::class)
 */
class Grade
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $userID;

    /**
     * @ORM\Column(type="integer")
     */
    private $points;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserID(): ?User
    {
        return $this->userID;
    }

    public function setUserID(User $userID): self
    {
        $this->userID = $userID;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }
}
