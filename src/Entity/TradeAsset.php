<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TradeAssetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TradeAssetRepository::class)
 * @ApiResource(
 *     collectionOperations={
            "post" = {
 *              "denormalization_context" = {
                    "groups" = {"post:collection:tradeasset"}
 *              }
 *          },
 *          "get" = {
                "normalization_context" = {
 *                  "groups" = {"read:collection:tradeasset"}
 *              }
 *          }
 *     }
 * )
 */
class TradeAsset
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Trade::class, inversedBy="tradeAssets")
     * @Groups({"post:collection:tradeasset","read:collection:tradeasset"})
     */
    private $trade;

    /**
     * @ORM\ManyToOne(targetEntity=Asset::class, inversedBy="tradeAssets")
     * @Groups({"post:collection:tradeasset","read:collection:tradeasset"})
     */
    private $asset;

    public function __construct()
    {
        $this->trade = new ArrayCollection();
        $this->asset = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrade(): ?Trade
    {
        return $this->trade;
    }

    public function setTrade(?Trade $trade): self
    {
        $this->trade = $trade;

        return $this;
    }

    public function getAsset(): ?Asset
    {
        return $this->asset;
    }

    public function setAsset(?Asset $asset): self
    {
        $this->asset = $asset;

        return $this;
    }


}
