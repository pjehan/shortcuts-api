<?php

namespace App\Repository;

use App\Entity\Shortcut;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Shortcut|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shortcut|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shortcut[]    findAll()
 * @method Shortcut[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShortcutRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Shortcut::class);
    }

    // /**
    //  * @return Shortcut[] Returns an array of Shortcut objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Shortcut
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
