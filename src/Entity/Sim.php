<?php

namespace App\Entity;

use App\Repository\SimRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SimRepository::class)
 */
class Sim
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
    private $noSIM;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $noPhone;

    /**
     * @ORM\OneToMany(targetEntity=PDA::class, mappedBy="sim")
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

    public function getNoSIM(): ?string
    {
        return $this->noSIM;
    }

    public function setNoSIM(?string $noSIM): self
    {
        $this->noSIM = $noSIM;

        return $this;
    }

    public function getNoPhone(): ?string
    {
        return $this->noPhone;
    }

    public function setNoPhone(?string $noPhone): self
    {
        $this->noPhone = $noPhone;

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
            $pda->setSim($this);
        }

        return $this;
    }

    public function removePda(PDA $pda): self
    {
        if ($this->pda->removeElement($pda)) {
            // set the owning side to null (unless already changed)
            if ($pda->getSim() === $this) {
                $pda->setSim(null);
            }
        }

        return $this;
    }
}
