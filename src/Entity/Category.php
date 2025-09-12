<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
#[ApiResource(
    itemOperations: [
        'get' => [
            'normalization_context' => ['groups' => 'category:read:item', 'enable_max_depth' => true]
        ],
        'post',
        'put',
        'patch',
        'delete'
    ]
)]
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    #[Groups(['shortcut:read', 'category:read:item', 'software:read:item'])]
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['shortcut:read', 'category:read:item', 'software:read:item'])]
    private string $name;

    /**
     * @ORM\ManyToMany(targetEntity=Shortcut::class, mappedBy="categories")
     */
    #[Groups(['category:read:item'])]
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
            $shortcut->addCategory($this);
        }

        return $this;
    }

    public function removeShortcut(Shortcut $shortcut): self
    {
        if ($this->shortcuts->contains($shortcut)) {
            $this->shortcuts->removeElement($shortcut);
            $shortcut->removeCategory($this);
        }

        return $this;
    }
}
