<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 17/06/2018
 * Time: 19:43
 */

namespace App\Handler;


use App\Builder\EditProjectBuilder;
use App\Entity\Project;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

class UpdateProjectHandler
{
    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    /**
     * @var FileUploaderService
     */
    private $fileUploader;

    /**
     * UpdateProjectHandler constructor.
     * @param EntityManagerInterface $doctrine
     * @param FileUploaderService $fileUploader
     */
    public function __construct(
        EntityManagerInterface $doctrine,
        FileUploaderService    $fileUploader
    )
    {
        $this->doctrine       = $doctrine;
        $this->fileUploader   = $fileUploader;
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

                $this->fileUploader->eraseFileAndReplace(
                    $form->get('pictRef')->getData(),
                    $form->get('name')->getData(),
                    $project->getPictRef()
                )
            ;

            $form->get('name')->getData() !== $project->getName() ?:
               $this->fileUploader->updateFileName($project)
            ;

            $project->setName($form->get('name')->getData());
            $project->setAddedOn('Y-m-d');
            $project->setPictRef($fileName);
            $project->setDescription($form->get('description')->getData());
            $project->setLink($form->get('link')->getData());

            foreach ($form->get('techs')->getData() as $tech){

                $project->addTech($tech);
            }

            $this->doctrine->persist($project);
            $this->doctrine->flush();

            return true;
        }

        return false;
    }

}