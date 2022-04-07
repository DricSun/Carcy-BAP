<?php

namespace App\Entity;

use App\Repository\CardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CardRepository::class)]
class Card
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image_user;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $first_name;

    #[ORM\Column(type: 'string', length: 255)]
    private $e_mail;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $title;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $society;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $site;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $tel_pro;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $tel_perso;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $fax;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $adresse;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $code_postal;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $country;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $email_perso;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $note;

    #[ORM\OneToMany(mappedBy: 'Card', targetEntity: Directory::class)]
    private $directories;

    public function __construct()
    {
        $this->directories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageUser(): ?string
    {
        return $this->image_user;
    }

    public function setImageUser(?string $image_user): self
    {
        $this->image_user = $image_user;

        return $this;
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

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getEMail(): ?string
    {
        return $this->e_mail;
    }

    public function setEMail(string $e_mail): self
    {
        $this->e_mail = $e_mail;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSociety(): ?string
    {
        return $this->society;
    }

    public function setSociety(?string $society): self
    {
        $this->society = $society;

        return $this;
    }

    public function getSite(): ?string
    {
        return $this->site;
    }

    public function setSite(?string $site): self
    {
        $this->site = $site;

        return $this;
    }

    public function getTelPro(): ?int
    {
        return $this->tel_pro;
    }

    public function setTelPro(?int $tel_pro): self
    {
        $this->tel_pro = $tel_pro;

        return $this;
    }

    public function getTelPerso(): ?int
    {
        return $this->tel_perso;
    }

    public function setTelPerso(?int $tel_perso): self
    {
        $this->tel_perso = $tel_perso;

        return $this;
    }

    public function getFax(): ?int
    {
        return $this->fax;
    }

    public function setFax(?int $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->code_postal;
    }

    public function setCodePostal(?int $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getEmailPerso(): ?string
    {
        return $this->email_perso;
    }

    public function setEmailPerso(?string $email_perso): self
    {
        $this->email_perso = $email_perso;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return Collection<int, Directory>
     */
    public function getDirectories(): Collection
    {
        return $this->directories;
    }

    public function addDirectory(Directory $directory): self
    {
        if (!$this->directories->contains($directory)) {
            $this->directories[] = $directory;
            $directory->setCard($this);
        }

        return $this;
    }

    public function removeDirectory(Directory $directory): self
    {
        if ($this->directories->removeElement($directory)) {
            // set the owning side to null (unless already changed)
            if ($directory->getCard() === $this) {
                $directory->setCard(null);
            }
        }

        return $this;
    }
}
