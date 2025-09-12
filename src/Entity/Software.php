<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SoftwareRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SoftwareRepository::class)
 */
#[ApiResource(
    collectionOperations: [
        'get' => [
            'normalization_context' => ['groups' => 'software:read:collection', 'enable_max_depth' => true]
        ],
        'post' => [
            'denormalization_context' => ['groups' => 'software:write']
        ],
    ],
    itemOperations: [
        'get' => [
            'normalization_context' => ['groups' => 'software:read:item', 'enable_max_depth' => true]
        ],
        'put',
        'patch',
        'delete'
    ]
)]
class Software
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    #[Groups(['shortcut:read', 'category:read:item', 'software:read:item', 'software:read:collection'])]
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['shortcut:read', 'category:read:item', 'software:read:item', 'software:read:collection', 'software:write'])]
    private string $name;

    /**
     * @ORM\ManyToOne(targetEntity=MediaObject::class, cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    #[ApiProperty(iri: 'https://schema.org/image')]
    #[Groups(['shortcut:read', 'category:read:item', 'software:read:item', 'software:read:collection', 'software:write'])]
    private ?MediaObject $logo;

    /**
     * @ORM\OneToMany(targetEntity=Shortcut::class, mappedBy="software", orphanRemoval=true)
     */
    #[Groups(['software:read:item'])]
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

    public function getLogo(): ?MediaObject
    {
        return $this->logo;
    }

    public function setLogo(MediaObject $logo): self
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
