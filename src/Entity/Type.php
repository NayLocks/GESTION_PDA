<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 */
class Type
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=PDA::class, mappedBy="type")
     */
    private $pda;

    public function __construct()
    {
        $this->pda = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, PDA>
     */
    public function getPda(): Collection
    {
        return $this->pda;
    }

    public function addPda(PDA $pda): self
    {
        if (!$this->pda->contains($pda)) {
            $this->pda[] = $pda;
            $pda->setType($this);
        }

        return $this;
    }

    public function removePda(PDA $pda): self
    {
        if ($this->pda->removeElement($pda)) {
            // set the owning side to null (unless already changed)
            if ($pda->getType() === $this) {
                $pda->setType(null);
            }
        }

        return $this;
    }
}
