<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $img = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 70, nullable: true)]
    private ?string $auteurOriginal = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $scenariste = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $dessinateur = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Traducteur = null;

    #[ORM\Column(length: 100)]
    private ?string $editeur = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $auteur = null;

    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'livres')]
    private Collection $types;

    public function __construct()
    {
        $this->types = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): static
    {
        $this->img = $img;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getAuteurOriginal(): ?string
    {
        return $this->auteurOriginal;
    }

    public function setAuteurOriginal(string $auteurOriginal): static
    {
        $this->auteurOriginal = $auteurOriginal;

        return $this;
    }

    public function getScenariste(): ?string
    {
        return $this->scenariste;
    }

    public function setScenariste(?string $scenariste): static
    {
        $this->scenariste = $scenariste;

        return $this;
    }

    public function getDessinateur(): ?string
    {
        return $this->dessinateur;
    }

    public function setDessinateur(?string $dessinateur): static
    {
        $this->dessinateur = $dessinateur;

        return $this;
    }

    public function getTraducteur(): ?string
    {
        return $this->Traducteur;
    }

    public function setTraducteur(?string $Traducteur): static
    {
        $this->Traducteur = $Traducteur;

        return $this;
    }

    public function getEditeur(): ?string
    {
        return $this->editeur;
    }

    public function setEditeur(string $editeur): static
    {
        $this->editeur = $editeur;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(?string $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Type $type): static
    {
        if (!$this->types->contains($type)) {
            $this->types->add($type);
        }

        return $this;
    }

    public function removeType(Type $type): static
    {
        $this->types->removeElement($type);

        return $this;
    }
}
