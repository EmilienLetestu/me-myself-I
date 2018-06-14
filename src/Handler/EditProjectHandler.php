<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 14/06/2018
 * Time: 11:05
 */

namespace App\Handler;


use App\Entity\Project;
use App\Handler\Interfaces\EditProjectHandlerInterface;
use Symfony\Component\Form\FormInterface;

class EditProjectHandler implements EditProjectHandlerInterface
{
    /**
     * @param FormInterface $form
     * @param Project $project
     * @return bool
     */
    public function handle(FormInterface $form, Project $project): bool
    {
        if($form->isSubmitted() && $form->isValid())
        {
            $project->setPictRef('mlmllml');
            $project->setAddedOn('Y-m-d');
            return true;
        }

        return false;
    }
}