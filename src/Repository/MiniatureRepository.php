<?php

namespace App\Repository;

use App\Entity\Miniature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Miniature|null find($id, $lockMode = null, $lockVersion = null)
 * @method Miniature|null findOneBy(array $criteria, array $orderBy = null)
 * @method Miniature[]    findAll()
 * @method Miniature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MiniatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Miniature::class);
    }
    public function findsection( $pays )
    {
        return $this->createQueryBuilder('m')
            ->join('m.pays','p')
            ->andWhere('p.nom = :pa')
            ->setParameter('pa', $pays)
            ->orderBy('m.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Miniature[] Returns an array of Miniature objects
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
    public function findOneBySomeField($value): ?Miniature
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
