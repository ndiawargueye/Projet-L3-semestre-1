<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Paiement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $datePaiement = null;

    #[ORM\Column]
    private ?float $montant = null;

    #[ORM\Column(length: 10)]
    private ?string $mode = null;

    #[ORM\OneToOne]
    private ?Commande $commande = null;

    public function getId(): ?int { return $this->id; }
}
