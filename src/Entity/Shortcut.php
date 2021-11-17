<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\ShortcutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ORM\Entity(repositoryClass=ShortcutRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
#[ApiResource(
    normalizationContext: ['groups' => 'shortcut:read']
)]
#[ApiFilter(OrderFilter::class, properties: ['created_at'], arguments: ['orderParameterName' => 'order'])]
#[ApiFilter(SearchFilter::class, properties: ['software.id' => 'exact', 'categories.id' => 'exact'])]
class Shortcut
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
    private string $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['shortcut:read'])]
    private string $windows;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['shortcut:read'])]
    private string $macos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['shortcut:read'])]
    private string $linux;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['shortcut:read'])]
    private string $context;

    /**
     * @ORM\Column(type="text")
     */
    #[Groups(['shortcut:read'])]
    private string $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    #[Groups(['shortcut:read', 'category:read:item', 'software:read:item'])]
    private ?string $image;

    /**
     * @ORM\Column(type="datetime")
     */
    #[Groups(['shortcut:read', 'category:read:item', 'software:read:item'])]
    private \DateTimeInterface $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=Software::class, inversedBy="shortcuts")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['shortcut:read', 'category:read:item', 'software:read:item'])]
    #[MaxDepth(1)]
    private Software $software;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="shortcuts")
     */
    #[Groups(['shortcut:read', 'category:read:item', 'software:read:item'])]
    #[MaxDepth(1)]
    private Collection $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getWindows(): ?string
    {
        return $this->windows;
    }

    public function setWindows(string $windows): self
    {
        $this->windows = $windows;

        return $this;
    }

    public function getMacos(): ?string
    {
        return $this->macos;
    }

    public function setMacos(string $macos): self
    {
        $this->macos = $macos;

        return $this;
    }

    public function getLinux(): ?string
    {
        return $this->linux;
    }

    public function setLinux(string $linux): self
    {
        $this->linux = $linux;

        return $this;
    }

    public function getContext(): ?string
    {
        return $this->context;
    }

    public function setContext(string $context): self
    {
        $this->context = $context;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getSoftware(): ?Software
    {
        return $this->software;
    }

    public function setSoftware(?Software $software): self
    {
        $this->software = $software;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
        }

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist(): void
    {
        $this->setCreatedAt(new \DateTime());
    }

}
