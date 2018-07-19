<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 17/06/2018
 * Time: 21:45
 */

namespace App\Action\Admin;



use App\Manager\SkillManager;
use App\Responder\Admin\DeleteSkillResponder;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteSkillAction
{
    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    private $skillManager;


    /**
     * DeleteSkillAction constructor.
     * @param EntityManagerInterface $doctrine
     * @param SkillManager $skillManager
     */
    public function __construct(
        EntityManagerInterface $doctrine,
        SkillManager           $skillManager

    )
    {
        $this->doctrine     = $doctrine;
        $this->skillManager = $skillManager;

    }

    /**
     * @param Request $request
     * @param DeleteSkillResponder $responder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     * @Route(
     *     "admin/delete/skill/{id}",
     *     name = "deleteSkill",
     *     requirements={"id" = "\d+"}
     * )
     */
    public function __invoke(Request $request, DeleteSkillResponder $responder): Response
    {
       return $responder(
           $this->skillManager->deleteSkill(
               $this->doctrine, $request->get('id')
           )
       );
    }
}
