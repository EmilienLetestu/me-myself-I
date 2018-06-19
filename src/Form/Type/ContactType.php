<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 19/06/2018
 * Time: 10:14
 */

namespace App\Form\Type;


use App\DTO\ContactDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder
           ->add('fullName', TextType::class,[
              'label' => 'Nom et Prénom'
           ])
           ->add('email', EmailType::class,[
               'label' => 'Votre email'
           ])
           ->add('subject', TextType::class,[
               'label'    => 'Objet de votre message',
               'required' => false
           ])
           ->add('message', TextareaType::class,[
               'label' => 'Message'
           ])
       ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContactDTO::class,
            'validation_groups' => 'contact',
            'empty_data' => function(FormInterface $form){
                return new ContactDTO(
                    $form->get('fullName')->getData(),
                    $form->get('email')->getData(),
                    $form->get('subject')->getData(),
                    $form->get('message')->getData()
                );
            }
        ]);
    }
}
