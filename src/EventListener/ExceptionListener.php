<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 19/07/2018
 * Time: 18:36
 */

namespace App\EventListener;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Twig\Environment;

class ExceptionListener
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * ExceptionListener constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param GetResponseForExceptionEvent $event
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        $response = new Response();

        $message = 'Oh regardez une magnigique erreur de type ';

        if ($exception instanceof HttpExceptionInterface) {
            $response->setStatusCode($exception->getStatusCode());
            $response->headers->replace($exception->getHeaders());

            $response->setContent(
                $this->twig->render('error.html.twig',[
                    'message' => $message.$exception->getStatusCode()
                ]));

        } else {
            $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);

            $response->setContent(
                $this->twig->render('error.html.twig',[
                    'message' => $message.$exception->getStatusCode()
                ]));
        }

        // sends the modified response object to the event
        $event->setResponse($response);
    }
}