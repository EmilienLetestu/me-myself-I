<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 17/06/2018
 * Time: 19:10
 */

namespace App\Handler;

use App\Builder\EditProjectBuilder;
use App\Entity\Project;
use App\Handler\Interfaces\EditProjectHandlerInterface;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

class EditProjectHandler implements EditProjectHandlerInterface
{
    /**
     * @var Project
     */
    private $project;

    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    /**
     * @var FileUploaderService
     */
    private $fileUploader;

    /**
     * EditProjectHandler constructor.
     * @param EntityManagerInterface $doctrine
     * @param FileUploaderService $fileUploader
     */
    public function __construct(
        EntityManagerInterface $doctrine,
        FileUploaderService    $fileUploader
    )
    {
        $this->project        = new Project();
        $this->doctrine       = $doctrine;
        $this->fileUploader   = $fileUploader;
    }

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool
    {
        if($form->isSubmitted() && $form->isValid())
        {
            $fileName = $this->fileUploader->upload(
                $form->get('pictRef')->getData(),
                $form->get('name')->getData()
            );

            $this->project->setName($form->get('name')->getData());
            $this->project->setAddedOn('Y-m-d');
            $this->project->setPictRef($fileName);
            $this->project->setDescription($form->get('description')->getData());
            $this->project->setLink($form->get('link')->getData());

            foreach ($form->get('techs')->getData() as $tech){

                $this->project->addTech($tech);
            }

            $this->doctrine->persist($this->project);
            $this->doctrine->flush();

            return true;
        }

        return false;
    }
}