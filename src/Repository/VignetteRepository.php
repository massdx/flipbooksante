<?php

namespace App\Repository;

use App\Entity\Vignette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vignette|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vignette|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vignette[]    findAll()
 * @method Vignette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VignetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vignette::class);
    }

    public function findsection($section, $pays )
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.position = :sec')
            ->setParameter('sec', $section)
            ->join('v.pays','p')
            ->andWhere('p.nom = :pa')
            ->setParameter('pa', $pays)
            ->orderBy('v.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

     /**
    * @return Vignette[] Returns an array of Vignette objects
    */

    public function findByCategories($value)
    {
        return $this->createQueryBuilder('v')
            ->join('v.categorie','ca')
            ->andWhere('ca.titre = :val ')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

public function findPaysvignette( $pays, $titre )
{
    return $this->createQueryBuilder('m')
        ->join('m.pays','p')
        ->andWhere('m.titre = :titre')
        ->andWhere('p.nom = :pa')
        ->setParameter('pa', $pays)
        ->setParameter('titre',$titre)
        ->getQuery()
        ->getOneOrNullResult()
    ;
}
public function findRecherche($value)
{
  return $this->createQueryBuilder('v')

      ->andWhere('v.titre LIKE :value')
      ->setParameter('value','%'.$value.'%')
      ->getQuery()
      ->getResult();
}


    /*
    public function findOneBySomeField($value): ?Vignette
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
