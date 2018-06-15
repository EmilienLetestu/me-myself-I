<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 15/06/2018
 * Time: 13:49
 */

namespace App\Repository;

use App\Entity\Project;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProjectRepository extends ServiceEntityRepository
{
    /**
     * ProjectRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Project::class);
    }

    /**
     * @return array
     */
    public function findAllProject() :array
    {
        return
            $queryBuilder = $this->createQueryBuilder('p')
            ->select('p')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param int $id
     * @return Project
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findProjectWithId(int $id) :Project
    {
        return
            $queryBuilder = $this->createQueryBuilder('p')
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * @param string $name
     * @return Project
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findProjectWithName(string $name) :Project
    {
        return
            $queryBuilder = $this->createQueryBuilder('p')
            ->where('p.name = :name')
            ->setParameter('name', $name)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
