<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 17/06/2018
 * Time: 19:43
 */

namespace App\Handler;

use App\Entity\Project;
use App\Service\FileService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

class UpdateProjectHandler
{
    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    /**
     * @var FileService
     */
    private $fileService;

    /**
     * UpdateProjectHandler constructor.
     * @param EntityManagerInterface $doctrine
     * @param FileService $fileService
     */
    public function __construct(
        EntityManagerInterface $doctrine,
        FileService            $fileService
    )
    {
        $this->doctrine       = $doctrine;
        $this->fileService    = $fileService;
    }

    /**
     * @param FormInterface $form
     * @param Project $project
     * @return bool
     */
    public function handle(FormInterface $form, Project $project)
    {
        if($form->isSubmitted() && $form->isValid())
        {
            $fileName = $form->get('pictRef')->getData() !== null ?:

                $this->fileService->eraseFileAndReplace(
                    $form->get('pictRef')->getData(),
                    $form->get('name')->getData(),
                    $project->getPictRef()
                )
            ;

            $form->get('name')->getData() !== $project->getName() ?:
               $this->fileService->updateFileName($project)
            ;

            $project->setName($form->get('name')->getData());
            $project->setAddedOn('Y-m-d');
            $project->setPictRef($fileName);
            $project->setDescription($form->get('description')->getData());
            $project->setLink($form->get('link')->getData());
            $project->setPublish($form->get('publish')->getData());

            foreach ($form->get('techs')->getData() as $tech){

                $project->addTech($tech);
            }

            $this->doctrine->flush();

            return true;
        }

        return false;
    }

}