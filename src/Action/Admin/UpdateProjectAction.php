<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 11:16
 */

namespace App\Action\Admin;


use App\Responder\Admin\UpdateProjectResponder;
use App\Entity\Project;
use App\Form\Type\EditProjectType;
use App\Handler\UpdateProjectHandler;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Annotation\Route;

class UpdateProjectAction
{

    private $doctrine;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var UpdateProjectHandler
     */
    private $handler;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * UpdateProjectAction constructor.
     * @param EntityManagerInterface $doctrine
     * @param FormFactoryInterface $formFactory
     * @param SessionInterface $session
     * @param UpdateProjectHandler $handler
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        EntityManagerInterface $doctrine,
        FormFactoryInterface   $formFactory,
        SessionInterface       $session,
        UpdateProjectHandler   $handler,
        UrlGeneratorInterface  $urlGenerator
    )
    {
        $this->doctrine     = $doctrine;
        $this->formFactory  = $formFactory;
        $this->session      = $session;
        $this->handler      = $handler;
        $this->urlGenerator = $urlGenerator;
    }


    /**
     * @param Request $request
     * @param UpdateProjectResponder $responder
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * * @Route(
     *     "/update/project/{id}",
     *      name = "updateProject",
     *     requirements={"id" = "\d+"}
     * )
     */
    public function __invoke(Request $request, UpdateProjectResponder $responder)
    {
        $project = $this->doctrine->getRepository(Project::class)
            ->findProjectWithId($request->get('id'))
        ;

        $form = $this->formFactory
            ->create(EditProjectType::class)
            ->handleRequest($request)
        ;

        if($this->handler->handle($form, $project))
        {
            $this->session->getFlashBag()
                ->add('success','Projet ajouté avec succès')
            ;

            return new RedirectResponse(
                $this->urlGenerator->generate('home')
            );
        }

        return
            $responder($form->createView(), $project)
        ;
    }
}
