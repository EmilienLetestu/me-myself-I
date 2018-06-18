<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 19:02
 */

namespace App\Action\Admin;

use App\Form\Type\EditSkillType;
use App\Handler\EditSkillHandler;
use App\Responder\Admin\EditSkillResponder;

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
     * @param EditSkillHandler $handler
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        SessionInterface       $session,
        EditSkillHandler       $handler,
        FormFactoryInterface   $formFactory,
        UrlGeneratorInterface  $urlGenerator
    )
    {
        $this->session      = $session;
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
        $form = $this->formFactory
            ->create(EditSkillType::class)
            ->handleRequest($request)
        ;

        if($this->handler->handle($form))
        {
            $this->session->getFlashBag()
                ->add('success', 'Compétence ajouté avec succès')
            ;

            return new RedirectResponse(
                $this->urlGenerator->generate('home')
            );
        }

        return $responder(
            $form->createView()
        );
    }
}
