<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TradeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TradeRepository::class)
 * @ApiResource(
 *     collectionOperations={
            "post" = {
 *              "denormalization_context" = {
            "groups" = {"post:collection:trade"}
 *              }
 *
 *          },
 *          "get"
 *     }
 * )
 */
class Trade
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"post:collection:trade","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $idTrade;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"post:collection:trade","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:trade","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $currency;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:trade","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:trade","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $agreement;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:trade","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $completed;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"post:collection:trade","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $tsCreation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:trade","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $userCreation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"post:collection:trade","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $tsUpdate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"post:collection:trade","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $userUpdate;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="trades")
     * @Groups({"post:collection:trade","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity=Gallery::class, inversedBy="trades")
     * @Groups({"post:collection:trade","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $gallery;

    /**
     * @ORM\OneToMany(targetEntity=TradeAsset::class, mappedBy="trade")
     */
    private $tradeAssets;

    /**
     * @ORM\OneToMany(targetEntity=TradeCapabilities::class, mappedBy="trade")
     */
    private $tradeCapabilities;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:trade"})
     */
    private $type;

    public function __construct()
    {
        $this->capability = new ArrayCollection();
        $this->assets = new ArrayCollection();
        $this->tradeAssets = new ArrayCollection();
        $this->tradeCapabilities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTrade(): ?int
    {
        return $this->idTrade;
    }

    public function setIdTrade(int $id_trade): self
    {
        $this->idTrade = $id_trade;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAgreement(): ?string
    {
        return $this->agreement;
    }

    public function setAgreement(string $agreement): self
    {
        $this->agreement = $agreement;

        return $this;
    }

    public function getCompleted(): ?string
    {
        return $this->completed;
    }

    public function setCompleted(string $completed): self
    {
        $this->completed = $completed;

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

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getGallery(): ?Gallery
    {
        return $this->gallery;
    }

    public function setGallery(?Gallery $gallery): self
    {
        $this->gallery = $gallery;

        return $this;
    }

    /**
     * @return Collection|TradeAsset[]
     */
    public function getTradeAssets(): Collection
    {
        return $this->tradeAssets;
    }

    public function addTradeAsset(TradeAsset $tradeAsset): self
    {
        if (!$this->tradeAssets->contains($tradeAsset)) {
            $this->tradeAssets[] = $tradeAsset;
            $tradeAsset->setTrade($this);
        }

        return $this;
    }

    public function removeTradeAsset(TradeAsset $tradeAsset): self
    {
        if ($this->tradeAssets->removeElement($tradeAsset)) {
            // set the owning side to null (unless already changed)
            if ($tradeAsset->getTrade() === $this) {
                $tradeAsset->setTrade(null);
            }
        }

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
            $tradeCapability->setTrade($this);
        }

        return $this;
    }

    public function removeTradeCapability(TradeCapabilities $tradeCapability): self
    {
        if ($this->tradeCapabilities->removeElement($tradeCapability)) {
            // set the owning side to null (unless already changed)
            if ($tradeCapability->getTrade() === $this) {
                $tradeCapability->setTrade(null);
            }
        }

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
