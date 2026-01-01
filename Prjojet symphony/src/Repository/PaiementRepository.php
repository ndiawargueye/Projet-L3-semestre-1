<?php

namespace App\Repository;

use App\Entity\Paiement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PaiementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Paiement::class);
    }

    public function recettesJournalieres()
    {
        return $this->createQueryBuilder('p')
            ->select('SUM(p.montant)')
            ->where('DATE(p.datePaiement) = CURRENT_DATE()')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
