<?php

namespace App\Controller\Api;

use App\Entity\Commande;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/commande')]
class CommandeController extends AbstractController
{
    #[Route('/creer', name: 'api_commande_creer', methods: ['POST'])]
    public function creer(EntityManagerInterface $em): JsonResponse
    {
        $commande = new Commande();
        $commande->setDateCommande(new \DateTime());
        $commande->setEtat('EN_COURS');
        $commande->setTypeCommande('A_LIVRER');
        $commande->setTotal(0);

        $em->persist($commande);
        $em->flush();

        return $this->json(['message' => 'Commande créée', 'id' => $commande->getId()]);
    }
}
