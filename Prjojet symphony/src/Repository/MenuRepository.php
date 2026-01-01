<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Menu;

class MenuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Menu::class);
    }

    public function menusLesPlusVendusDuJour()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "
            SELECT m.nom, SUM(lc.quantite) AS total
            FROM ligne_commande lc
            JOIN menu m ON lc.menu_id = m.id
            JOIN commande c ON lc.commande_id = c.id
            WHERE DATE(c.date_commande) = CURRENT_DATE()
            GROUP BY m.nom
            ORDER BY total DESC
        ";

        return $conn->executeQuery($sql)->fetchAllAssociative();
    }
}
