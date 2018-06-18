<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 17/06/2018
 * Time: 19:10
 */

namespace App\Handler;

use App\Entity\Project;
use App\Handler\Interfaces\EditProjectHandlerInterface;
use App\Service\FileService;
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
     * @var FileService
     */
    private $fileService;

    /**
     * EditProjectHandler constructor.
     * @param EntityManagerInterface $doctrine
     * @param FileService $fileService
     */
    public function __construct(
        EntityManagerInterface $doctrine,
        FileService            $fileService
    )
    {
        $this->project        = new Project();
        $this->doctrine       = $doctrine;
        $this->fileService    = $fileService;
    }

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool
    {
        if($form->isSubmitted() && $form->isValid())
        {
            $fileName = $this->fileService->upload(
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