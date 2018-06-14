<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 18:39
 */

namespace App\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;

interface EditSkillHandlerInterface
{
    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form) :bool;
}