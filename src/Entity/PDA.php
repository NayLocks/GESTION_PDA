<?php

namespace App\Entity;

use App\Repository\PDARepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PDARepository::class)
 */
class PDA
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
    private $serialNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imei;

    /**
     * @ORM\ManyToOne(targetEntity=Companies::class, inversedBy="pda")
     */
    private $company;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $noPDA;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $noSitePDA;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @ORM\ManyToOne(targetEntity=Companies::class, inversedBy="pdaTemp")
     */
    private $companyTemp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $problem;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="pda")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Sim::class, inversedBy="pda")
     */
    private $sim;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSerialNumber(): ?string
    {
        return $this->serialNumber;
    }

    public function setSerialNumber(?string $serialNumber): self
    {
        $this->serialNumber = $serialNumber;

        return $this;
    }

    public function getImei(): ?string
    {
        return $this->imei;
    }

    public function setImei(?string $imei): self
    {
        $this->imei = $imei;

        return $this;
    }

    public function getCompany(): ?Companies
    {
        return $this->company;
    }

    public function setCompany(?Companies $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getNoPDA(): ?string
    {
        return $this->noPDA;
    }

    public function setNoPDA(?string $noPDA): self
    {
        $this->noPDA = $noPDA;

        return $this;
    }

    public function getNoSitePDA(): ?string
    {
        return $this->noSitePDA;
    }

    public function setNoSitePDA(?string $noSitePDA): self
    {
        $this->noSitePDA = $noSitePDA;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getCompanyTemp(): ?Companies
    {
        return $this->companyTemp;
    }

    public function setCompanyTemp(?Companies $companyTemp): self
    {
        $this->companyTemp = $companyTemp;

        return $this;
    }

    public function getProblem(): ?string
    {
        return $this->problem;
    }

    public function setProblem(?string $problem): self
    {
        $this->problem = $problem;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSim(): ?Sim
    {
        return $this->sim;
    }

    public function setSim(?Sim $sim): self
    {
        $this->sim = $sim;

        return $this;
    }
}
