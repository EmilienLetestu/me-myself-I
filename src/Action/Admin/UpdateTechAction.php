<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 15:23
 */

namespace App\Action\Admin;

use App\Entity\Tech;
use App\Form\Type\EditTechType;
use App\Handler\UpdateTechHandler;
use App\Responder\Admin\UpdateTechResponder;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Annotation\Route;

class UpdateTechAction
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var UpdateTechHandler
     */
    private $handler;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * UpdateTechAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param EntityManagerInterface $doctrine
     * @param SessionInterface $session
     * @param UpdateTechHandler $handler
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        FormFactoryInterface   $formFactory,
        EntityManagerInterface $doctrine,
        SessionInterface       $session,
        UpdateTechHandler      $handler,
        UrlGeneratorInterface  $urlGenerator
    )
    {
        $this->formFactory  = $formFactory;
        $this->doctrine     = $doctrine;
        $this->session      = $session;
        $this->handler      = $handler;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param Request $request
     * @param UpdateTechResponder $responder
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * @Route(
     *     "admin/update/tech/{id}",
     *     name = "updateTech",
     *     requirements={"id" = "\d+"}
     * )
     */
    public function __invoke(Request $request, UpdateTechResponder $responder)
    {
        $tech = $this->doctrine->getRepository(Tech::class)
            ->findTechWithId($request->get('id'))
        ;

        $form = $this->formFactory
            ->create(EditTechType::class)
            ->handleRequest($request)
        ;

        if($this->handler->handle($form, $tech))
        {
            $this->session->getFlashBag()
                ->add('success', 'Techno modifiée avec succès !')
            ;

            return new RedirectResponse(
                $this->urlGenerator->generate('home')
            );
        }

        return
            $responder($form->createView(), $tech)
        ;
    }
}
