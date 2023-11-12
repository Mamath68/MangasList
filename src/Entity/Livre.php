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

    #[ORM\Column(length: 20)]
    private ?string $total = null;

    #[ORM\Column(length: 20)]
    private ?string $possedee = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $volumes = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $totalVF = null;

    #[ORM\Column(length: 20)]
    private ?string $statusVO = null;

    #[ORM\ManyToOne(inversedBy: 'livres')]
    private ?Type $types = null;

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

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(?string $total): static
    {
        $this->total = $total;

        return $this;
    }

    public function getPossedee(): ?string
    {
        return $this->possedee;
    }

    public function setPossedee(string $possedee): static
    {
        $this->possedee = $possedee;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getVolumes(): ?string
    {
        return $this->volumes;
    }

    public function setVolumes(?string $volumes): static
    {
        $this->volumes = $volumes;

        return $this;
    }

    public function getTotalVF(): ?string
    {
        return $this->totalVF;
    }

    public function setTotalVF(?string $totalVF): static
    {
        $this->totalVF = $totalVF;

        return $this;
    }

    public function getStatusVO(): ?string
    {
        return $this->statusVO;
    }

    public function setStatusVO(?string $statusVO): static
    {
        $this->statusVO = $statusVO;

        return $this;
    }

    public function getTypes(): ?Type
    {
        return $this->types;
    }

    public function setTypes(?Type $types): static
    {
        $this->types = $types;

        return $this;
    }
}
