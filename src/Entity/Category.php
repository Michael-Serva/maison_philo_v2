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
    private $category_id;

    public function __construct()
    {
        $this->category_id = new ArrayCollection();
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
    public function getcategory_id(): Collection
    {
        return $this->category_id;
    }

    public function addcategory_id(Product $category_id): self
    {
        if (!$this->category_id->contains($category_id)) {
            $this->category_id[] = $category_id;
            $category_id->setCategory($this);
        }

        return $this;
    }

    public function removecategory_id(Product $category_id): self
    {
        if ($this->category_id->removeElement($category_id)) {
            // set the owning side to null (unless already changed)
            if ($category_id->getCategory() === $this) {
                $category_id->setCategory(null);
            }
        }

        return $this;
    }

}
