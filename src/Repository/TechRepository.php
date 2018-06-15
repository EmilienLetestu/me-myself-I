<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 15/06/2018
 * Time: 13:50
 */

namespace App\Repository;


use App\Entity\Tech;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class TechRepository extends ServiceEntityRepository
{
    /**
     * TechRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tech::class);
    }

    /**
     * @return array
     */
    public function findAllTech() :array
    {
       return
           $queryBuilder = $this->createQueryBuilder('t')
           ->select('t')
           ->getQuery()
           ->getResult()
       ;
    }

    /**
     * @param int $id
     * @return Tech|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findTechWithId(int $id) :?Tech
    {
        return
            $queryBuilder = $this->createQueryBuilder('t')
            ->where('t.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

}
