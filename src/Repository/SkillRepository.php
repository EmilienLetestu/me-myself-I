<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 15/06/2018
 * Time: 13:50
 */

namespace App\Repository;


use App\Entity\Skill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class SkillRepository extends ServiceEntityRepository
{

    /**
     * SkillRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Skill::class);
    }

    /**
     * @return array
     */
    public function findAllSkill() :array
    {
        return
            $queryBuilder = $this->createQueryBuilder('s')
            ->select('s')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param int $id
     * @return Skill
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findSkillWithId(int $id) :?Skill
    {
        return
            $queryBuilder = $this->createQueryBuilder('s')
            ->where('s.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * @param string $name
     * @return Skill
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findSkillWithName(string $name) :?Skill
    {
        return
            $queryBuilder = $this->createQueryBuilder('s')
            ->where('s.name = :name')
            ->setParameter('name', $name)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

}
