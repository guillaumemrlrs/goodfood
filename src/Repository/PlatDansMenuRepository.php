<?php

namespace App\Repository;

use App\Entity\PlatDansMenu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlatDansMenu|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlatDansMenu|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlatDansMenu[]    findAll()
 * @method PlatDansMenu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlatDansMenuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlatDansMenu::class);
    }

    // /**
    //  * @return PlatDansMenu[] Returns an array of PlatDansMenu objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlatDansMenu
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
