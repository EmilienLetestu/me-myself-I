<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 14:55
 */

namespace App\Handler;


use App\Entity\Tech;
use App\Handler\Interfaces\UpdateTechHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

class UpdateTechHandler implements UpdateTechHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    /**
     * UpdateTechHandler constructor.
     * @param EntityManagerInterface $doctrine
     */
    public function __construct(EntityManagerInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @param FormInterface $form
     * @param Tech $tech
     * @return bool
     */
    public function handle(FormInterface $form, Tech $tech): bool
    {
        if($form->isSubmitted() && $form->isValid())
        {
            $tech->setName($form->get('name')->getData());

            $this->doctrine->flush();

            return true;
        }

        return false;
    }
}
