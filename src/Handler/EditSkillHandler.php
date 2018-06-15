<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 18:52
 */

namespace App\Handler;




use App\Builder\SkillBuilder;
use App\Handler\Interfaces\EditSkillHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

class EditSkillHandler implements EditSkillHandlerInterface
{
    private $skilBuilder;

    private $doctrine;

    public function __construct(
        SkillBuilder           $skillBuilder,
        EntityManagerInterface $doctrine
    )
    {
        $this->skilBuilder = $skillBuilder;
        $this->doctrine    = $doctrine;
    }

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid())
        {
            $this->skilBuilder->edit(
                $form->get('name')->getData(),
                $form->get('level')->getData()
            );

            $this->doctrine->persist(
                $this->skilBuilder->getSkill()
            );

            $this->doctrine->flush();

            return true;
        }
        return false;
    }
}