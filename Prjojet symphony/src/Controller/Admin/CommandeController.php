<?php

namespace App\Controller\Admin;

use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/commandes')]
class CommandeController extends AbstractController
{
    #[Route('/', name: 'admin_commandes')]
    public function index(CommandeRepository $repo): Response
    {
        return $this->render('admin/commande/index.html.twig', [
            'commandes' => $repo->findAll()
        ]);
    }

    #[Route('/annuler/{id}', name: 'admin_commande_annuler')]
    public function annuler($id, CommandeRepository $repo, EntityManagerInterface $em): Response
    {
        $commande = $repo->find($id);
        $commande->setEtat('ANNULEE');
        $em->flush();

        return $this->redirectToRoute('admin_commandes');
    }

    #[Route('/terminer/{id}', name: 'admin_commande_terminer')]
    public function terminer($id, CommandeRepository $repo, EntityManagerInterface $em): Response
    {
        $commande = $repo->find($id);
        $commande->setEtat('TERMINEE');
        $em->flush();

        return $this->redirectToRoute('admin_commandes');
    }
}
