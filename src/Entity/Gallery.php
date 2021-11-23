<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GalleryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GalleryRepository::class)
 * @ApiResource(
 *     collectionOperations={
            "post" = {
 *              "denormalization_context" = {
                    "groups" = {"post:collection:gallery"}
 *              }
 *          },
 *          "get"
 *     }
 * )
 */
class Gallery
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"post:collection:gallery","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $photo1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"post:collection:gallery","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $photo2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"post:collection:gallery","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $photo3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"post:collection:gallery","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $photo4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"post:collection:gallery","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $photo5;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"post:collection:gallery","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $photo6;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"post:collection:gallery","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $photo7;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"post:collection:gallery","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $photo8;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"post:collection:gallery","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $photo9;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"post:collection:gallery","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $tsCreation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"post:collection:gallery","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $userCreation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"post:collection:gallery","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $tsUpdate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"post:collection:gallery","read:collection:tradeasset","read:collection:tradecapabilities"})
     */
    private $userUpdate;

    /**
     * @ORM\OneToMany(targetEntity=Trade::class, mappedBy="gallery")
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

    public function getPhoto1(): ?string
    {
        return $this->photo1;
    }

    public function setPhoto1(?string $photo1): self
    {
        $this->photo1 = $photo1;

        return $this;
    }

    public function getPhoto2(): ?string
    {
        return $this->photo2;
    }

    public function setPhoto2(?string $photo2): self
    {
        $this->photo2 = $photo2;

        return $this;
    }

    public function getPhoto3(): ?string
    {
        return $this->photo3;
    }

    public function setPhoto3(?string $photo3): self
    {
        $this->photo3 = $photo3;

        return $this;
    }

    public function getPhoto4(): ?string
    {
        return $this->photo4;
    }

    public function setPhoto4(?string $photo4): self
    {
        $this->photo4 = $photo4;

        return $this;
    }

    public function getPhoto5(): ?string
    {
        return $this->photo5;
    }

    public function setPhoto5(?string $photo5): self
    {
        $this->photo5 = $photo5;

        return $this;
    }

    public function getPhoto6(): ?string
    {
        return $this->photo6;
    }

    public function setPhoto6(?string $photo6): self
    {
        $this->photo6 = $photo6;

        return $this;
    }

    public function getPhoto7(): ?string
    {
        return $this->photo7;
    }

    public function setPhoto7(?string $photo7): self
    {
        $this->photo7 = $photo7;

        return $this;
    }

    public function getPhoto8(): ?string
    {
        return $this->photo8;
    }

    public function setPhoto8(?string $photo8): self
    {
        $this->photo8 = $photo8;

        return $this;
    }

    public function getPhoto9(): ?string
    {
        return $this->photo9;
    }

    public function setPhoto9(?string $photo9): self
    {
        $this->photo9 = $photo9;

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
        $this->ts_update = $ts_update;

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
            $trade->setGallery($this);
        }

        return $this;
    }

    public function removeTrade(Trade $trade): self
    {
        if ($this->trades->removeElement($trade)) {
            // set the owning side to null (unless already changed)
            if ($trade->getGallery() === $this) {
                $trade->setGallery(null);
            }
        }

        return $this;
    }
}
