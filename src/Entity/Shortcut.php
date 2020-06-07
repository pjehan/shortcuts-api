<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ShortcutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ShortcutRepository::class)
 * @ApiResource(normalizationContext={"groups"={"shortcut"}})
 * @ORM\HasLifecycleCallbacks
 */
class Shortcut
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"shortcut"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"shortcut"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"shortcut"})
     */
    private $windows;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"shortcut"})
     */
    private $macos;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"shortcut"})
     */
    private $linux;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"shortcut"})
     */
    private $context;

    /**
     * @ORM\Column(type="text")
     * @Groups({"shortcut"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"shortcut"})
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"shortcut"})
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=Software::class, inversedBy="shortcuts")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"shortcut"})
     */
    private $software;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="shortcuts")
     * @Groups({"shortcut"})
     */
    private $categories;

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
    public function prePersist() {
        $this->setCreatedAt(new \DateTime());
    }

}
