<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 11:18
 */

namespace App\Responder\Admin;


use App\Entity\Project;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class UpdateProjectResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * UpdateProjectResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param FormView $form
     * @param Project $project
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(FormView $form, Project $project)
    {
        return new Response(
            $this->twig->render('admin/updateProject.html.twig',[
                'form'    => $form,
                'project' => $project
            ])
        );
    }
}
