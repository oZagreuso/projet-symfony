<?php

namespace App\Repository;

use App\Entity\SessionCandidat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SessionCandidat>
 *
 * @method SessionCandidat|null find($id, $lockMode = null, $lockVersion = null)
 * @method SessionCandidat|null findOneBy(array $criteria, array $orderBy = null)
 * @method SessionCandidat[]    findAll()
 * @method SessionCandidat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SessionCandidatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SessionCandidat::class);
    }

//    /**
//     * @return SessionCandidat[] Returns an array of SessionCandidat objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SessionCandidat
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
