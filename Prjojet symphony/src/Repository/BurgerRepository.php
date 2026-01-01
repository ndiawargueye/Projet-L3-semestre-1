<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Burger;

class BurgerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Burger::class);
    }

    public function burgersLesPlusVendusDuJour()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "
            SELECT b.nom, SUM(lc.quantite) AS total
            FROM ligne_commande lc
            JOIN burger b ON lc.burger_id = b.id
            JOIN commande c ON lc.commande_id = c.id
            WHERE DATE(c.date_commande) = CURRENT_DATE()
            GROUP BY b.nom
            ORDER BY total DESC
        ";

        return $conn->executeQuery($sql)->fetchAllAssociative();
    }
}
