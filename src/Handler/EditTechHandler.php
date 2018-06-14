<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 14/06/2018
 * Time: 09:37
 */

namespace App\Handler;


use App\Entity\Tech;
use App\Handler\Interfaces\EditTechHandlerInterface;
use Symfony\Component\Form\FormInterface;

class EditTechHandler implements EditTechHandlerInterface
{
    /**
     * @param FormInterface $form
     * @param Tech $tech
     * @return bool
     */
    public function handle(FormInterface $form, Tech $tech): bool
    {
        if($form->isSubmitted() && $form->isValid())
        {
            return true;
        }

        return false;
    }
}