<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 15:15
 */

namespace App\Responder\Admin;


use App\Entity\Skill;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class UpdateSkillResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * UpdateSkillResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param FormView $form
     * @param Skill $skill
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(FormView $form, Skill $skill)
    {
        return new Response(
            $this->twig->render('admin/updateSkill.html.twig',[
                'form'  => $form,
                'skill' => $skill
            ])
        );
    }
}
