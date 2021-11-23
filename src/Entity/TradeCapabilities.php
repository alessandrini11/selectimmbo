<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TradeCapabilitiesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TradeCapabilitiesRepository::class)
 * @ApiResource(
 *     collectionOperations={
            "post" = {
 *              "denormalization_context" = {
                    "groups" = {"post:collection:tradecapabilities"}
 *              }
 *          },
 *          "get" = {
                "normalization_context" = {
 *                  "groups" = {"read:collection:tradecapabilities"}
 *              }
 *          }
 *     }
 * )
 */
class TradeCapabilities
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Trade::class, inversedBy="tradeCapabilities")
     * @Groups({"post:collection:tradecapabilities","read:collection:tradecapabilities"})
     */
    private $trade;

    /**
     * @ORM\ManyToOne(targetEntity=Capability::class, inversedBy="tradeCapabilities")
     * @Groups({"post:collection:tradecapabilities","read:collection:tradecapabilities"})
     */
    private $capability;

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

    public function getCapability(): ?Capability
    {
        return $this->capability;
    }

    public function setCapability(?Capability $capability): self
    {
        $this->capability = $capability;

        return $this;
    }
}
