<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 18:49
 */

namespace App\Handler\Interfaces;


use App\Entity\Project;
use Symfony\Component\Form\FormInterface;

interface EditProjectHandlerInterface
{
    /**
     * @param FormInterface $form
     * @param Project $project
     * @return bool
     */
    public function handle(FormInterface $form, Project $project) :bool;
}