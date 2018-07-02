<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 02/07/2018
 * Time: 22:43
 */

namespace App\Action\Security;


use App\Responder\Security\LoginResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Routing\Annotation\Route;

class LoginAction
{
    /**
     * @param Request $request
     * @param LoginResponder $responder
     * @param AuthenticationUtils $auth
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * @Route("/login", name = "login")
     */
    public function __invoke(Request $request, LoginResponder $responder, AuthenticationUtils $auth)
    {
        return $responder(
            $auth->getLastAuthenticationError(),
            $auth->getLastUsername()
        );
    }
}