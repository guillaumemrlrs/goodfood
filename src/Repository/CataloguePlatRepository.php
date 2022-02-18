<?php

namespace App\Repository;

use App\Entity\CataloguePlat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CataloguePlat|null find($id, $lockMode = null, $lockVersion = null)
 * @method CataloguePlat|null findOneBy(array $criteria, array $orderBy = null)
 * @method CataloguePlat[]    findAll()
 * @method CataloguePlat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CataloguePlatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CataloguePlat::class);
    }

    // /**
    //  * @return CataloguePlat[] Returns an array of CataloguePlat objects
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
    public function findOneBySomeField($value): ?CataloguePlat
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
