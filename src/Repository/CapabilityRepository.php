<?php

namespace App\Repository;

use App\Entity\Capability;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Capability|null find($id, $lockMode = null, $lockVersion = null)
 * @method Capability|null findOneBy(array $criteria, array $orderBy = null)
 * @method Capability[]    findAll()
 * @method Capability[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CapabilityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Capability::class);
    }

    // /**
    //  * @return Capability[] Returns an array of Capability objects
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
    public function findOneBySomeField($value): ?Capability
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
