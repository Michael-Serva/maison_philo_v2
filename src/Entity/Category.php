<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="category")
     */
    private $categoryId;
    private $categoryTitle;

    public function __construct()
    {
        $this->categoryId = new ArrayCollection();
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

    /**
     * @return Collection|Product[]
     */
    public function getcategoryId(): Collection
    {
        return $this->categoryId;
    }

    public function addcategoryId(Product $categoryId): self
    {
        if (!$this->categoryId->contains($categoryId)) {
            $this->categoryId[] = $categoryId;
            $categoryId->setCategory($this);
        }

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getcategoryTitle(): Collection
    {
        return $this->categoryTitle;
    }

    public function addcategoryTitle(Product $categoryTitle): self
    {
        if (!$this->categoryTitle->contains($categoryTitle)) {
            $this->categoryTitle[] = $categoryTitle;
            $categoryTitle->setCategory($this);
        }

        return $this;
    }

    public function removecategoryId(Product $categoryId): self
    {
        if ($this->categoryId->removeElement($categoryId)) {
            // set the owning side to null (unless already changed)
            if ($categoryId->getCategory() === $this) {
                $categoryId->setCategory(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return (string) $this->title;
    }
}
