<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 19:02
 */

namespace App\Action\Admin;


use App\Entity\Skill;
use App\Form\Type\EditSkillType;
use App\Handler\EditSkillHandler;
use App\Responder\Admin\EditSkillResponder;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Annotation\Route;

class EditSkillAction
{
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    /**
     * @var Skill
     */
    private $skill;

    /**
     * @var
     */
    private $handler;

    /**
     * @var
     */
    private $formFactory;

    /**
     * @var
     */
    private $urlGenerator;

    /**
     * EditSkillAction constructor.
     * @param SessionInterface $session
     * @param EntityManagerInterface $doctrine
     * @param Skill $skill
     * @param EditSkillHandler $handler
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        SessionInterface       $session,
        EntityManagerInterface $doctrine,
        Skill                  $skill,
        EditSkillHandler       $handler,
        FormFactoryInterface   $formFactory,
        UrlGeneratorInterface  $urlGenerator
    )
    {
        $this->session      = $session;
        $this->doctrine     = $doctrine;
        $this->skill        = $skill;
        $this->handler      = $handler;
        $this->formFactory  = $formFactory;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param Request $request
     * @param EditSkillResponder $responder
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * @Route("edit-skill", name="editSkill")
     */
    public function __invoke(Request $request, EditSkillResponder $responder)
    {
        $skill = $this->skill;

        $form = $this->formFactory
            ->create(EditSkillType::class, $skill)
            ->handleRequest($request)
        ;

        if($this->handler->handle($form, $skill))
        {
            $this->doctrine->persist($skill);
            $this->doctrine->flush();

            $this->session->getFlashBag()
                ->add('success', 'Compétence ajouté avec succès')
            ;

            return new RedirectResponse(
                $this->urlGenerator->generate('dashboard')
            );
        }

        return $responder(
            $form->createView()
        );
    }
}
