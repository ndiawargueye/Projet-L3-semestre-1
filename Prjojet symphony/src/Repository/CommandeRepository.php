<?php

namespace App\Repository;

use App\Entity\Commande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande::class);
    }

    public function commandesDuJour()
    {
        return $this->createQueryBuilder('c')
            ->where('DATE(c.dateCommande) = CURRENT_DATE()')
            ->getQuery()
            ->getResult();
    }

    public function commandesValideesDuJour()
    {
        return $this->createQueryBuilder('c')
            ->where('c.etat = :etat')
            ->andWhere('DATE(c.dateCommande) = CURRENT_DATE()')
            ->setParameter('etat', 'VALIDE')
            ->getQuery()
            ->getResult();
    }

    public function commandesAnnuleesDuJour()
    {
        return $this->createQueryBuilder('c')
            ->where('c.etat = :etat')
            ->andWhere('DATE(c.dateCommande) = CURRENT_DATE()')
            ->setParameter('etat', 'ANNULEE')
            ->getQuery()
            ->getResult();
    }

    public function filtrerCommandes(?string $etat, ?int $clientId)
    {
        $qb = $this->createQueryBuilder('c');

        if ($etat) {
            $qb->andWhere('c.etat = :etat')
               ->setParameter('etat', $etat);
        }

        if ($clientId) {
            $qb->andWhere('c.client = :client')
               ->setParameter('client', $clientId);
        }

        return $qb->getQuery()->getResult();
    }
}
