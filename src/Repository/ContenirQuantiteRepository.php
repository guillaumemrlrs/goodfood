<?php

namespace App\Repository;

use App\Entity\ContenirQuantite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContenirQuantite|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContenirQuantite|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContenirQuantite[]    findAll()
 * @method ContenirQuantite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContenirQuantiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContenirQuantite::class);
    }

    // /**
    //  * @return ContenirQuantite[] Returns an array of ContenirQuantite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContenirQuantite
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
