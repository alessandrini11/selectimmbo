<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MetropolisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *
 * @ORM\Entity(repositoryClass=MetropolisRepository::class)
 * @ApiResource(
 *     collectionOperations={
            "post" = {
 *              "denormalization_context" = {
                    "groups" = {"post:collection:metropolis"}
 *              }
 *          },
 *          "get"
 *     }
 * )
 */
class Metropolis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:metropolis","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:metropolis","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:metropolis","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $state;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:metropolis","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $iconUrl;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"post:collection:metropolis","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $tsCreation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:metropolis","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $userCreation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"post:collection:metropolis","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $tsUpdate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"post:collection:metropolis","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $userUpdate;

    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="metropolis")
     */
    private $locations;

    public function __construct()
    {
        $this->locations = new ArrayCollection();
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getIconUrl(): ?string
    {
        return $this->iconUrl;
    }

    public function setIconUrl(string $icon_url): self
    {
        $this->iconUrl = $icon_url;

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

    /**
     * @return Collection|Location[]
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): self
    {
        if (!$this->locations->contains($location)) {
            $this->locations[] = $location;
            $location->setMetropolis($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): self
    {
        if ($this->locations->removeElement($location)) {
            // set the owning side to null (unless already changed)
            if ($location->getMetropolis() === $this) {
                $location->setMetropolis(null);
            }
        }

        return $this;
    }
}
