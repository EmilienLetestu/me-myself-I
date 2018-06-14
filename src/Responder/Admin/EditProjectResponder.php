<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 14/06/2018
 * Time: 11:08
 */

namespace App\Responder\Admin;



use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class EditProjectResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * EditProjectResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param FormView $formView
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(FormView $formView) :Response
    {
      return new Response(
          $this->twig->render('admin\editProject.html.twig',[
              'form' => $formView
          ])
      );
    }
}