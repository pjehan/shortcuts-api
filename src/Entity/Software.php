<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SoftwareRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SoftwareRepository::class)
 * @ApiResource
 */
class Software
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    #[Groups(['shortcut:read', 'category:read:item'])]
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['shortcut:read', 'category:read:item'])]
    private string $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['shortcut:read', 'category:read:item'])]
    private string $logo;

    /**
     * @ORM\OneToMany(targetEntity=Shortcut::class, mappedBy="software", orphanRemoval=true)
     */
    private Collection $shortcuts;

    public function __construct()
    {
        $this->shortcuts = new ArrayCollection();
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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return Collection|Shortcut[]
     */
    public function getShortcuts(): Collection
    {
        return $this->shortcuts;
    }

    public function addShortcut(Shortcut $shortcut): self
    {
        if (!$this->shortcuts->contains($shortcut)) {
            $this->shortcuts[] = $shortcut;
            $shortcut->setSoftware($this);
        }

        return $this;
    }

    public function removeShortcut(Shortcut $shortcut): self
    {
        if ($this->shortcuts->contains($shortcut)) {
            $this->shortcuts->removeElement($shortcut);
            // set the owning side to null (unless already changed)
            if ($shortcut->getSoftware() === $this) {
                $shortcut->setSoftware(null);
            }
        }

        return $this;
    }
}
