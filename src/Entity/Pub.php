<?php

namespace App\Entity;

use App\Repository\PubRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=PubRepository::class)
 * @Vich\Uploadable
 */
class Pub
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
    private $titre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creation;

     /**
      *  @Vich\UploadableField(mapping="pubs", fileNameProperty="image", size="")
     * @var File|null 
     */
    private $fichier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="integer")
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="pubs")
     */
    private $pays;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $misajour;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $site;

    /**
     * @ORM\Column(type="text")
     */
    private $localisation;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telephone2;

    public function __construct()
    {
        $this->creation = new \DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getMisajour(): ?\DateTimeInterface
    {
        return $this->misajour;
    }

    public function setMisajour(?\DateTimeInterface $misajour): self
    {
        $this->misajour = $misajour;

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

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }
    public function setFichier(?File $fichier = null): void
    {
        $this->fichier = $fichier;

        if (null !== $fichier) {

            $this->misajour = new \DateTimeImmutable();
        }
    }

    public function getFichier(): ?File
    {
        return $this->fichier;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getSite(): ?string
    {
        return $this->site;
    }

    public function setSite(string $site): self
    {
        $this->site = $site;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getTelephone1(): ?int
    {
        return $this->telephone1;
    }

    public function setTelephone1(int $telephone1): self
    {
        $this->telephone1 = $telephone1;

        return $this;
    }

    public function getTelephone2(): ?int
    {
        return $this->telephone2;
    }

    public function setTelephone2(?int $telephone2): self
    {
        $this->telephone2 = $telephone2;

        return $this;
    }
}
