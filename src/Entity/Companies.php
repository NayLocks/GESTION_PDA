<?php

namespace App\Entity;

use App\Repository\CompaniesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompaniesRepository::class)
 */
class Companies
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
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $backColorCode;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $textColorCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $littleName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $director;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wording;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $siret;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addressSupplement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $zipCode;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isArchived;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isVisibled;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isPrincipal;

    /**
     * @ORM\OneToMany(targetEntity=PDA::class, mappedBy="company")
     */
    private $pda;

    /**
     * @ORM\OneToMany(targetEntity=PDA::class, mappedBy="companyTemp")
     */
    private $pdaTemp;

    public function __construct()
    {
        $this->pda = new ArrayCollection();
        $this->pdaTemp = new ArrayCollection();
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

    public function getBackColorCode(): ?string
    {
        return $this->backColorCode;
    }

    public function setBackColorCode(?string $backColorCode): self
    {
        $this->backColorCode = $backColorCode;

        return $this;
    }

    public function getTextColorCode(): ?string
    {
        return $this->textColorCode;
    }

    public function setTextColorCode(?string $textColorCode): self
    {
        $this->textColorCode = $textColorCode;

        return $this;
    }

    public function getLittleName(): ?string
    {
        return $this->littleName;
    }

    public function setLittleName(?string $littleName): self
    {
        $this->littleName = $littleName;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(?string $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getWording(): ?string
    {
        return $this->wording;
    }

    public function setWording(?string $wording): self
    {
        $this->wording = $wording;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getAddressSupplement(): ?string
    {
        return $this->addressSupplement;
    }

    public function setAddressSupplement(?string $addressSupplement): self
    {
        $this->addressSupplement = $addressSupplement;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(?string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function isIsArchived(): ?bool
    {
        return $this->isArchived;
    }

    public function setIsArchived(?bool $isArchived): self
    {
        $this->isArchived = $isArchived;

        return $this;
    }

    public function isIsVisibled(): ?bool
    {
        return $this->isVisibled;
    }

    public function setIsVisibled(?bool $isVisibled): self
    {
        $this->isVisibled = $isVisibled;

        return $this;
    }

    public function isIsPrincipal(): ?bool
    {
        return $this->isPrincipal;
    }

    public function setIsPrincipal(?bool $isPrincipal): self
    {
        $this->isPrincipal = $isPrincipal;

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
            $pda->setCompany($this);
        }

        return $this;
    }

    public function removePda(PDA $pda): self
    {
        if ($this->pda->removeElement($pda)) {
            // set the owning side to null (unless already changed)
            if ($pda->getCompany() === $this) {
                $pda->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PDA>
     */
    public function getPdaTemp(): Collection
    {
        return $this->pdaTemp;
    }

    public function addPdaTemp(PDA $pdaTemp): self
    {
        if (!$this->pdaTemp->contains($pdaTemp)) {
            $this->pdaTemp[] = $pdaTemp;
            $pdaTemp->setCompanyTemp($this);
        }

        return $this;
    }

    public function removePdaTemp(PDA $pdaTemp): self
    {
        if ($this->pdaTemp->removeElement($pdaTemp)) {
            // set the owning side to null (unless already changed)
            if ($pdaTemp->getCompanyTemp() === $this) {
                $pdaTemp->setCompanyTemp(null);
            }
        }

        return $this;
    }
}
