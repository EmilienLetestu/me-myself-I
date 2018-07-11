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
     * @param array $projects
     * @param array $skills
     * @param array $techs
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(array $projects, array $skills, array $techs): Response
    {
       return new Response(
           $this->twig->render('admin/dashboard.html.twig',[
               'projects' => $projects,
               'skills'   => $skills,
               'techs'    => $techs
           ])
       );
    }
}
