<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 14/06/2018
 * Time: 09:37
 */

namespace App\Handler;

use App\Entity\Tech;
use App\Handler\Interfaces\EditTechHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

class EditTechHandler implements EditTechHandlerInterface
{
    /**
     * @var Tech
     */
    private $tech;

    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    public function __construct(
        EntityManagerInterface $doctrine
    )
    {
        $this->tech        = new Tech();
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
            $this->tech->setName(
                $form->get('name')->getData()
            );

            $this->doctrine->persist($this->tech);
            $this->doctrine->flush();


            return true;
        }

        return false;
    }
}