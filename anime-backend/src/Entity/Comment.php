<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $userID;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="integer")
     */
    private $AnimeID;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserID(): ?int
    {
        return $this->userID;
    }

    public function setUserID(?int $userID): self
    {
        $this->userID = $userID;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getAnimeID(): ?int
    {
        return $this->AnimeID;
    }

    public function setAnimeID(int $AnimeID): self
    {
        $this->AnimeID = $AnimeID;

        return $this;
    }
}
