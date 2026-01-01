<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $dateCommande = null;

    #[ORM\Column(length: 20)]
    private ?string $etat = null;

    #[ORM\Column(length: 20)]
    private ?string $typeCommande = null;

    #[ORM\Column]
    private ?float $total = null;

    #[ORM\ManyToOne]
    private ?Client $client = null;

    public function getId(): ?int { return $this->id; }
    public function getDateCommande(): ?\DateTimeInterface { return $this->dateCommande; }
    public function setDateCommande(\DateTimeInterface $date): self { $this->dateCommande = $date; return $this; }

    public function getEtat(): ?string { return $this->etat; }
    public function setEtat(string $etat): self { $this->etat = $etat; return $this; }

    public function getTypeCommande(): ?string { return $this->typeCommande; }
    public function setTypeCommande(string $type): self { $this->typeCommande = $type; return $this; }

    public function getTotal(): ?float { return $this->total; }
    public function setTotal(float $total): self { $this->total = $total; return $this; }

    public function getClient(): ?Client { return $this->client; }
    public function setClient(Client $client): self { $this->client = $client; return $this; }
}
