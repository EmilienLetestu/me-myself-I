<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 17/06/2018
 * Time: 20:53
 */

namespace App\Handler\Interfaces;


use App\Entity\Project;
use Symfony\Component\Form\FormInterface;

Interface UpdateProjectHandlerInterface
{
    /**
     * @param FormInterface $form
     * @param Project $project
     * @return bool
     */
    public function handle(FormInterface $form, Project $project) :bool;
}