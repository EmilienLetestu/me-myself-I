<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 18:52
 */

namespace App\Handler;




use App\Entity\Skill;
use App\Handler\Interfaces\EditSkillHandlerInterface;
use Symfony\Component\Form\FormInterface;

class EditSkillHandler implements EditSkillHandlerInterface
{
    /**
     * @param FormInterface $form
     * @param Skill $skill
     * @return bool
     */
    public function handle(FormInterface $form, Skill $skill): bool
    {
        if ($form->isSubmitted() && $form->isSubmitted())
        {
            return true;
        }
        return false;
    }
}