<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 02/07/2018
 * Time: 23:06
 */

namespace App\Action\Admin;


use App\Entity\Project;
use App\Entity\Skill;
use App\Entity\Tech;
use App\Responder\Admin\DashboardResponder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardAction
{
    private $doctrine;

    public function __construct(EntityManagerInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @param DashboardResponder $responder
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * @Route("/admin", name = "adminDashboard")
     */
    public function __invoke(DashboardResponder $responder) :Response
    {

        return $responder(
            $this->doctrine->getRepository(Project::class)
            ->findAllProject(),
            $this->doctrine->getRepository(Skill::class)
            ->findAllSkill(),
            $this->doctrine->getRepository(Tech::class)
            ->findAllTech()
        );
    }
}