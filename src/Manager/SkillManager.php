<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 19/07/2018
 * Time: 17:23
 */

namespace App\Manager;


use App\Entity\Skill;
use Doctrine\ORM\EntityManagerInterface;

class SkillManager
{
    /**
     * @param EntityManagerInterface $doctrine
     * @param int $id
     * @return string
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function deleteSkill(EntityManagerInterface $doctrine, int $id): string
    {
        $skill = $doctrine->getRepository(Skill::class)
            ->findSkillWithId($id)
        ;

        if(!$skill)
        {
            return 'error';
        }


        $doctrine->remove($skill);
        $doctrine->flush();

        return 'success';

    }
}