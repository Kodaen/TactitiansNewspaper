<?php

namespace App\Repository;

use App\Entity\POTW;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method POTW|null find($id, $lockMode = null, $lockVersion = null)
 * @method POTW|null findOneBy(array $criteria, array $orderBy = null)
 * @method POTW[]    findAll()
 * @method POTW[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class POTWRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, POTW::class);
    }

    // /**
    //  * @return POTW[] Returns an array of POTW objects
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
    public function findOneBySomeField($value): ?POTW
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
