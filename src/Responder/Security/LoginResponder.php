<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 02/07/2018
 * Time: 22:44
 */

namespace App\Responder\Security;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class LoginResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * LoginResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param $error
     * @param $lastUsername
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($error, $lastUsername)
    {
       return new Response(
           $this->twig->render('security\login.html.twig',[
               'error'         => $error,
               'last_username' => $lastUsername
           ])
       );
    }
}