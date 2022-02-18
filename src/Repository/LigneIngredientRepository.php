<?php

namespace App\Repository;

use App\Entity\LigneIngredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LigneIngredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneIngredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneIngredient[]    findAll()
 * @method LigneIngredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneIngredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneIngredient::class);
    }

    // /**
    //  * @return LigneIngredient[] Returns an array of LigneIngredient objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LigneIngredient
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
