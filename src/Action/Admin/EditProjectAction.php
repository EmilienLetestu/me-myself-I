<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 14/06/2018
 * Time: 11:13
 */

namespace App\Action\Admin;


use App\Entity\Project;
use App\Form\Type\EditProjectType;
use App\Handler\Interfaces\EditProjectHandlerInterface;
use App\Responder\Admin\EditProjectResponder;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Annotation\Route;

class EditProjectAction
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
     * @var EditProjectHandlerInterface
     */
    private $handler;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var Project
     */
    private $project;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * EditProjectAction constructor.
     * @param SessionInterface $session
     * @param EntityManagerInterface $doctrine
     * @param EditProjectHandlerInterface $handler
     * @param UrlGeneratorInterface $urlGenerator
     * @param Project $project
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        SessionInterface             $session,
        EntityManagerInterface       $doctrine,
        EditProjectHandlerInterface  $handler,
        UrlGeneratorInterface        $urlGenerator,
        Project                      $project,
        FormFactoryInterface         $formFactory
    )
    {
        $this->session      = $session;
        $this->doctrine     = $doctrine;
        $this->handler      = $handler;
        $this->urlGenerator = $urlGenerator;
        $this->project      = $project;
        $this->formFactory  = $formFactory;
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
       $project = $this->project;

       $form = $this->formFactory
           ->create(EditProjectType::class, $project)
           ->handleRequest($request)
       ;

       if($this->handler->handle($form, $project))
       {
           $this->doctrine->persist($project);
           $this->doctrine->flush();

           $this->session->getFalshBag()
               ->add('succes', 'Projet ajouté avec sudcés')
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
