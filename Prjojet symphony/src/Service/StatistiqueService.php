<?php

namespace App\Service;

use App\Repository\CommandeRepository;
use App\Repository\PaiementRepository;
use App\Repository\BurgerRepository;
use App\Repository\MenuRepository;

class StatistiqueService
{
    public function __construct(
        private CommandeRepository $commandeRepo,
        private PaiementRepository $paiementRepo,
        private BurgerRepository $burgerRepo,
        private MenuRepository $menuRepo
    ) {}

    public function dashboard()
    {
        return [
            'enCours' => count($this->commandeRepo->commandesDuJour()),
            'validees' => count($this->commandeRepo->commandesValideesDuJour()),
            'annulees' => count($this->commandeRepo->commandesAnnuleesDuJour()),
            'recettes' => $this->paiementRepo->recettesJournalieres(),
            'burgers' => $this->burgerRepo->burgersLesPlusVendusDuJour(),
            'menus' => $this->menuRepo->menusLesPlusVendusDuJour()
        ];
    }
}
