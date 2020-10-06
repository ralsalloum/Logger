<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|Rating[]
     */
    public function getRateValue(): Collection
    {
        return $this->rateValue;
    }

    public function addRateValue(Rating $rateValue): self
    {
        if (!$this->rateValue->contains($rateValue)) {
            $this->rateValue[] = $rateValue;
            $rateValue->setUserID($this);
        }

        return $this;
    }

    public function removeRateValue(Rating $rateValue): self
    {
        if ($this->rateValue->contains($rateValue)) {
            $this->rateValue->removeElement($rateValue);
            // set the owning side to null (unless already changed)
            if ($rateValue->getUserID() === $this) {
                $rateValue->setUserID(null);
            }
        }

        return $this;
    }
}
