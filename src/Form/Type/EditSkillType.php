<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 17:20
 */

namespace App\Form\Type;


use App\DTO\EditSkillDTO;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditSkillType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder
           ->add('name', TextType::class,[
               'label' => 'Compétence'
           ])
           ->add('level', IntegerType::class,[
               'label'=> 'Niveau (0-100)'
           ])
       ;

    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
       $resolver->setDefaults([
           'data_class' => EditSkillDTO::class,
           'validation_groups' => 'editSkill',
           'empty_data' => function(FormInterface $form){
                return new EditSkillDTO(
                    $form->get('name')->getData(),
                    $form->get('level')->getData()
                );
           }
       ]);
    }
}