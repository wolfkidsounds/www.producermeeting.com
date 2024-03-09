<?php

namespace App\Repository;

use App\Entity\DAW;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DAW>
 *
 * @method DAW|null find($id, $lockMode = null, $lockVersion = null)
 * @method DAW|null findOneBy(array $criteria, array $orderBy = null)
 * @method DAW[]    findAll()
 * @method DAW[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DAWRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DAW::class);
    }

    //    /**
    //     * @return DAW[] Returns an array of DAW objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('d.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?DAW
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
