<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 18:39
 */

namespace App\Handler\Interfaces;


use App\Entity\Skill;
use Symfony\Component\Form\FormInterface;

interface EditSkillHandlerInterface
{
    /**
     * @param FormInterface $form
     * @param Skill $skill
     * @return bool
     */
    public function handle(FormInterface $form, Skill $skill) :bool;
}