<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 19/07/2018
 * Time: 17:24
 */

namespace App\Manager;


use App\Entity\Tech;
use Doctrine\ORM\EntityManagerInterface;

class TechManager
{
    /**
     * @param EntityManagerInterface $doctrine
     * @param int $id
     * @return string
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function deleteTech(EntityManagerInterface $doctrine, int $id): string
    {
        $tech = $doctrine->getRepository(Tech::class)
            ->findTechWithId($id)
        ;

        if(!$tech)
        {
            return 'error';
        }


        $doctrine->remove($tech);
        $doctrine->flush();

        return 'success';

    }
}