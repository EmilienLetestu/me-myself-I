<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 14/06/2018
 * Time: 11:05
 */

namespace App\Handler;


use App\Builder\ProjectBuilder;
use App\Handler\Interfaces\EditProjectHandlerInterface;
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
     * EditProjectHandler constructor.
     * @param ProjectBuilder $projectBuilder
     * @param EntityManagerInterface $doctrine
     */
    public function __construct(
        ProjectBuilder         $projectBuilder,
        EntityManagerInterface $doctrine
    )
    {
        $this->projectBuilder = $projectBuilder;
        $this->doctrine       = $doctrine;
    }

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool
    {
        if($form->isSubmitted() && $form->isValid())
        {
            $this->projectBuilder->edit(
                $form->get('name')->getData(),
                'Y-m-d',
                'dsdzazz',
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