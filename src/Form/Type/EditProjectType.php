<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 13/06/2018
 * Time: 17:32
 */

namespace App\Form\Type;

use App\DTO\EditProjectDTO;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditProjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,[
                'label' => 'Nom du projet'
            ])
            ->add('pictRef', FileType::class,[
                'label'    => 'Ajouter une image',
                'required' => false
            ])
            ->add('description', TextareaType::class,[
                'label' => 'Description (50 mots)'
            ])
            ->add('link', UrlType::class,[
                'label'    => 'Ajouter un lien',
                'required' => false
            ])
            ->add('publish', CheckboxType::class,[
                'label'    => 'publier',
                'required' => false
            ])
            ->add('techs', EntityType::class,[
                'class' => 'App\Entity\Tech',
                'choice_label' => 'name',
                'multiple'     => true,
                'expanded'     => true
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EditProjectDTO::class,
            'validation_groups' => 'editProject',
            'empty_data' => function(FormInterface $form){
                return new EditProjectDTO(
                    $form->get('name')->getData(),
                    $form->get('description')->getData(),
                    $form->get('link')->getData(),
                    $form->get('techs')->getData(),
                    $form->get('publish')->getData()
                );
            }
        ]);
    }
}