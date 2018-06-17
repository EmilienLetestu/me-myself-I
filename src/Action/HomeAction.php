<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 10:54
 */

namespace App\Action;

use App\Responder\HomeResponder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeAction
{
    /**
     * @param HomeResponder $responder
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * @Route("/", name="home")
     */
    public function __invoke(HomeResponder $responder) :Response
    {

       return $responder('Test');
    }
}