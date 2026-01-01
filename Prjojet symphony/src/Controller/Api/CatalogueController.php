<?php

namespace App\Controller\Api;

use App\Repository\BurgerRepository;
use App\Repository\MenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/catalogue')]
class CatalogueController extends AbstractController
{
    #[Route('/burgers', name: 'api_burgers')]
    public function burgers(BurgerRepository $repo): JsonResponse
    {
        return $this->json($repo->findBy(['etat' => 'actif']));
    }

    #[Route('/menus', name: 'api_menus')]
    public function menus(MenuRepository $repo): JsonResponse
    {
        return $this->json($repo->findBy(['etat' => 'actif']));
    }
}
