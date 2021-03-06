<?php

namespace App\Entity;

use App\Entity\Category;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductRepository;
use Symfony\Component\Uid\Uuid;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     */
    private $id;

    public function __construct()
    {
        $this->id = Uuid::v4();
        $this->comments = new ArrayCollection();
    }
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez renseigner le titre")
     * @Assert\Length(
     * min = 3,
     * max = 100,
     * minMessage = "3 caractères minimum",
     * maxMessage = "100 caractères maximum"
     * )
     */

    private $title;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(message="Veuillez renseigner le prix")
     * @Assert\Positive
     * @Assert\Valid
     */
    private $price;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="categoryId")
     */
    private $category;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description1;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description2;

    /**
     * @ORM\Column(type="text")
     */
    private $description3;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description4;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $promo;
    /**
     * @ORM\OneToMany(targetEntity=Comments::class, mappedBy="products", orphanRemoval=true)
     */
    private $comments;

    public function getId(): Uuid
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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): self
    {
        $this->stock = $stock;

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

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription1(): ?string
    {
        return $this->description1;
    }

    public function setDescription1(?string $description1): self
    {
        $this->description1 = $description1;

        return $this;
    }

    public function getDescription2(): ?string
    {
        return $this->description2;
    }

    public function setDescription2(?string $description2): self
    {
        $this->description2 = $description2;

        return $this;
    }

    public function getDescription3(): ?string
    {
        return $this->description3;
    }

    public function setDescription3(string $description3): self
    {
        $this->description3 = $description3;

        return $this;
    }

    public function getDescription4(): ?string
    {
        return $this->description4;
    }

    public function setDescription4(?string $description4): self
    {
        $this->description4 = $description4;

        return $this;
    }

    public function getPromo(): ?bool
    {
        return $this->promo;
    }

    public function setPromo(?bool $promo): self
    {
        $this->promo = $promo;

        return $this;
    }

    /**
     * @return Collection|Comments[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }
/**
 * Undocumented function
 *
 * @param Comments $comment
 * @return self
 */
    public function addComment(Comments $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setProducts($this);
        }

        return $this;
    }
/**
 * remove comment
 *
 * @param Comments $comment
 * @return self
 */
    public function removeComment(Comments $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getProducts() === $this) {
                $comment->setProducts(null);
            }
        }

        return $this;
    }
   /**
    *
    * @return float
    */
    public function getAverageRatings()
    {
        //sum of notations
        $sum = array_reduce($this->comments->toArray(), function ($total, $comment) {
            return $total + $comment->getRating();
        }, 0);
        if (count($this->comments) > 0) {
            return $average = $sum / count($this->comments); //if there are no comments returns zero
        }
        return 0;
    }
}
