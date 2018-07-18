<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 14/06/2018
 * Time: 09:39
 */

namespace App\Action\Admin;

use App\Form\Type\EditTechType;
use App\Handler\Interfaces\EditTechHandlerInterface;
use App\Responder\Admin\EditTechResponder;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Annotation\Route;

class EditTechAction
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
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var EditTechHandlerInterface
     */
    private $handler;


    /**
     * EditTechAction constructor.
     * @param SessionInterface $session
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     * @param EditTechHandlerInterface $handler
     */
    public function __construct(
        SessionInterface         $session,
        FormFactoryInterface     $formFactory,
        UrlGeneratorInterface    $urlGenerator,
        EditTechHandlerInterface $handler
    )
    {
        $this->session        = $session;
        $this->formFactory    = $formFactory;
        $this->urlGenerator   = $urlGenerator;
        $this->handler        = $handler;
    }

    /**
     * @param Request $request
     * @param EditTechResponder $responder
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * @Route("admin/edit/tech", name="editTech")
     */
    public function __invoke(Request $request, EditTechResponder $responder)
    {
        $form = $this->formFactory
            ->create(EditTechType::class)
            ->handleRequest($request)
        ;

        if($this->handler->handle($form))
        {
            $this->session->getFlashBag()
                ->add('success', 'Technologie ajoutée avec succès')
            ;

            return new RedirectResponse(
                $this->urlGenerator->generate('adminDashboard')
            );
        }

        return $responder($form->createView());
    }
}

