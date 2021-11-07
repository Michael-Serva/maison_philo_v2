<?php

namespace App\Entity;

use DateTimeImmutable;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=App\Repository\UserRepository::class)
 * @UniqueEntity(
 * fields={"email"},
 * message="Cet email est déjà associé à un compte"
 * )
 * @UniqueEntity(
 * fields={"pseudo"},
 * message="Ce pseudo est déjà associé à un compte"
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     */
    private $id;

    public function __construct()
    {
        $this->id = Uuid::v4();
        $this->userRoles = new ArrayCollection();
        $this->createdAt = new DateTimeImmutable();
        $this->isVerified = false;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /* -------
       @Assert\NotBlank(message="Veuillez saisir un mot de passe")
    
    */

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    // ------- @Assert\NotBlank(message="Veuillez confirmer votre mot de passe")

    // public $confirmPassword;


    /**
     * @ORM\Column(type="string", length=255, nullable =true)
     */
    private $genre;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pseudo;

    /**
     * @ORM\ManyToMany(targetEntity=Role::class, mappedBy="userRoles")
     */
    private $userRoles;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }



    public function getUsername(): ?string
    {
        return (string) $this->email;
    }

    public function getUserIdentifier()
    {
        return $this->email;
    }
    // Renvoie la string non encodé que l'utilisateur a saisi
    public function getSalt()
    {
    }

    // nettoyer le mdp
    public function eraseCredentials()
    {
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }
    public function getRoles()
    {
        /* we use the ArrayCollection methods */
        /* the map method allows you to browse an array */
        $roles = $this->userRoles->map(function ($role) {
            return $role->getTitle();
            /* toArray() allows to transform the character string into an array, with only my roles */
        })->toArray();
        /* we add the role user to our role array which already contains Admin */
        $roles[] = 'ROLE_USER';
        return $roles;
    }

    /**
     * @return Collection|Role[]
     */
    public function getUserRoles(): Collection
    {
        return $this->userRoles;
    }

    public function addUserRole(Role $userRole): self
    {
        if (!$this->userRoles->contains($userRole)) {
            $this->userRoles[] = $userRole;
            $userRole->addUserRole($this);
        }

        return $this;
    }

    public function removeUserRole(Role $userRole): self
    {
        if ($this->userRoles->removeElement($userRole)) {
            $userRole->removeUserRole($this);
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
