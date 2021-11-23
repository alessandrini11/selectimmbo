<?php

namespace App\Repository;

use App\Entity\Metropolis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Metropolis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Metropolis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Metropolis[]    findAll()
 * @method Metropolis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetropolisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Metropolis::class);
    }

    // /**
    //  * @return Metropolis[] Returns an array of Metropolis objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Metropolis
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
