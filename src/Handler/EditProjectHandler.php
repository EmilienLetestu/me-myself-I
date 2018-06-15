<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 15/06/2018
 * Time: 10:32
 */

namespace App\Handler;

use App\Builder\ProjectBuilder;
use App\Handler\Interfaces\EditProjectHandlerInterface;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

class EditProjectHandler implements EditProjectHandlerInterface
{
    /**
     * @var ProjectBuilder
     */
    private $projectBuilder;

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
     * @param ProjectBuilder $projectBuilder
     * @param EntityManagerInterface $doctrine
     * @param FileUploaderService $fileUploader
     */
    public function __construct(
        ProjectBuilder         $projectBuilder,
        EntityManagerInterface $doctrine,
        FileUploaderService    $fileUploader
    )
    {
        $this->projectBuilder = $projectBuilder;
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

            $this->projectBuilder->edit(
                $form->get('name')->getData(),
                'Y-m-d',
                $fileName,
                $form->get('description')->getData(),
                $form->get('link')->getData(),
                $form->get('techs')->getData()
            );

            $this->doctrine->persist(
                $this->projectBuilder->getProject()
            );

            $this->doctrine->flush();

            return true;
        }

        return false;
    }
}
