<?php

namespace App\Repository;

use App\Entity\PartnerPlan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PartnerPlan|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartnerPlan|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartnerPlan[]    findAll()
 * @method PartnerPlan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartnerPlanRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PartnerPlan::class);
    }

//    /**
//     * @return PartnerPlan[] Returns an array of PartnerPlan objects
//     */
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
    public function findOneBySomeField($value): ?PartnerPlan
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
