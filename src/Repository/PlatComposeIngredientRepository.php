<?php

namespace App\Repository;

use App\Entity\PlatComposeIngredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlatComposeIngredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlatComposeIngredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlatComposeIngredient[]    findAll()
 * @method PlatComposeIngredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlatComposeIngredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlatComposeIngredient::class);
    }

    // /**
    //  * @return PlatComposeIngredient[] Returns an array of PlatComposeIngredient objects
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
    public function findOneBySomeField($value): ?PlatComposeIngredient
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
