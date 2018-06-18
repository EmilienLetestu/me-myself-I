<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 15:16
 */

namespace App\Responder\Admin;

use App\Entity\Tech;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class UpdateTechResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * UpdateTechResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param FormView $form
     * @param Tech $tech
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(FormView $form, Tech $tech)
    {
       return new Response(
           $this->twig->render('admin/updateTech.html.twig',[
               'form' => $form,
               'tech' => $tech
           ])
       );
    }
}