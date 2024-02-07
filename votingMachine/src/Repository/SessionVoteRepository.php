<?php

namespace App\Repository;

use App\Entity\SessionVote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SessionVote>
 *
 * @method SessionVote|null find($id, $lockMode = null, $lockVersion = null)
 * @method SessionVote|null findOneBy(array $criteria, array $orderBy = null)
 * @method SessionVote[]    findAll()
 * @method SessionVote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SessionVoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SessionVote::class);
    }

//    /**
//     * @return SessionVote[] Returns an array of SessionVote objects
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

//    public function findOneBySomeField($value): ?SessionVote
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
