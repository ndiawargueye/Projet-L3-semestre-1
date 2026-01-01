<?php

namespace App\Controller\Api;

use App\Entity\Paiement;
use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/paiement')]
class PaiementController extends AbstractController
{
    #[Route('/payer/{id}', name: 'api_paiement', methods: ['POST'])]
    public function payer($id, CommandeRepository $repo, EntityManagerInterface $em): JsonResponse
    {
        $commande = $repo->find($id);

        $paiement = new Paiement();
        $paiement->setCommande($commande);
        $paiement->setDatePaiement(new \DateTime());
        $paiement->setMontant($commande->getTotal());
        $paiement->setMode('WAVE');

        $commande->setEtat('VALIDE');

        $em->persist($paiement);
        $em->flush();

        return $this->json(['message' => 'Paiement effectué']);
    }
}
