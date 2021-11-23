<?php

namespace App\Repository;

use App\Entity\TradeCapabilities;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TradeCapabilities|null find($id, $lockMode = null, $lockVersion = null)
 * @method TradeCapabilities|null findOneBy(array $criteria, array $orderBy = null)
 * @method TradeCapabilities[]    findAll()
 * @method TradeCapabilities[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TradeCapabilitiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TradeCapabilities::class);
    }

    // /**
    //  * @return TradeCapabilities[] Returns an array of TradeCapabilities objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TradeCapabilities
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
