<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 14:44
 */

namespace App\Handler\Interfaces;


use App\Entity\Skill;
use Symfony\Component\Form\FormInterface;

Interface UpdateSkillHandlerInterface
{
    /**
     * @param FormInterface $form
     * @param Skill $skill
     * @return bool
     */
    public function handle(FormInterface $form, Skill $skill) :bool;

}