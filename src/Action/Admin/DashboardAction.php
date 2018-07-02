<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 02/07/2018
 * Time: 23:06
 */

namespace App\Action\Admin;


use App\Responder\Admin\DashboardResponder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardAction
{
    /**
     * @param DashboardResponder $responder
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * @Route("/admin", name = "adminDashboard")
     */
    public function __invoke(DashboardResponder $responder) :Response
    {
        return $responder();
    }
}