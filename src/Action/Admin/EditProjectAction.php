<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 14/06/2018
 * Time: 21:36
 */

namespace App\Action\Admin;


use App\Form\Type\EditProjectType;
use App\Handler\EditProjectHandler;

use App\Responder\Admin\EditProjectResponder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class EditProjectAction
{
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var EditProjectHandler
     */
    private $handler;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * EditProjectAction constructor.
     * @param SessionInterface $session
     * @param FormFactoryInterface $formFactory
     * @param EditProjectHandler $handler
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        SessionInterface      $session,
        FormFactoryInterface  $formFactory,
        EditProjectHandler    $handler,
        UrlGeneratorInterface $urlGenerator
    )
    {
        $this->session      = $session;
        $this->formFactory  = $formFactory;
        $this->handler      = $handler;
        $this->urlGenerator = $urlGenerator;
    }


    /**
     * @param Request $request
     * @param EditProjectResponder $responder
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * @Route("edit-project", name="editProject")
     */
    public function __invoke(Request $request, EditProjectResponder $responder)
    {
        $form = $this->formFactory
            ->create(EditProjectType::class)
            ->handleRequest($request)
        ;

        if($this->handler->handle($form))
        {
            $this->session->getFlashBag()
                ->add('success','Projet ajouté avec succès')
            ;

            return new RedirectResponse(
                $this->urlGenerator->generate('home')
            );
        }

        return $responder($form->createView());
    }

}