<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 14/06/2018
 * Time: 09:37
 */

namespace App\Handler;


use App\Builder\TechBuilder;
use App\Handler\Interfaces\EditTechHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

class EditTechHandler implements EditTechHandlerInterface
{
    /**
     * @var TechBuilder
     */
    private $techBuilder;

    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    public function __construct(
        TechBuilder $techBuilder,
        EntityManagerInterface $doctrine
    )
    {
        $this->techBuilder = $techBuilder;
        $this->doctrine    = $doctrine;
    }

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool
    {
        if($form->isSubmitted() && $form->isValid())
        {
            $this->techBuilder->edit(
                $form->get('name')->getData()
            );

            $this->doctrine->persist($this->techBuilder->getTech());
            $this->doctrine->flush();


            return true;
        }

        return false;
    }
}