<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CapabilityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *
 * @ORM\Entity(repositoryClass=CapabilityRepository::class)
 * @ApiResource(
 *     collectionOperations={
            "post" = {
 *              "denormalization_context" = {
                    "groups" = {"post:collection:capability"}
 *              }
 *          },
 *          "get"
 *     }
 * )
 */
class Capability
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:capability"})
     */
    private $label;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"post:collection:capability"})
     */
    private $tsCreation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:capability"})
     */
    private $userCreation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"post:collection:capability"})
     */
    private $tsUpdate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"post:collection:capability"})
     */
    private $userUpdate;

    /**
     * @ORM\OneToMany(targetEntity=TradeCapabilities::class, mappedBy="capability")
     */
    private $tradeCapabilities;

    public function __construct()
    {
        $this->trades = new ArrayCollection();
        $this->tradeCapabilities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

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
     * @return Collection|TradeCapabilities[]
     */
    public function getTradeCapabilities(): Collection
    {
        return $this->tradeCapabilities;
    }

    public function addTradeCapability(TradeCapabilities $tradeCapability): self
    {
        if (!$this->tradeCapabilities->contains($tradeCapability)) {
            $this->tradeCapabilities[] = $tradeCapability;
            $tradeCapability->setCapability($this);
        }

        return $this;
    }

    public function removeTradeCapability(TradeCapabilities $tradeCapability): self
    {
        if ($this->tradeCapabilities->removeElement($tradeCapability)) {
            // set the owning side to null (unless already changed)
            if ($tradeCapability->getCapability() === $this) {
                $tradeCapability->setCapability(null);
            }
        }

        return $this;
    }


}
