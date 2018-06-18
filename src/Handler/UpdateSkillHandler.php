<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 18/06/2018
 * Time: 14:43
 */

namespace App\Handler;


use App\Entity\Skill;
use App\Handler\Interfaces\UpdateSkillHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

class UpdateSkillHandler implements UpdateSkillHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    /**
     * UpdateSkillHandler constructor.
     * @param EntityManagerInterface $doctrine
     */
    public function __construct(EntityManagerInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @param FormInterface $form
     * @param Skill $skill
     * @return bool
     */
    public function handle(FormInterface $form, Skill $skill): bool
    {
        if($form->isSubmitted() && $form->isValid())
        {
            $skill->setName($form->get('name')->getData());
            $skill->setLevel($form->get('level')->getData());

            $this->doctrine->flush();

            return true;
        }

        return false;
    }
}
