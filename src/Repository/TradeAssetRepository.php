<?php

namespace App\Repository;

use App\Entity\TradeAsset;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TradeAsset|null find($id, $lockMode = null, $lockVersion = null)
 * @method TradeAsset|null findOneBy(array $criteria, array $orderBy = null)
 * @method TradeAsset[]    findAll()
 * @method TradeAsset[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TradeAssetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TradeAsset::class);
    }

    // /**
    //  * @return TradeAsset[] Returns an array of TradeAsset objects
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
    public function findOneBySomeField($value): ?TradeAsset
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
