<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 * @ApiResource(
 *     collectionOperations={
            "post" = {
 *              "denormalization_context" = {
                    "groups" = {"post:collection:location"}
 *              }
 *          },
 *          "get"
 *     }
 * )
 */
class Location
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:location","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"post:collection:location","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"post:collection:location","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $tsCreation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:location","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $userCreation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"post:collection:location","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $tsUpdate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"post:collection:location","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $userUpdate;

    /**
     * @ORM\ManyToOne(targetEntity=Metropolis::class, inversedBy="locations")
     * @Groups({"post:collection:location","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $metropolis;

    /**
     * @ORM\OneToMany(targetEntity=Trade::class, mappedBy="location")
     */
    private $trades;

    public function __construct()
    {
        $this->trades = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTsCreation(): ?\DateTimeInterface
    {
        return $this->tsCreation;
    }

    public function setTsCreation(\DateTimeInterface $ts_creation): self
    {
        $this->tsCreation = $ts_creation;

        return $this;
    }

    public function getUserCreation(): ?string
    {
        return $this->userCreation;
    }

    public function setUserCreation(string $user_creation): self
    {
        $this->userCreation = $user_creation;

        return $this;
    }

    public function getTsUpdate(): ?\DateTimeInterface
    {
        return $this->tsUpdate;
    }

    public function setTsUpdate(?\DateTimeInterface $ts_update): self
    {
        $this->tsUpdate = $ts_update;

        return $this;
    }

    public function getUserUpdate(): ?string
    {
        return $this->userUpdate;
    }

    public function setUserUpdate(?string $user_update): self
    {
        $this->userUpdate = $user_update;

        return $this;
    }

    public function getMetropolis(): ?Metropolis
    {
        return $this->metropolis;
    }

    public function setMetropolis(?Metropolis $metropolis): self
    {
        $this->metropolis = $metropolis;

        return $this;
    }

    /**
     * @return Collection|Trade[]
     */
    public function getTrades(): Collection
    {
        return $this->trades;
    }

    public function addTrade(Trade $trade): self
    {
        if (!$this->trades->contains($trade)) {
            $this->trades[] = $trade;
            $trade->setLocation($this);
        }

        return $this;
    }

    public function removeTrade(Trade $trade): self
    {
        if ($this->trades->removeElement($trade)) {
            // set the owning side to null (unless already changed)
            if ($trade->getLocation() === $this) {
                $trade->setLocation(null);
            }
        }

        return $this;
    }
}
