<?php

namespace App\Repository;

use App\Entity\VeilleInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VeilleInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method VeilleInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method VeilleInfo[]    findAll()
 * @method VeilleInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VeilleInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VeilleInfo::class);
    }

    // /**
    //  * @return VeilleInfo[] Returns an array of VeilleInfo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VeilleInfo
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
