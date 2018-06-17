<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 18:52
 */

namespace App\Handler;

use App\Entity\Skill;
use App\Handler\Interfaces\EditSkillHandlerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

class EditSkillHandler implements EditSkillHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $doctrine;

    /**
     * @var Skill
     */
    private $skill;

    public function __construct(
        EntityManagerInterface $doctrine
    )
    {
        $this->doctrine     = $doctrine;
        $this->skill        = new Skill();
    }

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid())
        {
            $this->skill->setName(
                $form->get('name')->getData()
            );

            $this->skill->setLevel(
                $form->get('level')->getData()
            );

            $this->doctrine->persist(
                $this->skill
            );

            $this->doctrine->flush();

            return true;
        }
        return false;
    }
}