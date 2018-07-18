<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 15:14
 */

namespace App\Action\Admin;


use App\Entity\Skill;
use App\Form\Type\EditSkillType;
use App\Handler\UpdateSkillHandler;
use App\Responder\Admin\UpdateSkillResponder;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Annotation\Route;

class UpdateSkillAction
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var UpdateSkillHandler
     */
    private $handler;

    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * UpdateSkillAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param UpdateSkillHandler $handler
     * @param SessionInterface $session
     * @param EntityManagerInterface $doctrine
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        FormFactoryInterface   $formFactory,
        UpdateSkillHandler     $handler,
        SessionInterface       $session,
        EntityManagerInterface $doctrine,
        UrlGeneratorInterface  $urlGenerator
    )
    {
        $this->formFactory  = $formFactory;
        $this->handler      = $handler;
        $this->session      = $session;
        $this->doctrine     = $doctrine;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param Request $request
     * @param UpdateSkillResponder $responder
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * @Route(
     *     "admin/update/skill/{id}",
     *     name = "updateSkill",
     *     requirements={"id" = "\d+"}
     * )
     */
    public function __invoke(Request $request, UpdateSkillResponder $responder)
    {
        $skill = $this->doctrine->getRepository(Skill::class)
            ->findSkillWithId($request->get('id'))
        ;

        $form = $this->formFactory
            ->create(EditSkillType::class)
            ->handleRequest($request)
        ;

        if($this->handler->handle($form, $skill))
        {
            $this->session->getFlashBag()
                ->add('success','Compétence modifiée avec succès')
            ;

            return new RedirectResponse(
                $this->urlGenerator->generate('adminDashboard')
            );
        }

        return
            $responder($form->createView(), $skill)
        ;
    }
}
