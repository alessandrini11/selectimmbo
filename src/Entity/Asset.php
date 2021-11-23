<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AssetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=AssetRepository::class)
 * @ApiResource(
 *     collectionOperations={
            "post" = {
 *              "denormalization_context" = {
                    "groups" = {"post:collection:asset"}
 *              }
 *          }
 *          ,"get"
 *     }
 * )
 */
class Asset
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:asset","read:collection:tradeasset"})
     */
    private $label;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"post:collection:asset","read:collection:tradeasset"})
     */
    private $tsCreation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:asset","read:collection:tradeasset"})
     */
    private $userCreation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"post:collection:asset","read:collection:tradeasset"})
     */
    private $tsUpdate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"post:collection:asset","read:collection:tradeasset"})
     */
    private $userUpdate;

    /**
     * @ORM\OneToMany(targetEntity=TradeAsset::class, mappedBy="asset")
     */
    private $tradeAssets;

    public function __construct()
    {
        $this->trades = new ArrayCollection();
        $this->tradeAssets = new ArrayCollection();
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
            $tradeAsset->setAsset($this);
        }

        return $this;
    }

    public function removeTradeAsset(TradeAsset $tradeAsset): self
    {
        if ($this->tradeAssets->removeElement($tradeAsset)) {
            // set the owning side to null (unless already changed)
            if ($tradeAsset->getAsset() === $this) {
                $tradeAsset->setAsset(null);
            }
        }

        return $this;
    }

}
