<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 10:54
 */

namespace App\Action;

use App\Entity\Project;
use App\Entity\Skill;
use App\Form\Type\ContactType;
use App\Handler\ContactHandler;
use App\Responder\HomeResponder;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class HomeAction
{
    /**
     * @var ContactHandler
     */
    private $handler;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    /**
     * HomeAction constructor.
     * @param ContactHandler $handler
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     * @param SessionInterface $session
     * @param EntityManagerInterface $doctrine
     */
    public function __construct(
        ContactHandler        $handler,
        FormFactoryInterface  $formFactory,
        UrlGeneratorInterface $urlGenerator,
        SessionInterface      $session,
        EntityManagerInterface $doctrine
    )
    {
        $this->handler      = $handler;
        $this->formFactory  = $formFactory;
        $this->urlGenerator = $urlGenerator;
        $this->session      = $session;
        $this->doctrine     = $doctrine;
    }

    /**
     * @param Request $request
     * @param HomeResponder $responder
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * @Route("/", name="home")
     */
    public function __invoke(Request $request, HomeResponder $responder)
    {
       $form = $this->formFactory
           ->create(ContactType::class)
           ->handleRequest($request)
       ;

       if($this->handler->handle($form))
       {
           $this->session->getFlashBag()
               ->add('success','J\'ai bien reçu votre message et prendrai contact avec vous très rapidement :)')
           ;

           return new RedirectResponse(
               $this->urlGenerator->generate("home")
           );
       }

       return $responder(
           $form->createView(),
           $this->doctrine->getRepository(Skill::class)->findAllSkill(),
           $this->doctrine->getRepository(Project::class)->findAllProjectWithStatus(true)
           )
       ;

    }
}
