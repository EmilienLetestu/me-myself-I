<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 10:54
 */

namespace App\Action;

use App\Form\Type\ContactType;
use App\Handler\ContactHandler;
use App\Responder\HomeResponder;

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
     * HomeAction constructor.
     * @param ContactHandler $handler
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     * @param SessionInterface $session
     */
    public function __construct(
        ContactHandler        $handler,
        FormFactoryInterface  $formFactory,
        UrlGeneratorInterface $urlGenerator,
        SessionInterface      $session
    )
    {
        $this->handler      = $handler;
        $this->formFactory  = $formFactory;
        $this->urlGenerator = $urlGenerator;
        $this->session      = $session;
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

       return $responder($form->createView());
    }
}