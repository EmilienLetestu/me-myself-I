<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 02/07/2018
 * Time: 23:06
 */

namespace App\Responder\Admin;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class DashboardResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * DashboardResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(): Response
    {
       return new Response(
           $this->twig->render('admin/dashboard.html.twig')
       );
    }
}
